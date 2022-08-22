<?php 
  //Importar la conexion
  include("includes/app.php");
  
  $db = conectarDB();

  $errores = [];
  $email = '';

  //Revisar el metodo POST
  if($_SERVER['REQUEST_METHOD'] === "POST"){
    //Validar campos
    //mysqli_Real_Escape -> para interactuar con la base de datos
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db,$_POST['password']);

    if(!$email){
      $errores['email'] = 'El campo email es obligatorio o no es válido';
    }
    if(!$password){
      $errores['password'] = 'El campo password es obligatorio';
    }
    //Si no hay errores
    if(empty($errores)){
      // Revisar si el usuario existe
      $query = "SELECT * FROM usuarios WHERE email= '${email}' ";
      $resultado = mysqli_query($db, $query);
      //If hay registros
      if($resultado -> num_rows){
        //Revisar si el password es correcto
        $usuario = mysqli_fetch_assoc($resultado);

        //* Verificar si el password es correcto;
        // password_veridy($passwordForm, $passwordHash)
        $auth =  password_verify($password, $usuario['password']);//retorna true, si el password es igual
        //Si el password coincide
        if($auth){
          //Superglobal $SESSION -> Para autenticar
          session_start();
          //Llenar el arreglo de la sesion con la informacion necesaria
          //Es posible colocar en $_SESSION['rol']-> para un sistema de roles
          $_SESSION['usuario'] = $usuario['email'];
          $_SESSION['login'] = true;
          header('Location: /admin');
        }else{
          $errores['usuario'] = "El password es incorrecto";
        }
      }else{
        $errores['usuario'] = "El usuario no existe";
      }

    }
    
    
  }

  incluirTemplate("Header");
?>
    <main class="contenedor seccion contenido-centrado">
      <h1>Iniciar sesion</h1>
      <?php if(isset($errores['usuario'])):?>
        <div class="alerta error">
          <?=$errores['usuario']?>
        </div>  
      <?php endif;?>
      <form class="formulario" method="POST" novalidate>
          <fieldset>
            <legend>Email y password</legend>

            <label for="email">E-mail</label>
            <input name="email" id="email" type="email" placeholder="Tu email"/>
            <?php if(isset($errores['email'])):?>
              <p class="alerta error">
                <?=$errores['email']?>
              </p>
            <?php endif;?>
            <label for="password">Password:</label>
            <input name="password" id="password" type="password" placeholder="Tu password"/>
            <?php if(isset($errores['password'])):?>
              <p class="alerta error">
                <?=$errores['password']?>
              </p>
            <?php endif;?>
          </fieldset>
          <input type="submit" value="Iniciar sesion" class="boton-verde-block">
      </form>
    </main>

<?php 
  incluirTemplate("Footer");
