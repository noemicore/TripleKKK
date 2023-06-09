<?php
require_once "models/AccessModel.php";
require_once "views/AccessView.php";
require_once "vendor/Connection.php";

class AccessController
{

    //Constructor
    function __construct(){
    }

    //Funcion para mostrar un login
    function showLogin(){

        //Crear una vista
        $AccessView = new AccessView();
        $AccessView->showLogin();

    }

    //Funcion para validar inicio de sesion
    function validateLogin($post){
    
        //Obtener los datos del formulario
        $usser_name = $post['usser_name'];
        $password = $post['password'];

        $Connection = new Connection();
        $AccessModel = new AccessModel($Connection);

        $usser_login = $AccessModel->validateLogin($usser_name,$password);            
        if($usser_login){
            $person_login = $AccessModel->selecPersonLogin($usser_login[0]->id_usser);
            if($usser_login[0]->state_usser == 'A'){
                $_SESSION['number_document'] = $person_login[0]->number_document; //Obtener el id del usuario encontrado   
                $this->insertAudit($person_login,$usser_name,$password);
                
            }
        }
        header('Location: index.php');
    }

    function insertAudit($person_login,$usser_name,$password){

        $id_document_type = $person_login[0]->id_document_type;//Id del tipo de documento
        $number_document = $person_login[0]->number_document;
        $id_usser = $person_login[0]->id_usser;
        $name_person = $person_login[0]->name_person;
        $last_name_person = $person_login[0]->last_name_person;
        $phone_person = $person_login[0]->phone_person;
        $email_person = $person_login[0]->email_person;
        
        $Connection = new Connection();
        $AccessModel = new AccessModel($Connection);
        $AccessModel->insertPersonLogeada($id_document_type,$number_document,$id_usser,$name_person,$last_name_person,$phone_person,$email_person,
        $usser_name,$password);

    }


    //Metodo para cerrar session
    function closeSession() {
        session_unset();
        session_destroy();
        $_SESSION = array();
        $response['message'] = "Ten buen dia";
        exit(json_encode($response));

    }

}
