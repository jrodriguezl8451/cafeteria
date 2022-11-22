<?php
    // Este archivo es una forma de aislar el php del html

    //El Bucle While en PHP se utiliza para ejecutar un pedazo de código mientras la condición siga siendo verdadera. 
    while($fila = mysqli_fetch_object($consulta)){
        //mysqli_fetch_object Devuelve la fila actual que contiene un conjunto de resultados e imprime el valor de cada campo.

        //Almaceno dentro de una variable el campo que quiero llamar, le digo que es igual a fila para poder asignarle el nombre y valor que tiene en la base de datos.
        $inv_id              = $fila->inv_id;
        $inv_nombre_producto = $fila->inv_nombre_producto;
        $inv_referencia      = $fila->inv_referencia;
        $inv_precio          = $fila->inv_precio;
        $inv_peso            = $fila->inv_peso;
        $inv_categoria       = $fila->inv_categoria;
        $inv_stock           = $fila->inv_stock;
        $inv_fecha_creacion  = $fila->inv_fecha_creacion;
?>
<tr>
    <!-- IMPRIMO 5 REGISTROS BASICOS EN LA CONSULTA GENERAL -->
    <td><?php echo $inv_id; ?></td>
    <td><?php echo $inv_nombre_producto; ?></td>
    <td><?php echo $inv_referencia; ?></td>
    <td><?php echo "$".number_format($inv_precio); ?></td>
    <td><?php echo $inv_peso; ?></td>
    <td><?php echo $inv_categoria; ?></td>
    <td><?php echo $inv_stock; ?></td>
    <td><?php echo $inv_fecha_creacion; ?></td>
    <!-- BOTONES -->
    <td>
        <a type="button" onclick="actualizar_Usuario(
            ('<?php echo $inv_id;?>'),
            ('<?php echo $inv_nombre_producto;?>'),
            ('<?php echo $inv_referencia; ?>'),
            ('<?php echo $inv_precio; ?>'),
            ('<?php echo $inv_peso; ?>'),
            ('<?php echo $inv_categoria; ?>'),
            ('<?php echo $inv_stock; ?>'))" class="btn btn-warning text-white btn-warning-animation" title="Actualizar" data-toggle="modal" data-target="#modal_actualizar_usuario">Actualizar</a> 
        &nbsp;
        <a type="button" onclick="eliminar_Usuario(
            ('<?php echo $inv_id; ?>'),
            ('<?php echo $inv_nombre_producto; ?>'))" class="btn btn-danger text-white btn-danger-animation" title="Eliminar" data-toggle="modal" data-target="#modal_eliminar_usuario">Eliminar</a>
    </td>
</tr>
<?php
    //CERRAMOS AQUI EL WHILE PARA QUE EJECUTE SIEMPRE TODO NUESTRO CODIGO
    }
?>