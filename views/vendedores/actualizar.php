<main class="contenedor seccion">
  <h1>Actualizar vendedor</h1>
  <a href="/vendedores/admin" class="boton boton-verde">Volver</a>
  <?php foreach ($errores as $error) { ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
  <?php } ?>
  <form class="formulario" method="POST">
    <?php include __DIR__ . '/formulario.php'; ?>
    <input type="submit" class="boton boton-verde" value="Actualizar vendedor">
  </form>
</main>