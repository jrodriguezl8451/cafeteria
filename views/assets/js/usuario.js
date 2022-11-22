//INSERTAR USUARIO DESDE LA MODAL USANDO AJAX
function insertar_ajax(){
    //Capturamos el valor que contienen los inputs y los almacenamos en una variable
    let producto   = $('#ins-pro').val();
    // Condicion para evitar campos vacios
    if (producto.length == 0){ 
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta de validacion
        alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
    }else{
        //poner el data-dismiss para que se cierre la modal
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        // Captura de datos del form
        let dataString = $('#formulario_insertar_producto').serialize();
        //Almacenamos dentro de una variable un parametro que pueda recibir el controlador para que ejecute la funcion
        let accion = "&insertar_usuario=1";
        //Enviamos la informacion del formulario + la variable que recibirá el controlador
        dataString = dataString + accion;  
        $.ajax({
            // Realiza una petición POST a una URL provista.
            method:"POST",
            //ruta en donde se enviará los datos, url en donde hacemos la peticion ajax
            url: 'index.php?ruta=usuarioController.php',
            //si todo sale bien en el success, el data es todo el contenido html que tiene el index
            data:dataString,
            // Establece una función a ejecutar si la petición a sido satisfactoria
            success: function(){
                //load es cargar, toma el id de la tabla y vas a cargar nuevamente esta tabla, es un refrescar la tabla
                $('#usuario_load').load('index.php?ruta=usuarioController.php #usuario_load',function(){
                    //aqui hacemos una funcion que lo que haces es llamarme nuevamente a la tabla cuando todo lo anterior se ejecute
                    $("#tabla_usuario").DataTable({        
                        language: {
                                "lengthMenu": "Mostrar _MENU_ registros",
                                "zeroRecords": "No se encontraron resultados",
                                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                                "sSearch": "Buscar:",
                                "oPaginate": {
                                    "sFirst": "Primero",
                                    "sLast":"Último",
                                    "sNext":"Siguiente",
                                    "sPrevious": "Anterior"
                                },
                                "sProcessing":"Procesando...",
                            },
                        //para usar los botones   
                        responsive: "true",
                        dom: 'Bfrtilp',       
                        buttons:[ 
                            {
                                extend:    'excelHtml5',
                                text:      'Excel',
                                titleAttr: 'Exportar a Excel',
                                className: 'btn btn-success'
                            },
                            {
                                extend:    'pdfHtml5',
                                text:      'PDF',
                                titleAttr: 'Exportar a PDF',
                                className: 'btn btn-danger'
                            },
                            {
                                extend:    'print',
                                text:      'Imprimir',
                                titleAttr: 'Imprimir',
                                className: 'btn btn-info'
                            },
                        ]	        
                    });
                });
                //alerta de sweetalert
                alertas_crud("success","¡Producto registrado con éxito!","#17a2b8");
            }
        });
    }
}

//FUNCION PARA VER DETALLE DEL USUARIO
function detalle_usuario(detalle_usuario_id,detalle_usuario_primer_nombre,detalle_usuario_segundo_nombre,detalle_usuario_primer_apellido,detalle_usuario_segundo_apellido,detalle_usuario_correo,detalle_usuario_telefono,detalle_usuario_fecha_de_registro,detalle_usuario_estado){
    // .val() sirva para obtener el valor de un elemento
    $('#modal_detalle_usuario .modal-body .detalle_usuario_id').val(detalle_usuario_id);
    $('#modal_detalle_usuario .modal-body .detalle_usuario_primer_nombre').val(detalle_usuario_primer_nombre);
    $('#modal_detalle_usuario .modal-body .detalle_usuario_segundo_nombre').val(detalle_usuario_segundo_nombre);
    $('#modal_detalle_usuario .modal-body .detalle_usuario_primer_apellido').val(detalle_usuario_primer_apellido);
    $('#modal_detalle_usuario .modal-body .detalle_usuario_segundo_apellido').val(detalle_usuario_segundo_apellido);
    $('#modal_detalle_usuario .modal-body .detalle_usuario_correo').val(detalle_usuario_correo);
    $('#modal_detalle_usuario .modal-body .detalle_usuario_telefono').val(detalle_usuario_telefono);
    $('#modal_detalle_usuario .modal-body .detalle_usuario_fecha_de_registro').val(detalle_usuario_fecha_de_registro);
    $('#modal_detalle_usuario .modal-body .detalle_usuario_estado').val(detalle_usuario_estado);
}

