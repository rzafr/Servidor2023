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

            // Al inicio mostramos el formulario Login
            if ($_REQUEST['accion'] == "inicio") {
                ControladorLogin::mostrarFormularioLogin();
            }

            // CheckLogin
            if ($_REQUEST['accion'] == "checkLogin") {
                $email = filtrado($_REQUEST['email']);
                $password = filtrado($_REQUEST['password']);
                ControladorLogin::chequearLogin($email, $password);
            }

            //Inicio - error de login
            if ($_REQUEST['accion'] == "error") {
                ControladorLogin::mostrarFormularioLoginError();
            }

            // Cerrar sesion
            if ($_REQUEST['accion'] == "destruirSesion") {
                session_destroy();
                echo "<script>window.location='enrutador.php?accion=inicio'</script>";
            }

            // Mostrar regalos del usuario logueado
            if ($_REQUEST['accion'] == "mostrarPartidas") {
                ControladorPartida::mostrarPartidas();
            }

            // Insertamos partida nueva en la base de datos
            if ($_REQUEST['accion'] == "nuevaPartida") {
                $id_jugador = unserialize($_SESSION['jugador'])->getId();

                $fecha = filtrado($_REQUEST['fecha']);
                $hora = filtrado($_REQUEST['hora']);
                $ciudad = filtrado($_REQUEST['ciudad']);
                $lugar = filtrado($_REQUEST['lugar']);
                $cubierta = $_REQUEST['cubierta'];
                $estado = "abierta";

                ControladorPartida::nuevaPartida($id_jugador, $fecha, $hora, $ciudad, $lugar, $cubierta, $estado);
            }

            // Eliminamos partida
            if ($_REQUEST['accion'] == "eliminarPartida") {
                $id_partida = filtrado($_REQUEST['id']);
                $id_jugador = unserialize($_SESSION['jugador'])->getId();
                ControladorPartida::eliminarPartida($id_partida, $id_jugador);
            }

            // Vemos los jugadores de una partida
            if ($_REQUEST['accion'] == "mostrarJugadores") {
                $id_partida = filtrado($_REQUEST['id']);
                ControladorPartida::mostrarJugadores($id_partida);
            }

        }

        // Buscamos por fecha
        if (isset($_REQUEST['buscarFecha'])) {
            $fecha = filtrado($_REQUEST['buscadorFecha']);
                
            ControladorPartida::buscarPartidasFecha($fecha);
        }

        // Buscamos por ciudad
        if (isset($_REQUEST['buscarCiudad'])) {
            $ciudad = filtrado($_REQUEST['buscadorCiudad']);
                
            ControladorPartida::buscarPartidasCiudad($ciudad);
        }

    }