<?php
namespace App;


abstract class ActiveRecord{
  //Base de datos
  //static $db, para evitar nuevas instancias de la base de datos por cada propiedad
  protected static $db;
  protected static $columnasDB = [];
  protected static $tabla = '';
  //Errores
  protected static $errores = []; 



  //Definir la conexion a la BD
  public static function setDB($database){
    self::$db = $database; //Propiedad estatica
  }
  //Funcion para crear y actualizar
  public function guardar():void{
    $resultado = false;
    $mensaje = null;

    if(!is_null($this->id)){//si existe el id es editar
      //Actualizar
      $resultado = $this->actualizar();
      $mensaje = 2;
    }else{

      //Crear
      $resultado = $this -> crear();
      $mensaje = 1;
    }
    // Redireccionar al usuario despeus del query
    // header solo funciona, si no hay html previo
    // Enviar resultado=2 para el mensaje de actulizado con un queryParameter
    if($resultado) {
      header("Location: /admin?resultado=$mensaje");
    };
  }
  
  //* Actualizar en la base de datos NECESARIO EL WHERE
  // Es mejor reescibir todos los registros que comprobrar uno por uno viendo cual cambio
  public function actualizar():bool{

    //* Sanitizar los datos
    $atributos = $this -> sanitizarDatos();
    $valores = [];
    //minificar la consulta
    foreach ($atributos as $key => $value) {
      $valores[] = "{$key}='{$value}'";
    }
    $atributosActualizados = join(", ", $valores);//Array a string
    $id = self::$db->escape_string($this->id);
    $query = "UPDATE " . static::$tabla . " SET $atributosActualizados WHERE id=${id} LIMIT 1";//Escapar el id
    $resultado = self::$db->query($query); //bool

    return $resultado;

  }

  public function crear() :bool{
    //* Sanitizar los datos
    $atributos = $this -> sanitizarDatos();

    // $columnas -> "titulo,precio,imagen,descripcion,habitaciones,wc,estacionamiento,creado,vendedores_id"
    $columnas = join(",",array_keys($atributos));//Unir las llaves de atributos y separarlos con una coma
    $valores = join("','",array_values($atributos));//Unir los valores de atributos y separarlos con una coma

    
    //* Insertar en la base de datos

    $query = "INSERT INTO " . static::$tabla . " ($columnas) 
              VALUES ('$valores')"; // se añaden los '  -> ya que, valores queda en un string = casa', 'valor2', etc.., 'ultimovalor -> es decir hace falta las comillas del inicio y final

    //Si el query fue exitoso retorna un bool(true)
    $resultado = self::$db -> query($query);    
    return $resultado;

  }

  //Eliminar un registro
  public function eliminar (){
       //Eliminar registro
      $id = self::$db->escape_string($this->id);
      $consulta = "DELETE FROM " . static::$tabla . " WHERE id= ${id} LIMIT 1";
      $resultado = self::$db->query($consulta);
      if($resultado) {
        $this->borrarImagen();
        $mensaje = 3;
        header("Location: /admin?resultado=$mensaje");
    };
  }

  //Mapear en un array assoc, cada columna con el valor de este objeto
  public function atributos() : array {
    $atributos = [];
    foreach (static::$columnasDB as $columna) {
        if($columna === 'id') continue; //El id, es auto generado no es necesario sanitizarlo ya que no existe
        $atributos[$columna] = $this->$columna;//$atributos['nombre'] = $this->nombre
    }
    
    return $atributos;
  }
  //* sanitizar los datos-> Se refiere a la limpieza de los datos, antes de ser enviados a la BD
  //* mysqli_real_escape_string -> Escapar los datos para evitar inyeccion de SQL
  //* solo utilizarla en mysql SIN POO
  public function sanitizarDatos(): array {
    $atributos = $this->atributos();
    $sanitizado = [];
    foreach ($atributos as $key => $value) {
      $sanitizado[$key] = self::$db -> escape_string($value); //Sanitizar los datos con el metodo de mysqli
    }

    return $sanitizado;
  }

  //get de errores de cada clase hija
  public static function getErrores ():array {
    return static::$errores;
  }
  // validar campos por cada clase, static, para hacer referencia a la clase hija
  public function validar(): array{
      static::$errores=[];//Limpiar el arreglo antes de validar;
      return static::$errores; 
  } 
  //Subida de archivos
  public function setImagen(string $imagen):void{
    //Comprobar si la instancia tiene un id entonces remplazar la imagen previa
    if(!is_null($this->id)){
     $this->eliminar();//eliminar la imagen previa
    }
    //Setear la imagen
    if($imagen){  
      $this->imagen = $imagen;//Setear el nombre de la imagen actual
    }
  }
  //Eliminar el archivo
  public function borrarImagen(){
    //Busca primero el archivo en el servidor
    $existeArchivo = file_exists(CARPERTA_IMAGENES . $this->imagen);
    if($existeArchivo){
      unlink(CARPERTA_IMAGENES . $this->imagen);//Eliminar la imagen previa
    }
  }
  //Buscar un registro por id
  public static function findById(int $id): self{
    $query = "SELECT * FROM " . static::$tabla . " WHERE id=${id}";
    $resultado = self::consultarSql($query);
    return array_shift($resultado);
  }

  // Listar propiedades
  public static function all():array {
    //*static:: hereda el metodo y busca la variable en la subclase
    $query = "SELECT * FROM " . static::$tabla;

    return self::consultarSql($query);
  }
  public static function get($limite):array {
    //*static:: hereda el metodo y busca la variable en la subclase
    $query = "SELECT * FROM " . static::$tabla . " LIMIT ${limite}";

    return self::consultarSql($query);
  }
  //Arreglo de objetos de tipo Propiedad
  public static function consultarSql (string $query): array {
    //Consultar la base de datos
    $resultado = self::$db -> query($query);

    //Iterar los resultados, si es por ID, un array de 1 resultado, si son todos, un array con todos los resultados
    $registros = [];
    while ($registro = $resultado ->fetch_assoc()) {
      $registros[] = static::crearObjeto($registro);
    }

    //Liberar la memoria
    $resultado -> free();
    //retornar los resultados
    return $registros;
  }
  //Mapear cada registro a un objeto
  protected static function crearObjeto ($registro){
    $objeto = new static; //static para hacer referencia a la subclase ej. new Propiedad()
    
    foreach ($registro as $key => $value) {
      if(property_exists($objeto , $key)){ //Verificar si existe la key(atributo) dentro del objeto
        $objeto -> $key  = $value; //Asignar a cada atibuto del objeto el valor
      }
    }
    
    return $objeto;
  }

  //Sincroniza el objeto en memoria con los cambios realizados por el usuario
  public function sincronizar($args = []): void{
    foreach($args as $key => $value){
      //$this ->objeto actual
      if(property_exists($this,$key) && !is_null($value)){
        $this->$key = $value;
      }
    }

  }
}