// FUNCION PARA PINTAR EL ID DE UN USUARIO ANTES DE ELIMINAR
function eliminar_Usuario(eliminar_usuario_id,eliminar_primer_nombre,eliminar_primer_apellido,eliminar_segundo_apellido){
    $('#modal_eliminar_usuario .modal-body .eliminar_usuario_id').val(eliminar_usuario_id);
    $('#modal_eliminar_usuario .modal-body .eliminar_primer_nombre').text(eliminar_primer_nombre);
    $('#modal_eliminar_usuario .modal-body .eliminar_primer_apellido').text(eliminar_primer_apellido);
    $('#modal_eliminar_usuario .modal-body .eliminar_segundo_apellido').text(eliminar_segundo_apellido);
}

//FUNCION PARA ELIMINAR UN USUARIO CON AJAX
function eliminar_usuario_ajax(){
    let dataString = $('#formulario_eliminar_usuario').serialize();
    let accion = "&id_eliminar_usuario=1";
    dataString = dataString + accion;  
    $.ajax({
        method:"POST",
        url: 'index.php?ruta=usuarioController.php',
        data:dataString,
        success: function(){
            $('#usuario_load').load('index.php?ruta=usuarioController.php #usuario_load',function(){
                $("#tabla_usuario").DataTable({        
                    language: {
                            "lengthMenu": "Mostrar _MENU_ registros",
                            "zeroRecords": "No se encontraron resultados",
                            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                            "sSearch": "Buscar:",
                            "oPaginate": {
                                "sFirst": "Primero",
                                "sLast":"Último",
                                "sNext":"Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "sProcessing":"Procesando...",
                        },
                    //para usar los botones   
                    responsive: "true",
                    dom: 'Bfrtilp',       
                    buttons:[ 
                        {
                            extend:    'excelHtml5',
                            text:      'Excel',
                            titleAttr: 'Exportar a Excel',
                            className: 'btn btn-success'
                        },
                        {
                            extend:    'pdfHtml5',
                            text:      'PDF',
                            titleAttr: 'Exportar a PDF',
                            className: 'btn btn-danger'
                        },
                        {
                            extend:    'print',
                            text:      'Imprimir',
                            titleAttr: 'Imprimir',
                            className: 'btn btn-info'
                        },
                    ]	        
                });
            });
            alertas_crud("success","¡Producto eliminado con éxito!","#dc3545");
        }
    });
}

// FUNCION PARA PINTAR LOS DATOS DEL USUARIO ANTES DE EDITAR
function actualizar_Usuario(pro_upd_id,upd_pro,upd_ref,upd_pre,upd_peso,upd_cat,upd_sto){
    $('#modal_actualizar_usuario .modal-body .pro_upd_id').val(pro_upd_id);
    $('#modal_actualizar_usuario .modal-body .upd-pro').val(upd_pro);
    $('#modal_actualizar_usuario .modal-body .upd-ref').val(upd_ref);
    $('#modal_actualizar_usuario .modal-body .upd-pre').val(upd_pre);
    $('#modal_actualizar_usuario .modal-body .upd-peso').val(upd_peso);
    $('#modal_actualizar_usuario .modal-body .upd-cat').val(upd_cat);
    $('#modal_actualizar_usuario .modal-body .upd-sto').val(upd_sto);
}


//FUNCION PARA ACTUALIZAR UN USUARIO CON AJAX
function actualizar_usuario_ajax(){
    //Capturamos el valor que contienen los inputs y los almacenamos en una variable
    let producto   = $('#upd-pro').val();
    
    // Condicion para evitar campos vacios
    if (producto.length == 0) { 
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta de validacion
        alertas("¡Los campos no pueden quedar vacíos!","#ffc107");
    }else{
        //poner el data-dismiss para que se cierre la modal
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        // Captura de datos del form
        let dataString = $('#formulario_actualizar_usuario').serialize();
        let accion = "&actualizar_usuario=1";
        dataString = dataString + accion;  
        $.ajax({
            method:"POST",
            url: 'index.php?ruta=usuarioController.php',
            data:dataString,
            success: function(){
                $('#usuario_load').load('index.php?ruta=usuarioController.php #usuario_load',function(){
                    $("#tabla_usuario").DataTable({        
                        language: {
                                "lengthMenu": "Mostrar _MENU_ registros",
                                "zeroRecords": "No se encontraron resultados",
                                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                                "sSearch": "Buscar:",
                                "oPaginate": {
                                    "sFirst": "Primero",
                                    "sLast":"Último",
                                    "sNext":"Siguiente",
                                    "sPrevious": "Anterior"
                                },
                                "sProcessing":"Procesando...",
                            },
                        //para usar los botones   
                        responsive: "true",
                        dom: 'Bfrtilp',       
                        buttons:[ 
                            {
                                extend:    'excelHtml5',
                                text:      'Excel',
                                titleAttr: 'Exportar a Excel',
                                className: 'btn btn-success'
                            },
                            {
                                extend:    'pdfHtml5',
                                text:      'PDF',
                                titleAttr: 'Exportar a PDF',
                                className: 'btn btn-danger'
                            },
                            {
                                extend:    'print',
                                text:      'Imprimir',
                                titleAttr: 'Imprimir',
                                className: 'btn btn-info'
                            },
                        ]	        
                    });
                });
                alertas_crud("success","¡Producto Actualizado con éxito!","#ffc107");
            }
        });
    }
}


//INSERTAR USUARIO DESDE LA MODAL USANDO AJAX
function vender_producto_ajax(){
    //Capturamos el valor que contienen los inputs y los almacenamos en una variable
    let producto   = $('#ven_pro').val();

    // Condicion para evitar campos vacios
    if (producto.length == 0){ 
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta de validacion
        alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
    }else{
        //poner el data-dismiss para que se cierre la modal
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        // Captura de datos del form
        let dataString = $('#formulario_vender_producto').serialize();
        //Almacenamos dentro de una variable un parametro que pueda recibir el controlador para que ejecute la funcion
        let accion = "&vender_producto=1";
        //Enviamos la informacion del formulario + la variable que recibirá el controlador
        dataString = dataString + accion;  
        $.ajax({
            // Realiza una petición POST a una URL provista.
            method:"POST",
            //ruta en donde se enviará los datos, url en donde hacemos la peticion ajax
            url: 'index.php?ruta=VentaController.php',
            //si todo sale bien en el success, el data es todo el contenido html que tiene el index
            data:dataString,
            // Establece una función a ejecutar si la petición a sido satisfactoria
            success: function(){
                //load es cargar, toma el id de la tabla y vas a cargar nuevamente esta tabla, es un refrescar la tabla
                $('#usuario_load').load('index.php?ruta=VentaController.php #usuario_load',function(){
                    //aqui hacemos una funcion que lo que haces es llamarme nuevamente a la tabla cuando todo lo anterior se ejecute
                    $("#tabla_usuario").DataTable({        
                        language: {
                                "lengthMenu": "Mostrar _MENU_ registros",
                                "zeroRecords": "No se encontraron resultados",
                                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                                "sSearch": "Buscar:",
                                "oPaginate": {
                                    "sFirst": "Primero",
                                    "sLast":"Último",
                                    "sNext":"Siguiente",
                                    "sPrevious": "Anterior"
                                },
                                "sProcessing":"Procesando...",
                            },
                        //para usar los botones   
                        responsive: "true",
                        dom: 'Bfrtilp',       
                        buttons:[ 
                            {
                                extend:    'excelHtml5',
                                text:      'Excel',
                                titleAttr: 'Exportar a Excel',
                                className: 'btn btn-success'
                            },
                            {
                                extend:    'pdfHtml5',
                                text:      'PDF',
                                titleAttr: 'Exportar a PDF',
                                className: 'btn btn-danger'
                            },
                            {
                                extend:    'print',
                                text:      'Imprimir',
                                titleAttr: 'Imprimir',
                                className: 'btn btn-info'
                            },
                        ]	        
                    });
                });
                //alerta de sweetalert
                alertas_crud("success","¡Producto vendido con éxito!","#28a745");
            }
        });
    }
}