<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 2 - EJERCICIO 2</h3>

            <?php

                // Pinta el array parado como parámetro
                function pintarArray($nombres) {
                    for($i=0; $i<count($nombres); $i++) {
                        echo $nombres[$i] . " ";
                    }
                    echo "</br></br>";
                }

                $direccionIp = "192.168.11.200";

                $digitos = explode(".", $direccionIp);

                echo "Dígitos por separado: ";
                pintarArray($digitos);

                echo "Dígitos separados por dos puntos: ";
                echo implode(":", $digitos);

            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>