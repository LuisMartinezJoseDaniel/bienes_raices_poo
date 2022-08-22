 <?php
//* PDO -> otra forma de connectar pero con POO
//* mysqli -> usando POO con new mysqli()
 function conectarDB(): mysqli{
  $db = new mysqli("localhost", "root", "admin", "bienesraices_crud");
  if(!$db){
    echo "Error no se pudo conectar";
    exit; // No ejecutar las siguientes lineas
  }

  return $db;

 }