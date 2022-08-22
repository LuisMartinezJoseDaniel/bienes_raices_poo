<?php 

namespace App; 

//* Active Record-> Patron de arquitectura para los datos, cada clase es un espejo de la base de datos

class Propiedad extends ActiveRecord{

  protected static $tabla = 'propiedades';
  protected static $columnasDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_id'];


  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $vendedores_id;

 /**
  * @param ($args) -> arreglo que se llena con $_POST (la superglobal)
 */
  public function __construct( $args = []) 
  {
    $this->id = $args['id'] ?? null;
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->creado = date('Y/m/d');
    $this->vendedores_id = $args['vendedores_id'] ?? '';
  }

  public function validar(): array{

    if(!$this->titulo){
        self::$errores['titulo'] = "Debes añadir un título";
      }
      if(!$this->precio){
        self::$errores['precio'] = "El precio es obligatorio";
      }
      if(strlen($this->descripcion) < 50 ){
        self::$errores['descripcion'] = "La descripcion es obligatoria y debe tener almenos 50 caracteres";
      }
      if(!$this->habitaciones){
        self::$errores['habitaciones'] = "Por favor, elige un numero de habitaciones";
      }
      if(!$this->wc){
        self::$errores['wc'] = "Por favor, elige un numero de baños";
      }
      if(!$this->estacionamiento){
        self::$errores['estacionamiento'] = "Por favor, elige el numero de estacionamientos";
      }
      if(!$this->vendedores_id){
        self::$errores['vendedor'] = "Por favor, elige un vendedor";
      }
      if(!$this->imagen){ //validacion que el nombre de la imagen no este vacia
        self::$errores['imagen'] = "Por favor, elige una imagen para la propiedad";
      }
      return self::$errores;
  }
}