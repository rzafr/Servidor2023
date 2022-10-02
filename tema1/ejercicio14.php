<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h1>TEMA 1</h1>
            <h2>PRÁCTICA 1</h2>
            <h3>EJERCICIO 14</h3>
            
            <?php
              
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

                echo "-------------------------";


                // Mostramos las notas en orden descendente por nombre
                array_multisort(array_column($notasAlumnos,"nombre"), SORT_DESC, array_column($notasAlumnos,"nota"), $notasAlumnos);

                foreach($notasAlumnos as $valor) {
                    echo $valor["nombre"] . " - " . $valor["materia"] . " - " . $valor["nota"] . "<br>";
                }   

                // Mostramos la nota media del curso
                echo array_sum(array_column($notasAlumnos,"nota")) / count($notasAlumnos);

                // Mostramos el número de alumnos suspensos
                function suspenso($nota) {
                    return $nota<5;
                }
                echo "<br>";
                echo count(array_filter(array_column($notasAlumnos,"nota"),"suspenso"));



            //   foreach ($notasAlumnos as $clave => $valor) {
            //       $aux[$clave] = $valor[2];
            //   }

            //   array_multisort($aux, SORT_DESC, $notasAlumnos);

            //   //Ordenar las notas por nombre
            //   //array_multisort(array_column($notas,"nombre"),SORT_DESC,array_column($notas, "nota"), $notas)

            //   foreach ($notasAlumnos as $clave => $valor) {
            //       echo $valor[0].' '.$valor[1].' '.$valor[2].'<br/>';//No coge las materiasssssssssssssssssssss
            //   }

            //   foreach ($notasAlumnos as $clave => $valor) {
            //       $aux[$clave] = $valor[2];
            //   }

            //   array_multisort($aux, SORT_ASC, $notasAlumnos);

             
            // // mostrar las notas ordenadas en orden descendente por alumno


            // echo array_sum(array_column($notas, "nota")) / count($notas);

            //Probar array_filter para ver los suspensos haciendolo con funcion (se le pasa el nombre de la función como parametro aunque
            //esto es antiguo)

            ?>

        </div>
	  </div>
    </div>

<?php
    include_once("../pie.php");
?>