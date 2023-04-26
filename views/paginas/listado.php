<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad) {?>
    <div class="anuncios">
      <img loading="lazy" src="/img/<?php echo $propiedad->imagen; ?>" alt="Anuncio" />
      <div class="contenido-anuncio">
        <h3><?php echo $propiedad->titulo; ?></h3>
        <p>
        <?php echo $propiedad->descripcion; ?>
        </p>
        <p class="precio">$<?php echo $propiedad->precio; ?></p>
        <ul class="iconos-caracteristicas">
          <li>
            <img loading="lazy" src="build/img/icono_wc.svg" alt="Wc" title="Baños"/>
            <p><?php echo $propiedad->banios; ?></p>
          </li>
          <li>
            <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Estacionamiento" title="Estacionamientos" />
            <p><?php echo $propiedad->estacionamientos; ?></p>
          </li>
          <li>
            <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="Dormitorio" title="Habitaciones" />
            <p><?php echo $propiedad->habitaciones; ?></p>
          </li>
        </ul>
        <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Ver propiedad</a>
      </div>
    </div>
    <?php } ?>
  </div>