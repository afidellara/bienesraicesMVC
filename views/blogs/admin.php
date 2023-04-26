<main class="contenedor seccion">
  <h1>Nuestro Blog</h1>
  <a href="/blogs/crear" class="boton boton-amarillo">Crear blog</a>
  <?php foreach ($blogs as $blog) { ?>
    <article class="entrada-blog">
      <div class="imagen">
        <a href="/entrada?id=<?php echo $blog->id ?>">
          <img loading="lazy" src="/img/<?php echo $blog->imagen; ?> " alt="blog" />
        </a>
      </div>
      <div class="texto-entrada">
        <a href="/blogs/actualizar?id=<?php echo $blog->id; ?>">
          <h4><?php echo $blog->titulo; ?></h4>
          <p>
            Escrito el: <span><?php echo $blog->fecha; ?></span> por:
            <span><?php echo $blog->nombre_autor . ' ' . $blog->apellido_autor; ?></span>
          </p>
          <p><?php echo $blog->descripcion; ?> </p>
        </a>
      </div>
    </article>
  <?php } ?>
</main>