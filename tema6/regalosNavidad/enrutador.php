<?php session_start();
        
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require './vistas/vendor/autoload.php';
    
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
            if ($_REQUEST['accion'] == "mostrarRegalos") {
                $id_usuario = unserialize($_SESSION['usuario'])->getId();
                ControladorRegalo::mostrarRegalos($id_usuario);
            }

            // Mostramos formulario nuevo regalo 
            if ($_REQUEST['accion'] == "verFormularioNuevoRegalo") {
                ControladorRegalo::mostrarFormularioNuevoRegalo();
            }

            // Insertamos regalo nuevo en la base de datos
            if ($_REQUEST['accion'] == "nuevoRegalo") {
                $id_usuario = unserialize($_SESSION['usuario'])->getId();

                $nombre = $_REQUEST['nombre'];
                $destinatario = $_REQUEST['destinatario'];
                $precio = $_REQUEST['precio'];
                $estado = $_REQUEST['estado'];
                $year = $_REQUEST['year'];

                ControladorRegalo::nuevoRegalo($id_usuario, $nombre, $destinatario, $precio, $estado, $year);
            }

            // Modificamos regalo
            if ($_REQUEST['accion'] == "modificarRegalo") {
                $id = filtrado($_REQUEST['id']);
                $nombre = filtrado($_REQUEST['nombre']);
                $destinatario = filtrado($_REQUEST['destinatario']);
                $precio = filtrado($_REQUEST['precio']);
                $estado = filtrado($_REQUEST['estado']);
                $year = filtrado($_REQUEST['year']);

                ControladorRegalo::modificarRegalo($id, $nombre, $destinatario, $precio, $estado, $year);
            }

            // Eliminamos regalo
            if ($_REQUEST['accion'] == "eliminarRegalo") {
                $id_regalo = filtrado($_REQUEST['id']);

                ControladorRegalo::eliminarRegalo($id_regalo);
            }

            // Generamos un archivo PDF 
            if($_REQUEST['accion'] == "generarPDF"){
                $id_usuario = unserialize($_SESSION['usuario'])->getId();
                ControladorRegalo::generarPDF($id_usuario);
            }

            // Vemos los enlaces de un regalo
            if ($_REQUEST['accion'] == "mostrarEnlaces") {
                $id_regalo = filtrado($_REQUEST['id']);
                ControladorEnlace::mostrarEnlaces($id_regalo);
            }

            
        }

        // Buscamos por year
        if (isset($_REQUEST['buscarYear'])) {
            $year = filtrado($_REQUEST['buscadorYear']);
                
            ControladorRegalo::buscarRegalosYear($year);
        }

    }