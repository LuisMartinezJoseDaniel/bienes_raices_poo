<?php 
  require("../includes/app.php");
  use App\Propiedad;
  use App\Vendedor;

  //Iniciar la sesion del login
  estaAutenticado();
  //1. Importar la conexion -> ya esta en app.php
  //2. Implementar el metodo para listar propiedades (ActiveRecord)
  $propiedades = Propiedad::all();
  $vendedores = Vendedor::all();

  //* Superglobal $_GET-> es un array, obtener mensaje de confirmacion
  $resultado = $_GET['resultado'] ?? null; // se parece a ||
  //Eliminar un registro
  if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    // Validar con un filtro
    // filter_var-> retorna false si se envia otra cosa que no sea un numero
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT); //Recuperar el input hidden
    
    //Si el id es un entero
    if($id){

      $tipo = $_POST['tipo'];//input hidden con el tipo del id
      //revisar que el tipo exista ['propiedad', 'vendedor']
      if(validarTipoContenido($tipo)){
        
        if($tipo === "propiedad"){
          $propiedad = Propiedad::findById($id);
          // debuguear($propiedad);
          $propiedad -> eliminar();
        }else if($tipo === 'vendedor'){
          // TODO: falta revisar el error del foreign key cuando se elimina un vendedor que ya esta asignado a una propiedad
          $vendedor = Vendedor::findById($id);
          // debuguear($vendedor);
          $vendedor -> eliminar();
        }
      }
    }
  }

  
  incluirTemplate("Header");
?>
    <main class="contenedor">
      <h1>Administrador de bienes raices</h1>

      <?php
        $mensaje = mostrarNotificacion(intval($resultado));
        if($mensaje):
      ?>
      <p class="alerta exito"> <?=sanitizar($mensaje)?> </p>
      <?php endif;?>
      
      
      <a href="/admin/propiedades/crear.php" class="boton boton-verde">
        Nueva Propiedad
      </a>
      <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">
        Nuevo(a) Vendedor
      </a>
      <!-- Tabla de propiedades -->
      <h2>Propiedades</h2>
      <table class="propiedades">
        <thead>
          <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!--4. Mostrar los resultados -->
          <?php foreach($propiedades as $propiedad):?>
          <tr>
            <td><?=$propiedad -> id ?></td>
            <td><?=$propiedad -> titulo ?></td>
            <td>$<?=$propiedad -> precio ?></td>
            <td><img src="../imagenes/<?=$propiedad -> imagen ?>" alt="Imagen de la propiedad <?=$propiedad -> titulo ?>" class="imagen-tabla" />  </td>
            <td>
              <form method="POST" class="w-100">
                <!-- Enviar un input hidden con el id a eliminar-->
                <input type="hidden" name="id" value="<?=$propiedad -> id ?>"> 
                <input type="hidden" name="tipo" value="propiedad"> 
                <input type="submit" value="Eliminar" class="w-100 boton-rojo-block"/>
                
                 
              </form>
              <a href="/admin/propiedades/actualizar.php?id=<?=$propiedad -> id?>" class="boton-amarillo-block">Editar</a>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>

      <h2>Vendedores</h2>
      <table class="propiedades">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!--4. Mostrar los resultados -->
          <?php foreach($vendedores as $vendedor):?>
          <tr>
            <td><?= $vendedor -> id ?></td>
            <td><?= $vendedor -> nombre . " " . $vendedor -> apellido ?></td>
            <td><?= $vendedor -> telefono ?></td>
            <td>
              <form method="POST" class="w-100">
                <!-- Enviar un input hidden con el id a eliminar-->
                <input type="hidden" name="id" value="<?=$vendedor -> id ?>">
                <input type="hidden" name="tipo" value="vendedor"/> 
                <input type="submit" value="Eliminar" class="w-100 boton-rojo-block"/>

              </form>
              <a href="/admin/vendedores/actualizar.php?id=<?=$vendedor -> id?>" class="boton-amarillo-block">Editar</a>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </main>

<?php 
  //5. Cerrar la conexion
  mysqli_close($db);
  incluirTemplate("Footer");
