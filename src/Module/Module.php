<?php

namespace Module;
use Data\DataHandler;
use Form\FormHandler;
use Database\Database;
use Helpers\Uri;
use Symfony\Component\Yaml\Yaml;
use Validation\Validation;


class Module
{
    /**
     * @var FormHandler $form
     */
    private $form;

    /**
     * @var DataHandler $data
     */
    private $data;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var array
     */
    private $modules;

    /**
     * @var string $method
     */
    private $method;

    /**
     * @var int $ID
     */
    private $ID;

    /**
     * @var array $listData
     */
    private $listData;

    /**
     * @var array $formData
     */
    private $formData;

    /**
     * action constants
     */
    const _edit = "edit";
    const _new  = "new";
    const _list = "list";

    /**
     * set default method and id value
     */
    public function __construct()
    {
        $uri  = Uri::getPathAsArray();

        $this->setName('dashboard');
        if (isset($uri[0]))
        {
            $this->setName($uri[0]);
        }

        $this->setMethod(self::_list);

        if (isset($uri[1]))
        {
            $this->setMethod($uri[1]);
        }

        if (isset($uri[2]))
        {
            $this->setID($uri[2]);
        }
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    private function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param int $ID
     */
    private function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    private function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return FromHandler
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param FromHandler $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }

    /**
     * @return DataHandler
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param DataHandler $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * @param array $modules
     */
    private function setModules($modules)
    {
        $this->modules = $modules;
    }

    /**
     * @return array
     */
    public function getFormData()
    {
        return $this->formData;
    }

    /**
     * @param array $formData
     */
    public function setFormData($formData)
    {
        $this->formData = $formData;
    }

    /**
     * @return array
     */
    public function getListData()
    {
        return $this->listData;
    }

    /**
     * @param array $listData
     */
    public function setListData($listData)
    {
        $this->listData = $listData;
    }

    /**
     * method will be die when a module is not configured
     * @return array
     */
    public function loadModules()
    {
        $scannedModules = scandir(dirname(dirname(__DIR__)) . '/modules');
        $detectedModules = array_values(array_diff($scannedModules, ['.', '..']));
        $notConfiguredModules = [];

        foreach ($detectedModules as $key => $module)
        {
            $configFile = dirname(dirname(__DIR__)) . '/modules/' . $module . '/config.yml';
            if (!is_file($configFile))
            {
                $notConfiguredModules[] = $module;
                continue;
            }
            $modules[$module]['config'] =  Yaml::parse($configFile);
        }

        if (count($notConfiguredModules) > 0)
        {
            var_dump('Not Configured Modules Detected:', $notConfiguredModules);
            exit();
        }
        $this->setModules($modules);

        return $modules;
    }

