<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 1 - EJERCICIO 5</h3>

            <?php

                // Función que devuelve una variable con los números del 0 al 9 en letra
                function unidades($num) {
                    $unidad = " ";
                    switch ($num) {
                        case 0:
                            $unidad = "cero";
                            break;
                        case 1:
                            $unidad = "uno";
                            break;
                        case 2:
                            $unidad = "dos";
                            break;
                        case 3:
                            $unidad = "tres";
                            break;
                        case 4:
                            $unidad = "cuatro";
                            break;
                        case 5:
                            $unidad = "cinco";
                            break;
                        case 6:
                            $unidad = "seis";
                            break;
                        case 7:
                            $unidad = "siete";
                            break;
                        case 8:
                            $unidad = "ocho";
                            break;
                        case 9:
                            $unidad = "nueve";
                            break;
                        default:
                            $unidad = " ";
                    }
                    return $unidad;
                }

                // Función que devuelve una variable con los números del 10 al 20 en letra
                function decenasHastaVeinte($num1, $num2) {
                    $decena = " ";
                    if ($num1 < 16) {
                        switch ($num1) {
                            case 10:
                                $decena = "diez";
                                break;
                            case 11:
                                $decena = "once";
                                break;
                            case 12:
                                $decena = "doce";
                                break;
                            case 13:
                                $decena = "trece";
                                break;
                            case 14:
                                $decena = "catorce";
                                break;
                            case 15:
                                $decena = "quince";
                                break;
                            default:
                                $decena = " ";
                        }
                    } else if ($num1 == 20) {
                        $decena = "veinte";
                    } else {
                        $decena = "dieci" . unidades($num2);
                    }
                    return $decena;
                }

                // Función que devuelve una variable con las decenas de los números del 21 al 90 en letra
                function decenas($num) {
                    $decena = " ";
                    switch ($num) {
                        case 2:
                            $decena = "veinti";
                            break;
                        case 3:
                            $decena = "treinta";
                            break;
                        case 4:
                            $decena = "cuarenta";
                            break;
                        case 5:
                            $decena = "cincuenta";
                            break;
                        case 6:
                            $decena = "sesenta";
                            break;
                        case 7:
                            $decena = "setenta";
                            break;
                        case 8:
                            $decena = "ochenta";
                            break;
                        case 9:
                            $decena = "noventa";
                            break;
                        default:
                            $decena = " ";
                    }
                    return $decena;
                }

                $numero = rand(0, 99);

                $unidades = $numero % 10;
                $decenas = intval($numero / 10);

                echo $numero . " -> ";

                if ($numero < 10) {
                    echo unidades($numero);
                } else if (($numero >= 10) && ($numero <= 20)) {
                    echo decenasHastaVeinte($numero, $unidades);
                } else if ($numero < 30) {
                    echo decenas($decenas) . unidades($unidades);
                } else if ($unidades == 0) {
                    echo decenas($decenas);
                } else {
                    echo decenas($decenas) . " y " . unidades($unidades);
                }

            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>