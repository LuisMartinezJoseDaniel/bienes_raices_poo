<?php
// Archivo principal para orquestar las clases, funciones y bases de datos
require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use App\ActiveRecord;

//Conectarnos a la base de datos

$db = conectarDB(); // config/database.php

//Setear la base de datos
ActiveRecord::setDB($db);

