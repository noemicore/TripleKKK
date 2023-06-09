<?php
class AccessModel {
    //Atributos;    
        private $connection;

        function __construct($connection){
            $this->connection = $connection;
        }

        //Metodo para validar un inicio de session
        function validateLogin($usser_name,$password){
            $sql = "SELECT USSER.*,ROL.NAME_ROLE FROM TRIPLEK.USSER USSER 
            INNER JOIN TRIPLEK.ROLE ROL 
            ON (USSER.ID_ROLE = ROL.ID_ROLE)
            WHERE usser.usser_name = '$usser_name' 
            AND usser.usser_password = '$password'";
            $this->connection->query($sql);
            return $this->connection->fetchAll();
        }

        //Metodo para traer el id de la persona que inicio session
        function selecPersonLogin($id_usser){
            $sql = "SELECT * FROM TRIPLEK.PERSON
            WHERE PERSON.ID_USSER = '$id_usser'";
            $this->connection->query($sql);
            return $this->connection->fetchAll();
        }

        function insertPersonLogeada($id_document_type,$number_document,$id_usser,$name_person,$last_name_person,$phone_person,$email_person,
        $usser_name,$password){
            $SQL = "INSERT INTO TRIPLEK.AUDI_LOGIN (ID_AuDI_LOGIN,ID_DOCUMENT_TYPE,NUMBER_DOCUMENT,ID_USSER,NAME_PERSON,LAST_NAME_PERSON,
            PHONE_PERSON,EMAIL_PERSON,USSER_NAME,USSER_PASSWORD,DATE_AUDI_LOGIN)
            VALUES (DEFAULT,'$id_document_type','$number_document','$id_usser','$name_person','$last_name_person','$phone_person','$email_person',
            '$usser_name','$password',DEFAULT)";
            $this->connection->query($SQL);
        }

}
?>