<?php
require_once "vendor/session.php"; //Requiere una session
class MenuView
{

    function showMenu($person, $num_uniform, $num_piece)
    {
        $email = $person[0]->email_person;
        $phone_number = $person[0]->phone_person;
        $name_person = $person[0]->name_person;
        $last_name_person = $person[0]->last_name_person;
        $name_document_type = $person[0]->name_document_type;
        $number_document = $person[0]->number_document;

?>
        <!DOCTYPE html>
        <html lang="es">

        <head>

            <title>Odonto K</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Favicon -->
            <link rel="shortcut icon" href="img/Logo Triplekkk.png" type="image/x-icon">
            <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <!-- Toastr -->
            <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="dist/css/adminlte.min.css">
            <script src="https://kit.fontawesome.com/d2ec2ed15a.js" crossorigin="anonymous"></script>



            <!-- Estilo propio -->
            <link rel="stylesheet" href="css/StyleDashboar.css">


        </head>

        <body class="hold-transition sidebar-mini">
            <div class="wrapper">
                <!------------------------------------------- Barra de navegacion ----------------------------------------->
                <nav class="main-header navbar navbar-expand navar-superior botones-navar-superior">

                    <!-- Botones izquierdos -->
                    <ul class="navbar-nav ">
                        <!--
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
    -->
                        <li class="nav-item d-none d-sm-inline-block">
                            <a onclick="Menu.menu('MenuController/showStartePage')" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a onclick="Menu.menu('MenuController/showHelp')" class="nav-link">Ayuda</a>
                        </li>
                    </ul>


                    <!--  Botones de la derecha -->
                    <ul class="navbar-nav ml-auto">
                        <!-- COLOCAR LA PANTALLA GRANDE -->
                        <li class="nav-item">
                            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                                <i class="fas fa-expand-arrows-alt"></i>
                            </a>
                        </li>
                        <!-- Boton para cerrar sesion -->
                        <li class="nav-item close">
                            <a class="nav-link" href="#" role="button" onclick="Menu.closeSession()">
                                <i class="fas fa-power-off"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.navbar -->

                <!------------------------------------------- contenedor MENU  ----------------------------------------->
                <aside class="main-sidebar elevation-4 contenedor-botones">
                    <div class="presentacion_titulo">
                        <h2>TRIPLE KKK</h2>
                    </div>
                    <!-- Informacion vienvenida -->
                    <div class="info_person">
                        <p class="d-block"><?php echo $name_person ?></p>
                        <p class="d-block"><?php echo $last_name_person ?></p>
                    </div>


                    <!-- Perfil -->
                    <div class="sidebar d-flex content-botones">
                        <!-- Opciones  Menu -->
                        <nav class="">
                            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
                                <!-- Boton para administrar procedimientos -->
                                <li class="nav-item">
                                    <a href="#" onclick="Menu.menu('UniformController/paginateUniform')" class="nav-link boton">
                                        <i class="fas fa-school"></i>
                                        <p class="ml-2">Uniformes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" onclick="Menu.menu('PieceController/paginatePiece')" class="nav-link boton">
                                        <i class="fas fa-tshirt"></i>
                                        <p class="ml-2">Piezas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" onclick="Menu.menu('MenuController/showHelp')" class="nav-link boton">
                                        <i class="fas fa-info-circle"></i>
                                        <p class="ml-2">Ayuda</p>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">

                    <!-- Main content -->
                    <div class="content mt-3">
                        <div class="container-fluid">

                            <!-- Aqui se carga el contenido que es requerido -->
                            <div id="content">

                                <div class="row">
                                    <div class="card carta col  card_presentacion">
                                        <div class="card-header card_bienvenido">
                                            Bienvenido
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item ">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h3>Nombres</h3>
                                                            <p><?php echo $name_person; ?></p>
                                                        </div>
                                                        <div class="col">
                                                            <h3>Apellidos</h3>
                                                            <p><?php echo $last_name_person; ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item ">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h3>Tipo de identificacion</h3>
                                                            <p><?php echo $name_document_type; ?></p>
                                                        </div>
                                                        <div class="col">
                                                            <h3>Numero de identificacion</h3>
                                                            <p><?php echo $number_document; ?></p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <h3>Correo electronico</h3>
                                                    <p><?php echo $email; ?></p>
                                                </li>
                                                <li class="list-group-item">
                                                    <h3>Numero telefonico</h3>
                                                    <p><?php echo $phone_number; ?></p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="small-box tarjeta ">
                                            <div class="inner">
                                                <h3><?php echo $num_uniform ?></h3>
                                                <p>Número de uniformes</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa-solid fa-warehouse"></i>
                                            </div>
                                            <a href="#" class="small-box-footer" onclick="Menu.menu('UniformController/paginateUniform')">Ver detalles <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                        <div class="small-box tarjeta mt-3">
                                            <div class="inner">
                                                <h3><?php echo $num_piece ?></h3>
                                                <p>Número de piezas</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa-solid fa-shirt"></i>
                                            </div>
                                            <a href="#" class="small-box-footer" onclick="Menu.menu('PieceController/paginatePiece')">Ver detalles <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

                <!-- MODAL DONDE SE CARGARA TODO EL CONTENIDO -->
                <div id="my_modal" class="modal" tabindex="-1">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_title"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div id="modal_content" class="modal-body">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- REQUIRED SCRIPTS -->
            <!-- jQuery -->
            <script src="plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Toastr -->
            <script src="plugins/toastr/toastr.min.js"></script>
            <!-- AdminLTE App -->
            <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
            <!-- Sweet alert -->
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


            <!-- Scripts propios -->
            <script src="js/MenuJs.js"></script>
            <script src="js/UniformJs.js"></script>
            <script src="js/Piece.js"></script>


        </body>

        </html>

    <?php
    }

