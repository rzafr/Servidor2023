<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 2 - EJERCICIO 1</h3>

            <?php

                // Pinta el array
                function pintarArray($nombres) {
                    for($i=0; $i<count($nombres); $i++) {
                        echo $nombres[$i] . " ";
                    }
                    echo "</br></br>";
                }

                // Transforma todos los strings del array según la opción pasada por parámetro y lo devuelve
                function convierteClientes($nombres, $opcion) {
                    switch($opcion) {
                        case "L":
                            // Transforma todos los strings del array $nombres a minúsculas
                            for ($i=0; $i<count($nombres); $i++) {
                                $nombres[$i] = strtolower($nombres[$i]);
                            }
                            break;
                        case "U":
                            // Transforma todos los strings del array $nombres a mayúsculas
                            for ($i=0; $i<count($nombres); $i++) {
                                $nombres[$i] = strtoupper($nombres[$i]);
                            }
                            break;
                        case "M":
                            // Transforma todos los strings del array $nombres de modo que la primera letra 
                            // de cada nombre de empresa sea mayúscula y el resto minúscula
                            for ($i=0; $i<count($nombres); $i++) {
                                $nombres[$i] = ucfirst($nombres[$i]);
                            }
                            break;
                        default:
                            echo "Opción incorrecta";
                    }
                    return $nombres;
                }

                $clientes = ["Cosentino", "Garciden", "Deretil", "Makito", "Globomatik"];

                echo "Todos los strings del array en minúsculas:<br>";
                pintarArray(convierteClientes($clientes, "L"));

                echo "Todos los strings del array en mayúsculas:<br>";
                pintarArray(convierteClientes($clientes, "U"));

                echo "Todos los strings del array. La primera letra mayúscula y el resto minúscula:<br>";
                pintarArray(convierteClientes(convierteClientes(convierteClientes($clientes, "U"), "L"), "M"));

            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>