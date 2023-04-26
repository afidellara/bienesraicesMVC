<main class="contenedor seccion">
  <h1>Contacto</h1>
  
  <picture>
    <source srcset="build/img/destacada3.webp" alt="imagen contacto" type="image/webp" />
    <source srcset="build/img/destacada3.jpg" alt="imagen contacto" type="image/jpge" />
    <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen del contacto" type="image/jpg" />
  </picture>
  <?php if ($mensaje) { ?>
    <p class="alerta exito"><?php echo $mensaje ?> </p>
  <?php } ?>
  <h2>Llene el formulario de contacto</h2>
  <form class="formulario" action="/contacto" method="POST">
    <fieldset>
      <legend>Información personal</legend>

      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" placeholder="Escribe tu nombre" name="contacto[nombre]" required>

      <label for="mensaje">Mensaje:</label>
      <textarea id="mensaje" cols="30" rows="10" name="contacto[mensaje]" required></textarea>
    </fieldset>
    <fieldset>
      <legend>Información sobre la propiedad</legend>

      <label for="opciones">Vende o compra:</label>
      <select id="opciones" name="contacto[tipo]" required>
        <option value="seleccione" disabled selected>Seleccione</option>
        <option value="compra">Compra</option>
        <option value="vende">Vende</option>
      </select>

      <label for="presupuesto">Presupuesto o precio:</label>
      <input type="number" id="presupuesto" placeholder="Escribe tu presupuesto" name="contacto[precio]" required>
    </fieldset>

    <fieldset>
      <legend>Contacto</legend>

      <p>Como desea ser contactado</p>

      <div class="forma-contacto">
        <label class="contactar-telefono">Teléfono</label>
        <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>
        <label class="contactar-email">Email</label>
        <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
      </div>

      <div id="contacto"></div>

      
    </fieldset>

    <input type="submit" value="Enviar" class="boton-verde">
  </form>
</main>