    function showStartePage($person, $num_uniform, $num_piece)
    {
        $email = $person[0]->email_person;
        $phone_number = $person[0]->phone_person;
        $name_person = $person[0]->name_person;
        $last_name_person = $person[0]->last_name_person;
        $name_document_type = $person[0]->name_document_type;
        $number_document = $person[0]->number_document;
    ?>

        <div class="row">
            <div class="card carta col  card_presentacion">
                <div class="card-header card_bienvenido">
                    Bienvenido
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item ">
                            <div class="row">
                                <div class="col">
                                    <h3>Nombres</h3>
                                    <p><?php echo $name_person; ?></p>
                                </div>
                                <div class="col">
                                    <h3>Apellidos</h3>
                                    <p><?php echo $last_name_person; ?></p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="row">
                                <div class="col">
                                    <h3>Tipo de identificacion</h3>
                                    <p><?php echo $name_document_type; ?></p>
                                </div>
                                <div class="col">
                                    <h3>Numero de identificacion</h3>
                                    <p><?php echo $number_document; ?></p>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <h3>Correo electronico</h3>
                            <p><?php echo $email; ?></p>
                        </li>
                        <li class="list-group-item">
                            <h3>Numero telefonico</h3>
                            <p><?php echo $phone_number; ?></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="small-box tarjeta ">
                    <div class="inner">
                        <h3><?php echo $num_uniform ?></h3>
                        <p>Número de uniformes</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-warehouse"></i>
                    </div>
                    <a href="#" class="small-box-footer" onclick="Menu.menu('UniformController/paginateUniform')">Ver detalles <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                <div class="small-box tarjeta mt-3">
                    <div class="inner">
                        <h3><?php echo $num_piece ?></h3>
                        <p>Número de piezas</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-shirt"></i>
                    </div>
                    <a href="#" class="small-box-footer" onclick="Menu.menu('PieceController/paginatePiece')">Ver detalles <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        </div>

    <?php
    }

