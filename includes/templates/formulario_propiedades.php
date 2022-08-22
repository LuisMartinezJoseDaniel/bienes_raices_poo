<fieldset>
  <legend>Información general</legend>

  <label for="titulo">
    Título:
  </label>
  <!-- name= "propiedad[campo]"-> dentro del post crea un arreglo {["propiedad"] => array({...campos})} -->
  <input value="<?=sanitizar($propiedad->titulo)?>" type="text" name="propiedad[titulo]" id="titulo" placeholder="Título de la propiedad">
  <?php if(isset($errores['titulo'])):?>  
    <div class="alerta error">
      <?=$errores['titulo']?>
    </div>
  <?php endif?>

  <label for="precio">
    Precio:
  </label>
  <input value="<?=sanitizar($propiedad->precio)?>" type="number" name="propiedad[precio]" id="precio" placeholder="Precio de la propiedad">
  <?php if(isset($errores['precio'])):?>  
    <div class="alerta error">
      <?=$errores['precio']?>
    </div>
  <?php endif?>          
  
  <label for="imagen">
    Imagen:
  </label>
  <input type="file" accept="image/jpeg, image/png" name="propiedad[imagen]" id="imagen">
  <?php if($propiedad->imagen):?>
    <img src="/imagenes/<?=$propiedad -> imagen?>" alt="Imagen de la propiedad <?=$propiedad->titulo?>" class="imagen-small">
  <?php endif;?>
  <?php if(isset($errores['imagen'])):?>  
    <div class="alerta error">
      <?=$errores['imagen']?>
    </div>
  <?php endif?>    

  <label for="descripcion">Descripción:</label>
  <textarea id="descripcion" name="propiedad[descripcion]"><?=sanitizar($propiedad->descripcion)?></textarea>
  <?php if(isset($errores['descripcion'])):?>  
    <div class="alerta error">
      <?=$errores['descripcion']?>
    </div>
  <?php endif?>    
</fieldset>

<fieldset>
  <legend>Información de la propiedad</legend>
  
  <label for="habitaciones">
    Habitaciones:
  </label>
  <input value="<?=sanitizar($propiedad->habitaciones)?>" type="number" name="propiedad[habitaciones]" id="habitaciones" placeholder="Ej: 3" min="1" max="9">
  <?php if(isset($errores['habitaciones'])):?>  
    <div class="alerta error">
      <?=$errores['habitaciones']?>
    </div>
  <?php endif?> 

  <label for="wc">
    Baños:
  </label>
  <input value="<?=sanitizar($propiedad->wc)?>" type="number" name="propiedad[wc]" id="wc" placeholder="Ej: 3" min="1" max="9">
  <?php if(isset($errores['wc'])):?>  
    <div class="alerta error">
      <?=$errores['wc']?>
    </div>
  <?php endif?>    

  <label for="estacionamiento">
    Estacionamiento:
  </label>
  <input value="<?=sanitizar($propiedad->estacionamiento)?>" type="number" name="propiedad[estacionamiento]" id="estacionamiento" placeholder="Ej: 3" min="1" max="9">
  <?php if(isset($errores['estacionamiento'])):?>  
    <div class="alerta error">
      <?=$errores['estacionamiento']?>
    </div>
  <?php endif?>    


</fieldset>

<fieldset>
  <legend>Vendedor</legend>
  <label for="vendedor">Vendedor</label>
  <select name="propiedad[vendedores_id]" id="vendedor">
    <option selected value="">--Seleccione--</option>

    <?php foreach ($vendedores as $vendedor): ?>
      <!-- Mantener el vendedor seleccionado -->
      <option value="<?=$vendedor->id?>" <?=($vendedor->id === $propiedad->vendedores_id? 'selected':'')?> > 
        <?= sanitizar($vendedor-> nombre). " " . sanitizar($vendedor -> apellido) ?>
      </option>
  
    <?php endforeach?>

  </select>
  <?php if(isset($errores['vendedor'])):?>  
    <div class="alerta error">
      <?=$errores['vendedor']?>
    </div>
  <?php endif?>    
</fieldset>