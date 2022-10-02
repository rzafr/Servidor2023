<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h1>TEMA 1</h1>
            <h2>PRÁCTICA 1</h2>
            <h3>EJERCICIO 13</h3>
            
            <?php

                // Añade n elementos a la cola pasada por referencia
                function addCola(&$cola, $num, $elem) {
                    for($i=0; $i<$num; $i++) {
                        array_push($cola, $elem);
                    }
                }

                // Elimina n elementos del principio de la cola pasada por referencia
                function delCola(&$cola, $num) {
                    for($i=0;$i<$num; $i++) {
                        array_shift($cola);
                    }
                }

                // Vacía la cola pasada por referencia
                function vaciarCola(&$cola) {
                    $cola = array();
                }

                // Pintamos la cola
                function pintarCola($cola) {
                    for($i=0; $i<count($cola); $i++) {
                        echo $cola[$i] . " ";
                    }
                    echo "<br>";
                }

                $colaF = [];

                // Añadimos 5 nueves al array
                addCola($colaF, 5, 9);
                // Pintamos el array
                pintarCola($colaF);
               
                // Añadimos 4 sietes al array
                addCola($colaF, 4, 7);
                // Pintamos el array
                pintarCola($colaF);
                
                // Eliminamos los 3 primeros elementos del array
                delCola($colaF, 3);
                // Pintamos el array
                pintarCola($colaF);
                
                // Vaciamos el array
                vaciarCola($colaF);
                // Pintamos el array
                pintarCola($colaF);

            ?>

        </div>
	  </div>
    </div>

<?php
    include_once("../pie.php");
?>