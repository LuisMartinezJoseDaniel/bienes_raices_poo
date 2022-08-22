<?php 
  declare(strict_types= 1); //* Mostrar errores de los types
  //* include -> para templates
  //* require -> para funciones
  
  require("includes/app.php");
  incluirTemplate("Header", true);
?>

    <main class="contenedor">
      <h1>Más sobre nosotros</h1>
      <div class="iconos-nosotros">
        <div class="icono">
          <img
            src="build/img/icono1.svg"
            alt="Icono seguridad"
            loading="lazy"
          />
          <h3>Seguridad</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Consectetur exercitationem debitis, magni voluptas vero doloremque
            magnam reiciendis harum animi quas!
          </p>
        </div>
        <div class="icono">
          <img
            src="build/img/icono2.svg"
            alt="Icono precio"
            loading="lazy"
          />
          <h3>Precio</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Consectetur exercitationem debitis, magni voluptas vero doloremque
            magnam reiciendis harum animi quas!
          </p>
        </div>
        <div class="icono">
          <img
            src="build/img/icono3.svg"
            alt="Icono tiempo"
            loading="lazy"
          />
          <h3>Tiempo</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Consectetur exercitationem debitis, magni voluptas vero doloremque
            magnam reiciendis harum animi quas!
          </p>
        </div>
      </div>
    </main>
    <section class="seccion contenedor">
      <h2>Casas y Depas en Venta</h2>
      <!-- Incluir 3 anuncios -->
      <?=include "./includes/templates/anuncios.php";?>
      <div class="alinear-derecha">
        <a href="anuncios.php" class="boton boton-verde">Ver todas</a>
      </div>
    </section>

    <section class="imagen-contacto">
      <h2>Encuentra la casa de tus sueños</h2>
      <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
      <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
      <!-- section se usa cuando tenemos un heading que da la entrada de blog -->
      <section class="blog">
        <h3>Nuestro blog</h3>
        <!-- article-> para entradas de blog -->
        <article class="entrada-blog">
          <div class="imagen">
            <picture>
              <source srcset="build/img/blog1.webp" type="image/webp">
              <source srcset="build/img/blog1.jpg" type="image/jpeg">
              <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen de entrada de blog1">
            </picture>
          </div>
          <div class="texto-entrada">
            <a href="entrada.php"><h4>Terraza en el techo de tu casa</h4></a>
            <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>
            <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
          </div>
        </article>
        <article class="entrada-blog">
          <div class="imagen">
            <picture>
              <source srcset="build/img/blog2.webp" type="image/webp">
              <source srcset="build/img/blog2.jpg" type="image/jpeg">
              <img loading="lazy" src="build/img/blog2.jpg" alt="Imagen de entrada de blog2">
            </picture>
          </div>
          <div class="texto-entrada">
            <a href="entrada.php"><h4>Guía para la decoración de tu hogar</h4></a>
            <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>
            <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
          </div>
        </article>
      </section>
      <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
          <blockquote>
            El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas
          </blockquote>
          <p>- José Daniel Luis Martínez</p>
        </div>
      </section>
    </div>

<?php 
  incluirTemplate("Footer");
