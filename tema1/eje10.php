<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h1>TEMA 1</h1>
            <h2>PRÁCTICA 1</h2>
            <h3>EJERCICIO 10</h3>

            <?php
               
               $numeros = [];

               for ($i=0; $i<10; $i++) {
                    $numeros[] = $i+1;
               }

               // Pintamos el array
               echo "Los 10 primeros números naturales: ";
               for ($i=0; $i<10; $i++) {
                    echo $numeros[$i] . " ";
                }

                // Calculamos la media y pintamos los impares
                $posicion = [];
                echo "<br>Números impares: ";
                for ($i=0; $i<10; $i++) {
                    if (($i+1) % 2 == 0) {
                        $posicion[] = $numeros[$i];
                    } else if ($numeros[$i] % 2 != 0) {
                        echo $numeros[$i] . " ";
                    }
                }

                echo "<br>Media de los que están en posiciones pares: " . array_sum($posicion) / count($posicion);
            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>