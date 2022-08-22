<?php
// TODO: Eliminar este archivo en produccion

//importar la conexion
require("includes/app.php");
$db =  conectarDB();
//Crear un email y password
$email = "correo@correo.com";
$password = "123456";

//Hashear password -> se usa CHAR(60) para tener un espacio fijo en memoria, distinto al varchar, que ocupa solo lo que necesita
//! No hay forma de revertir el hash, pero si se puede establecer uno nuevo
$passwordHash =  password_hash($password, PASSWORD_DEFAULT);

//Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('${email}','${passwordHash}')";
// Agregarlo a la base de datos
mysqli_query($db, $query);