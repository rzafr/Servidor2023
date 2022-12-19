<?php

    class VistaEnlaces {

        public static function render($enlaces) {

            include("./vistas/cabecera.php");

            // Botones de ordenar y de agregar enlaces si el ususario se ha logueado
            if (isset($_SESSION['usuario'])) {
              echo '<div class="row justify-content-end">
                        <div class="col-3">';
                        //if (isset($_GET['id'])) {
                            echo '<a href="enrutador.php?accion=ordenarEnlacesPrecio&id='.$_GET['id'].'" type="button" class="btn btn-success text-white m-3">Ordenar por precio</a>';
                        //}
                        echo '</div>
                      <div class="col-2">
                        <button type="button" class="btn btn-success m-3" data-bs-toggle="modal" data-bs-target="#nuevoEnlace">
                          Nuevo enlace
                        </button>
                      </div>
                    </div>';
            }

            // Pintamos los cards de los enlaces
            echo '<div class="row">';
                foreach($enlaces as $enlace) {
                    echo '<div class="col-4 ms-4 my-4">
                        <div class="card shadow-sm">
                            <img src='.$enlace->getImagen().' width="100%" height="400px"/>
                                <div class="card-body">
                                  <p class="card-text">'.$enlace->getNombre().'</p>
                                  <p class="card-text"><a href="'.$enlace->getEnlace().'">Ver en tienda</a></p>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-danger" href="./enrutador.php?accion=eliminarEnlace&id='.$enlace->getId().'&id_regalo='.$enlace->getId_regalo().'" role="button">
                                            Eliminar
                                        </a>
                                    </div>
                                    <small class="text-muted">Precio: '.$enlace->getPrecio().' €</small>
                                  </div>
                              </div>
                        </div>
                    </div>';
                }
            echo "</div>";

            include("./vistas/pie.php");
        }

        /**
         * Muestra un mensaje indicando que el regalo no tiene enlaces
         */
        public static function sinEnlaces() {

            include("./vistas/cabecera.php");

            echo "<div class='row justify-content-center p-3'>";
                echo "<div class='col-5'>";
                    echo "<h4>No dispones de enlaces actualmente</h4>";
                echo "</div>";
            echo "</div>";

            include("./vistas/pie.php");
        }

    }

?>