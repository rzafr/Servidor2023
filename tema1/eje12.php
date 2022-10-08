<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 1 - EJERCICIO 12</h3>
            
            <?php
              
              $diccionario = array(
                    "Rojo" => "Red", "Azul" => "Blue", "Amarillo" => "Yellow", "Verde" => "Green", "Negro" => "Black",
                    "Blanco" => "White", "Gris" => "Grey", "Rosa" => "Pink", "Morado" => "Purple", "Marrón" => "Brown",
                    "Naranja" => "Orange", "Celeste" => "Light blue", "Fucsia" => "Fuchsia", "Dorado" => "Golden", "Plateado" => "Silver",
                    "Magenta" => "Magenta", "Beige" => "Beige", "Marfil" => "Ivory", "Azul marino" => "Navy blue", "Violeta" => "Violet"
              );

              $palabra = "Azul";

              if (array_key_exists($palabra, $diccionario)) {
                    echo $palabra . " se dice " . $diccionario[$palabra] . " en inglés<br><br>";
              } else {
                    echo "La palabra " . $palabra . " no está en el diccionario<br><br>";
              }

              ksort($diccionario);
              
              $clavesOrdenadas = array_keys($diccionario);

              echo "Diccionario ordenado en español:<br>";

              foreach ($clavesOrdenadas as $clavesOrdenadas) {
                    echo $clavesOrdenadas . "<br>";
              }
            ?>

        </div>
	  </div>
    </div>

<?php
    include_once("../pie.php");
?>