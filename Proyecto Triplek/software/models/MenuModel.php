<?php

class MenuModel
{

    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    //Metodo para obtener los datos de la persona que inicio sesion
    function selecPerson($number_document){
        $SQL = "SELECT DOC.NAME_DOCUMENT_TYPE,PER.NUMBER_DOCUMENT,PER.NAME_PERSON,PER.LAST_NAME_PERSON,PER.PHONE_PERSON,PER.EMAIL_PERSON
        FROM TRIPLEK.PERSON PER 
        INNER JOIN TRIPLEK.DOCUMENT_TYPE DOC 
        ON PER.ID_DOCUMENT_TYPE = DOC.ID_DOCUMENT_TYPE
        WHERE PER.NUMBER_DOCUMENT = '$number_document'";
        $this->Connection->query($SQL);
        return $this->Connection->fetchAll();
    }

    //Metodo para saber el numero de uniformes que fueron registrados
    function countUniform(){
        $SQL = "SELECT COUNT(*) AS NUM_UNIFORM FROM TRIPLEK.UNIFORM";
        $this->Connection->query($SQL);
        return $this->Connection->fetchAll();
    }
    //Metodo para saber el numero de piezas que fueron registrados
    function countPiece(){
        $SQL = "SELECT COUNT(*) AS NUM_PIECE FROM TRIPLEK.PIECE";
        $this->Connection->query($SQL);
        return $this->Connection->fetchAll();
    }


}
