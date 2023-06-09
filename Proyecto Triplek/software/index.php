<?php
require_once "vendor/session.php"; //Requiere una session
require_once "vendor/Connection.php"; //Requiere una conexion

//Cuando se inicia sesion
if(isset($_SESSION,$_SESSION['number_document'])) { 
    
    require_once "vendor/FrontController.php";

    if(isset($_GET['route'])) {
        
        $route = $_GET['route'];

    } else { //Cuando recien se hace el inicio de session la ruta es vacia
        $route='';
    }
    
    $FrontController = new FrontController($route);

//Se envian los datos
} else if(isset($_POST['usser_name'],$_POST['password'])) {
    
    require_once "controllers/AccessController.php";

    $AccessController = new AccessController(); 
    //Envia al metodo un array con los datos enviados a traves
    //del POST para que sean validados
    $AccessController->validateLogin($_POST);   

//Cuando no se ah enviado nada
} else {
    
    require_once "controllers/AccessController.php";
    
    $AccessController=new AccessController();
    //Muestra el formulario para inicio de Session
    $AccessController->showLogin(); 
    
}   
?>