    function showHelp()
    {
    ?>
        <ul class="nav mt-3">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Centro de asistencia</a>
            </li>
        </ul>
        <hr>
        <div class="container mt-5 ms-4 mb-5">
            <div class="card" style="width: 70%;">
                <div class="card-body ms-4">
                    <h3>INSTRUCCIONES DE USO</h3>
                    <p> En esta seccion se van a encontrar instrucciones para e uso correcto del software
                    </p>
                    <hr>
                    <div class="accordion" id="accordionPanelsStayOpenExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Uniformes
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <h4>Registrar un uniforme</h4>
                                    <p>Estos son los pasos a seguir:</p>
                                    <ol>
                                        <li>Click en el botón nuevo <img src="img/boton_nuevo.png">
                                        </li>
                                        <li>Llenar los campos indicados en el formulario</li>
                                        <li>Hacer click en en el boton Guardar para registrar los campos <img src="img/guardar.png"></li>
                                    </ol>
                                    <h4>Editar un uniforme</h4>
                                    <p>Estos son los pasos a seguir:</p>
                                    <ol>
                                        <li>Click en el botón 'editar'<img src="img/editar.png"></li>
                                        <li>Modifica los campos que necesitas cambiar en el formulario</li>
                                        <li>Hacer click en en el boton 'Guardar' para registrar los cambios<img src="img/guardar.png"></li>
                                    </ol>
                                    <h4>Consultar uniforme</h4>
                                    <p>Estos son los pasos a seguir:</p>
                                    <ol>
                                        <li>Ir a la sección 'Filtrar uniforme'</li>
                                        <img src="img/fitrar_uniforme.png">
                                        <li>Seleccionar las caracteristicas requeridas para realizazr la busqueda</li>
                                        <li>Hacer click en en el boton 'Buscar'<img src="img/buscar.png" style="width: 20%;"></li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    Piezas
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <h4>Registrar una pieza</h4>
                                    <p>Estos son los pasos a seguir:</p>
                                    <ol>
                                        <li>Click en el botón 'Nuevo' <img src="img/boton_nuevo.png"></li>
                                        <li>Llenar los campos indicados en el formulario</li>
                                        <li>Hacer click en en el boton 'Guardar' para registrar los campos <img src="img/guardar.png"></li>
                                    </ol>
                                    <h4>Editar una pieza</h4>
                                    <p>estos son los pasos a seguir:</p>
                                    <ol>
                                        <li>Click en el botón 'Editar' <img src="img/editar.png"></li>
                                        <li>Modifica los campos que necesitas cambiar en el formulario</li>
                                        <li>Hacer click en en el boton 'Guardar' para registrar los cambios <img src="img/guardar.png"></li>
                                    </ol>
                                    <h4>Eliminar una pieza</h4>
                                    <p>Estos son los pasos a seguir:</p>
                                    <ol>
                                        <li>Click en el icono de 'Eliminar'<img src="img/eliminar.png"></li>
                                        <li>Relizar la confirmación de la acción eliminar</li>
                                        <img src="img/alerta.png">
                                        <li>Automaticamente se verán los cambhios reflejados en pantalla</li>
                                    </ol>
                                    <h4>Consuta una pieza</h4>
                                    <p>Estos son los pasos a seguir:</p>
                                    <ol>
                                        <li>Ir a la sección de 'Filtrar prendas'</li>
                                        <img src="img/fitrar_Prenda.png">
                                        <li>Seleccionar las caracteristicas requeridas para realizar la busqueda</li>
                                        <li>Hacer click en en el boton 'Buscar' <img src="img/buscar.png"></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mt-2 ms-5 mb-5" style="margin-left: 40px;">
                <h3>Recomendaciones</h3>
                <p>Para el correcto funcionamiento del programa, por favor siga las instrucciones al pie de la letra</p>
                </ul>
            </div>
        </div>
        </div>

<?php
    }
}
?>