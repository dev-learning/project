<?php

use Module\Module;
use Form\FormHandler;
use Form\Fields\TextField;
use Validation\Validation;

$module = new Module(basename(__DIR__));

$formHandler = new FormHandler();

$textField = new TextField('ID');
$textField->setLabel('Identiteitsnummer');
$textField->setReadOnly(true);
$textField->setDescription('dit is een test');
$formHandler->addField($textField);


$textField = new TextField('age');
$textField->setLabel('Leeftijd');
$textField->setDescription('dit is een test');
$textField->setValidation(Validation::FORM_INTEGER);
$formHandler->addField($textField);


$textField = new TextField('name');
$textField->setLabel('Naam');
$textField->setRequired(true);
$textField->setValidation(Validation::FORM_TEXT);
$textField->setDescription('dit is een test leeftijd');
$formHandler->addField($textField);

$module->setForm($formHandler);
