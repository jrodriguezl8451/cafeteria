<!-- MODAL INSERTAR PRODUCTO -->
<div class="modal fade" id="modal_ventas" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <!-- ENCABEZADO -->
                <h5 class="modal-title" id="staticBackdropLabel">HISTORIAL DE VENTAS REALIZADAS</h5>
            </div>
            <div class="modal-body modal-body2">
                <!-- INICIO FORMULARIO -->
                <form id="formulario_insertar_producto">
                    <div id=""> 
                        <!-- TABLA  DE DATATABLE -->
                        <div class="container">
                            <div class="row">
                                    <div class="col-lg-12">
                                        <div>        
                                            <table id="tabla_usuario" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                            <!-- ENCABEZADO DE LA TABLA -->
                                            <thead id="centrar_tabla" class="bg-primary text-white">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Valor total</th>
                                                    <th>Fecha de Registro</th>
                                                </tr>
                                            </thead>
                                            <!-- CUERPO DE LA TABLA -->
                                            <tbody id="centrar_tabla">
                                                <?php
                                                    //El Bucle While en PHP se utiliza para ejecutar un pedazo de código mientras la condición siga siendo verdadera. 
                                                    while($fila = mysqli_fetch_object($consulta_ventas)){
                                                        //mysqli_fetch_object Devuelve la fila actual que contiene un conjunto de resultados e imprime el valor de cada campo.

                                                        //Almaceno dentro de una variable el campo que quiero llamar, le digo que es igual a fila para poder asignarle el nombre y valor que tiene en la base de datos.
                                                        $ven_pro_id               = $fila->ven_pro_id ;
                                                        $tblinventario_inv_id     = $fila->tblinventario_inv_id;
                                                        $inv_nombre_producto      = $fila->inv_nombre_producto;
                                                        $ven_pro_cantidad_vendida = $fila->ven_pro_cantidad_vendida;
                                                        $ven_pro_precio           = $fila->ven_pro_precio;
                                                        $ven_pro_valor_total      = $fila->ven_pro_valor_total;
                                                        $ven_pro_fecha_registro   = $fila->ven_pro_fecha_registro;
                                                ?>
                                                <tr>
                                                    <!-- IMPRIMO 5 REGISTROS BASICOS EN LA CONSULTA GENERAL -->
                                                    <td><?php echo $ven_pro_id; ?></td>
                                                    <td><?php echo $inv_nombre_producto; ?></td>
                                                    <td><?php echo $ven_pro_cantidad_vendida; ?></td>
                                                    <td><?php echo "$".number_format($ven_pro_precio); ?></td>
                                                    <td><?php echo "$".number_format($ven_pro_valor_total); ?></td>
                                                    <td><?php echo $ven_pro_fecha_registro; ?></td>
                                                    <!-- BOTONES -->
                                                </tr>
                                                <?php
                                                    //CERRAMOS AQUI EL WHILE PARA QUE EJECUTE SIEMPRE TODO NUESTRO CODIGO
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- BOTONES DEL FOOTER -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
                <!-- FIN FORMULARIO -->
            </div>
        </div>
    </div>
</div>