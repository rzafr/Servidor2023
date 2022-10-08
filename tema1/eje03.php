<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 1 - EJERCICIO 3</h3>

            <?php

                $radio = rand(2, 10);

                echo "Radio del círculo = " . $radio . " metros<br>";
                echo "Volumen de una esfera de ese radio = " . round($volumen = (4 / 3) * pi() * pow($radio, 3), 2) . " metros cúbicos";

            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>