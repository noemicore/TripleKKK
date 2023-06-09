<?php

require_once "views/MenuView.php";
require_once "models/MenuModel.php";

//Controller
class MenuController {
    
    // Metodo para mostrar el menu de la dashboard
    function validateMenu(){

        //Crear una conexion
        $Connection = new Connection();
        $MenuModel = new MenuModel($Connection);

        //Obtener los datos de la persona que inicio sesion
        $Person = $MenuModel->selecPerson($_SESSION['number_document']);
        //Obtener la cantidad de uniformes registrados en el sistema
        $num_uniform = $MenuModel->countUniform()[0]->num_uniform;
        $num_piece =  $MenuModel->countPiece()[0]->num_piece;

        $MenuView=new MenuView();  
        $MenuView->showMenu($Person,$num_uniform,$num_piece);
        
    }

    function showStartePage(){
        //Crear una conexion
        $Connection = new Connection();
        $MenuModel = new MenuModel($Connection);

        //Obtener los datos de la persona que inicio sesion
        $Person = $MenuModel->selecPerson($_SESSION['number_document']);
        //Obtener la cantidad de uniformes registrados en el sistema
        $num_uniform = $MenuModel->countUniform()[0]->num_uniform;
        $num_piece =  $MenuModel->countPiece()[0]->num_piece;

        $MenuView=new MenuView();  
        $MenuView->showStartePage($Person,$num_uniform,$num_piece);
    }

    function showHelp(){
        $MenuView=new MenuView();  
        $MenuView->showHelp();
    }
    
    
}
