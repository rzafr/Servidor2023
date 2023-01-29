<?php session_start();

    // AUTOLOAD
    function autocarga($clase){ 
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


    // Funcion para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y despues de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    if ($_REQUEST) {
        if (isset($_REQUEST['accion'])) {

            // Inicio - formulacio login
            if ($_REQUEST['accion'] == "inicio") {
                ControladorLogin::mostrarFormularioLogin();
            }

            // CheckLogin
            if ($_REQUEST['accion'] == "checkLogin") {
                $email = filtrado($_REQUEST['email']);
                $password = filtrado($_REQUEST['password']);
                ControladorLogin::chequearLogin($email, $password);
            }

            // Inicio - error de login
            if ($_REQUEST['accion'] == "error") {
                ControladorLogin::mostrarFormularioLoginError();
            }

            // Cerrar sesion
            if ($_REQUEST['accion'] == "destruirSesion") {
                session_destroy();
                echo "<script>window.location='enrutador.php?accion=inicio'</script>";
            }
            
            // Mostrar formulario creacion post
            if ($_REQUEST['accion'] == "mostrarForm") {
                ControladorPost::mostrarForm();
            }

            // Mostrar formulario creacion post
            if ($_REQUEST['accion'] == "mostrarFormDescarte") {
                ControladorPost::mostrarFormDescarte();
            }

            // Generar post segun texto introducido
            if ($_REQUEST['accion'] == "generarPost") {
                $titulo = filtrado($_REQUEST['titulo']);
                ControladorPost::mostrarPost($titulo);
            }

            // Guardamos post en la BBDD
            if ($_REQUEST['accion'] == "guardarPost") {
                $id_usuario = unserialize($_SESSION['usuario'])->getId();

                $titulo = filtrado($_REQUEST['titulo']);
                $imagen = filtrado($_REQUEST['imagen']);
                $fecha = filtrado($_REQUEST['fecha']);
                $texto = filtrado($_REQUEST['texto']);

                $post = new Post($id_usuario, $titulo, $imagen, $fecha, $texto);

                ControladorPost::guardarPost($post);
            }
        }

        
    }





?>