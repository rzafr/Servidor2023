<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h1>TEMA 1</h1>
            <h2>PRÁCTICA 1</h2>
            <h3>EJERCICIO 1</h3>

            <?php

                $primera = rand(1, 100);
                $segunda = rand(1, 100);

                echo "Variable primera = " . $primera . "<br>";
                echo "Variable segunda = " . $segunda . "<br>";

                $resta = $primera - $segunda;
                $cociente = $primera / $segunda;

                echo "La diferencia de la primera menos la segunda es: " . $resta . "<br>";
                echo "La división de la primera entre la segunda es: " . $cociente . "<br>";

                // La función de generar números aleatorios rand()
                // Genera un número entero aleatorio
                // Si se invoca sin los argumentos opcionales min y max, rand() devuelve un entero pseudoaleatorio entre 0 y getrandmax()
                // Para obtener un número aleatorio entre 5 y 15 (incluidos), por ejemplo, use rand(5, 15)

            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>