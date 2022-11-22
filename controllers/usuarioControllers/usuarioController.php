<?php
    //Conexion a la Base de Datos
    require_once('config/conexion.php');
    //La función require_once() incluye y evalua el fichero especificado durante la ejecución del script.

    //Modelo Usuario
    require_once('models/usuarioModels/usuarioModel.php');

    //Instancia del Modelo Usuario
    $objeto = new usuario();

    //Invocacion del Metodo Listar Usuarios 
    $consulta = $objeto->listarUsuario();

    //Invocacion del Metodo Selector Estado
    $estados = $objeto->listarProductos();


    // $_POST es una variable super global php que se utiliza para recopilar datos de formulario después de enviar un formulario HTML con method="post". $_POST también se utiliza ampliamente para pasar variables.

    //Validacion e Invocacion del Metodo Crear Usuario
    if (isset($_POST['insertar_usuario'])){
        //isset — Determina si una variable está definida y no es null
        $objeto->insertar_Usuario();
    }

    //Validacion e Invocacion del Metodo Actualizar Usuario
    if (isset($_POST['actualizar_usuario'])){
        $objeto->actualizar_Usuario();
    }

    //Validacion e Invocacion del Metodo Eliminar Usuario
    if (isset($_POST['id_eliminar_usuario'])){
        $objeto->eliminar_Usuario();
    }

    //Vista Usuario
    require_once('views/usuarioViews/usuarioView.php');
?>