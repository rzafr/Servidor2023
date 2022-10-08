<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 1 - EJERCICIO 8</h3>

            <?php

                // Sacamos la combinación

                $combinacion = [];

                do {
                    $bola = rand(1, 49);
                    if (!in_array($bola, $combinacion))
                        $combinacion[] = $bola;
                } while (count($combinacion) < 7);

                // Sacamos el complementario

                $complementario = array_pop($combinacion);

                // Ordenamos el array

                sort($combinacion, SORT_NUMERIC);

                echo "Combinación ganadora: ";
                
                for ($i=0; $i<count($combinacion); $i++) {
                        echo $combinacion[$i] . " ";
                }

                echo "<br>";
                
                echo "Complementario: " . $complementario . "<br>";

                echo "Reintegro: " . rand(0, 9);

            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>