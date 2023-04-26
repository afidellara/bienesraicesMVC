<main class="contenedor seccion contenido-centrado">
  <h1><?php echo $propiedad->titulo; ?></h1>
  <img loading="lazy" src="/img/<?php echo $propiedad->imagen; ?>" alt="imagen casa" type="image/jpg" />

  <div class="resumen-propiedad">
    <p class="precio"><?php echo $propiedad->precio; ?></p>
    <ul class="iconos-caracteristicas">
      <li>
        <img loading="lazy" src="build/img/icono_wc.svg" alt="Wc" />
        <p><?php echo $propiedad->banios; ?></p>
      </li>
      <li>
        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Estacionamiento" />
        <p><?php echo $propiedad->estacionamientos; ?></p>
      </li>
      <li>
        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="Dormitorio" />
        <p><?php echo $propiedad->habitaciones; ?></p>
      </li>
    </ul>
    <p>
      <?php echo $propiedad->descripcion; ?>
    </p>
  </div>
</main>