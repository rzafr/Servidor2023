<?php

    class VistaPrestamosTodos {

        public static function render($prestamos) {

            include("./vistas/cabecera.php");

            echo "<div class='row justify-content-end p-3'>";
                echo "<div class='col-10'>";
                    echo "<form action='enrutador.php' method='get'>";
                        echo "<div class='row'>";
                            echo "<div class='col-2'>";
                                echo "<input type='text' name='buscadorDNI' class='form-control' placeholder='Buscar DNI'>";
                            echo "</div>";
                            echo "<div class='col-2'>";
                                echo "<input type='submit' name='buscarDNI' value='Buscar' class='form-control btn btn-success'>";
                            echo "</div>";
                        echo "</div>";
                    echo "</form>";
                    echo "<form action='enrutador.php' method='get'>";
                        echo "<div class='row'>";
                            echo "<div class='col-2'>";
                                echo "<input type='text' name='buscadorEstado' class='form-control' placeholder='Buscar estado'>";
                            echo "</div>";
                            echo "<div class='col-2'>";
                                echo "<input type='submit' name='buscarEstado' value='Buscar' class='form-control btn btn-success'>";
                            echo "</div>";
                        echo "</div>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";//HAY QUE RECONTAR LOS DIV'S

                    // echo "<div class='col-10'>";
                    // echo "<form action='enrutador.php' method='get'>";
                    
                    // echo "<div class='row'><div class='col-2'>";
                    // echo "<input type='text' name='buscadorEstado' class='form-control' placeholder='Buscar por DNI'>";
                    // echo "</div>";
                    // echo "<div class='col-2'>";
                    // echo "<input type='submit' name='buscarEstado' value='Buscar' class='form-control btn btn-success'>";
                    // echo "</div></div>";
                    // echo "</form>";
                    // echo "</div>";
            
            
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
                                                <input type='date' name='fechaFin' class='form-control form-control-user'
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
                                        </td>
                                        <td>
                                            
                                            </form>
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

    // Botón de eliminar
    // <button>
    //     <a href='./verProyecto.php?accion=ver&id=".$prestamo->getId()."'>
    //         Eliminar
    //     </a>
    // </button>
    // // Sacado del td de modificar-><input type='submit' name='modificarPrestamo' value='Modificar' class='btn btn-success btn-user btn-block'>
    // Sacado del td de eliminar-> <input type='submit' name='eliminarPrestamo' value='Eliminar' class='btn btn-danger btn-user btn-block'>


    //                                          <div class='form-group'>
    //                                             <input type='hidden' name='accion' class='form-control form-control-user'
    //                                                 value='eliminarPrestamo'>
    //                                         </div>


?>