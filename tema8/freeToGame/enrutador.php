<?php

    //AUTOLOAD
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


    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    if ($_REQUEST) {
        if (isset($_REQUEST['accion'])) {

            //Mostrar juegos
            if ($_REQUEST['accion'] == "mostrarJuegos") {
                ControladorJuego::mostrarJuegos();
            }
            
            //Mostrar juegos en detalle
            if ($_REQUEST['accion'] == "mostrarDetalle") {
                $id = filtrado($_GET['id']);
                ControladorJuego::mostrarJuego($id);
            }

            //Añadir comentario a Mongo
            if ($_REQUEST['accion'] == "comentar") {
                $id = filtrado($_REQUEST['id']); ;
                $comment = filtrado($_REQUEST['comment']);
                ControladorJuego::comentarJuego($id, $comment);
            }

        }

        // Buscamos por categoria
        if (isset($_REQUEST['buscarCat'])) {
            $categoria = filtrado($_REQUEST['buscadorCat']);
            ControladorJuego::buscarJuegosCat($categoria);
        }
    }





?>