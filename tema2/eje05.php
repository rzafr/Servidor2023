<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 2 - EJERCICIO 5</h3>

            <?php

                // Devuelve el mensaje cifrado sustituyendo cada letra del mensaje por la correspondiente según la clave
                // Las funciones ord() y chr() se usan para convertir entre caracteres y código ASCII y viceversa
                function encriptar($mensajeI, $clave) {
                    $mensajeC = "";
                    for ($i=0; $i<strlen($mensajeI); $i++) {
                        $str[$i] = ord($mensajeI[$i]) + $clave;
                        $mensajeC .= chr($str[$i]);
                    }
                    return $mensajeC;
                }

                // Transforma el mensaje original en un array, pone cada palabra del revés y la encripta usando encriptar()
                function encriptarV2($cadena, $clave) {
                    // El mensaje original lo dividimos en un array de palabras considerando el espacio en blanco como separador
                    $palabras = explode(" ", $cadena);

                    // Ponemos cada palabra del revés
                    for ($i=0; $i<count($palabras); $i++) {
                        $palabras[$i] = strrev($palabras[$i]);
                    }
                    
                    // Encriptamos cada palabra usando la función encriptar()
                    for ($i=0; $i<count($palabras); $i++) {
                        $palabras[$i] = encriptar($palabras[$i], $clave);
                    }
                    return implode(" ", $palabras);
                }

                // Transforma el mensaje original en un array, desencripta cada palabra usando desencriptar() y la pone del revés
                function desencriptarV2($cadena, $clave) {
                    // El mensaje cifrado lo dividimos en un array de palabras considerando el espacio en blanco como separador
                    $palabrasCifradas = explode(" ", $cadena);

                    // Desencriptamos cada palabra usando la función desencriptar()
                    for ($i=0; $i<count($palabrasCifradas); $i++) {
                        $palabrasCifradas[$i] = desencriptar($palabrasCifradas[$i], $clave);
                    }
                
                    // Volvemos a dar la vuelta a cada palabra
                    for ($i=0; $i<count($palabrasCifradas); $i++) {
                        $palabrasCifradas[$i] = strrev($palabrasCifradas[$i]);
                    }
                    return implode(" ", $palabrasCifradas);
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

                $mensajeCifrado = encriptarV2($mensajeInicial, $clave);
                echo "Mensaje encriptado: " . $mensajeCifrado . "<br>";
                echo "Mensaje desencriptado: " . desencriptarV2($mensajeCifrado, $clave);

            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>