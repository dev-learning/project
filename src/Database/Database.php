<?php

namespace Database;

use \PDO;

class Database
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var PDO
     */
    private $db;

    /**
     * connect with database
     */
    public function __construct()
    {
        global $config;
        $this->config = $config['database'];
        $this->db = new PDO(
            $this->config['driver'] . ':host=' . $this->config['host'] . ';dbname=' . $this->config['database'],
            $this->config['username'],
            $this->config['password']
        );
    }

    /**
     * @param string $table
     * @return \PDOStatement
     */
    public function create($table)
    {
        return $this->db->query(Create::getQuery($table));
    }

    /**
     * @param $table
     * @param array $columns
     * @return \PDOStatement
     */
    public function alter($table, array $columns)
    {
        return $this->db->query(Alter::getQuery($table, $columns));
    }

    /**
     * @param string $table
     * @return array
     */
    public function describe($table)
    {
        $prepare = $this->db->query(Describe::getQuery($table));
        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $table
     * @param $fields
     * @param bool|false $getLastInsertedID
     * @return bool|string
     */
    public function insert($table, $fields, $getLastInsertedID = false)
    {
        $sql = Insert::getQuery($table, $fields);
        $prepare = $this->db->prepare($sql);

        foreach ($fields as $key => $value)
        {
            $prepare->bindValue(':' . $key, $value);
        }

        if ($prepare->execute())
        {
            if ($getLastInsertedID)
            {
                return $this->db->lastInsertId();
            }
            return true;
        }
        return false;
    }

    /**
     * @param array $columns
     * @param string $table
     * @param array $where
     * @param string $orderBy
     * @param string $orderDir
     * @param int $limit
     * @return bool
     */
    public function select( array $columns = ['*'], $table, array $where = [], $orderBy = null, $orderDir = null, $limit = null)
    {
        $select = new Select();
        $select->setColumns($columns);
        $select->setTable($table);
        $select->setWhere($where);
        $select->setOrderBy($orderBy);
        $select->setOrderDir($orderDir);
        $select->setLimit($limit);

        $prepare = $this->db->prepare($select->getQuery());

        if (count($where) > 0)
        {
            foreach ($where as $key => $value)
            {
                $prepare->bindParam(':' . $key, $value);
            }
        }

        if ($prepare->execute())
        {
            return $prepare->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    /**
     * @param string $table
     * @param array $columns
     * @param array $where
     * @return bool
     */
    public function update($table, array $columns, array $where = [])
    {
        $sql = Update::getQuery($table, $columns, $where);
        $prepare = $this->db->prepare($sql);

        $params = array_merge($columns, $where);

        if ($prepare->execute($params))
        {
            return true;
        }
        return false;
    }

    /**
     * @param string $table
     * @param array $where
     * @return bool
     */
    public function delete($table, array $where)
    {
        $sql = Delete::getQuery($table, $where);
        $prepare = $this->db->prepare($sql);

        if ($prepare->execute($where))
        {
            return true;
        }
        return false;
    }

    /**
     * @param $sql
     * @param array $bindParams
     * @return array
     */
    public function runSql($sql, array $bindParams = [])
    {
        $prepare = $this->db->prepare($sql);

        if (count($bindParams) > 0)
        {
            foreach ($bindParams as $key => $value)
            {
                $prepare->bindParam($key, $value);
            }
        }

        if ($prepare->execute())
        {
            return $prepare->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}