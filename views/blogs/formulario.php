<fieldset>
    <legend>Datos del autor</legend>
    
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="blog[nombre_autor]" placeholder="Nombre del autor" value="<?php echo $blog->nombre_autor; ?>" >

    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="blog[apellido_autor]" placeholder="Apellido del autor" value="<?php echo $blog->apellido_autor; ?>" >
</fieldset>

<fieldset>
    <legend>Complete su opinión</legend>

    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="blog[titulo]" placeholder="Titulo del blog" value="<?php echo $blog->titulo;  ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" name="blog[imagen]" value="<?php echo $blog->imagen; ?>">
   
    <?php if($blog->imagen){ ?>
        <img src="/public/img<?php echo $blog->imagen;?>" alt="imagen del blog" class="imagen-small">
    <?php } ?>

    <label for="descripcion">Descripción</label>
    <textarea type="text" id="descripcion" name="blog[descripcion]" placeholder="Descripción del blog"><?php echo $blog->descripcion;  ?></textarea>
</fieldset> 