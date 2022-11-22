<!-- TITULO -->
<div id="centrar_titulo">
    <h2>CAFETERIA</h2>
</div>
<div id="usuario_load"> 
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
                                <th>Referencia</th>
                                <th>Precio</th>
                                <th>Peso</th>
                                <th>Categoria</th>
                                <th>Stock</th>
                                <th>Fecha de Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <!-- CUERPO DE LA TABLA -->
                        <tbody id="centrar_tabla">
                            <?php
                                require_once('usuarioCode.php');
                            ?>  
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <div id="boton_insertar">
                                        <a type="button" class="btn btn-info text-white" title="Agregar" data-toggle="modal" data-target="#modal_insertar_producto">Registrar</a>
                                    </div>
                                </td>
                                <td colspan="4">
                                    <div id="boton_insertar">
                                        <a type="button" class="btn btn-success text-white" title="Vender" data-toggle="modal" data-target="#modal_vender_producto">Vender</a>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL INSERTAR PRODUCTO -->
<div class="modal fade" id="modal_insertar_producto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <!-- ENCABEZADO -->
                <h5 class="modal-title" id="staticBackdropLabel">REGISTRAR NUEVO PRODUCTO EN EL INVENTARIO</h5>
            </div>
            <div class="modal-body modal-body2">
                <!-- INICIO FORMULARIO -->
                <form id="formulario_insertar_producto">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="form-label"><strong>* Producto:</strong></label>
                            <input type="text" class="form-control" name="ins-pro" id="ins-pro" maxlength="50" placeholder="Nombre del Producto">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><strong>* Referencia:</strong></label>
                            <input type="text" class="form-control" name="ins-ref" id="ins-ref" maxlength="50" placeholder="Referencia del Producto">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><strong>* Precio:</strong></label>
                            <input type="number" class="form-control" name="ins-pre" id="ins-pre" maxlength="30" placeholder="Precio del Producto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="form-label"><strong>* Peso</strong></label>
                            <input type="number" class="form-control" name="ins-pes" id="ins-pes" maxlength="30" placeholder="Peso del Producto">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><strong>* Categoria:</strong></label>
                            <input type="text" class="form-control" name="ins-cat" id="ins-cat" maxlength="50" placeholder="Categoria del Producto">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><strong>* Stock:</strong></label>
                            <input type="number" class="form-control" name="ins-sto" id="ins-sto" maxlength="50" placeholder="Stock del Producto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <br>
                            <p class="text-danger font-weight-bold">(*) Campos obligatorios</p>
                        </div>
                    </div>
                    <!-- BOTONES DEL FOOTER -->
                    <div class="modal-footer">
                        <button type="button" onclick="insertar_ajax();" class="btn btn-info text-white cerrar_modal_2" data-dismiss="modal">Registrar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
                <!-- FIN FORMULARIO -->
            </div>
        </div>
    </div>
</div>


<!-- MODAL EDITAR PRODUCTO -->
<div class="modal fade" id="modal_actualizar_usuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <!-- ENCABEZADO -->
                <h5 class="modal-title" id="staticBackdropLabel">ACTUALIZAR DATOS DEL PRODUCTO</h5>
            </div>
            <div class="modal-body modal-body2">
                <!-- INICIO FORMULARIO -->
                <form id="formulario_actualizar_usuario">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="number" class="form-control pro_upd_id" name="pro_upd_id" id="pro_upd_id" hidden>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><strong>Producto:</strong></label>
                            <input type="text" class="form-control upd-pro" name="upd-pro" id="upd-pro" maxlength="50" placeholder="Escriba un primer nombre">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><strong>Referencia:</strong></label>
                            <input type="text" class="form-control upd-ref" name="upd-ref" id="upd-ref" maxlength="50" placeholder="Escriba un segundo nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="form-label"><strong>Precio:</strong></label>
                            <input type="text" class="form-control upd-pre" name="upd-pre" id="upd-pre" maxlength="30" placeholder="Escriba un primer apellido">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><strong>Peso:</strong></label>
                            <input type="text" class="form-control upd-peso" name="upd-peso" id="upd-peso" maxlength="30" placeholder="Escriba un segundo apellido">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="form-label"><strong>Categoria:</strong></label>
                            <input type="email" class="form-control upd-cat" name="upd-cat" id="upd-cat" maxlength="50" placeholder="Escriba un correo electrónico">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><strong>Stock:</strong></i></label>
                            <input type="text" class="form-control upd-sto" name="upd-sto" id="upd-sto" maxlength="50" placeholder="Escriba una contraseña">
                        </div>
                    </div>
                    <!-- BOTONES DEL FOOTER -->
                    <div class="modal-footer">
                        <button type="button" onclick="actualizar_usuario_ajax();" class="btn btn-warning text-white cerrar_modal_2" data-dismiss="modal">Actualizar</button>
                        <button type="button" onclick="CancelarSelect();" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
                <!-- FIN FORMULARIO -->
            </div>
        </div>
    </div>
