<?php

    class VistaPost {

        /**
         * Muestra el formulario para generar el post y un mensaje si se le pasa
         */
        public static function mostarForm($mensaje) {

            include("./vistas/cabecera.php");

?>

            <nav class="nav bg-info py-4 d-flex justify-content-end text-white">
                <a href="enrutador.php?accion=destruirSesion" class="nav-link text-white">Cerrar sesion</a>
            </nav>

            <div class='row'>
                <div class='col-6 mt-5 mx-auto'>
                    <h2>Genera tu post para el blog</h2>
                    <p class='text-danger'><?= $mensaje; ?></p>
                    <form action='enrutador.php' method='post'>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Introduce el titulo del post:</label>
                        <textarea class="form-control" name="titulo" rows="3"></textarea>
                    </div>
                    <input type='hidden' name='accion' value='generarPost'>
                    <button type="submit" class="btn btn-info">Generar</button>
                    </form>
                </div>
            </div>

<?php

            include("./vistas/pie.php");

        }

        /**
         * Muestra el post generado
         */
        public static function mostrarPost($titulo) {

            include("./vistas/cabecera.php");

?>

            <nav class="nav bg-info py-4 d-flex justify-content-end">
                <a href="enrutador.php?accion=destruirSesion" class="nav-link text-white">Cerrar sesion</a>
            </nav>

<?php

            // Generamos el contenido a partir del titulo

            require_once('vendor/autoload.php');

            $client = new GuzzleHttp\Client();

            // Generamos el texto

            $textoPost = "Escribe un artículo sobre " . $titulo;
            $response = $client->request('POST', 'https://api.openai.com/v1/completions', [
            'body' => '{"model": "text-davinci-003", "prompt": "'.$textoPost.'", "temperature": 0, "max_tokens": 1000, "n": 1}',
            'headers' => [
                'Authorization' => '',
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
            ]);

            $respuesta = $response->getBody();
            $respuestaJSON = json_decode($respuesta);
            $textoGenerado = $respuestaJSON->choices[0]->text;

            // Generamos la imagen

            $textoImagen = $titulo;
            $response = $client->request('POST', 'https://api.openai.com/v1/images/generations', [
            'body' => '{"prompt": "'.$textoImagen.'", "size": "1024x1024", "n": 1}',
            'headers' => [
                'Authorization' => 'Bearer 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',
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
            ]);

            $respuesta = $response->getBody();
            $respuestaJSON = json_decode($respuesta);

            // Mostramos los resultados

            echo "<div class='row mt-5 d-flex justify-content-center'>";
                echo "<div class='col-8 d-flex justify-content-center'>";
                    echo "<h2>".$titulo."</h2>";
                echo "</div>";
            echo "</div>";

            echo "<div class='row mt-5 d-flex justify-content-center'>";
                echo "<div class='col-8 d-flex justify-content-center'>";
                    echo "<img src='".$respuestaJSON->data[0]->url."' alt='' width='1000' height='600'>";
                echo "</div>";
            echo "</div>";

            echo "<div class='row mt-5 d-flex justify-content-center'>";
                echo "<div class='col-10 d-flex justify-content-center'>";
                    echo "<p>".$textoGenerado."</p>";
                echo "</div>";
            echo "</div>";

            // Al pulsar el boton guardar mandamos mediante POST los datos a la BBDD

            echo "<div class='row mt-5 d-flex justify-content-center'>
                <div class='col-6 m-3 d-flex justify-content-center'>
                    <form action='enrutador.php' method='post'>
                        <input type='hidden' name='titulo' value='".$titulo."'>
                        <input type='hidden' name='imagen' value='".$respuestaJSON->data[0]->url."'>
                        <input type='hidden' name='fecha' value='".date('d-m-Y H:i:s')."'>
                        <input type='hidden' name='texto' value='".$textoGenerado."'>
                        <input type='hidden' name='accion' value='guardarPost'>
                        <button type='submit' class='btn btn-info'>Guardar</button>
                        <a class='btn btn-secondary' href='enrutador.php?accion=mostrarFormDescarte' role='button'>
                            Descartar
                        </a>
                    </form>
                </div>
            </div>";

            include("./vistas/pie.php");
            
        }
    }
?>
