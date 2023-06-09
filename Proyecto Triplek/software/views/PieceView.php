<?php

class PieceView
{

    //Metodo para mostrar un formulario para registrar uniformes
    function showFormPiece($array_school, $array_uniform, $array_size, $array_type_piece)
    {
?>
        <div>
            <form id="insert_piece">
                <div class="row">
                    <div class="form-group col">
                        <label for="state">Colegio al que pertenece</label>
                        <select class="form-control" id="id_school_piece" name="id_school_piece" aria-label="Default select example">
                            <option>Seleccione colegio</option>
                            <?php
                            foreach ($array_school as $school) {
                                $id_school = $school->id_school;
                                $name_school = $school->name_school;
                            ?>
                                <option value="<?php echo $id_school ?>"><?php echo $name_school ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="state">Uniforme al que pertenece</label>
                        <select class="form-control" id="id_school_uniform" name="id_school_uniform" aria-label="Default select example">
                            <option>Seleccione uniforme</option>
                            <option value="0">Ninguno</option>
                            <?php
                            foreach ($array_uniform as $uniform) {
                                $id_school = $uniform->id_school;
                                $id_uniform = $uniform->id_uniform;
                                $name_uniform = $uniform->name_uniform;
                            ?>
                                <option value="<?php echo $id_uniform ?>"><?php echo $name_uniform ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="state">Talla</label>
                        <select class="form-control" id="id_size" name="id_size" aria-label="Default select example">
                            <option>Seleccione una talla</option>
                            <?php
                            foreach ($array_size as $size) {
                                $id_size = $size->id_size;
                                $name_size = $size->name_size;
                            ?>
                                <option value="<?php echo $id_size ?>"><?php echo $id_size . " - " . $name_size ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="state">Genero</label>
                        <select class="form-control" id="gender_piece" name="gender_piece" aria-label="Default select example">
                            <option>Seleccione un genero</option>
                            <option value="M">Masculino</option>
                            <option value="F">Fenemino</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="state">Tipo de uso</label>
                        <select class="form-control" id="type_piece_use" name="type_piece_use" aria-label="Default select example">
                            <option>Seleccione un tipo</option>
                            <option value="F">Fisica</option>
                            <option value="D">Diario</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="state">Tipo de prenda</label>
                        <select class="form-control" id="type_piece" name="type_piece" aria-label="Default select example">
                            <option>Seleccione un tipo de prenda</option>
                            <?php
                            foreach ($array_type_piece as $type_piece) {
                                $id_type_piece = $type_piece->id_type_piece;
                                $name_type_piece = $type_piece->name_type_piece;
                            ?>
                                <option value="<?php echo $id_type_piece ?>"><?php echo $name_type_piece ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="names">Cantidad disponible</label>
                        <input type="text" class="form-control" id="amount_piece" name="amount_piece">
                    </div>
                    <div class="form-group col">
                        <label for="names">Precio</label>
                        <input type="text" class="form-control" id="price_piece" name="price_piece">
                    </div>
                </div>
        </div>
        <button type=" button" class="btn btn-success float-right mt-4" onclick="Piece.insertPiece()">
            <i class="fas fa-save mr-2"></i> Guardar
        </button>

        </form>
        </div>

    <?php
    }

    function paginatePiece($array_piece, $array_school, $array_uniform, $array_size, $array_type_piece)
    {
    ?>
        <!-- TABLA QUE LISTA LOS PROCEDIMIENTOS -->
        <div class="row justify-content-around">
            <div class="card col-8">
                <div class="card-header font-weight-bold light">
                    <div class="row align-items-center justify-content-between">
                        <div class="col">
                            Listar Prendas
                        </div>
                        <div class="col">
                            <div class="row justify-content-end">
                                <button type="button" class="btn btn-success float-left" onclick="Piece.showFormPiece()" style="padding: 2px 7px;">
                                    <i class="fa-solid fa-plus"></i> Nuevo
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead>
                                <!--campos de la lista -->
                                <tr>
                                    <th>Nombre</th>
                                    <th>Talla</th>
                                    <th>Genero</th>
                                    <th>Cantidad disponible</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <!-- LISTAR LOS PROCEDIMIENTOS ALMACENADOS EN LA BASE DE DATOS -->
                            <tbody>
                                <?php foreach ($array_piece as $piece) {
                                    $id_piece = $piece->id_piece;
                                    $name_piece = $piece->name_piece;
                                    $id_size = $piece->id_size;
                                    $gender_piece =  $piece->gender_piece;
                                    $amount_piece =  $piece->amount_piece;
                                    $price_piece = $piece->price_piece;
                                ?>
                                    <tr class="text-center">
                                        <td style="text-align: start;"><?php echo $name_piece ?></td>
                                        <td><?php echo $id_size ?></td>
                                        <td><?php echo $gender_piece ?></td>
                                        <td><?php echo $amount_piece ?></td>
                                        <td><?php echo $price_piece ?></td>
                                        <td class="text-center">
                                            <i class="fa-sharp fa-solid fa-pen-to-square" onclick="Piece.showPiece('<?php echo $id_piece ?>');" style="color: #16a239;cursor:pointer;margin-right: 7px;"></i>
                                            <i class="fas fa-trash-alt" onclick="Piece.deletePiece('<?php echo $id_piece ?>');" style="color:#e61919;cursor:pointer;margin-right: 7px;"></i>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card col-3">
                <div class="card-header font-weight-bold light">
                    Filtrar Prendas
                </div>
                <div class="card-body">
                    <form id="filter_piece">
                        <div class="row">
                            <div class="form-group  col">
                                <label for="state">Colegio</label>
                                <select class="form-control" id="id_school" name="id_school" aria-label="Default select example">
                                    <option>Seleccione colegio</option>
                                    <?php
                                    foreach ($array_school as $school) {
                                        $id_school = $school->id_school;
                                        $name_school = $school->name_school;
                                    ?>
                                        <option value="<?php echo $id_school ?>"><?php echo $name_school ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="state">Uniforme al que pertenece</label>
                                <select class="form-control" id="id_uniform" name="id_uniform" aria-label="Default select example">
                                    <option>Seleccione uniforme</option>
                                    <option value="0">Ninguno</option>
                                    <?php
                                    foreach ($array_uniform as $uniform) {
                                        $id_school = $uniform->id_school;
                                        $id_uniform = $uniform->id_uniform;
                                        $name_uniform = $uniform->name_uniform;
                                    ?>
                                        <option value="<?php echo $id_uniform ?>"><?php echo $name_uniform ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="state">Talla</label>
                                <select class="form-control" id="id_size" name="id_size" aria-label="Default select example">
                                    <option>Seleccione una talla</option>
                                    <?php
                                    foreach ($array_size as $size) {
                                        $id_size = $size->id_size;
                                        $name_size = $size->name_size;
                                    ?>
                                        <option value="<?php echo $id_size ?>"><?php echo $id_size . " - " . $name_size ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="state">Tipo de prenda</label>
                                <select class="form-control" id="type_piece" name="type_piece" aria-label="Default select example">
                                    <option>Seleccione un tipo de prenda</option>
                                    <?php
                                    foreach ($array_type_piece as $type_piece) {
                                        $id_type_piece = $type_piece->id_type_piece;
                                        $name_type_piece = $type_piece->name_type_piece;
                                    ?>
                                        <option value="<?php echo $id_type_piece ?>"><?php echo $name_type_piece ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Cantidad disponible</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <input type="number" class="form-control" placeholder="MINIMA" id="can_min" name="can_min">
                            </div>
                            <div class="form-group col">
                                <input type="number" class="form-control" placeholder="MAXIMA" id="can_max" name="can_max">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="button" class="btn btn-primary float-right col-8" onclick="Piece.filterPiece()">
                                <i class="fa-solid fa-magnifying-glass mr-3"></i> Buscar
                            </button>
                        </div>
                    </form>

                </div>
            </div>


        </div>

    <?php
    }
    //Metodo para mostrar un formulario para registrar uniformes
    function showPiece($piece, $array_school, $array_uniform, $array_size, $array_type_piece)
    {
        $id_school_piece = $piece[0]->id_school_piece;
        $id_uniform_piece = $piece[0]->id_uniform;
        $id_size_piece = $piece[0]->id_size;
        $gender_piece = $piece[0]->gender_piece;
        $type_piece_use = $piece[0]->type_piece_use;
        $type_piece_s = $piece[0]->type_piece;
        $amount_piece = $piece[0]->amount_piece;
        $price_piece = $piece[0]->price_piece;
    ?>
        <div>
            <form id="update_piece">
                <div class="row">
                    <div class="form-group col">
                        <label for="state">Colegio al que pertenece</label>
                        <select class="form-control" id="id_school_piece" name="id_school_piece" aria-label="Default select example">
                            <?php
                            foreach ($array_school as $school) {
                                $id_school = $school->id_school;
                                $name_school = $school->name_school;
                                if ($id_school_piece == $id_school) {
                            ?>
                                    <option selected value="<?php echo $id_school_piece ?>"><?php echo $name_school ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $id_school ?>"><?php echo $name_school ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="state">Uniforme al que pertenece</label>
                        <select class="form-control" id="id_school_uniform" name="id_school_uniform" aria-label="Default select example">
                            <option value="0">Ninguno</option>
                            <?php
                            foreach ($array_uniform as $uniform) {
                                $id_school = $uniform->id_school;
                                $id_uniform = $uniform->id_uniform;
                                $name_uniform = $uniform->name_uniform;
                                if ($id_uniform_piece == $id_uniform) {
                            ?>
                                    <option selected value="<?php echo $id_uniform ?>"><?php echo $name_uniform ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $id_uniform ?>"><?php echo $name_uniform ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="state">Talla</label>
                        <select class="form-control" id="id_size" name="id_size" aria-label="Default select example">
                            <?php
                            foreach ($array_size as $size) {
                                $id_size = $size->id_size;
                                $name_size = $size->name_size;
                                if ($id_size_piece == $id_size) {
                            ?>
                                    <option selected value="<?php echo $id_size ?>"><?php echo $id_size . " - " . $name_size ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $id_size ?>"><?php echo $id_size . " - " . $name_size ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="state">Genero</label>
                        <select class="form-control" id="gender_piece" name="gender_piece" aria-label="Default select example">
                            <?php
                            if ($gender_piece == 'M') {

                            ?>
                                <option selected value="M">Masculino</option>
                            <?php
                            } else {
                            ?>
                                <option value="F">Fenemino</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="state">Tipo de uso</label>
                        <select class="form-control" id="type_piece_use" name="type_piece_use" aria-label="Default select example">
                            <?php
                            if ($type_piece_use == 'D') {

                            ?>
                                <option selected value="D">Diario</option>
                            <?php
                            } else {
                            ?>
                                <option value="F">Fisica</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="state">Tipo de prenda</label>
                        <select class="form-control" id="type_piece" name="type_piece" aria-label="Default select example">
                            <?php
                            foreach ($array_type_piece as $type_piece) {
                                $id_type_piece = $type_piece->id_type_piece;
                                $name_type_piece = $type_piece->name_type_piece;
                                if($id_type_piece == $type_piece_s){                                
                            ?>
                                <option selected value="<?php echo $id_type_piece ?>"><?php echo $name_type_piece ?></option>
                            <?php
                            }else {
                            ?> 
                               <option value="<?php echo $id_type_piece ?>"><?php echo $name_type_piece ?></option>
                            <?php  
                            }
                        }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="names">Cantidad disponible</label>
                        <input type="text" class="form-control" id="amount_piece" name="amount_piece" value="<?php echo $amount_piece ?>">
                    </div>
                    <div class="form-group col">
                        <label for="names">Precio</label>
                        <input type="text" class="form-control" id="price_piece" name="price_piece" value="<?php echo $price_piece ?>">
                    </div>
                </div>
        </div>
        <button type=" button" class="btn btn-success float-right mt-4" onclick="Piece.insertPiece()">
            <i class="fas fa-save mr-2"></i> Guardar
        </button>

        </form>
        </div>

<?php
    }
}
?>