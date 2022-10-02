<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h1>TEMA 1</h1>
            <h2>PRÁCTICA 1</h2>
            <h3>EJERCICIO 4</h3>

            <?php

                $a = 3; $b = 5; $c = 1;
                
                echo "Ecuación de 2º grado: " . $a . "x2 + " . $b . "x + " . $c . " = 0<br>";

                $solucion1 = (-$b + sqrt(pow($b, 2) - 4*$a*$c)) / 2*$a;
                $solucion2 = (-$b - sqrt(pow($b, 2) - 4*$a*$c)) / 2*$a;

                if ((pow($b, 2) - 4*$a*$c) > 0) {
                    echo "La primera solución es: " . round($solucion1, 2) . "<br>";
                    echo "La segunda solución es: " . round($solucion2, 2);
                } else if ((pow($b, 2) - 4*$a*$c) == 0) {
                    echo "La solución es: " . (-$b / 2*$a);
                } else {
                    echo "No existen soluciones";
                }

            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>