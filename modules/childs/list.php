<?php

use Module\Module;
use Data\DataHandler;
use Data\Fields\TextField;
use Data\Fields\SelectField;
use Data\Fields\DateTimeField;

$module = new Module();

$dataHandler = new DataHandler();

$textField = new TextField('ID');
$textField->setLabel('Identiteitsnummer');
$textField->setLink(true);
$dataHandler->addColumn($textField);

$textField = new TextField('name');
$textField->setLabel('Naam');
$textField->setLink(true);
$dataHandler->addColumn($textField);

$selectField = new SelectField('userID');
$selectField->setLabel('Ouder');
$selectField->setLink(true);
$selectField->setSourceTable('users');
$selectField->setSourceColumn('ID');
$selectField->setValueColumns(['name', 'age']);
$dataHandler->addColumn($selectField);

$dateTimeField = new DateTimeField('birthday');
$dateTimeField->setLabel('Geboortedatum');
$dateTimeField->setLink(true);
$dataHandler->addColumn($dateTimeField);

$module->setData($dataHandler);