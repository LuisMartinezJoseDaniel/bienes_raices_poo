<?php 
  require("includes/app.php");
  incluirTemplate("Header", true);
?>
    <main class="contenedor seccion contenido-centrado">
      <h1>Guía para la decoración de tu hogar</h1>
      <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp" />
        <source srcset="build/img/destacada2.jpg" type="image/jpeg" />
        <img
          loading="lazy"
          src="build/img/destacada2.jpg"
          alt="Imagen de la propiedad"
        />
      </picture>
      <p class="informacion-meta">
        Escrito el <span>20/10/2021</span> por <span>Admin</span>
      </p>
      <div class="resumen-propiedad">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis
          delectus sint, natus, neque laborum nemo soluta, consequuntur dicta
          vero est reiciendis maiores eveniet perspiciatis dolorem voluptatibus
          ex modi illum blanditiis. Vel repudiandae temporibus ad repellendus
          facere aperiam dolor eum ex facilis dignissimos amet corporis,
          delectus ab, architecto animi atque. Repellendus autem, asperiores
          maiores porro voluptatibus magnam eos quibusdam dolorum nulla?
          Exercitationem nisi voluptates dolorem nihil quos quae, officia, totam
          sit ipsum ea asperiores praesentium accusamus excepturi? Dolores,
          obcaecati ad accusantium alias aliquam vel itaque earum facilis, fuga
          doloribus repudiandae non.
        </p>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium,
          veritatis.
        </p>
      </div>
    </main>
<?php 
  incluirTemplate("Footer");
