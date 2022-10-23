<?php  session_start(); 
        
// Si he pinchado en un link
if ($_GET) {
    
    // Comprobamos si ya hay cookies guardadas
    if (isset($_COOKIE['servidor'])) {
        // Leemos lo que ya te gusta
        $gustos = $_COOKIE['servidor'];

        // Quitamos los contadores
        $gustosArray = explode("#",$gustos);
        foreach ($gustosArray as &$valor)
            $valor = substr($valor, 0, -2);
        $gustos = implode("#", $gustosArray);

        // Vamos concatenando los intereses
        $gustos .= "#".$_GET['interes'];

        // Separamos los gustos y los metemos en un array
        $gustosArray = explode("#",$gustos);
        $gustosArray = array_unique($gustosArray);

    } else {
        $gustos = "";
        $gustosArray = array();

        // Vamos concatenando los intereses
        $gustos .= "#".$_GET['interes'];

        // Separamos los gustos y los metemos en un array
        $gustosArray = explode("#",$gustos);
        $gustosArray = array_unique($gustosArray);

        // Quitamos del array el valor de la inicialización de la variable
        array_shift($gustosArray);
    }
    
    // Contamos las veces que se pincha un enlace u otro
    // Deportes
    if (strcmp($_GET['interes'], "deportes") == 0) {
        if (!isset($_SESSION['contDeportes'])) {
            $_SESSION['contDeportes'] = 1;
        } else {
            $_SESSION['contDeportes']++;
        }
    }

    // Juegos
    if (strcmp($_GET['interes'], "juegos") == 0) {
        if (!isset($_SESSION['contJuegos'])) {
            $_SESSION['contJuegos'] = 1;
        } else {
            $_SESSION['contJuegos']++;
        }
    }

    // Moda
    if (strcmp($_GET['interes'], "moda") == 0) {
        if (!isset($_SESSION['contModa'])) {
            $_SESSION['contModa'] = 1;
        } else {
            $_SESSION['contModa']++;
        }
    }

    // Para cada tipo de interés le añadimos su contador
    foreach ($gustosArray as &$valor) {
        // Comparamos quitando 
        if (strcmp($valor, "deportes") == 0) {
            $valor .= "-".$_SESSION['contDeportes'];
        }
        if (strcmp($valor, "juegos") == 0) {
            $valor .= "-".$_SESSION['contJuegos'];
        }
        if (strcmp($valor, "moda") == 0) {
            $valor .= "-".$_SESSION['contModa'];
        }
    }

    // Volvemos a convertir a string ya quitados los duplicados
    $gustosString = implode("#", $gustosArray);
    
    // Guardamos la cookie
    setcookie('servidor', $gustosString, time()+60*30, "/tema3/cookies", "localhost", false, true);
    
    header("Location: index.php");
}

?>