<?php
    echo "Primer ejemplo";

    // Hacer una tabla 5x3 desde php y rellenarla con:
    // 1 2 3
    // 4 5 6
    // 7 8 9
    // 10 11 12
    // 13 14 15

    echo "<table>";
    $contador = 1;
    for($i=0; $i<5; $i++) {
        echo "<tr>";

        for($j=0; $j<3; $j++) {
            echo "<td>" . $contador . " </td>";
            $contador++;
        }
        echo "</tr>";
    }

    echo "</table>";

    
?>