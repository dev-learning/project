<?php

use Module\Module;
use Data\DataHandler;
use Data\Fields\TextField;

$module = new Module();

$dataHandler = new DataHandler();

$textField = new TextField('ID');
$textField->setLabel('Identiteitsnummer');
$textField->setLink(true);
$dataHandler->addColumn($textField);

$textField = new TextField('age');
$textField->setLabel('Leeftijd');
$textField->setLink(true);
$dataHandler->addColumn($textField);

$textField = new TextField('name');
$textField->setLabel('Naam');
$textField->setLink(true);
$dataHandler->addColumn($textField);

$module->setData($dataHandler);