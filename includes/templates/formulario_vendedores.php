<fieldset>
      <legend>Información general</legend>

      <label for="nombre">Nombre</label>
      <input type="text" placeholder="Nombre vendedor" id="nombre" name="vendedor[nombre]" value="<?php echo sanitizar($vendedor->nombre);  ?>">

      <label for="apellido">Aombre</label>
      <input type="text" placeholder="apellido vendedor" id="apellido" name="vendedor[apellido]" value="<?php echo sanitizar($vendedor->apellido);  ?>">

      
</fieldset>

<fieldset>
      <legend>Información de contacto</legend>
      <label for="telefono">Télefono</label>
      <input type="text" placeholder="telefono vendedor" id="telefono" name="vendedor[telefono]" value="<?php echo sanitizar($vendedor->telefono);  ?>">
</fieldset>