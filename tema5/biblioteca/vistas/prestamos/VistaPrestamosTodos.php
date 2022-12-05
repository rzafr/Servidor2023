<?php

    class VistaPrestamosTodos {

        /**
         * Pinta la tabla de prestamos y los buscadores de la pagina principal
         */
        public static function render($prestamos) {

            include("./vistas/cabecera.php");

            echo "<div class='row justify-content-end p-3'>";
                echo "<div class='col-10'>";
                    echo "<div class='row'>";
                        echo "<div class='col-2'>";
                            echo "<form action='enrutador.php' method='get'>";
                                echo "<input type='text' name='buscadorDNI' class='form-control' placeholder='Buscar por DNI'>";
                        echo "</div>";
                        echo "<div class='col-2'>";
                                echo "<input type='submit' name='buscarDNI' value='Buscar' class='form-control btn btn-success'>";
                            echo "</form>";
                        echo "</div>";
                        echo "<div class='col-2'>";
                            echo "<form action='enrutador.php' method='get'>";
                                echo "<select name='buscadorEstado' class='form-control' id='estado'>";
                                    echo "<option value='' selected>Buscar por estado</option>
                                        <option value='activo'>Activo</option>
                                        <option value='devuelto'>Devuelto</option>
                                        <option value='sobrepasado1Mes'>Sobrepasado un mes</option>
                                        <option value='sobrepasado1Year'>Sobrepasado un año</option>";
                                echo "</select>";
                        echo "</div>";
                        echo "<div class='col-2'>";
                                echo "<input type='submit' name='buscarEstado' value='Buscar' class='form-control btn btn-success'>";
                            echo "</form>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
            
            
            echo    '<div class="card shadow mb-4 mt-5">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Prestamos de la biblioteca</h6>
                        </div>
                        <div class="card-body">';
                        echo '<div class="table-responsive">';
                        echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>Codigo</th>
                                    <th>Titulo libro</th>
                                    <th>DNI usuario</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha fin</th>
                                    <th>Estado</th>
                                    <th colspan='2'>Acciones</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tfoot>";
                            echo "<tr>";
                                echo "<th>Codigo</th>
                                    <th>Titulo libro</th>
                                    <th>DNI usuario</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha fin</th>
                                    <th>Estado</th>
                                    <th colspan='2'>Acciones</th>";
                            echo "</tr>";
                        echo "</tfoot>";
                        echo "<tbody>";
                            foreach($prestamos as $prestamo) {
                                echo "<tr>";
                                    echo "<td>".$prestamo->getId()."</td>
                                        <td>".$prestamo->titulo."</td>
                                        <td>".$prestamo->dni."</td>
                                        <td>".$prestamo->getFechaInicio()."</td>
                                        <td><form method='get' class='user' action='./enrutador.php'>
                                            <div class='form-group'>
                                                <input type='date' name='fechaFin' class='form-control'
                                                    id='fechaFin' value=".$prestamo->getFechaFin().">
                                            </div></td>
                                        <td><div class='form-group'>
                                            <select name='estado' class='form-control form-control-user' id='estado'>";
                                                if ($prestamo->getEstado() == "activo") {
                                                    echo "<option value='activo' selected>Activo</option>
                                                            <option value='devuelto'>Devuelto</option>
                                                            <option value='sobrepasado1Mes'>Sobrepasado un mes</option>
                                                            <option value='sobrepasado1Year'>Sobrepasado un año</option>";
                                                } else if ($prestamo->getEstado() == "devuelto") {
                                                    echo "<option value='activo'>Activo</option>
                                                            <option value='devuelto' selected>Devuelto</option>
                                                            <option value='sobrepasado1Mes'>Sobrepasado un mes</option>
                                                            <option value='sobrepasado1Year'>Sobrepasado un año</option>";
                                                } else if ($prestamo->getEstado() == "sobrepasado1Mes") {
                                                    echo "<option value='activo'>Activo</option>
                                                            <option value='devuelto'>Devuelto</option>
                                                            <option value='sobrepasado1Mes' selected>Sobrepasado un mes</option>
                                                            <option value='sobrepasado1Year'>Sobrepasado un año</option>";
                                                } else {
                                                    echo "<option value='activo'>Activo</option>
                                                            <option value='devuelto'>Devuelto</option>
                                                            <option value='sobrepasado1Mes'>Sobrepasado un mes</option>
                                                            <option value='sobrepasado1Year' selected>Sobrepasado un año</option>";
                                                }
                                                
                                        echo "</select>
                                            </div>
                                            <div class='form-group'>
                                                <input type='hidden' name='accion' class='form-control form-control-user'
                                                    value='modificarPrestamo'>
                                            </div>
                                            
                                            <div class='form-group'>
                                                <input type='hidden' name='id' class='form-control form-control-user'
                                                    value=".$prestamo->getId().">
                                            </div>
                                            </td>
                                        <td>
                                            <input type='submit' name='modificarPrestamo' value='Modificar' class='btn btn-success btn-user btn-block'>
                                            </form>
                                        </td>
                                        <td>
                                            <a class='btn btn-danger' href='./enrutador.php?accion=eliminarPrestamo&id=".$prestamo->getId()." role='button'>
                                                Eliminar
                                            </a>
                                        </td>";
                                echo "</tr>";
                            }
                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";

            include("./vistas/pie.php");
        }

    }

?>