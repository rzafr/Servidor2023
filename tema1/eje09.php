<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

      <div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">

            <h2>TEMA 2: PROGRAMACIÓN ESTRUCTURADA PHP</h2>
            <h3>PRÁCTICA 1 - EJERCICIO 9</h3>

            <?php
               
                for($i=0; $i<5; $i++) {
                
                    $color = 'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')';

                    echo '<svg height="100" width="100">';
                    echo '<circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="'.$color.'" />';
                    echo '</svg>';
        
               }
            ?>

        </div>
	  </div>
    </div> 

<?php
    include_once("../pie.php");
?>