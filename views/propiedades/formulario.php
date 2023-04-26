<fieldset>
      <legend>Información general</legend>

      <label for="titulo">titulo</label>
      <input type="text" placeholder="Titulo propiedad" id="titulo" name="propiedad[titulo]" value="<?php echo sanitizar($propiedad->titulo);  ?>">

      <label for="precio">Precio</label>
      <input type="number" placeholder="Precio propiedad" id="precio" name="propiedad[precio]" value="<?php echo sanitizar($propiedad->precio);  ?>">

      <label for="imagen">Imagen</label>
      <input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/png" >
      <?php if($propiedad->imagen){ ?>
        <img src="/img/<?php echo $propiedad->imagen;?>" alt="imagen de la propiedad" class="imagen-small">
      <?php } ?>
      <label for="descripcion">Descripción</label>
      <textarea id="descripcion" placeholder="Descripción propiedad" name="propiedad[descripcion]"><?php echo sanitizar($propiedad->descripcion);  ?></textarea>
    </fieldset>
    <fieldset>
      <legend>Información de la propiedad</legend>

      <label for="habitaciones">Habitaciones</label>
      <input type="number" placeholder="Cantidad de habitaciones" id="habitaciones" name="propiedad[habitaciones]" min=1 max=20 value="<?php echo sanitizar($propiedad->habitaciones);  ?>">

      <label for="banios">Baños</label>
      <input type="number" placeholder="Cantidad de baños" id="banios" name="propiedad[banios]" min=1 max=20 value="<?php echo sanitizar($propiedad->banios);  ?>">

      <label for="estacionamientos">Estacionamientos</label>
      <input type="number" placeholder="Cantidad de estacionamientos" id="estacionamientos" name="propiedad[estacionamientos]" min=1 max=20 value="<?php echo sanitizar($propiedad->estacionamientos);  ?>">
    </fieldset>
    <fieldset>
      <legend>Vendedor</legend>
      <label for="vendedor">Vendedor</label>
      <select name="propiedad[vendedores_id]" id="vendedor">
      <option value="" disabled selected><--Seleccione--></option>
        <?php foreach($vendedores as $vendedor) { ?>
          <option  <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : '' ?> value="<?php echo sanitizar($vendedor->id) ?>"> <?php echo sanitizar($vendedor->nombre) . " " . sanitizar($vendedor->apellido); ?></option>
        <?php } ?>
      </select>
     
    </fieldset>  