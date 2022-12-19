<?php

    class VistaJugadores {

        public static function render($partida) {

            include("./vistas/cabecera.php");

            // Pintamos los cards de los jugadores
            echo '<div class="row">';
                    echo '<div class="col-4 ms-4 my-4">
                        <div class="card shadow-sm">
                                <div class="card-body">
                                  <p class="card-text">Jugador 1:'.$partida->getJugadores()[0].'</p>
                                  <p class="card-text">Jugador 2:'.$partida->getJugadores()[1].'</p>
                                  <p class="card-text">Jugador 3:'.$partida->getJugadores()[2].'</p>
                                  <p class="card-text">Jugador 4:'.$partida->getJugadores()[3].'</p>
                              </div>
                        </div>
                    </div>';
            echo "</div>";

            include("./vistas/pie.php");
        }

    }

?>