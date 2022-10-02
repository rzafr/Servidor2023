<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h1>TEMA 1</h1>
            <h2>PRÁCTICA 1</h2>
            <h3>EJERCICIO 2</h3>

            <?php

                $cadena1 = "Hola a todo el mundo";
                $cadena2 = "mi nombre es Rubén Zafra Ramírez";

                echo $cadenn3 = $cadena1 . " " . $cadena2;
                echo "<br>";
                echo $cadena1 = $cadena1 . " " . $cadena2;

            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>