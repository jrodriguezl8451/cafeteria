<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS de Bootstrap  -->
    <link rel="stylesheet" href="./views/assets/css/bootstrap.min.css">
    <!-- CSS Propio -->
    <link rel="stylesheet" href="./views/assets/css/estilos_principales.css">
    <!-- CSS DataTables -->
    <link rel="stylesheet" type="text/css" href="./views/assets/datatables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="./views/assets/datatables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css">
    <title>CAFETERIA</title>
</head>
<body>
    <!-- Header Inicio -->
    <div>
        <?php include('views/plantilla/header.php'); ?>
    </div>
    <!-- Header Fin -->

    <!-- Contenido general Incio -->
    <main id="blog">
        <div>
            <div>
                <a type="button" class="btn btn-primary text-white" title="Agregar" data-toggle="modal" data-target="#modal_ventas">Ventas</a>
            </div>
        </div>
        <div>
            <?php
                //Incluimos el controlador de usuario para ejecutar la vista y el modelo
                //La sentencia include incluye y evalúa el archivo especificado.
                include('./controllers/usuarioControllers/usuarioController.php');
                require_once('./controllers/usuarioControllers/VentaController.php');
            ?>
        </div>
    </main>
    <!-- Contenido general Fin -->

    <!-- Footer Incio -->
    <div>
        <?php include('views/plantilla/footer.php'); ?>
    </div>
    <!-- Footer Fin -->

    <!-- Scripts -->
    <!-- Script de JQuery -->
    <script src="./views/assets/js/jquery-3.6.0.min.js"></script>
    <!-- Scripts de Boostrap -->
    <script src="./views/assets/js/bootstrap.bundle.min.js"></script>
    <script src="./views/assets/js/popper.min.js"></script>
    <!-- Script DataTables JS -->
    <script src="./views/assets/datatables/datatables.min.js"></script>
    <!-- Scripts DataTables para usar botones -->
    <script src="./views/assets/datatables/Buttons-1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="./views/assets/datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="./views/assets/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="./views/assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="./views/assets/datatables/Buttons-1.7.0/js/buttons.html5.min.js"></script>
    <!-- Script Codigo Propio Datatable Idioma Español JS -->
    <script src="./views/assets/datatables/main.js"></script>
    <!-- Scripts Sweetalert2 -->
    <script src="./views/assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="./views/assets/sweetalert2/sweetalert2@10.js"></script>
    <!-- Scripts Propios -->
    <script src="./views/assets/js/cleanmodal.js"></script>
    <script src="./views/assets/js/usuario.js"></script>
    <script src="./views/assets/js/funciones_generales.js"></script>
</body>
</html>