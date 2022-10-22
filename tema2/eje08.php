<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        .fotos {
            width: 180px;
            height: 180px;
        }
    </style>

    <title>Soul Calibur III</title>
</head>
<body>
    <main class="container-fluid">
        <header class="row">
            <nav class="navbar navbar-expand-sm navbar-dark bg-secondary bg-gradient fixed-top">
                <a class="navbar-brand ms-3" href="./eje08.php"><img src="./img/logo1.jpg" width="80" height="60"></a>
                <h2 class="mx-5 mt-2 text-light">SOUL CALIBUR III</h2>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Personajes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Galerías</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cronología</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php

        // Muestra en el navegador y da formato al contenido del array personajes
        function pintarPersonajes($personajes) {
            echo "<section class='row justify-content-center mt-5 pt-5 bg-dark bg-gradient'>";
                foreach($personajes as $personaje) {
                    echo "<div class='col-3 mt-5 me-5'>";
                        echo "<img src=".$personaje["foto_princ"]." class='img-fluid' alt=".$personaje['nombre'].">";
                    echo "</div>";
                    echo "<div class='col-6 text-light'>";
                        echo "<h4 class='fs-4'>".mb_strtoupper($personaje["nombre"])."</h4>";
                        echo "<p class='mt-3 mb-4 fs-6'>".$personaje["descripcion"]."</p>";
                        foreach($personaje["caracteristicas"] as $key => $valor) {
                            echo "<p class='ps-5 fs-6 lh-sm'>".$key.": ".$valor."</p>";
                        }
                        echo "<div class='row'>";
                            echo "<div class='col-6 mt-5 embed-responsive embed-responsive-16by9'>";
                                echo "<iframe src=".$personaje["video"]." class='embed-responsive-item'></iframe>";
                            echo "</div>";
                            echo "<div class='fotos col-6 mt-5 float-start'>";
                                foreach($personaje["galeria"] as $valor) {
                                    echo "<img src=".$valor." class='mt-2 ms-2' width='60' height='60'>";
                                }
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }
            echo "</section>";
        }

        // Creamos el array con toda la información de los personajes
        $personajes = array(
                array("nombre" => "Raphael",
                        "foto_princ" => "./img/raphael.jpg",
                        "descripcion" => "Desde su aparición en Soul Calibur II, Raphael se convirtió en un personaje muy popular entre los novatos, gracias a una forma de luchar muy reconocible. En Soul Calibur III, se convirtió en una especie de vampiro por la influencia de Soul Edge, ha adornado su elegante forma de luchar y personalidad chulesca y arrogante.", 
                        "caracteristicas" => array("País de nacimiento" => "Imperio Francés",
                                                "Estilo de lucha" => "'La Rapière des Sorel'",
                                                "Armas" => "Espada ropera",
                                                "Aliados" => "Amy",
                                                "Enemigos" => "Mitsurugi, Cervantes"),
                        "video" => "./vid/raphael.mp4",
                        "galeria" => array("./img/raphael1.jpg", "./img/raphael2.jpg", "./img/raphael3.jpg", "./img/raphael4.jpg")),
                array("nombre" => "Ivy",
                        "foto_princ" => "./img/ivy.jpg",
                        "descripcion" => "Ivy es la hija ilegítima de Cervantes que tiene como fin destruir Soul Edge, siendo uno de los personajes más emblemáticos y reconocibles de Soul Calibur, llegando a ser todo un clásico incluso cuando no estuvo presente en Soul Blade.", 
                        "caracteristicas" => array("País de nacimiento" => "Imperio Británico",
                                                "Estilo de lucha" => "'La Rapière des Sorel'",
                                                "Armas" => "Autodidacta",
                                                "Aliados" => "Cassandra",
                                                "Enemigos" => "Cervantes, Voldo, Nightmare, Zasalamel"),
                        "video" => "./vid/ivy.mp4",
                        "galeria" => array("./img/ivy1.jpg", "./img/ivy2.jpg", "./img/ivy3.jpg", "./img/ivy4.jpg")),
                array("nombre" => "Kilik",
                        "foto_princ" => "./img/kilik.jpg",
                        "descripcion" => "Kilik es el protagonista de la serie Soul Calibur, bajo el papel de héroe de corazón noble. En un principio buena parte de de sus ataques estaban basados en movimientos de Seung Mina, pero con el paso de los años se le han añadido otros completamente nuevos.", 
                        "caracteristicas" => array("País de nacimiento" => "Desconocido, criado en China",
                                                "Estilo de lucha" => "Artes secretas de 'Ling-Sheng Su'",
                                                "Armas" => "Bastón",
                                                "Aliados" => "Maxi, Maestro: Edge Master, Amante: Xianghua",
                                                "Enemigos" => "Zasalamel, Nightmare"),
                        "video" => "./vid/kilik.mp4",
                        "galeria" => array("./img/kilik1.jpg", "./img/kilik2.jpg", "./img/kilik3.jpg", "./img/kilik4.jpg")),
                array("nombre" => "Cassandra",
                        "foto_princ" => "./img/cassandra.jpg",
                        "descripcion" => "Cassandra apareció por primera vez en Soul Calibur II. Al contrario que su hermana que presenta una personalidad bastante seria, Cassandra tiene un carácter más enérgico e impetuoso, llegando incluso a la temeridad, algo que también se plasma en sus movimientos.", 
                        "caracteristicas" => array("País de nacimiento" => "Imperio Otomano",
                                                "Estilo de lucha" => "Ateniense",
                                                "Armas" => "Espada ateniense y escudo",
                                                "Aliados" => "Sophitia",
                                                "Enemigos" => "Mitsurugi, Cervantes"),
                        "video" => "./vid/cassandra.mp4",
                        "galeria" => array("./img/cassandra1.jpg", "./img/cassandra2.jpg", "./img/cassandra3.jpg", "./img/cassandra4.jpg")),
                array("nombre" => "Cervantes",
                        "foto_princ" => "./img/cervantes.jpg",
                        "descripcion" => "Si había una kunoichi (Taki), un samurái (Mitsurugi) y un loco (Voldo), no podía faltar un pirata, en esta ocasión español y que hace las veces de jefe en el Soul Blade / Soul Edge original.", 
                        "caracteristicas" => array("País de nacimiento" => "Imperio Español",
                                                "Estilo de lucha" => "Poseído por Soul Edge",
                                                "Armas" => "Espadas gemelas 'Soul Edge', espada-pistola y espada larga",
                                                "Aliados" => "Valmiro y Antonio",
                                                "Enemigos" => "Taki, Sophitia, Ivy"),
                        "video" => "./vid/cervantes.mp4",
                        "galeria" => array("./img/cervantes1.jpg", "./img/cervantes2.jpg", "./img/cervantes3.jpg", "./img/cervantes4.jpg")),
                array("nombre" => "Taki",
                        "foto_princ" => "./img/taki.jpg",
                        "descripcion" => "Taki es uno de los personajes más carismáticos y entrañables de la saga Soul Calibur. Presente desde Soul Blade, el project Soul cometió el error garrafal (desde mi punto de vista) de no incluirla en Soul Calibur V, siendo sustituida por su discípula Natsu.", 
                        "caracteristicas" => array("País de nacimiento" => "Japón",
                                                "Estilo de lucha" => "Musō-Battō-ryū",
                                                "Armas" => "Kodachi, Kodachis gemelas",
                                                "Aliados" => "Toki, Natsu",
                                                "Enemigos" => "Mitsurugi, Cervantes"),
                        "video" => "./vid/taki.mp4",
                        "galeria" => array("./img/taki1.jpg", "./img/taki2.jpg", "./img/taki3.jpg", "./img/taki4.jpg")),
                array("nombre" => "Mitsurugi",
                        "foto_princ" => "./img/mitsurugi.jpg",
                        "descripcion" => "En un juego japonés y de armas blancas no podía faltar el típico samurái. Mitsurugi comparte algunos rasgos de su personalidad con Ryu; su principal motivación es luchar contra oponentes que merezcan la pena y demostrar que es el más fuerte.", 
                        "caracteristicas" => array("País de nacimiento" => "Japón",
                                                "Estilo de lucha" => "Shin Tenpu-Kosai-Ryu",
                                                "Armas" => "Katana",
                                                "Aliados" => "Señores feudales japoneses",
                                                "Enemigos" => "Setsuka, Taki, Nightmare, Algol"),
                        "video" => "./vid/mitsurugi.mp4",
                        "galeria" => array("./img/mitsu1.jpg", "./img/mitsu2.jpg", "./img/mitsu3.jpg", "./img/mitsu4.jpg"))
        );

        // Llamamos al método que pinta la información
        pintarPersonajes($personajes);
  
        ?>
        <footer>
            <div class='d-flex justify-content-center bg-secondary'>
                <p>&copy; 2022</p>
            </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>