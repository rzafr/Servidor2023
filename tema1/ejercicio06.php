<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h1>TEMA 1</h1>
            <h2>PRÁCTICA 1</h2>
            <h3>EJERCICIO 6</h3>

            <?php

                $dni = rand(10000000, 99999999);

                $resto = $dni % 23;

                $letras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");

                echo "DNI completo: " . $dni . "-" . $letras[$resto];

            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>