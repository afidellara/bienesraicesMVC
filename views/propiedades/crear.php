<main class="contenedor seccion">
    <h1>Crear</h1>
    <?php foreach ($errores as $error) { ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
  <?php } ?>
  <a href="/propiedades/admin" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" class="boton boton-verde" value="Registrar vendedor">
    </form>
</main>