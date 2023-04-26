<main class="contenedor seccion">
  <h1>Administradro de Bienes raices</h1>

  <?php if ($resultado) { ?>
    <p class="alerta exito"><?php echo mostrarNotificacion(intval($resultado)) ?> </p>
  <?php } ?>


  <a href="/propiedades/crear" class="boton boton-verde">Nueva propiedad</a>
  <a href="/vendedores/admin" class="boton boton-amarillo">Ver vendedores</a>

  <h2>Propiedades</h2>
  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead> 
    <tbody>
      <?php foreach ($propiedades as $propiedad) { ?>
        <tr>
          <td>
            <?php echo $propiedad->id; ?>
          </td>
          <td>
            <?php echo $propiedad->titulo; ?>
          </td>
          <td>
            <img src="/img/<?php echo $propiedad->imagen ?>" class="imagen-tabla" alt="imagen en la tabla">
          </td>
          <td>
            $ <?php echo $propiedad->precio; ?>
          </td>
          <td>
            <form method="POST" class="w-100" action="/propiedades/eliminar">
              <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
              <input type="hidden" name="tipo" value="propiedad">
              <input type="submit" class="boton-rojo-tabla" value="Eliminar">
            </form>
            <a href="/propiedades/actualizar?id=<?php echo $propiedad->id;?>" class="boton-amarillo-tabla">Actualizar</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</main>