</div>

<!-- MODAL ELIMINAR PRODUCTO -->
<div class="modal fade" id="modal_eliminar_usuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger  text-white">
                <!-- ENCABEZADO -->
                <h5 class="modal-title" id="staticBackdropLabel">ELIMINAR PRODUCTO</h5>
            </div>
            <div class="modal-body modal-body2 modal-body2">
                <!-- INICIO FORMULARIO -->
                <form id="formulario_eliminar_usuario">
                    <input type="text" class="form-control eliminar_usuario_id" name="delete_usuario_id"  id="delete_usuario_id" hidden>
                    <div class="alert alert-danger" role="alert"> 
                        <p id="centrar" class="font-weight-bold">¿Estás seguro que deseas eliminar al usuario
                            <b>&nbsp;</b>"
                            <b class="eliminar_primer_nombre"></b>
                            <b>&nbsp;</b>
                            <b class="eliminar_primer_apellido"></b>
                            <b>&nbsp;</b>
                            <b class="eliminar_segundo_apellido"></b>"?
                        </p>
                        <p id="centrar" class="font-italic">¡No podrás revertir esto!</p>
                    </div>
            </div> 
            <!-- BOTONES DEL FOOTER -->
            <div class="modal-footer">
                <button type="button" onclick="eliminar_usuario_ajax();" class="btn btn-danger text-white" data-dismiss="modal">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
            <!-- FIN FORMULARIO -->
        </div>
    </div>
</div>

<!-- MODAL VENDER PRODUCTO -->
<div class="modal fade" id="modal_vender_producto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <!-- ENCABEZADO -->
                <h5 class="modal-title" id="staticBackdropLabel">VENDER PRODUCTOS</h5>
            </div>
            <div class="modal-body modal-body2">
                <!-- INICIO FORMULARIO -->
                <form id="formulario_vender_producto">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="number" class="form-control pro_upd_id" name="pro_upd_id" id="pro_upd_id" hidden>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><strong>Producto:</strong></label>
                            <select id="ven_pro" name="ven_pro" class="form-control select_cerrar">
                                <option value="NULL">Seleccione...</option>
                                <?php 
                                    // PHP foreach(): Bucles para recorrer arrays y objetos. Con la función PHP foreach() podemos recorrer los diferentes tipos de arrays y objetos de una manera controlada.

                                    //La variable $estados contiene una consulta que viene de la base datos, con el foreach la recorro como si fuese un arreglo, es necesario traer el id y la descripcion del campo que queremos pintar en el selector
                                    foreach ($estados as $consulta){
                                        echo "<option value=".$consulta['inv_id'].">".$consulta['inv_nombre_producto']."</option>";
                                    }
                                ?> 
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><strong>Cantidad:</strong></label>
                            <input type="text" class="form-control" name="ven_can" id="ven_can" maxlength="3" placeholder="Escriba la cantidad que desea">
                        </div>
                    </div>
                    <!-- BOTONES DEL FOOTER -->
                    <div class="modal-footer">
                        <button type="button" onclick="vender_producto_ajax();" class="btn btn-success text-white cerrar_modal_2" data-dismiss="modal">Vender</button>
                        <button type="button" onclick="CancelarSelect();" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
                <!-- FIN FORMULARIO -->
            </div>
        </div>
    </div>
</div>