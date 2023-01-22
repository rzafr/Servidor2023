<?php

    class VistaJuego {

        public static function mostrarJuegosAPI() {

            include "cabecera.php";      
            
            echo "<div class='row mb-5'>";
                echo "<div class='col'>";
                    echo "<h1>Top Free Games for PC and Browser In 2023</h1>";
                echo "</div>";
            echo "</div>";

            echo "<div class='row'>";

            $uri = "https://www.freetogame.com/api/games";       
            
            $resultado = file_get_contents($uri, false);

            // Pasar de json a objeto php y recorrer los resultados
            if ($resultado != false) {
                $respPHP = json_decode($resultado);
                foreach($respPHP as $juego) {
                    echo "<div class='card mx-3 mb-4' style='width: 18rem;'>
                        <img src='".$juego->thumbnail."' class='card-img-top mt-3' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>".$juego->title."</h5>
                            <p class='card-text'><small class='text-muted'>".$juego->genre."</small></p>                          
                            <a href='enrutador.php?accion=mostrarDetalle&id=".$juego->id."' class='btn btn-primary'>Detalles</a>
                        </div>
                    </div>";
                }
            }
                
            echo "</div>";
                
            include "pie.php";
        }

        public static function mostrarJuegosAPICat($categoria) {

            
            if ($categoria != null) {
                include "cabecera.php";
            
                echo "<div class='row mb-5'>";
                    echo "<div class='col'>";
                        echo "<h1>Top Free Games ".$categoria." for PC and Browser In 2023</h1>";
                    echo "</div>";
                echo "</div>";
            
                echo "<div class='row'>";

                $uri = "https://www.freetogame.com/api/games?category=".$categoria;       
                
                $resultado = file_get_contents($uri, false);

                // Pasar de json a objeto php y recorrer los resultados
                if ($resultado != false) {
                    $respPHP = json_decode($resultado);
                    foreach($respPHP as $juego) {
                    echo "<div class='card mx-3 mb-4' style='width: 18rem;'>
                        <img src='".$juego->thumbnail."' class='card-img-top mt-3' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>".$juego->title."</h5>
                            <p class='card-text'><small class='text-muted'>".$juego->genre."</small></p>                          
                            <a href='enrutador.php?accion=mostrarDetalle&id=".$juego->id."' class='btn btn-primary'>Detalles</a>
                        </div>
                    </div>";
                    }
                }

                echo "</div>";
                
                include "pie.php";
            } else {
                VistaJuego::mostrarJuegosAPI();
            }
          
        }

        public static function mostrarJuegoAPI($id, $comments) {

            include "cabecera.php";            

            echo "<div class='row'>";

            $uri = "https://www.freetogame.com/api/game?id=".$id;
            
            $resultado = file_get_contents($uri, false);

            if ($resultado != false) {
                $respPHP = json_decode($resultado);

                echo "<div class='row mb-5'>";
                    echo "<div class='col'>";
                        echo "<h1>".$respPHP->title."</h1>";
                    echo "</div>";
                echo "</div>";

                echo "
                <div class='card mb-3' style='max-width: 1200px;'>
                    <div class='row g-0'>
                        <div class='col-md-4'>
                        <img src='".$respPHP->thumbnail."' class='img-fluid rounded-start mt-3' alt='...'>
                        </div>
                        <div class='col-md-8'>
                        <div class='card-body'>
                            <h5 class='card-title'>".$respPHP->title."</h5>
                            <p class='card-text'>Status: ".$respPHP->status."</p>
                            <p class='card-text'>Plataforma: ".$respPHP->platform."</p>
                            <p class='card-text'>Desarrollado por: ".$respPHP->developer."</p>
                            <p class='card-text'>Description: ".$respPHP->description."</p>
                            <a class='btn btn-primary' href='".$respPHP->game_url."' role='button'>Jugar</a>
                            <h5 class='card-title mt-3'>Comentarios:</h5>";
                            if ($comments != null) {
                                foreach ($comments as $comment) {
                                    echo "<p class='card-text'><small class='text-muted'>- ".$comment."</small></p>";
                                }
                            }
                            
                            echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalComment'>
                            Comentar
                            </button>
                            </p>
                        </div>
                        </div>
                    </div>
                    </div>
                ";

                echo "
                    <!-- MODALES -->
                    <div class='modal fade' id='modalComment' tabindex='-1'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title'>Comenta el juego</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <form action='enrutador.php' method='post' id='formComentar'>
                                <input type='hidden' name='id' value='".$id."'>
                                <input type='hidden' name='accion' value='comentar'>
                                 <textarea name='comment' rows='5' cols='40'></textarea> 
                            </form>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                            <button type='submit' form='formComentar' class='btn btn-primary'>Comentar</button>
                        </div>
                        </div>
                    </div>
                    </div> 
                ";

            }

            echo "</div>";

            include "pie.php";

        }

    }

?>