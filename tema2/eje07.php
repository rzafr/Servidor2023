<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Librería</title>
</head>
<body>
    

    <?php

        function pintarPorCategoria($libreria, $categoria) {
            echo "<div class='row'>";
                echo "<h3>".$categoria."</h3>";
            echo "</div>";
            echo "<div class='row justify-content-center'>";
            $cont = 0;
            foreach($libreria as $valor) {
                if ($valor['categoria'] == $categoria) {
                    if ($cont == 4)
                        break;
                    $cont++;
                        
                    echo "<div class='card mb-5 me-4 pt-4 px-5' style='width: 16rem; font-size: 10px'>
                            <img src='".$valor["foto"]."' class='card-img-top' alt='...' width='100' height='250'>
                                <div class='card-body'>
                                    <h6 class='card-title'>".mb_strtoupper($valor["titulo"])."</h6>
                                    <p class='card-text fs-6 text-primary'>".$valor['autor']."</p>
                                    <p class='card-text fs-5 text-danger'>".$valor['precio']." €</p>
                                </div>
                            </div>";
                } 
            }
            echo "</div>";
        }


        $libreria = array(
                array("ISBN" => "978-8467045413",
                        "titulo" => "Asesinato en el Orient Express",
                        "autor" => "Agatha Christie",
                        "descripcion" => "El famoso detective Hércules Poirot se encuentra con uno de los casos más desconcertantes: en el trayecto que realiza el mítico tren, procedente de Estambul, aparece muerto uno de sus pasajeros y, supuestamente, el autor del asesinato viaja en el Orient Express.", 
                        "categoria" => "Novela negra",
                        "editorial" => "Espasa",
                        "foto" => "./img/978-8467045413.jpg",
                        "precio" => 19.85),
                array("ISBN" => "978-8466667449",
                        "titulo" => "El Mentiroso", 
                        "autor" => "Mikel Santiago",
                        "descripcion" => "En un pueblo costero del País Vasco, entre sinuosas carreteras al borde de acantilados y casas de muros resquebrajados por las noches de tormenta, en una pequeña localidad donde nadie tiene secretos, en una fábrica abandonada, despierta el protagonista junto al cadáver de un hombre desconocido y una piedra con restos de sangre.", 
                        "categoria" => "Novela negra",
                        "editorial" => "B",
                        "foto" => "./img/978-8466667449.jpg",
                        "precio" => 21.85),
                array("ISBN" => "979-8657151008",
                        "titulo" => "Un ángel no debería morir",
                        "autor" => "Jorge Zaragoza", 
                        "descripcion" => "Si te gustan los thrillers policíacos adictivos, Un ángel no debería morir de Jorge Zamora Gómez será tu nuevo fichaje. Ambientada en la ciudad de Alicante, la nueva joven inspectora de homicidios, Clara Sánchez, tendrá que desvelar los secretos que hay tras el cádaver desnudo de una joven encontrada tras el famoso Castillo de Santa Bárbara.", 
                        "categoria" => "Novela negra",
                        "editorial" => "Independently published",
                        "foto" => "./img/979-8657151008.jpg",
                        "precio" => 12.95),
                array("ISBN" => "978-8408246367",
                        "titulo" => "A fuego lento", 
                        "autor" => "Paula Hawkins",
                        "descripcion" => "La creadora del domestic noir nos presenta a tres protagonistas femeninas de apariencia sencilla, pero con un trasfondo que demuestra lo tramposos que son los prejuicios en la sociedad. No faltan los narradores poco fiables, saltos en el tiempo para dosificar el suspense y un escenario atractivo y misterioso en Londres.", 
                        "categoria" => "Novela negra",
                        "editorial" => "Planeta",
                        "foto" => "./img/978-8408246367.jpg",
                        "precio" => 16.55),
                array("ISBN" => "978-8408241232",
                        "titulo" => "Nuestra casa", 
                        "autor" => "Louise Candlish",
                        "descripcion" => "¿Qué pasaría si un día, cuando vas a salir de casa, te encuentras con un camión de mudanzas de una pareja que acaba de comprar tu hogar, sin que tú hayas puesto tu casa en venta? Esto es lo que le ocurre a la protagonista de esta historia, una novela en la que todos confían pero que todo el mundo miente.", 
                        "categoria" => "Novela negra",
                        "editorial" => "Planeta",
                        "foto" => "./img/978-8408241232.jpg",
                        "precio" => 18.95),
                array("ISBN" => "978-8497592581",
                        "titulo" => "El nombre de la rosa", 
                        "autor" => "Umberto Eco",
                        "descripcion" => "Valiéndose de las características de la novela gótica, la crónica medieval y la novela policíaca,El nombre de la rosa narra las investigaciones detectivescas que realiza el fraile franciscano Guillermo de Baskerville para esclarecer los crímenes cometidos en una abadía benedictina en el año 1327.", 
                        "categoria" => "Novela histórica",
                        "editorial" => "Debolsillo",
                        "foto" => "./img/978-8497592581.jpg",
                        "precio" => 11.35),
                array("ISBN" => "978-8466341783",
                        "titulo" => "Los pilares de la tierra", 
                        "autor" => "Ken Follet",
                        "descripcion" => "El gran maestro de la narrativa de acción y suspense nos transporta a la Edad Media, a un fascinante mundo de reyes, damas, caballeros, pugnas feudales, castillos y ciudades amuralladas. El amor y la muerte se entrecruzan vibrantemente en este magistral tapiz cuyo centro es la construcción de una catedral gótica. La historia se inicia con el ahorcamiento público de un inocente y finaliza con la humillación de un rey.", 
                        "categoria" => "Novela histórica",
                        "editorial" => "Debolsillo",
                        "foto" => "./img/978-8466341783.jpg",
                        "precio" => 12.35),
                array("ISBN" => "978-8491041542",
                        "titulo" => "Los miserables", 
                        "autor" => "Victor Hugo",
                        "descripcion" => "Jean Valjean ha cumplido una condena de casi veinte años por robar comida para su familia. Fuera de la cárcel, la sociedad le margina y no le queda más remedio que seguir robando. Un inesperado encuentro con el obispo Myriel le hará cambiar de actitud y redimirse.", 
                        "categoria" => "Novela histórica",
                        "editorial" => "Alianza Editorial",
                        "foto" => "./img/978-8491041542.jpg",
                        "precio" => 23.75),
                array("ISBN" => "978-8499088075",
                        "titulo" => "La ladrona de libros", 
                        "autor" => "Markus Zusak",
                        "descripcion" => "Una novela preciosa, tremendamente humana y emocionante, que describe las peripecias de una niña alemana de nueve años desde que es dada en adopción por su madre hasta el final de la II Guerra Mundial.", 
                        "categoria" => "Novela histórica",
                        "editorial" => "Debolsillo",
                        "foto" => "./img/978-8499088075.jpg",
                        "precio" => 9.45),
                array("ISBN" => "978-8408043645",
                        "titulo" => "La sombra del viento", 
                        "autor" => "Carlos Ruiz Zafón",
                        "descripcion" => "Estamos en Barcelona y un niño es conducido por su padre al misterioso 'cementerio de los libros olvidados'. Allí encontrará 'La sombra del viento', un volumen que cambiará para siempre su vida y que le hará conocer misterios e intrigas que se quedaron ocultos en lo más profundo de la ciudad.", 
                        "categoria" => "Novela histórica",
                        "editorial" => "Planeta",
                        "foto" => "./img/978-8408043645.jpg",
                        "precio" => 16.15),
                array("ISBN" => "978-8408053040",
                        "titulo" => "Cosmos", 
                        "autor" => "Carl Sagan",
                        "descripcion" => "Cosmos trata de la ciencia en su contexto humano más amplio y explica cómo la ciencia y la civilización se desarrollan conjuntamente. La obra aborda también el tema de las misiones espaciales destinadas a explorar los planetas más próximos a la Tierra, del origen de la vida, de la muerte del Sol, de la evolución de las galaxias y de los orígenes de la materia, los soles y los mundos, así como también los más recientes descubrimientos sobre la vida fuera de la Tierra.", 
                        "categoria" => "Ciencia",
                        "editorial" => "Planeta",
                        "foto" => "./img/978-8408053040.jpg",
                        "precio" => 34.25),
                array("ISBN" => "978-8415988762",
                        "titulo" => "La máquina del tiempo", 
                        "autor" => "H. G. Wells",
                        "descripcion" => "La primera gran historia de viajes en el tiempo y una de las grandes novelas de ciencia ficción de todas las épocas. Una especulación arriesgada y sumamente aguda no sólo en lo científico, sino, y especialmente, en lo social y lo político.", 
                        "categoria" => "Sci-fi",
                        "editorial" => "Sportula",
                        "foto" => "./img/978-8415988762.jpg",
                        "precio" => 46.99),
                array("ISBN" => "978-8467029154",
                        "titulo" => "El origen de las especies", 
                        "autor" => "Charles Darwin",
                        "descripcion" => "Charles Darwin (1809-1882), al publicar su obra El origen de las especies, presentó su teoría de la evolución natural que, pasados ciento cincuenta años, continúa siendo la base de la interpretación de la naturaleza de la biología moderna.", 
                        "categoria" => "Ciencia",
                        "editorial" => "Espasa",
                        "foto" => "./img/978-8467029154.jpg",
                        "precio" => 13.25),
                array("ISBN" => "978-8499890944",
                        "titulo" => "1984", 
                        "autor" => "George Orwell",
                        "descripcion" => "En el año 1984 Londres es una ciudad lúgubre en la que la Policía del Pensamiento controla de forma asfixiante la vida de los ciudadanos. Winston Smith es un peón de este engranaje perverso y su cometido es reescribir la historia para adaptarla a lo que el Partido considera la versión oficial de los hechos. Hasta que decide replantearse la verdad del sistema que los gobierna y somete.", 
                        "categoria" => "Sci-fi",
                        "editorial" => "Debolsillo",
                        "foto" => "./img/978-8499890944.jpg",
                        "precio" => 8.55),
                array("ISBN" => "978-8498927948",
                        "titulo" => "Brevísima historia del tiempo", 
                        "autor" => "Stephen Hawking",
                        "descripcion" => "En 1988 apareció un libro que iba a cambiar de arriba abajo nuestra concepción del universo y que se convirtió en uno de los mayores bestsellers científicos:Historia del tiempo, de Stephen Hawking, el mayor genio del siglo XX después de Einstein.", 
                        "categoria" => "Ciencia",
                        "editorial" => "Crítica",
                        "foto" => "./img/978-8498927948.jpg",
                        "precio" => 14.55)
        );

        
        echo "<div class='container'>";
            echo "<div class='row'>";
                echo "<div class='col-sm-12 d-flex justify-content-center'>";
                    echo "<h1 class='text-center mt-3'>LIBRERÍA JAROSO 2023</h1>";
                echo "</div>"; 
            echo "</div>";  

            // Metemos en un array los valores de la columna categoría
            $categorias = array_column($libreria, "categoria");
            // Quitamos los repetidos
            $categorias = array_unique($categorias);

            foreach($categorias as $categoria)      
                pintarPorCategoria($libreria, $categoria);
                
            
        echo "</div>";

    ?>

    <footer class='col-sm-12 d-flex justify-content-center'>
        <p>&#169 Realizado por Rubén Zafra Ramírez</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>