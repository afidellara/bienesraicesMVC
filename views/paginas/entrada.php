<main class="contenedor seccion contenido-centrado">
  <h1><?php echo $blog->titulo ?></h1>
  <p class="informacion-meta">Escrito el: <span><?php echo $blog->$fecha ?></span>
   por: <span><?php echo $blog->nombre_autor . ' ' . $blog->apellido_autor; ?></span></p>
  <picture>
    <img src="/img/<?php echo $blog->imagen;?>" alt="imagen del blog">
  </picture>
  <div class="resumen-propiedad">
    <p>
      <?php echo $blog->descripcion ?>
    </p>
  </div>
</main>