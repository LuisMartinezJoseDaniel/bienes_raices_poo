
<fieldset>
  <legend>Información general</legend>

  <label for="nombre">
    Nombre:
  </label>
  <!-- name= "vendedor[campo]"-> dentro del post crea un arreglo {["vendedor"] => array({...campos})} -->
  <input value="<?=sanitizar($vendedor->nombre)?>" type="text" name="vendedor[nombre]" id="nombre" placeholder="Nombre del vendedor(a)">
  <?php if(isset($errores['nombre'])):?>  
    <div class="alerta error">
      <?=$errores['nombre']?>
    </div>
  <?php endif?>

  <label for="apellido">
    Apellido:
  </label>
  <input value="<?=sanitizar($vendedor->apellido)?>" type="text" name="vendedor[apellido]" id="apellido" placeholder="Apellido del vendedor(a)">
  <?php if(isset($errores['apellido'])):?>  
    <div class="alerta error">
      <?=$errores['apellido']?>
    </div>
  <?php endif?>


</fieldset>  

<fieldset>
  <legend>Información extra</legend>

  <label for="telefono">
    Télefono:
  </label>
  
  <input value="<?=sanitizar($vendedor->telefono)?>" type="text" name="vendedor[telefono]" id="telefono" placeholder="Telefono del vendedor(a)">
  <?php if(isset($errores['telefono'])):?>  
    <div class="alerta error">
      <?=$errores['telefono']?>
    </div>
  <?php endif?>
</fieldset>