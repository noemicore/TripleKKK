<?php

//Clase creada para mostrar todas las vistas para el acceso
class AccessView
{

    function __construct()
    {
    }

    //Funcion para el codigo html del login
    function showLogin()
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login TripleKKK</title>
            <!-- Estilo BOOSTRAP -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
            <!-- Estilo propio -->
            <link rel="stylesheet" href="css/Login.css">
            <link rel="shortcut icon" href="img/Logo Triplekkk.png" type="image/x-icon">
            <!-- Favicon -->
            <link rel="shortcut icon" href="img/Logo TripleKKK.png" type="image/x-icon">
            <!-- Toastr -->
            <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
            <script src="https://kit.fontawesome.com/d2ec2ed15a.js" crossorigin="anonymous"></script>

        </head>

        <body>

            <div class="d-flex align-items-center container" style="height: 100vh;">

                <div class="my-auto row mx-auto contenedor">

                    <!-- Contenedor formulario -->
                    <div class="col formulario ">
                        <h1 class="textoLogin">Inicio de Sesión</h1>
                        <div>
                            <img src="img/Logo Triplekkk.png" alt="Logo Triple KKK" class="logo">
                        </div>
                        <form class="mx-auto w-75 form " id="login" name="login" method="POST">
                            <div class="mt-3">
                                <label for="usser_name" class="form-label">Usuario</label>
                                <div class="input-container">
                                    <input type="text" name="usser_name" id="usser_name" class=" inputs">
                                    <i class="fa-solid fa-user icon"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <div class="input-container">
                                    <input type="password" name="password" id="password" class=" inputs">
                                    <i class="fa-solid fa-lock icon"></i>
                                </div>

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary boton">Ingresar</button>
                            </div>
                        </form>
                    </div>
                    <!-- Contenedor imagen -->
                    <div class="col presentacion">
                        <h2 class="tituloTriplekkk">Triple KKK</h2>
                        <div>
                            <img src="img/ImagenLoginT.png" alt="" class="imagenLogin">
                        </div>
                        <p class="descripcion">
                            Confección y venta de uniformes escolares
                        </p>
                    </div>

                </div>

            </div>
            <!-- JS PROPIOS -->
            <script src="js/LoginV.js"></script>

            <!-- jQuery -->
            <script src="plugins/jquery/jquery.min.js"></script>
            <!-- Toastr -->
            <script src="plugins/toastr/toastr.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <script>

            </script>

        </body>

        </html>


<?php
    }
}



?>