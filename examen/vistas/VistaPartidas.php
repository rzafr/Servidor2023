<?php

    class VistaPartidas {

        /**
         * Muestra la tabla de partidas
         */
        public static function mostrarPartidas($partidas) {

            include("./vistas/cabecera.php");

            echo "<div class='row justify-content-end p-3'>";
                echo "<div class='col-2'>";
                    echo "<form action='enrutador.php' method='get'>";
                        echo "<input type='text' name='buscadorFecha' class='form-control' placeholder='Buscar por fecha'>";
                echo "</div>";
                echo "<div class='col-2'>";
                        echo "<input type='submit' name='buscarFecha' value='Buscar' class='form-control btn btn-success'>";
                    echo "</form>";
                echo "</div>";
                echo "<div class='col-2'>";
                    echo "<form action='enrutador.php' method='get'>";
                        echo "<input type='text' name='buscadorCiudad' class='form-control' placeholder='Buscar por ciudad'>";
                echo "</div>";
                echo "<div class='col-2'>";
                        echo "<input type='submit' name='buscarCiudad' value='Buscar' class='form-control btn btn-success'>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            
            
            echo '<div class="card shadow mb-4 mt-5">
                    <div class="card-body">';
                        echo '<div class="table-responsive">';
                        echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Ciudad</th>
                                    <th>Lugar</th>
                                    <th>Cubierta</th>
                                    <th>Estado</th>
                                    <th colspan='2'>Acciones</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                            foreach($partidas as $partida) {
                                echo "<tr>";
                                    echo "<td>".$partida->getFecha()."</td>
                                        <td>".$partida->getHora()."</td>
                                        <td>".$partida->getCiudad()."</td>
                                        <td>".$partida->getLugar()."</td>
                                        <td>";
                                            if ($partida->getCubierta() == 1)
                                                echo "Si";
                                            else
                                                echo "No";
                                        echo "</td>
                                        <td>".$partida->getEstado()."</td>
                                        <td>
                                            <a class='btn btn-outline-success' href='./enrutador.php?accion=mostrarJugadores&id=".$partida->getId()."' role='button'>
                                                Info
                                            </a>
                                        </td>
                                        <td>
                                            <a class='btn btn-danger' href='./enrutador.php?accion=eliminarPartida&id=".$partida->getId()."' role='button'>
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