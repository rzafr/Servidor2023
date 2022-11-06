<?php session_start(); ?>
<?php

    $diccionario = array("programa", "informatica", "ordenador", "software", "hardware", "algoritmo", "desarrollo", "web", 
                "software", "aplicacion", "ciclo", "modulo", "programar", "programacion", "servidor", "cliente", "entorno", 
                "sistema", "formacion", "informacion", "java", "php", "javascript", "lenguaje", "etiqueta", "html", "css", 
                "introduccion", "razonamiento", "demostracion", "comprobacion", "implementacion", "iteracion", "bucle", 
                "despliegue", "diseño", "dato", "conexion", "libreria", "hub", "git", "prueba", "error", "fallo", "acierto", 
                "excepcion", "clase", "pantalla", "consola", "salida", "entrada", "resultado", "teclado", "raton", "altavoz", 
                "cable", "enchufe", "regleta", "router", "torre", "placa", "video", "imagen", "sonido", "fuente", "alimentacion", 
                "intensidad", "resistencia", "potencia", "voltaje", "filtro", "ventilador", "artificial", "inteligencia", "framework", 
                "gestion", "proceso", "rutina", "sentencia", "variable", "inicializar", "declarar", "asignar", "objeto", "constructor", 
                "nuevo", "herencia", "clonacion", "copia", "polimorfismo", "destructor", "concatenar", "iniciar", "cancelar", "guardar", 
                "anterior", "siguiente", "imprimir", "posicion", "sesion");

    // Iniciamos el juego
    if (isset($_GET['accion'])) {
        if (isset($_GET['accion']) == "inicio") {
            $_SESSION['palabra'] = $diccionario[rand(0,99)];
            $_SESSION['palabraActual'] = "";
            for ($i=0; $i<strlen($_SESSION['palabra']); $i++) {
                $_SESSION['palabraActual'] .= "#";
            }
            $_SESSION['letrasUsadas'] = array();
            $_SESSION['fallos'] = 0;
            header("Location: ./index.php?accion=jugar");
        }
    }
    
    // Si se ha pulsado una letra
    if (isset($_GET['letra'])) {
        // Comprobamos si se ha repetido letra
        if (in_array($_GET['letra'], $_SESSION['letrasUsadas'])) {
            header("Location: ./index.php?error=letraRepetida");
        } else {
            // Metemos la letra en el array de letras usadas
            array_push($_SESSION['letrasUsadas'], $_GET['letra']);
            $letraPulsada = $_GET['letra'];
            $encontrada = false;
            // Comprobamos si la letra pulsada esta en la palabra
            for($i=0; $i<strlen($_SESSION['palabra']); $i++) {
                if ($_SESSION['palabra'][$i] == $letraPulsada) {
                    // Si se encuentra se comprueba si se ha completado la palabra
                    $encontrada = true;
                    $_SESSION['palabraActual'][$i] = strtoupper($letraPulsada);
                    if ($_SESSION['palabraActual'] == strtoupper($_SESSION['palabra'])) {
                        header("Location: ./index.php?accion=ganar");
                    // Si no se ha completado la palabra se sigue jugando
                    } else {
                        header("Location: ./index.php?accion=jugar");
                    }
                }
            }
            // Si no se encuentra la letra
            if ($encontrada == false) {
                $_SESSION['fallos']++;
                // Si se alcanzan los fallos se termina la partida
                if ($_SESSION['fallos'] == 6) {
                    header("Location: ./index.php?error=limiteFallos");
                } else {
                    // Si no se pinta el dibujo con el fallo
                    header("Location: ./index.php?error=fallo");
                }
            }
        }
    }
?>