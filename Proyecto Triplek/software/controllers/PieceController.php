<?php
    //Archivos requeridos
    require_once "models/PieceModel.php";
    require_once "views/PieceView.php";


    class PieceController{

        //-------------------- METODOS PARA MOSTRAR VENTANAS DE DML -------------------- 
        //Metodo para mostrar el formulario para agregar un nuevo uniforme
        function showFormPiece(){

            //Crear la conexion
            $Connection = new Connection();
            $PieceModel = new PieceModel($Connection);

            //Traer datos necesarios para el formulario
            $array_school = $PieceModel->paginateSchool();
            $array_size = $PieceModel->paginateSize();
            $array_uniform = $PieceModel->paginateUniform();
            $array_type_piece = $PieceModel->paginateTypePiece();
            
            //Crear la vista para mostrar
            $PieceView = new PieceView();
            $PieceView->showFormPiece($array_school,$array_uniform,$array_size,$array_type_piece);
            
        }

        //-------------------- METODOS PARA OPERACIONES DE DML --------------------        
        //Metodo para insertar un nuevo uniforme
        function insertPiece(){

            //Obtener todos los datos del formulario
            $id_school = $_POST['id_school_piece'];
            $id_school_uniform = $_POST['id_school_uniform'];            
            $id_size = $_POST['id_size'];            
            $gender_piece = $_POST['gender_piece'];
            $type_piece_use = $_POST['type_piece_use'];
            $type_piece = $_POST['type_piece'];
            $amount_piece = $_POST['amount_piece'];
            $price_piece = $_POST['price_piece'];

            if($id_school == "Seleccione colegio" || $id_school_uniform == "Seleccione colegio" || $id_size == "Seleccione una talla"  ||
            $gender_piece == "Seleccione un genero" || $type_piece_use == "Seleccione un tipo"  || $type_piece == "Seleccione un tipo de prenda" ||
            $amount_piece == "" || $price_piece == ""){
                $array_message = ['message' => 'Hay campos sin llenar'];
                exit(json_encode($array_message));
            }else if (!ctype_digit($amount_piece) ){
                $array_message = ['message' => 'La cantidad de piezas debe ser solo digintos numericos'];
                exit(json_encode($array_message));
            } else if( !is_numeric($price_piece) ){
                $array_message = ['message' => 'El precio de la pieza debe ser solo digitos numericos'];
                exit(json_encode($array_message));
            }else{

                //Crear la conexion 
                $Connection = new Connection();
                $PieceModel = new PieceModel($Connection);

                $agregar = true;
                //Por si la prenda no pertenece a ningun uniforme
                if ($_POST['id_school_uniform'] == "0"){
                    $id_school_u = "0";
                    $id_uniform = "0";
                    $agregar = true;
                }else{//Por si la pieza si pertenece a un uniforme
                    
                    $id_uniform = $_POST['id_school_uniform'];
                    $id_school_u = $PieceModel->selectUniform($id_uniform)[0]->id_school;                    
                     /*
                    //Obtener datos para ver si puedo agregar mas piezas
                    $countNumPieceAU = $PieceModel->countNumPieceAU()[0]->{'COUNT_P'};
                    $array_message = ['message' =>  $countNumPieceAU];
                    exit(json_encode($array_message));
                    
                    //$num_uniform = $MenuModel->countUniform()[0]->num_uniform;


                    //$agregar = !($num_piece_s == $num_piece_u);
                    */
                }
                        
                //Terminar de obtener datos para poder realizar la insercion 
                $name_type = ($type_piece_use == 'D') ? 'DIARIO' : 'FISICA';
                $name_type_piece = $PieceModel->selectTypePiece($type_piece)[0]->name_type_piece;
                $name_school = $PieceModel->selectSchool($id_school)[0]->name_school;

                if ( $agregar ){
                    //Gnerar el nombre
                    $name_piece = $name_type_piece. " ".$name_type." ".$name_school;    

                    //Llamar el metodo para agregar una nueva pieza
                    $PieceModel->insertPiece($id_school,$id_uniform,$id_school_u,$name_piece,$id_size,$gender_piece,$type_piece_use,$amount_piece,$price_piece,$type_piece);
                    $this->paginatePiece();
                    
                }else{
                    $array_message = ['message' => 'Ya no se pueden agregar mas prendas a este uniforme'];
                    exit(json_encode($array_message));
                }
            }            
        }

        //Metodo para listar todos los uniformes
        function paginatePiece(){

            //Crear la conexion 
            $Connection = new Connection();
            $PieceModel = new PieceModel($Connection);

            //Obtener todas las piezas en el sistema
            $array_piece = $PieceModel->paginatePiece();
            $array_school = $PieceModel->paginateSchool();
            $array_uniform = $PieceModel->paginateUniform();
            $array_size = $PieceModel->paginateSize();
            $array_type_piece = $PieceModel->paginateTypePiece();

            //Crear la vista para poder mostrar las prendas             
            $PieceView = new PieceView();
            $PieceView->paginatePiece($array_piece,$array_school,$array_uniform,$array_size,$array_type_piece);

        }

        //Funcion para eliminar una prenda o pieza
        function deletePiece(){
            //Crear la conexion 
            $Connection = new Connection();
            $PieceModel = new PieceModel($Connection);
            //Eliminar la prenda seleccionada
            $id_piece = $_POST['id_piece'];
            $PieceModel->deletePiece($id_piece);
            //Volver a listar las piezas
            $this->paginatePiece();
        }

        //------------------ METODOS PARA OTRAS OPERACIONES
        function filterPiece(){
            //Obtener todos los datos del formulario
            $id_school = $_POST['id_school'];
            $id_uniform = $_POST['id_uniform'];
            $id_size = $_POST['id_size'];
            $type_piece = $_POST['type_piece'];
            $can_min = $_POST['can_min'];
            $can_max = $_POST['can_max'];            
            
            //Cuando no se filtra nada
            if ($id_school == "Seleccione colegio" && $id_uniform == "Seleccione uniforme" && $id_size == "Seleccione una talla"
                && $type_piece == "Seleccione un tipo de prenda" && $can_min == "" && $can_max == ""){
                    $this->paginatePiece();
            }else{ //Cuando tiene condiciones 
                //Comenzar a armar el SQL
                $SQL = "SELECT * FROM TRIPLEK.PIECE WHERE";
                $instrucciones = [];
                if($id_school != "Seleccione colegio"){ //Agregar condicion cuando se selecciona un colegio 
                   array_push($instrucciones," ID_SCHOOL_PIECE = '$id_school'");
                }
                if ($id_uniform != "Seleccione uniforme"){
                    array_push($instrucciones," ID_UNIFORM = '$id_uniform'");
                }
                if($id_size != "Seleccione una talla"){
                    array_push($instrucciones," ID_SIZE = '$id_size'");
                }
                if($type_piece != "Seleccione un tipo de prenda"){
                    array_push($instrucciones," TYPE_PIECE = '$type_piece'");
                }
                if($can_max != "" && $can_min != "" ){
                    if(!ctype_digit($can_max) || !ctype_digit($can_min)){
                        $array_message = ['message' => 'Los campos de cantidad deben solo ser digitos numericos'];
                        exit(json_encode($array_message));
                    }else{
                        $can_max_n = intval($can_max);
                        $can_min_n = intval($can_min);
                        if($can_max_n < $can_min_n){
                             $array_message = ['message' => 'La cantidad maxima no puede ser menor a la minima'];
                            exit(json_encode($array_message));
                        }else{
                            array_push($instrucciones," AMOUNT_PIECE BETWEEN '$can_min_n' AND '$can_max_n'");
                        }
                    }
                }
                
                for ($i = 0;$i < count($instrucciones);$i++ ){
                    $SQL = $SQL.$instrucciones[$i];
                    if ($i != count($instrucciones) - 1){
                        $SQL = $SQL." AND ";
                    }
                }
                //Obtener la conexion a la base de datos
                $Connection = new Connection();
                $PieceModel = new PieceModel($Connection);

                $piece_filter = $PieceModel->filterPiece($SQL);
                $array_school = $PieceModel->paginateSchool();
                $array_uniform = $PieceModel->paginateUniform();
                $array_size = $PieceModel->paginateSize();
                $array_type_piece = $PieceModel->paginateTypePiece();

                 //Crear la vista para poder mostrar las prendas             
                $PieceView = new PieceView();
                $PieceView->paginatePiece($piece_filter,$array_school,$array_uniform,$array_size,$array_type_piece);

            }

        }

        function showPiece(){
            //Obtener el id de la prenda que se desea actualizar. 
            $id_piece = $_POST['id_piece'];

            //Obtener la conexion a la base de datos
            $Connection = new Connection();
            $PieceModel = new PieceModel($Connection);

            //Traer datos necesarios para el formulario
            $piece = $PieceModel->selectPiece($id_piece); //Traer los datos necesarios para la pieza
            $array_school = $PieceModel->paginateSchool();
            $array_size = $PieceModel->paginateSize();
            $array_uniform = $PieceModel->paginateUniform();
            $array_type_piece = $PieceModel->paginateTypePiece();

            //Crear la vista para mostrar
            $PieceView = new PieceView();
            $PieceView->showPiece($piece,$array_school,$array_uniform,$array_size,$array_type_piece);
            
        }
    }

?>