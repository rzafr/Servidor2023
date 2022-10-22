<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 2 - EJERCICIO 4</h3>

            <?php

                // Devuelve el mensaje cifrado sustituyendo los espacios en blanco del final de palabra y 
                // cada letra del mensaje por la correspondiente según la clave
                // Las funciones ord() y chr() se usan para convertir entre caracteres y código ASCII y viceversa
                function encriptar($mensajeI, $clave) {
                    $mensajeC = "";
                    for ($i=0; $i<strlen($mensajeI); $i++) {
                        $str[$i] = ord($mensajeI[$i]) + $clave;
                        $mensajeC .= chr($str[$i]);
                    }
                    return $mensajeC;
                }

                // Descifra el mensaje encriptado, sustituyendo los caracteres según la clave
                function desencriptar($mensajeC, $clave) {
                    $mensajeF = "";
                    for ($i=0; $i<strlen($mensajeC); $i++) {
                        $str[$i] = ord($mensajeC[$i]) - $clave;
                        $mensajeF .= chr($str[$i]);
                    }
                    return $mensajeF;
                }

                $mensajeInicial = "Hola Mundo";
                $clave = 2;

                echo "Mensaje inicial: " . $mensajeInicial . "<br>";

                $mensajeCifrado = encriptar($mensajeInicial, $clave);

                echo "Mensaje encriptado: " . $mensajeCifrado . "<br>";

                $mensajeFinal = desencriptar($mensajeCifrado, $clave);

                echo "Mensaje desencriptado: " . $mensajeFinal;

            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>