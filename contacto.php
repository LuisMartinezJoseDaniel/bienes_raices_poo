<?php 
  require("includes/app.php");
  incluirTemplate("Header", true);
?>
    <main class="contenedor">
      <h1>Contacto</h1>
      <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp" />
        <source srcset="build/img/destacada3.jpg" type="image/jpeg" />
        <img
          loading="lazy"
          src="build/img/destacada3.jpg"
          alt="Imagen de Contacto"
        />
        <h2>Llene el formulario de contacto</h2>
        <form class="formulario">
          <!-- Agrupador de campos con border -->
          <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" placeholder="Tu nombre" />
            <label for="email">E-mail</label>
            <input id="email" type="email" placeholder="Tu email" />

            <label for="telefono">Teléfono</label>
            <input id="telefono" type="tel" placeholder="Tu teléfono" />

            <label for="mensaje">Mensaje: </label>
            <textarea id="mensaje"> </textarea>
          </fieldset>

          <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o compra:</label>
            <select id="opciones">
              <option value="" disabled selected>--Seleccione--</option>
              <option value="Compra">Compra</option>
              <option value="Vende">Vender</option>
            </select>
            <label for="presupuesto">Precio o presupuesto:</label>
            <input
              type="number"
              id="presupuesto"
              placeholder="Tu precio o presupuesto"
            />
          </fieldset>
          <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
              <label for="contactar-telefono">Teléfono</label>
              <input
                name="contacto"
                value="telefono"
                type="radio"
                id="contactar-telefono"
              />

              <label for="contactar-email">E-mail</label>
              <input
                name="contacto"
                value="email"
                type="radio"
                id="contactar-email"
              />
            </div>
            <p>Si eleigió teléfono, elija la fecha y la hora</p>
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" />

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00" />
          </fieldset>
          <input type="submit" value="Enviar" class="boton-verde" />
        </form>
      </picture>
    </main>

<?php 
  incluirTemplate("Footer");
