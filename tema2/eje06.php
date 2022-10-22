<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 2 - EJERCICIO 6</h3>

            <?php

                function subtotal($linea_pedido) {
                    if ($linea_pedido["iva_r"] == 0) {
                        $linea_pedido["precio_iva"] = round($linea_pedido["precio"] * $linea_pedido["cant"] * 1.21, 2);
                    } else if ($linea_pedido["iva_r"] == 1) {
                        $linea_pedido["precio_iva"] = round($linea_pedido["precio"] * $linea_pedido["cant"] * 1.10, 2);
                    }
                    return $linea_pedido;
                }

                $carrito = array(
                                array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0),
                                array("id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0),
                                array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1)
                            );

                // Para cada línea del carrito calculamos el subtotal
                foreach ($carrito as $valor) {
                    $carrito_iva[] = subtotal($valor);
                }
               
                // Pintamos los productos
                echo "<table class='table table-success table-striped'>";
                    echo "<thead>";
                        echo "<tr>";
                            foreach(array_keys($carrito_iva[0]) as $valor)
                                echo "<td>".strtoupper($valor)."</td>";
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                        foreach($carrito_iva as $valor) {
                            echo "<tr>";
                                echo "<td>" . $valor['id'] . "</td>";
                                echo "<td>" . $valor['nombre'] . "</td>";
                                echo "<td>" . $valor['precio'] . "</td>";
                                echo "<td>" . $valor['cant'] . "</td>";
                                echo "<td>";
                                    if ($valor["iva_r"] == 0) {
                                        echo "21%";
                                    } else {
                                        echo "10%";
                                    }
                                echo "</td>";
                                echo "<td>" . $valor['precio_iva'] . " €</td>";
                            echo "</tr>";
                        }
                    echo "</tbody>";
                    echo "<tfoot>";
                        echo "<tr>";
                            echo "<td colspan='5'>TOTAL</td>";
                            echo "<td>" . array_sum(array_column($carrito_iva,"precio_iva")) . " €</td>";
                        echo "</tr>";
                    echo "</tfoot>";
                echo "</table>";

            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>