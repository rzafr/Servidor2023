<?php

    class VistaFormularioNuevoRegalo {

        /**
         * Pinta el formulario que recoge los datos para insertar un regalo nuevo en la base de datos
         */
        public static function render() {

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
                                                    <h1 class='h4 text-gray-900 mb-4'>Nuevo regalo</h1>
                                                </div>
                                                <form method='post' class='user' action='enrutador.php'>
                                                    <div class='form-group'>
                                                        <input type='hidden' name='accion' class='form-control form-control-user'
                                                            value='nuevoRegalo'>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='nombre'>Nombre:</label>
                                                        <input type='text' name='nombre' class='form-control'>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='destinatario'>Destinatario:</label>
                                                        <input type='text' name='destinatario' class='form-control'>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='precio'>Precio:</label>
                                                        <input type='text' name='precio' class='form-control'>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='estado'>Estado:</label>
                                                        <select name='estado' class='form-control'>
                                                            <option value='Pendiente' selected>Pendiente</option>
                                                            <option value='Comprado'>Comprado</option>
                                                            <option value='Envuelto'>Envuelto</option>
                                                            <option value='Entregado'>Entregado</option>
                                                        </select>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='year'>Año:</label>
                                                        <input type='text' name='year' class='form-control'>
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