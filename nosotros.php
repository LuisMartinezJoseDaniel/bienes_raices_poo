<?php 
  require("includes/app.php");
  incluirTemplate("Header");
?>
    <main class="contenedor">
      <h2>Conoce Sobre Nosotros</h2>
      <div class="contenido-nosotros">
        <div class="imagen">
          <picture>
            <source srcset="build/img/nosotros.webp" type="image/webp" />
            <source srcset="build/img/nosotros.jpg" type="image/jpeg" />
            <img
              loading="lazy"
              src="build/img/nosotros.jpg"
              alt="Imagen de nosotros"
            />
          </picture>
        </div>
        <div class="texto-nosotros">
          <!-- Blockoute se utiliza para citar -->
          <blockquote>25 años de experiencia</blockquote>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis
            delectus sint, natus, neque laborum nemo soluta, consequuntur dicta
            vero est reiciendis maiores eveniet perspiciatis dolorem
            voluptatibus ex modi illum blanditiis. Vel repudiandae temporibus ad
            repellendus facere aperiam dolor eum ex facilis dignissimos amet
            corporis, delectus ab, architecto animi atque. Repellendus autem,
            asperiores maiores porro voluptatibus magnam eos quibusdam dolorum
            nulla? Exercitationem nisi voluptates dolorem nihil quos quae,
            officia, totam sit ipsum ea asperiores praesentium accusamus
            excepturi? Dolores, obcaecati ad accusantium alias aliquam vel
            itaque earum facilis, fuga doloribus repudiandae non.
          </p>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Praesentium, veritatis.
          </p>
        </div>
      </div>
    </main>

    <section class="contenedor seccion">
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
          <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy" />
          <h3>Precio</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Consectetur exercitationem debitis, magni voluptas vero doloremque
            magnam reiciendis harum animi quas!
          </p>
        </div>
        <div class="icono">
          <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy" />
          <h3>Tiempo</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Consectetur exercitationem debitis, magni voluptas vero doloremque
            magnam reiciendis harum animi quas!
          </p>
        </div>
      </div>
    </section>
<?php 
  incluirTemplate("Footer");
