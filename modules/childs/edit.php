<?php

use Module\Module;
use Form\FormHandler;
use Form\Fields\TextField;
use Form\Fields\SelectField;
use \Form\Fields\DateField;
use \Form\Fields\TextBoxField;
use \Form\Fields\RadioField;
use Validation\Validation;

$module = new Module(basename(__DIR__));

$formHandler = new FormHandler();

$textField = new TextField('ID');
$textField->setLabel('ID');
$textField->setReadOnly(true);
$textField->setDescription('dit is een test');
$formHandler->addField($textField);


$textField = new TextField('name');
$textField->setLabel('Naam');
$textField->setRequired(true);
$textField->setValidation(Validation::FORM_TEXT);
$textField->setDescription('dit is een test');
$formHandler->addField($textField);

$textField = new TextField('age');
$textField->setLabel('Leeftijd');
$textField->setRequired(true);
$textField->setValidation(Validation::FORM_INTEGER);
$textField->setDescription('dit is een test leeftijd');
$formHandler->addField($textField);

$selectField = new SelectField('userID');
$selectField->setLabel('Ouder');
$selectField->setValidation(Validation::FORM_INTEGER);
$selectField->setSourceTable('users');
$selectField->setSourceColumn('ID');
$selectField->setValueColumn('name');
$selectField->setRequired(true);
$selectField->setDescription('dit is een test leeftijd');
$formHandler->addField($selectField);

$radioField = new RadioField('gender');
$radioField->setLabel('Geslacht');
$radioField->addOption(0, 'Jongen');
$radioField->addOption(1, 'Meisje');
$radioField->setDescription('Geslacht van kind');
$formHandler->addField($radioField);

$dateField = new DateField('birthday');
$dateField->setLabel('Geboorte datum');
$dateField->setRequired(true);
$dateField->setValidation(Validation::FORM_TEXT);
$dateField->setDescription('dit is een test leeftijd');
$formHandler->addField($dateField);

$textBoxField = new TextBoxField('remark');
$textBoxField->setLabel('Opmerking');
$textBoxField->setRequired(true);
$textBoxField->setValidation(Validation::FORM_TEXT);
$formHandler->addField($textBoxField);


$module->setForm($formHandler);
