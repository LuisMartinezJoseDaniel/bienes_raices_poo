<?php 
session_start();
$_SESSION = []; //Reiniciar la sesion a un arreglo vacio

header('Location: /');