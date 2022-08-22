<?php 
  require("includes/app.php");
  incluirTemplate("Header", true);
?>
    <main class="contenedor contenido-centrado">
      <h1>Nuestro blog</h1>
      <!-- article-> para entradas de blog -->
      <article class="entrada-blog">
        <div class="imagen">
          <picture>
            <source srcset="build/img/blog1.webp" type="image/webp" />
            <source srcset="build/img/blog1.jpg" type="image/jpeg" />
            <img
              loading="lazy"
              src="build/img/blog1.jpg"
              alt="Imagen de entrada de blog1"
            />
          </picture>
        </div>
        <div class="texto-entrada">
          <a href="entrada.php"><h4>Terraza en el techo de tu casa</h4></a>
          <p>Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>
          <p>
            Consejos para construir una terraza en el techo de tu casa con los
            mejores materiales y ahorrando dinero
          </p>
        </div>
      </article>
      <article class="entrada-blog">
        <div class="imagen">
          <picture>
            <source srcset="build/img/blog2.webp" type="image/webp" />
            <source srcset="build/img/blog2.jpg" type="image/jpeg" />
            <img
              loading="lazy"
              src="build/img/blog2.jpg"
              alt="Imagen de entrada de blog1"
            />
          </picture>
        </div>
        <div class="texto-entrada">
          <a href="entrada.php"
            ><h4>Guía para la decoración de tu hogar</h4></a
          >
          <p>Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>
          <p>
            Maximiza el espacio en tu hogar con esta guía, aprende a combinar
            muebles y colores para darle vida a tu espacio
          </p>
        </div>
      </article>
      <!-- article-> para entradas de blog -->
      <article class="entrada-blog">
        <div class="imagen">
          <picture>
            <source srcset="build/img/blog3.webp" type="image/webp" />
            <source srcset="build/img/blog3.jpg" type="image/jpeg" />
            <img
              loading="lazy"
              src="build/img/blog3.jpg"
              alt="Imagen de entrada de blog3"
            />
          </picture>
        </div>
        <div class="texto-entrada">
          <a href="entrada.php"><h4>Terraza en el techo de tu casa</h4></a>
          <p>Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>
          <p>
            Consejos para construir una terraza en el techo de tu casa con los
            mejores materiales y ahorrando dinero
          </p>
        </div>
      </article>
      <article class="entrada-blog">
        <div class="imagen">
          <picture>
            <source srcset="build/img/blog4.webp" type="image/webp" />
            <source srcset="build/img/blog4.jpg" type="image/jpeg" />
            <img
              loading="lazy"
              src="build/img/blog2.jpg"
              alt="Imagen de entrada de blog4"
            />
          </picture>
        </div>
        <div class="texto-entrada">
          <a href="entrada.php"
            ><h4>Guía para la decoración de tu hogar</h4></a
          >
          <p>Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>
          <p>
            Maximiza el espacio en tu hogar con esta guía, aprende a combinar
            muebles y colores para darle vida a tu espacio
          </p>
        </div>
      </article>
    </main>
<?php 
  incluirTemplate("Footer");
