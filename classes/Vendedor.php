<?php
namespace App;

class Vendedor extends ActiveRecord{
  protected static $tabla = 'vendedores';
  protected static $columnasDB = ['id','nombre','apellido','telefono'];

  public $id;
  public $nombre;
  public $apellido;
  public $telefono;

   /**
  * @param ($args) -> arreglo que se llena con $_POST (la superglobal)
 */
  public function __construct( $args = []) 
  {
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? '';
    $this->apellido = $args['apellido'] ?? '';
    $this->telefono = $args['telefono'] ?? '';
  }
  public function validar(): array{

    if(!$this->nombre){
        self::$errores['nombre'] = "El nombre es requerido";
    }
    if(!$this->apellido){
        self::$errores['apellido'] = "El apellido es requerido";
      }
    if(!$this->telefono){
        self::$errores['telefono'] = "El teléfono es requerido";
      }
      //exp regular -> numeros del 0 al 9 con extension de 10 digitos
      if(!preg_match( '/[0-9]{10}/' , $this -> telefono)){
        self::$errores['telefono'] = "El formato del teléfono no es válido";
        
    }



      return self::$errores;
  }
}