<?php

    class ControladorPartida {

        /**
         * Muestra el inicio del juego
         */
        public static function mostrarInicio() {
            VistaPartida::renderInicio();
        }

        /**
         * Muestra la partida
         */
        public static function nuevaPartida() {

            // Borramos las variables de sesion partida y mensaje de resultado
            // $_SESSION['partida'] = array();
            // $_SESSION['resultado'] = array();

            // Utilizamos el unset para poder dejar inactivos los botones de plantarse y pedir carta cuando la partida acaba
            unset($_SESSION['partida']);
            unset($_SESSION['resultado']);

            // Creamos objeto partida
            $partida = new Partida();

            // Repartimos dos cartas al jugador
            $partida->getJugador()->nuevaCarta($partida->getBaraja()->repartirCarta());
            $partida->getJugador()->nuevaCarta($partida->getBaraja()->repartirCarta());

            // Repartimos dos cartas al crupier
            $partida->getCrupier()->nuevaCarta($partida->getBaraja()->repartirCarta());
            $partida->getCrupier()->nuevaCarta($partida->getBaraja()->repartirCarta());

            // Metemos el objeto partida en la sesion
            $_SESSION['partida'] = serialize($partida);// Serializar y deserializar la partida cada vez que se hace una jugada

            ControladorPartida::comprobarBlackJack();
        }

        /**
         * Comprueba si el jugador ha ganado
         */
        public static function comprobarBlackJack() {
        
            $partida = unserialize($_SESSION['partida']);

            if ($partida->getJugador()->valorMano() == 21 && $partida->getCrupier()->valorMano() == 21) {
                $_SESSION['resultado'] = "¡Empate con BlackJack!";
                VistaPartida::renderFinPartida();
            } else if ($partida->getJugador()->valorMano() == 21) {
                $_SESSION['resultado'] = "¡Has ganado con BlackJack!";
                VistaPartida::renderFinPartida();
            } else {
                VistaPartida::renderPartida();
            }
                
            $_SESSION['partida'] = serialize($partida);

        }

        /**
         * Comprueba el ganador del juego
         */
        public static function comprobarGanador() {

            $partida = unserialize($_SESSION['partida']);

            // El crupier pide carta mientras tiene menos de 17 puntos
            while ($partida->getCrupier()->valorMano() <= 16) {
                $partida->getCrupier()->nuevaCarta($partida->getBaraja()->repartirCarta());
            }

            $manoJugador = $partida->getJugador()->getMano();
            $manoCrupier = $partida->getCrupier()->getMano();

            // Comprobamos las posibles combinaciones
            if ($partida->getCrupier()->valorMano() == 21 && count($manoCrupier) == 2) {
                $_SESSION['resultado'] = "¡El crupier gana con BlackJack!";
            } else if ($partida->getCrupier()->valorMano() > 21 && $partida->getJugador()->valorMano() <= 21) {
                $_SESSION['resultado'] = "¡Has ganado!";
            } else if ($partida->getJugador()->valorMano() > 21 && $partida->getCrupier()->valorMano() <= 21) {
                $_SESSION['resultado'] = "¡El crupier gana!";
            } else if ($partida->getJugador()->valorMano() > 21 && $partida->getCrupier()->valorMano() > 21) {
                $_SESSION['resultado'] = "¡Pierden los dos!";
            } else if ($partida->getJugador()->valorMano() <= 21 && $partida->getCrupier()->valorMano() <= 21) {
                if ($partida->getJugador()->valorMano() > $partida->getCrupier()->valorMano()) {
                    $_SESSION['resultado'] = "¡Has ganado!";
                } else if ($partida->getCrupier()->valorMano() > $partida->getJugador()->valorMano()) {
                    $_SESSION['resultado'] = "¡El crupier gana!";
                } else {
                    if (count($manoJugador) < count($manoCrupier)) {
                        $_SESSION['resultado'] = "¡Has ganado!";
                    } else if (count($manoJugador) > count($manoCrupier)) {
                        $_SESSION['resultado'] = "¡El crupier gana!";
                    } else {
                        $_SESSION['resultado'] = "¡Empate!";
                    }
                }
            }
            
            $_SESSION['partida'] = serialize($partida);

            VistaPartida::renderFinPartida();
        }

        /**
         * Reparte una carta la jugador cuando la solicita
         */
        public static function repartirCarta() {

            $partida = unserialize($_SESSION['partida']);

            $partida->getJugador()->nuevaCarta($partida->getBaraja()->repartirCarta());

            // Si el jugador alcanza o se pasa de los 21 puntos comprobamos el resultado de la partida
            if ($partida->getJugador()->valorMano() >= 21) {
                $_SESSION['partida'] = serialize($partida);
                ControladorPartida::comprobarGanador();
            } else {
                $_SESSION['partida'] = serialize($partida);
                VistaPartida::renderPartida();
            }     
        }
    }

?>