    /**
     * return active module or false
     * @return array|bool
     */
    public function getActiveModule()
    {
        foreach ($this->getModules() as $moduleName => $module)
        {
            if ($this->getName() == $moduleName)
            {
                return ['name' => $moduleName, 'config' => $module['config']];
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function syncTable()
    {
        $database = new Database();

        $database->create($this->getName());

        $databaseColumns = $database->describe($this->getName());

        $fields = $this->getForm()->getFields();
        $storableFields = [];
        $extendedColumns = [];

        foreach ($databaseColumns as $column)
        {
            $extendedColumns[] = $column['Field'];
        }

        foreach ($fields as $columnName => $field)
        {
            if ($field->isStorable() && !in_array($field->getName(), $extendedColumns))
            {
                $storableFields[$columnName] = $field->getDataType();
            }
        }

        if (count($storableFields) > 0)
        {
            $database->alter($this->getName(), $storableFields);
        }

        return true;
    }

    /**
     * @return bool
     */
    public function run()
    {
        $database = new Database();

        if ($this->getMethod() == self::_edit || $this->getMethod() == self::_new)
        {
            $this->syncTable();
        }

        if ($this->getMethod() == self::_list)
        {
            $listData = [];
            $dbColumns = [];
            $joinColumns = [];
            $dataObjects = $this->getData()->getColumns();

            foreach ($dataObjects as $dataObject)
            {
                $column = [];

                if ($dataObject::fieldType == "select")
                {
                    $joinColumns[$dataObject::fieldType]['objects'][] = $dataObject;
                }

                $dbColumns[] = $dataObject->getName();

                $column['label']  = $dataObject->getLabel();
                $column['isLink'] = $dataObject->isLink();

                $listData['columns'][$dataObject->getName()] = $column;
            }


            $rows = $database->select($dbColumns, $this->getName(), [], 'ID', 'DESC');

            if (isset($joinColumns['select']) && count($joinColumns['select']) > 0)
            {
                foreach ($joinColumns['select'] as $joinColumn)
                {
                    $newJoinData = [];
                    foreach ($joinColumn as $object)
                    {
                        $select = $object->getValueColumns();
                        array_push($select, $object->getSourceColumn());
                        $joinData = $database->select($select, $object->getSourceTable());
                        foreach ($joinData as $row)
                        {
                            $sourceColumnData = $row[$object->getSourceColumn()];
                            unset($row[$object->getSourceColumn()]);
                            $newJoinData[$object->getName()][$sourceColumnData] = implode(' ', $row);
                        }
                    }
                }

                foreach ($rows as $key => $row)
                {
                    foreach ($newJoinData as $fieldName => $joinRows)
                    {
                            $rows[$key][$fieldName] = ($rows[$key][$fieldName]) ?
                                                        $newJoinData[$fieldName][$row[$fieldName]]
                                                        : '';
                    }
                }
            }
            $listData['rows'] = $rows;
            $this->setListData($listData);
            return true;
        }

        if ($this->getMethod() == self::_edit)
        {
            $rows = $database->select(['*'], $this->getName(), ['ID' => $this->getID()], null, null, 1);
            if (count($rows) > 0)
            {
                foreach ($rows[0] as $column => $value)
                {
                    foreach ($this->getForm()->getFields() as $field)
                    {
                        if ($column == $field->getName())
                        {
                            $field->setValue($value);
                        }
                    }
                }
            }
        }


        if ($this->getMethod() == self::_edit || $this->getMethod() == self::_new)
        {
            $fields = [];
            foreach ($this->getForm()->getFields() as $fieldObject)
            {
                $data = [];
                $data['name'] = $fieldObject->getName();
                $data['description'] = $fieldObject->getDescription();
                $data['label'] = $fieldObject->getLabel();
                $data['html'] = $fieldObject->getHtml();
                $data['required'] = $fieldObject->isRequired();
                $fields[] = $data;
            }
            $this->setFormData($fields);
            return true;
        }
    }

    /**
     * handle post after validation if needs
     * @param $post
     * @return array|bool
     */
    public function handlePost($post)
    {
        if (count($post) < 1)
        {
            return false;
        }

        $database = new Database();

        $invalidFields = [];
        $fields = [];
        foreach ($this->getForm()->getFields() as $field)
        {
            if ($field->isStorable())
            {
                $field->setValue($post[$field->getName()]);

                if ($field->getValidation() && Validation::validate($field->getValidation(), $field->getValue())->isValid() != true)
                {
                    $invalidFields[$field->getName()] = $field->getValue();
                }

                $fields[$field->getName()] = $field->getValue();
            }
        }

        if (count($invalidFields) > 0 && (!isset($post['delete']) || $post['delete'] != 1))
        {
            return ['status' => false, 'invalidFields' => $invalidFields];
        }

        switch($this->getMethod())
        {
            case self::_edit:
                    if (isset($post['delete']) && $post['delete'] == 1)
                    {
                        $database->delete($this->getName(), ['ID' => $this->getID()]);
                        $location = $this->getName();
                    }
                    else
                    {
                        $database->update($this->getName(), $fields, ['ID' => $this->getID()]);
                        $location = $this->getName() . '/' . $this->getMethod() . '/' . $this->getID();
                    }
                break;
            case self::_new:
                    $lastInsertedID = $database->insert($this->getName(), $fields, true);
                    $location = $this->getName() . '/' . self::_edit . '/' . $lastInsertedID;
                break;
        }

        return ['status' => true, 'location' => $location];
    }
}