<?php 

    class UniformModel{

        private $Connection;

        //Metodo constructor
        function __construct($Connection) {
            $this->Connection = $Connection;
        }

        //----------------------Metodos para el MDL--------------------------

        function insertUniform($name_uniform,$id_school,$id_size,$gender_uniform,$type_uniform,$num_piece,$descont_uniform){
            $SQL = "INSERT INTO TRIPLEK.UNIFORM 
            (ID_UNIFORM,NAME_UNIFORM,ID_SCHOOL,ID_SIZE,GENDER_UNIFORM,TYPE_UNIFORM,NUM_PIECE,SUB_TOTAL_UNIFORM,DESCONT_UNIFORM,TOTAL_UNIFORM)
            VALUES (DEFAULT,'$name_uniform','$id_school','$id_size','$gender_uniform','$type_uniform','$num_piece',0.0,'$descont_uniform',0.0)";
            $this->Connection->query($SQL);
        }

        //Metodo para listar uniformes
        function paginateUniform(){
            $SQL = " SELECT * FROM TRIPLEK.UNIFORM ";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

        function selectUnifor($id_uniform){
            $SQL = "SELECT * FROM TRIPLEK.UNIFORM
            WHERE ID_UNIFORM = '$id_uniform'";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

        function filterUniform($SQL){
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }
        function updateUniform($id_uniform, $num_piece,$descont_uniform,$id_size,$id_school,$gender_uniform,$type_uniform,$name_uniform){
            $SQL = "UPDATE TRIPLEK.UNIFORM SET NUM_PIECE = '$num_piece', DESCONT_UNIFORM = '$descont_uniform', ID_SIZE = '$id_size',
            ID_SCHOOL = '$id_school', GENDER_UNIFORM = '$gender_uniform', TYPE_UNIFORM = '$type_uniform', NAME_UNIFORM = '$name_uniform'
            WHERE ID_UNIFORM = '$id_uniform'";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }



        //---------- METODOS PARA CONSULTAR OTRAS TABLAS        
        function num_piece_uniform($id_uniform){
            $SQL = "SELECT COUNT(*) AS NUM_PIECE_UNIFORM FROM TRIPLEK.UNIFORM UNI
            INNER JOIN TRIPLEK.PIECE PIE
            ON PIE.ID_UNIFORM = UNI.ID_UNIFORM
            WHERE UNI.ID_UNIFORM = '$id_uniform'";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

        function duplicateNameUpdate($name_uniform,$id_uniform){
            $SQL = "SELECT * FROM TRIPLEK.UNIFORM WHERE NAME_UNIFORM = '$name_uniform'
            AND ID_UNIFORM != '$id_uniform'";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

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
        
        function selectSchool($id_school){
            $SQL = "SELECT NAME_SCHOOL FROM TRIPLEK.SCHOOL
            WHERE ID_SCHOOL = '$id_school'";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }
        function paginateTypePiece(){
            $SQL = "SELECT * FROM TRIPLEK.TYPE_PIECE";
            $this->Connection->query($SQL);
            return $this->Connection->fetchAll();
        }

    }



?>

