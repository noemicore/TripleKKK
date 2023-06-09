<?php

class UniformView
{

    //Metodo para mostrar un formulario para registrar uniformes
    function showFormUniform($array_school, $array_size)
    {
?>
        <div>
            <form id="insert_uniform">
                <!-- Nombre del procedimiento -->

                <div class="row">
                    <div class="form-group  col">
                        <label for="state">Colegio al que pertenece</label>
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
                        <label for="state">Genero</label>
                        <select class="form-control" id="gender_uniform" name="gender_uniform" aria-label="Default select example">
                            <option>Seleccione un genero</option>
                            <option value="M">Masculino</option>
                            <option value="F">Fenemino</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="state">Tipo</label>
                        <select class="form-control" id="type_uniform" name="type_uniform" aria-label="Default select example">
                            <option>Seleccione un tipo</option>
                            <option value="F">Fisica</option>
                            <option value="D">Diario</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="names">Numero de piezas</label>
                        <input type="text" class="form-control" id="num_piece" name="num_piece">
                    </div>
                    <div class="form-group col">
                        <label for="names">Descuento</label>
                        <input type="text" class="form-control" id="descont_uniform" name="descont_uniform">
                    </div>
                </div>

        </div>
        <button type=" button" class="btn btn-success float-right mt-4" onclick="Uniform.insertUniform()">
            <i class="fas fa-save mr-2"></i> Guardar
        </button>

        </form>
        </div>

    <?php
    }



    function paginateUniform($array_uniform, $array_school, $array_size, $array_type_piece)
    {
    ?>

        <!-- TABLA QUE LISTA LOS PROCEDIMIENTOS -->
        <div class="row justify-content-around">
            <div class="card col-8">
                <div class="card-header font-weight-bold light">
                    <div class="row align-items-center justify-content-between">
                        <div class="col">
                            Listar Uniformes
                        </div>
                        <div class="col">
                            <div class="row justify-content-end">
                                <button type="button" class="btn btn-success float-left" onclick="Uniform.showFormUniform()" style="padding: 2px 7px;">
                                    <i class="fa-solid fa-plus"></i> Nuevo
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body font-weight-normal">
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead>
                                <!--campos de la lista -->
                                <tr>
                                    <th>Nombre</th>
                                    <th>Talla</th>
                                    <th>Genero</th>
                                    <th>Piezas</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>
                            <!-- LISTAR LOS PROCEDIMIENTOS ALMACENADOS EN LA BASE DE DATOS -->
                            <tbody>
                                <?php foreach ($array_uniform as $uniform) {
                                    $id_uniform = $uniform->id_uniform;
                                    $name_uniform = $uniform->name_uniform;
                                    $id_size = $uniform->id_size;
                                    $gender_uniform =  $uniform->gender_uniform;
                                    $num_piece =  $uniform->num_piece;
                                    $total_uniform = $uniform->total_uniform;
                                ?>
                                    <tr>
                                        <td><?php echo $name_uniform ?></td>
                                        <td><?php echo $id_size ?></td>
                                        <td><?php echo $gender_uniform ?></td>
                                        <td><?php echo $num_piece ?></td>
                                        <td><?php echo $total_uniform ?></td>
                                        <td class="text-center">
                                            <i class="fa-sharp fa-solid fa-pen-to-square" onclick="Uniform.showUniform('<?php echo $id_uniform ?>');" style="color: #16a239;cursor:pointer;margin-right: 7px;"></i>
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
                    Filtrar Uniformes
                </div>
                <div class="card-body">
                    <form id="filter_uniform">
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
                                <label for="state">Tipo de uniforme</label>
                                <select class="form-control" id="type_uniform" name="type_uniform" aria-label="Default select example">
                                    <option>Seleccione un tipo de uniforme</option>
                                    <option value="F">Fisica</option>
                                    <option value="D">Diario</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="state">Genero</label>
                                <select class="form-control" id="gender_uniform" name="gender_uniform" aria-label="Default select example">
                                    <option>Seleccione un genero</option>
                                    <option value="M">MASCULINO</option>
                                    <option value="F">FEMENINO</option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="button" class="btn btn-primary float-right col-8" onclick="Uniform.filterUniform()">
                                <i class="fa-solid fa-magnifying-glass mr-3"></i> Buscar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    <?php
    }

    function showUniform($uniform, $array_school, $array_size)
    {
        $id_uniform = $uniform[0]->id_uniform;
        $descont_uniform = $uniform[0]->descont_uniform;
        $id_school_uniform = $uniform[0]->id_school;
        $id_size_uniform = $uniform[0]->id_size;
        $gender_uniform = $uniform[0]->gender_uniform;
        $type_uniform = $uniform[0]->type_uniform;
        $num_piece = $uniform[0]->num_piece;

    ?>
        <div>
            <form id="update_uniform">
                <!-- Nombre del procedimiento -->

                <div class="row">
                    <div class="form-group  col">
                        <label for="state">Colegio al que pertenece</label>
                        <select class="form-control" id="id_school" name="id_school" aria-label="Default select example">
                            <?php
                            foreach ($array_school as $school) {
                                $id_school = $school->id_school;
                                $name_school = $school->name_school;
                                if ($id_school_uniform == $id_school) {
                            ?>
                                    <option selected value="<?php echo $id_school_uniform ?>"><?php echo $name_school ?></option>
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
                        <label for="state">Talla</label>
                        <select class="form-control" id="id_size" name="id_size" aria-label="Default select example">
                            <?php
                            foreach ($array_size as $size) {
                                $id_size = $size->id_size;
                                $name_size = $size->name_size;
                                if ($id_size_uniform == $id_size) {
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

                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="state">Genero</label>
                        <select class="form-control" id="gender_uniform" name="gender_uniform" aria-label="Default select example">
                        <?php
                            if ($gender_uniform == 'M') {
                            ?>
                                <option selected value="M">Masculino</option>
                                <option value="F">Fenemino</option>
                            <?php
                            } else {
                            ?> <option  value="M">Masculino</option>
                                <option selected value="F">Fenemino</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="state">Tipo</label>
                        <select class="form-control" id="type_uniform" name="type_uniform" aria-label="Default select example">
                        <?php
                            if ($type_uniform == 'D') {

                            ?>
                                <option selected value="D">Diario</option>
                                <option value="F">Fisica</option>
                            <?php
                            } else {
                            ?>
                                <option  selected value="F">Fisica</option>
                                <option  value="D">Diario</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="names">Numero de piezas</label>
                        <input type="number" class="form-control" id="num_piece" name="num_piece" value="<?php echo $num_piece ?>" >
                    </div>
                    <div class="form-group col">
                        <label for="names">Descuento</label>
                        <input type="number" class="form-control" id="descont_uniform" name="descont_uniform" value="<?php echo $descont_uniform ?>" >
                    </div>
                </div>

        </div>
        <button type=" button" class="btn btn-success float-right mt-4" onclick="Uniform.updateUniform('<?php echo $id_uniform ?>')">
            <i class="fas fa-save mr-2"></i> Guardar
        </button>

        </form>
        </div>

<?php
    }
}



?>