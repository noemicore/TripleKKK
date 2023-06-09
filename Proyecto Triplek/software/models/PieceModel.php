<?php

    class PieceModel{

        private $Connection;

        function __construct($Connection) {
            $this->Connection = $Connection;
        }


        //----------------- METODOS LENGUAJE DML --------------------
        function insertPiece($id_school,$id_uniform,$id_school_u,$name_piece,$id_size,$gender_piece,$type_piece_use,$amount_piece,$price_piece,$type_piece){
            $SQL = "INSERT INTO TRIPLEK.PIECE 
            (ID_PIECE,ID_SCHOOL_PIECE,ID_UNIFORM,ID_SCHOOL_UNIFORM,NAME_PIECE,ID_SIZE,GENDER_PIECE,TYPE_PIECE_USE,AMOUNT_PIECE,PRICE_PIECE,TYPE_PIECE)
            VALUES (DEFAULT,'$id_school','$id_uniform','$id_school_u','$name_piece','$id_size','$gender_piece','$type_piece_use','$amount_piece','$price_piece','$type_piece')";
            $this->Connection->query($SQL);
        }

        //Funcion para listar todas las piezas
        function paginatePiece(){
            $SQL = "SELECT * FROM TRIPLEK.PIECE";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

        //Funcion para eliminar una pieza
        function deletePiece($id_piece){
            $SQL = "DELETE FROM TRIPLEK.PIECE
            WHERE ID_PIECE = '$id_piece'";
            $this->Connection->query($SQL);
        }

        function filterPiece($SQL){
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

        function selectPiece($id_piece){
            $SQL = "SELECT * FROM TRIPLEK.PIECE 
            WHERE ID_PIECE = '$id_piece'";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }
        
        //------------------------- METODOS PARA CONSULTAR OTRAS TABLAS -------------------
        function paginateSchool(){
            $SQL = "SELECT * FROM TRIPLEK.SCHOOL";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

        function paginateSize(){
            $SQL = "SELECT * FROM TRIPLEK.SIZE";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

        function paginateUniform(){
            $SQL = "SELECT * FROM TRIPLEK.UNIFORM";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

        function paginateTypePiece(){
            $SQL = "SELECT * FROM TRIPLEK.TYPE_PIECE";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

        function countNumPieceAU(){
            $SQL = "SELECT COUNT(*) AS COUNT_P FROM TRIPLEK.UNIFORM UNI
			INNER JOIN TRIPLEK.PIECE PIE
			ON (UNI.ID_UNIFORM = PIE.ID_UNIFORM) 
			AND (UNI.ID_SCHOOL = PIE.ID_SCHOOL_UNIFORM)";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

        function num_piece_u($id_school_u,$id_uniform){
            $SQL = "SELECT NUM_PIECE FROM TRIPLEK.UNIFORM
            WHERE ID_SCHOOL = '$id_school_u'
            AND ID_UNIFORM = '$id_uniform'";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

        function selectTypePiece($id_type_piece){
            $SQL = "SELECT NAME_TYPE_PIECE FROM TRIPLEK.TYPE_PIECE
            WHERE ID_TYPE_PIECE = '$id_type_piece'";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

        function selectSchool($id_school){
            $SQL = "SELECT NAME_SCHOOL FROM TRIPLEK.SCHOOL
            WHERE ID_SCHOOL = '$id_school'";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

        function selectUniform($id_uniform){
            $SQL = "SELECT * FROM TRIPLEK.UNIFORM 
            WHERE ID_UNIFORM = '$id_uniform'";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

    }




?>