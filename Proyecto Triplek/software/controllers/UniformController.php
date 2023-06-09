<?php
    //Archivos requeridos
    require_once "models/UniformModel.php";
    require_once "views/UniformView.php";


    class UniformController{


        //-------------------- METODOS PARA MOSTRAR VENTANAS DE DML -------------------- 
        //Metodo para mostrar el formulario para agregar un nuevo uniforme
        function showFormUniform(){

            //Crear la conexion
            $Connection = new Connection();
            $UniformModel = new UniformModel($Connection);

            //Traer datos necesarios para el formulario
            $array_school = $UniformModel->paginateSchool();
            $array_size = $UniformModel->paginateSize();

            //Crear la vista para mostrar
            $UniformView = new UniformView();
            $UniformView->showFormUniform($array_school,$array_size);
            
        }

        //-------------------- METODOS PARA OPERACIONES DE DML -------------------- 
       
        //Metodo para insertar un nuevo uniforme
        function insertUniform(){

            //Obtener todos los datos del formulario
            $id_size = $_POST['id_size'];
            $id_school = $_POST['id_school'];
            $gender_uniform = $_POST['gender_uniform'];
            $type_uniform = $_POST['type_uniform'];
            $num_piece = $_POST['num_piece'];
            $descont_uniform = $_POST['descont_uniform'];

            if($id_size == "Seleccione una talla" || $id_school == "Seleccione colegio"
            || $gender_uniform == "Seleccione un genero" || $type_uniform == "Seleccione un tipo" || $num_piece == "" || $descont_uniform == ""){
                $array_message = ['message' => 'Hay campos sin llenar'];
                exit(json_encode($array_message));
            }else if (!ctype_digit($num_piece) ){
                $array_message = ['message' => 'El numero de piezas debe ser solo digitos numerico'];
                exit(json_encode($array_message));
            } else if( !is_numeric($descont_uniform) ){
                $array_message = ['message' => 'El descuento debe ser solo digitos numerico'];
                exit(json_encode($array_message));
            }else{
                $Connection = new Connection();
                $UniformModel = new UniformModel($Connection);
                $name_school = $UniformModel->selectSchool($id_school);
                $name_type = ($type_uniform == 'D') ? 'DIARIO' : 'FISICA';
                $name_gender = ($gender_uniform == 'M') ? 'MASCULINO' : 'FEMENINO';  

                $name_uniform = "UNIFORME ".$name_school[0]->name_school." ".$name_type." ".$name_gender." TALLA ".$id_size ;                
                //Crear una conexion
                $UniformModel->insertUniform($name_uniform,$id_school,$id_size,$gender_uniform,$type_uniform,$num_piece,$descont_uniform);
                $this->paginateUniform();

            }
        }

        //Metodo para listar todos los uniformes
        function paginateUniform(){
            
            //Crear la conexion a la base de datos
            $Connection = new Connection();
            $UniformModel = new UniformModel($Connection);
            
            $array_uniform = $UniformModel->paginateUniform();
            $array_school = $UniformModel->paginateSchool();
            $array_size = $UniformModel->paginateSize();
            $array_type_piece = $UniformModel->paginateTypePiece();

            $UniformView = new UniformView();
            $UniformView->paginateUniform($array_uniform,$array_school,$array_size, $array_type_piece);
            
        }

        function filterUniform(){
            //Obtener todos los datos del formulario
            $id_school = $_POST['id_school'];
            $id_size = $_POST['id_size'];
            $type_uniform = $_POST['type_uniform'];
            $gender_uniform = $_POST['gender_uniform'];  

            if ($id_school == "Seleccione colegio" && $id_size == "Seleccione una talla" && $type_uniform == "Seleccione un tipo de uniforme"
                && $gender_uniform == "Seleccione un genero"){
                    $this->paginateUniform();
            }else{
                $SQL = "SELECT * FROM TRIPLEK.UNIFORM WHERE";
                $instrucciones = [];
                if($id_school != "Seleccione colegio"){ //Agregar condicion cuando se selecciona un colegio 
                    array_push($instrucciones," ID_SCHOOL = '$id_school'");                    
                }
                if($id_size != "Seleccione una talla"){
                    array_push($instrucciones," ID_SIZE = '$id_size'");
                }
                if($type_uniform != "Seleccione un tipo de uniforme"){
                    array_push($instrucciones," TYPE_UNIFORM = '$type_uniform'");
                }
                if($gender_uniform != "Seleccione un genero"){
                    array_push($instrucciones," GENDER_UNIFORM = '$gender_uniform'");
                }
                //Unir toda la instruccion
                for ($i = 0;$i < count($instrucciones);$i++ ){
                    $SQL = $SQL.$instrucciones[$i];
                    if ($i != count($instrucciones) - 1){
                        $SQL = $SQL." AND ";
                    }
                }
                //Obtener la conexion
                $Connection = new Connection();
                $UniformModel = new UniformModel($Connection);
                $uniform_filter = $UniformModel->filterUniform($SQL);
                $array_school = $UniformModel->paginateSchool();
                $array_size = $UniformModel->paginateSize();
                $array_type_piece = $UniformModel->paginateTypePiece();
                
                //Crear la vista
                $UniformView = new UniformView();
                $UniformView->paginateUniform($uniform_filter,$array_school,$array_size, $array_type_piece);
            }
            
        }

        function showUniform(){
            $id_uniform = $_POST['id_uniform'];

            //Obtener la conexion 
            $Connection = new Connection();
            $UniformModel = new UniformModel($Connection);

            $uniform = $UniformModel->selectUnifor($id_uniform);
            $array_school = $UniformModel->paginateSchool();
            $array_size = $UniformModel->paginateSize();

            $UniformView = new UniformView();
            $UniformView->showUniform($uniform,$array_school, $array_size);

        }

        function updateUniform(){

            $id_uniform = $_POST['id_uniform'];
            //Obtener todos los datos del formulario
            $id_size = $_POST['id_size'];
            $id_school = $_POST['id_school'];
            $gender_uniform = $_POST['gender_uniform'];
            $type_uniform = $_POST['type_uniform'];
            $num_piece = $_POST['num_piece'];
            $descont_uniform = $_POST['descont_uniform'];

            if($num_piece <= 0 ){
                $array_message = ['message' => 'La cantidad de piezas debe ser por lo menos 1'];
                exit(json_encode($array_message));
            }else if($descont_uniform < 0){
                $array_message = ['message' => 'El descuento no puede ser un numero negativo'];
                exit(json_encode($array_message));
            }else{
                $Connection = new Connection();
                $UniformModel = new UniformModel($Connection);

                $name_school = $UniformModel->selectSchool($id_school);
                $name_type = ($type_uniform == 'D') ? 'DIARIO' : 'FISICA';
                $name_gender = ($gender_uniform == 'M') ? 'MASCULINO' : 'FEMENINO';  

                $name_uniform = "UNIFORME ".$name_school[0]->name_school." ".$name_type." ".$name_gender." TALLA ".$id_size ;        
                
                $array_uniform = $UniformModel->duplicateNameUpdate($name_uniform,$id_uniform);
                if($array_uniform){
                    $array_message = ['message' => 'Este uniforme ya existe'];
                    exit(json_encode($array_message));
                }else{
                    $UniformModel->updateUniform($id_uniform,$num_piece,$descont_uniform,$id_size,$id_school,$gender_uniform,$type_uniform,$name_uniform);
                    $this->paginateUniform();
                }
                
                

            }

            
        }


    }

?>