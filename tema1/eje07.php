<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 1 - EJERCICIO 7</h3>

            <?php

                $numeros = array(rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10));
                
                for ($i=0; $i<count($numeros); $i++) {
                    echo "<div style='float:left; margin-right:60px'>";
                    echo "Tabla del " . $numeros[$i] . "<br>"; 
                    for ($j = 1; $j<=10; $j++) {
                        echo $numeros[$i] . " x " . $j . " = " . $numeros[$i] * $j . "<br>";
                    }
                    echo "<br>";
                    echo "</div>";
                }
                
            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>