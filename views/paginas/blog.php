    <?php foreach($blogs as $blog){ ?>
      <div class="imagen">
      <a href="/entrada?id=<?php echo $blog->id ?>">
          <img loading="lazy" src="/img/<?php echo $blog->imagen; ?>" alt="blog" />
          </a>
      </div>
      <div class="texto-entrada">
        <a href="/entrada?id=<?php echo $blog->id ?>">
          <h4><?php echo $blog->titulo; ?></h4>
          <p class="informacion-meta">
            Escrito el: <span><?php echo $blog->fecha ?></span> por:
            <span><?php echo $blog->nombre_autor . ' ' . $blog->apellido_autor; ?></span>
          </p>
          <p> <?php echo $blog->descripcion; ?></p>
        </a>
      </div>
      <?php }  ?>