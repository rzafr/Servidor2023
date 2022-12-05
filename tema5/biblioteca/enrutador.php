<?php
    
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

        $ruta = "./vistas/prestamos/$clase.php"; 
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
                ControladorPrestamo::mostrarPrestamos();
            }

            // Mostramos formulario prestamo nuevo
            if ($_REQUEST['accion'] == "verFormularioNuevoPrestamo") {
                ControladorPrestamo::mostrarFormularioNuevoPrestamo();
            }

            // Insertamos prestamo nuevo en la base de datos
            if ($_REQUEST['accion'] == "nuevoPrestamo") {
                $usuario = $_REQUEST['usuario'];
                $libro = $_REQUEST['libro'];
                $fechaInicio = $_REQUEST['fechaInicio'];
                $fechaFin = $_REQUEST['fechaFin'];
                $estado = $_REQUEST['estado'];

                ControladorPrestamo::nuevoPrestamo($usuario, $libro, $fechaInicio, $fechaFin, $estado);
            }

            // Modificamos prestamo
            if ($_REQUEST['accion'] == "modificarPrestamo") {
                $id = $_REQUEST['id'];
                $fechaFin = $_REQUEST['fechaFin'];
                $estado = $_REQUEST['estado'];

                ControladorPrestamo::modificarPrestamo($id, $fechaFin, $estado);
            }

            // Eliminamos prestamo
            if ($_REQUEST['accion'] == "eliminarPrestamo") {
                $id = $_REQUEST['id'];

                ControladorPrestamo::eliminarPrestamo($id);
            }
            
        }

        // Buscamos por DNI
        if (isset($_REQUEST['buscarDNI'])) {
            $dni = filtrado($_REQUEST['buscadorDNI']);
                
            ControladorPrestamo::buscarPrestamosDNI($dni);
        }

        // Buscamos por estado
        if (isset($_REQUEST['buscarEstado'])) {
            $estado = filtrado($_REQUEST['buscadorEstado']);
                
            ControladorPrestamo::buscarPrestamosEstado($estado);
        }

    }





?>