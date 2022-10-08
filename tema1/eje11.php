<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 1 - EJERCICIO 11</h3>
            
            <?php
               
                $numeros = [];
                $sumaFila = [];
                $sumaColumna = [];

                // Rellenamos la matriz
                for($i=0; $i<7; $i++) {
                    for($j=0; $j<7; $j++) {
                        if (($i == $j) || ($i+$j == 6)) {
                            $numeros[$i][$j] = 1;
                        } else {
                            $numeros[$i][$j] = rand(1,9);
                        }
                    // Calculamos la suma de las columnas
                    $sumaColumna[$j] = array_sum(array_column($numeros, $j));
                    }
                // Calculamos la suma de las filas
                $sumaFila[$i] = array_sum($numeros[$i]);
                }

                // Pintamos la matriz
                echo "Array 7x7 con valores numéricos aleatorios excepto las diagonales que son 1:<br>";
                for($i=0; $i<7; $i++) {
                    for($j=0; $j<7; $j++) {
                        echo $numeros[$i][$j] . " ";
                    }
                    echo "<br>";
                }

                // Mostramos el vector son las sumas de las filas
                echo "Array con la suma de las filas:<br>";
                for($i=0; $i<7; $i++) {
                    echo $sumaFila[$i] . " ";
                }

                // Mostramos el vector son las sumas de las columnas
                echo "<br>Array con la suma de las columnas:<br>";
                for($i=0; $i<7; $i++) {
                    echo $sumaColumna[$i] . " ";
                }

            ?>

        </div>
	  </div>
    </div>

<?php
    include_once("../pie.php");
?>