<?php

    class VistaPartida {

        /**
         * Pinta el inicio del juego
         */
        public static function renderInicio() {

            include("./vistas/cabecera.php");

            echo "<div class='row justify-content-center'>
                    <div class='col-12'>
                        <img class='img-fluid' src='./vistas/img/logo.png' alt='BlackJack'>
                    </div>
                </div>
                <div class='row justify-content-center'>
                    <div class='d-grid gap-2 col-2 mx-auto position-relative posicion'>
                        <a href='enrutador.php?accion=nuevaPartida' type='button' class='btn btn-lg btn-warning text-white'>Nueva partida</a>
                    </div>
                </div>";

            include("./vistas/pie.php");
            
        }

        /**
         * Pinta la partida nueva
         */
        public static function renderPartida() {
            
            include("./vistas/cabecera.php");

            $partida = unserialize($_SESSION['partida']);
            $manoCrupier = $partida->getCrupier()->getMano();

            echo "<div class='mesa'>
                    <div class='row justify-content-center align-items-center'>
                        <div class='col-2 mt-5 text-warning'>
                            <p class='h2 bg-success'>".$manoCrupier[0]->getValor()." Crupier</p>
                        </div>
                        <div class='col-9 mt-5'>
                            <img src='./vistas/img/".$manoCrupier[0]."' width='150px' height='200px'>
                            <img class='dibujo' src='./vistas/img/dibujo.png' width='150px' height='200px'>
                        </div>
                    </div>
                    <div class='row mt-5 justify-content-center'>
                        <div class='col-5 text-info'>
                        <p class='h2 visually-hidden'>Oculto</p>";
                    echo "</div>
                    </div>
                    <div class='row mt-5 justify-content-center'>
                        <div class='col-2 text-warning'>
                            <p class='h2 bg-success'>".$partida->getJugador()->valorMano()." Jugador</p>
                        </div>
                        <div class='col-9'>";
                            $manoJugador = $partida->getJugador()->getMano();
                            foreach ($manoJugador as $carta) {
                                echo "<img src='./vistas/img/".$carta."' width='150px' height='200px'>";
                            }
                        echo "</div>
                    </div>
                    <div class='row mt-5 justify-content-center'>
                        <div class='col-2 mx-3'>
                            <a href='enrutador.php?accion=nuevaPartida' type='button' class='btn btn-lg btn-warning text-white'>Nueva partida</a>
                        </div>
                        <div class='col-2 mx-3'>
                            <a href='enrutador.php?accion=plantarse' type='button' class='btn btn-lg btn-warning text-white'>Plantarse</a>
                        </div>
                        <div class='col-2 mx-3'>
                            <a href='enrutador.php?accion=pedirCarta' type='button' class='btn btn-lg btn-warning text-white'>Pedir carta</a>
                        </div>
                    </div>
                </div>";

            include("./vistas/pie.php");
        }

        /**
         * Pinta el final del juego
         */
        public static function renderFinPartida() {
            
            include("./vistas/cabecera.php");

            $partida = unserialize($_SESSION['partida']);
            $manoCrupier = $partida->getCrupier()->getMano();

            echo "<div class='mesa'>
                    <div class='row justify-content-center align-items-center'>
                        <div class='col-2 mt-5 text-warning'>
                            <p class='h2 bg-success'>".$partida->getCrupier()->valorMano()." Crupier</p>
                        </div>
                        <div class='col-9 mt-5'>";
                            foreach ($manoCrupier as $carta) {
                                echo "<img src='./vistas/img/".$carta."' width='150px' height='200px'>";
                            }
                        echo "</div>
                    </div>
                    <div class='row mt-4 justify-content-center'>
                        <div class='col-5 text-info'>
                            <p class='h2'>".$_SESSION['resultado']."</p>
                        </div>
                    </div>
                    <div class='row mt-4 justify-content-center'>
                        <div class='col-2 text-warning'>
                            <p class='h2 bg-success'>".$partida->getJugador()->valorMano()." Jugador</p>
                        </div>
                        <div class='col-9'>";
                            $manoJugador = $partida->getJugador()->getMano();
                            foreach ($manoJugador as $carta) {
                                echo "<img src='./vistas/img/".$carta."' width='150px' height='200px'>";
                            }
                        echo "</div>
                    </div>
                    <div class='row mt-5 justify-content-center'>
                        <div class='col-2 mx-3'>
                            <a href='enrutador.php?accion=nuevaPartida' type='button' class='btn btn-lg btn-warning text-white'>Nueva partida</a>
                        </div>
                        <div class='col-2 mx-3'>
                            <a href='enrutador.php?accion=plantarse' type='button' class='btn btn-lg btn-warning text-white'>Plantarse</a>
                        </div>
                        <div class='col-2 mx-3'>
                            <a href='enrutador.php?accion=pedirCarta' type='button' class='btn btn-lg btn-warning text-white'>Pedir carta</a>
                        </div>
                    </div>
                </div>";

            include("./vistas/pie.php");
        }
    }

?>