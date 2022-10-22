<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 2 - EJERCICIO 3</h3>

            <?php

                // Pinta el array
                function pintarArray($nombres) {
                    for($i=0; $i<count($nombres); $i++) {
                        echo $nombres[$i] . " ";
                    }
                    echo "<br>";
                }

                $word_list_en = ["house", "green", "the", "windows", "has", "are", "and", "my", "a", "white",
                                "car", "red", "rooms", "three", "puerta", "big", "blue", "yellow", "cat", "dog",
                                "table", "kitchen", "one", "two", "four", "five", "six", "seven", "eight", "nine",
                                "ten", "a", "the", "in", "where", "with", "without", "I", "have", "is",
                                "laptop", "black", "city", "weather", "is", "sunny", "hot", "rains", "few", "street"];

                $word_list_es = ["casa", "verdes", "las", "ventanas", "tiene", "son", "y", "mi", "una", "blanca",
                                "coche", "rojo", "habitaciones", "tres", "door", "grande", "azul", "amarillo", "gato", "perro",
                                "mesa", "cocina", "uno", "dos", "cuatro", "cinco", "seis", "siete", "ocho", "nueve",
                                "diez", "un", "el", "en", "donde", "con", "sin", "yo", "tengo", "es",
                                "portátil", "negro", "ciudad", "clima", "está", "soleado", "cálido", "llueve", "poco", "calle"];

                echo "Frase a traducir:</br>";
                echo $frase = "mi casa es blanca las ventanas son verdes y está en una ciudad donde
                                el clima es cálido soleado y llueve poco";

                $palabras = explode(" ", $frase);

                for ($i=0; $i<count($palabras); $i++) {
                    // Comprobamos si la primera palabra está en español para traducir al inglés
                    if (in_array($palabras[$i], $word_list_es)) {
                        for ($j=0; $j<count($word_list_es); $j++) {
                            if ($word_list_es[$j] == $palabras[$i]) {
                                $traduccion[] = $word_list_en[$j];
                            }
                        }
                    // Comprobamos si la primera palabra está en inglés para traducir al español
                    } else if (in_array($palabras[$i], $word_list_en)) {
                        for ($j=0; $j<count($word_list_en); $j++) {
                            if ($word_list_en[$j] == $palabras[$i]) {
                                $traduccion[] = $word_list_es[$j];
                            }
                        }
                    }
                }

                echo "</br></br>Frase traducida:</br>";
                echo implode(" ", $traduccion);

            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>