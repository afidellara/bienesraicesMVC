<main class="contenedor seccion">
    <?php if ($resultado) { ?>
        <p class="alerta exito"><?php echo mostrarNotificacion(intval($resultado)) ?> </p>
    <?php } ?>
    <h2>Vendedores</h2>

    <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo vendedor</a>
    <a href="/propiedades/admin" class="boton boton-verde">Ver propiedades</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Télefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendedores as $vendedor) { ?>
                <tr>
                    <td>
                        <?php echo $vendedor->id; ?>
                    </td>
                    <td>
                        <?php echo $vendedor->nombre . "  " . $vendedor->apellido; ?>
                    </td>
                    <td>
                        <?php echo $vendedor->telefono; ?> </td>
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-tabla" value="Eliminar">
                        </form>
                        <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-tabla">Actualizar</a>
                    </td>
                </tr> 
            <?php } ?>
        </tbody>
    </table>
</main>