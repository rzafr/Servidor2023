<?php session_start();
    
    // AUTOLOAD
    function autocarga($clase) {

        $ruta = "./controladores/$clase.php"; 
        if (file_exists($ruta)){ 
          include_once $ruta; 
        }

        $ruta = "./modelos/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

        $ruta = "./vistas/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

    }

    spl_autoload_register("autocarga");


    // Filtra los campos del formulario
    function filtrado($datos) {
        $datos = trim($datos); // Elimina espacios antes y despues de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML

        return $datos;
    }

    // Comprobamos acciones
    if ($_REQUEST) {
        if (isset($_REQUEST['accion'])) {

            // Inicio
            if ($_REQUEST['accion'] == "inicio") {
                ControladorPartida::mostrarInicio();
            }

            // Nueva partida
            if ($_REQUEST['accion'] == "nuevaPartida") {
                ControladorPartida::nuevaPartida();
            }

            // El jugador se planta
            if ($_REQUEST['accion'] == "plantarse") {
                // Si no se ha mostrado el mensaje de final de partida el jugador se puede plantar
                if (!isset($_SESSION['resultado']))
                    ControladorPartida::comprobarGanador();
                else
                    VistaPartida::renderFinPartida();
            }

            // El jugador pide carta
            if ($_REQUEST['accion'] == "pedirCarta") {
                // Si no se ha mostrado el mensaje de final de partida el jugador puede pedir carta
                if (!isset($_SESSION['resultado']))
                    ControladorPartida::repartirCarta();
                else
                    VistaPartida::renderFinPartida();
            }

        }    

    }
    
?>