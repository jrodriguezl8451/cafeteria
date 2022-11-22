<?php
    //Conexion a la Base de Datos
    require_once('config/conexion.php');
    //La función require_once() incluye y evalua el fichero especificado durante la ejecución del script.

    //Modelo Usuario
    require_once('models/usuarioModels/ventaModel.php');

    //Instancia del Modelo Usuario
    $objeto = new ventas();

    //Invocacion del Metodo Listar Ventas
    $consulta_ventas = $objeto->listarVentas();

    //Validacion e Invocacion del Metodo Crear Usuario
    if (isset($_POST['vender_producto'])){
        //isset — Determina si una variable está definida y no es null
        $objeto->venderProducto();
    }


    //Vista Ventas
    require_once('views/usuarioViews/ventasView.php');
?>