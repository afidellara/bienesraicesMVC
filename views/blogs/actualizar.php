<main class="contenedor seccion">
  <h1>Actualizar blog</h1>
  <a href="/blogs/admin" class="boton boton-verde">Volver</a>
  <form method="POST" class="w-100" action="/blogs/eliminar">
    <input type="hidden" name="id" value="<?php echo $blog->id; ?>">
    <input type="hidden" name="tipo" value="blog">
    <input type="submit" class="boton-rojo-tabla" value="Eliminar">
  </form>
  <?php foreach ($errores as $error) { ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
  <?php } ?>
  <form class="formulario" method="POST" enctype="multipart/form-data">
    <?php include __DIR__ . '/formulario.php'; ?>
    <input type="submit" class="boton boton-verde" value="Actualizar blog">
  </form>
</main>