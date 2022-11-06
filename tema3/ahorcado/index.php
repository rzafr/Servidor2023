<?php session_start();
    //session_destroy();
?>
<?php
    
    include('./cabecera.php');
    include("./lib.php");

    // Si no se ha iniciado sesion pintamos el boton de iniciar juego
    if (!isset($_SESSION['palabra'])) {
        echo "<div class='row justify-content-center'>";
            echo "<div class='col-6 justify-content-center'>";
                echo "<img class='mx-auto d-block' src='./img/inicio.jpg' alt='' width='400' height='400'>";
            echo "</div>";
        echo "</div>";
        pintarBoton();
    } 
    
    // Acciones con GET
    if (isset($_GET['accion'])) {
        // Cuando se inicializa el juego se pinta el dibujo y el juego
        if ($_GET['accion'] == "jugar") {
            pintarDibujo();
            pintarJuego();
        }

        // Cuando se gana cambiamos el dibujo, se destruye sesion y se ofrece iniciar juego
        if ($_GET['accion'] == "ganar") {
            echo "<div class='row justify-content-center'>";
                echo "<div class='col-6 justify-content-center'>";
                    echo "<img class='mx-auto d-block' src='./img/victoria.jpg' alt='' width='400' height='400'>";
                echo "</div>";
            echo "</div>";
            echo "<h3 style='text-align:center'>¡Enhorabuena has ganado!</h3>";
            echo "<div class='row justify-content-center'>";
                echo "<div class='col-6'>";
                    echo "<h3 style='text-align:center'>".$_SESSION['palabraActual']."</h3>";
                echo "</div>";
            echo "</div>";
            session_destroy();
            pintarBoton();
        }
    }

    // Errores con GET
    if (isset($_GET['error'])) {
        // Si se introduce una letra repetida se muestra mensaje de error
        if ($_GET['error'] == "letraRepetida") {
            // Pintamos el dibujo del ahorcado
            pintarDibujo();
            echo "<div class='row mt-3 justify-content-center'>";
                echo "<div class='col-6'>";
                    echo "<p class='text-danger'>Letra repetida. Por favor, introduce otra letra</p><br/>";
                echo "</div>";
            echo "</div>";
            pintarJuego();
        }

        // Se va cambiando el dibujo en funcion del numero de fallos
        if ($_GET['error'] == "fallo") {
            pintarDibujo();
            pintarJuego();
        }

        // Si se alcanza el limite de fallos se termina la partida
        if ($_GET['error'] == "limiteFallos") {
            pintarDibujo();
            echo "<h3 style='text-align:center'>Has perdido</h3>";
            echo "<h3 style='text-align:center'>La palabra era: ".strtoupper($_SESSION['palabra'])."</h3>";
            session_destroy();
            pintarBoton();
        }
    }
    
    include('./pie.php');
    
?>