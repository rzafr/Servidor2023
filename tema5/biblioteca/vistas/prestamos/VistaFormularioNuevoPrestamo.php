<?php

    class VistaFormularioNuevoPrestamo {

        /**
         * Pinta el formulario que recoge los datos para insertar un prestamo nuevo en la base de datos
         */
        public static function render($usuarios, $libros) {

            include("./vistas/cabecera.php");

            echo    "<div class='row justify-content-center'>
                        <div class='col-xl-5 col-lg-7 col-md-4'>
                            <div class='card o-hidden border-0 shadow-lg my-5'>
                                <div class='card-body p-0'>
                                    <!-- Form Example -->
                                    <div class='row'>
                                        <div class='col-lg-12'>
                                            <div class='p-5'>
                                                <div class='text-center'>
                                                    <h1 class='h4 text-gray-900 mb-4'>Nuevo prestamo</h1>
                                                </div>
                                                <form method='post' class='user' action='enrutador.php'>
                                                    <div class='form-group'>
                                                        <input type='hidden' name='accion' class='form-control form-control-user'
                                                            value='nuevoPrestamo'>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='usuario'>Usuario:</label>";
                                                        echo "<select name='usuario' class='form-control'>
                                                                    <option value=''></option>";
                                                                foreach ($usuarios as $usuario) {
                                                                    echo "<option value=".$usuario->getId().">".$usuario->getDni()."</option>";
                                                                }
                                                        echo "</select>";
                                                    echo "</div>
                                                    <div class='form-group'>
                                                        <label for='libro'>Libro:</label>
                                                        <select name='libro' class='form-control' id='libro'>
                                                                    <option value=''></option>";
                                                            foreach ($libros as $libro) {
                                                                echo "<option value=".$libro->getId().">".$libro->getIsbn()."</option>";
                                                            }
                                                            echo "</select>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='fechaInicio'>Fecha inicio:</label>
                                                        <input type='date' name='fechaInicio' class='form-control'
                                                            id='fechaInicio' placeholder='DD/MM/YYYY'>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='fechaFin'>Fecha fin:</label>
                                                        <input type='date' name='fechaFin' class='form-control'
                                                            id='fechaFin' placeholder='DD/MM/YYYY'>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='estado'>Estado:</label>
                                                        <select name='estado' class='form-control' id='estado'>
                                                            <option value='activo' selected>Activo</option>
                                                            <option value='devuelto'>Devuelto</option>
                                                            <option value='sobrepasado1Mes'>Sobrepasado un mes</option>
                                                            <option value='sobrepasado1Year'>Sobrepasado un año</option>
                                                        </select>
                                                    </div>
                                                    <button type='submit' class='btn btn-success btn-user btn-block'>
                                                        Añadir
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";

            include("./vistas/pie.php");

        }

    }

?>