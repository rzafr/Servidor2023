<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 1 - EJERCICIO 14</h3>
            
            <?php

                // Muestra el número de alumnos suspensos para usar con array_filter
                function suspenso($nota) {
                    return $nota < 5;
                }
              
                $notasAlumnos = array(
                    array("nombre" => "Marcos", "materia" => "Matemáticas", "nota" => 6),
                    array("nombre" => "Marcos", "materia" => "Física", "nota" => 4),
                    array("nombre" => "Cristina", "materia" => "Matemáticas", "nota" => 8),
                    array("nombre" => "Cristina", "materia" => "Física", "nota" => 6),
                    array("nombre" => "Luis", "materia" => "Matemáticas", "nota" => 4),
                    array("nombre" => "Luis", "materia" => "Física", "nota" => 3),
                    array("nombre" => "Alfonso", "materia" => "Matemáticas", "nota" => 5),
                    array("nombre" => "Alfonso", "materia" => "Física", "nota" => 7),
                    array("nombre" => "María", "materia" => "Matemáticas", "nota" => 10),
                    array("nombre" => "María", "materia" => "Física", "nota" => 6)
                );

                // Mostramos las notas ordenadas en orden descendente por alumno
                array_multisort(array_column($notasAlumnos,"nota"), SORT_DESC, array_column($notasAlumnos,"nombre"), SORT_ASC, $notasAlumnos);

                echo "Notas ordenadas en orden descendente por alumno:<br>";
                foreach($notasAlumnos as $valor) {
                    echo $valor["nombre"] . " - " . $valor["materia"] . " - " . $valor["nota"] . "<br>";
                }   

                // Mostramos las notas ordenadas en orden descendente por nombre
                array_multisort(array_column($notasAlumnos,"nombre"), SORT_ASC, array_column($notasAlumnos,"nota"), SORT_DESC, $notasAlumnos);

                echo "<br>Notas ordenadas en orden descendente por nombre de asignatura:<br>";
                foreach($notasAlumnos as $valor) {
                    echo $valor["nombre"] . " - " . $valor["materia"] . " - " . $valor["nota"] . "<br>";
                }   

                // Mostramos la nota media del curso
                echo "<br>La media del curso es: " . array_sum(array_column($notasAlumnos,"nota")) / count($notasAlumnos);

                // Mostramos el número de alumnos suspensos
                echo "<br>El número de alumnos suspensos es: " . count(array_filter(array_column($notasAlumnos,"nota"),"suspenso"));

            ?>

        </div>
	  </div>
    </div>

<?php
    include_once("../pie.php");
?>