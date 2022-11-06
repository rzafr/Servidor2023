<?php

    /**
     * Pinta el botón de inicio de partida
     */
    function pintarBoton() {
        echo "<div class='row mt-3 justify-content-center'>";
            echo "<div class='col-2'>";
                echo "<a href='controlador.php?accion=inicio' class='btn btn-primary d-block mx-auto'>Iniciar juego</a>";
            echo "</div>";
        echo "</div>";
    }

    /**
     * Pinta el dibujo del juego
     */
    function pintarDibujo() {
        echo "<div class='row justify-content-center'>";
            echo "<div class='col-6 justify-content-center'>";
                if ($_SESSION['fallos'] == 0)
                    echo "<img class='mx-auto d-block' src='./img/inicio.jpg' alt='' width='400' height='400'>";
                if ($_SESSION['fallos'] == 1)
                    echo "<img class='mx-auto d-block' src='./img/cabeza.jpg' alt='' width='400' height='400'>";
                else if ($_SESSION['fallos'] == 2)
                    echo "<img class='mx-auto d-block' src='./img/cuerpo.jpg' alt='' width='400' height='400'>";
                else if ($_SESSION['fallos'] == 3)
                    echo "<img class='mx-auto d-block' src='./img/brazo_d.jpg' alt='' width='400' height='400'>";
                else if ($_SESSION['fallos'] == 4)
                    echo "<img class='mx-auto d-block' src='./img/brazo_i.jpg' alt='' width='400' height='400'>";
                else if ($_SESSION['fallos'] == 5)
                    echo "<img class='mx-auto d-block' src='./img/pierna_i.jpg' alt='' width='400' height='400'>";
                else if ($_SESSION['fallos'] == 6)
                    echo "<img class='mx-auto d-block' src='./img/pierna_d.jpg' alt='' width='400' height='400'>";
            echo "</div>";
        echo "</div>";
    }


    /**
     * Pinta el teclado para introducir las letras y la palabra actual
     */
    function pintarJuego() {
        echo "<div class='row justify-content-center'>";
            echo "<div class='col-6'>";
                echo "<h3 style='text-align:center'>".$_SESSION['palabraActual']."</h3>";
            echo "</div>";
        echo "</div>";
        echo "<div class='row mt-3 justify-content-center'>";
            echo "<div class='col-6'>";
                echo "<div class='row justify-content-center'>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=q' class='btn btn-primary'>Q</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=w' class='btn btn-primary'>W</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=e' class='btn btn-primary'>E</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=r' class='btn btn-primary'>R</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=t' class='btn btn-primary'>T</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=y' class='btn btn-primary'>Y</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=u' class='btn btn-primary'>U</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=i' class='btn btn-primary'>I</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=o' class='btn btn-primary'>O</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=p' class='btn btn-primary'>P</a>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
        echo "<div class='row mt-3 justify-content-center'>";
            echo "<div class='col-6'>";
                echo "<div class='row justify-content-center'>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=a' class='btn btn-primary'>A</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=s' class='btn btn-primary'>S</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=d' class='btn btn-primary'>D</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=f' class='btn btn-primary'>F</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=g' class='btn btn-primary'>G</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=h' class='btn btn-primary'>H</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=j' class='btn btn-primary'>J</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=k' class='btn btn-primary'>K</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=l' class='btn btn-primary'>L</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=ñ' class='btn btn-primary'>Ñ</a>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
        echo "<div class='row mt-3 justify-content-center'>";
            echo "<div class='col-6'>";
                echo "<div class='row justify-content-center'>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=z' class='btn btn-primary'>Z</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=x' class='btn btn-primary'>X</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=c' class='btn btn-primary'>C</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=v' class='btn btn-primary'>V</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=b' class='btn btn-primary'>B</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=n' class='btn btn-primary'>N</a>";
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo "<a href='controlador.php?letra=m' class='btn btn-primary'>M</a>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";

    }

?>
