<?php

    class VistaEnlaces {

        public static function render($enlaces) {

        //   echo '<div class="card" style="width: 18rem;">
        //   <img src="vistas/img/honey.png" class="card-img-top" alt="...">
        //   <div class="card-body">
        //     <h5 class="card-title">Card title</h5>
        //     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card content.</p>
        //     <a href="#" class="btn btn-primary">Go somewhere</a>
        //   </div>
        // </div>';

            include("./vistas/cabecera.php");

            //Boton de agregar enlaces 
            if (isset($_SESSION['usuario'])) {
              echo '<button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#nuevoEnlace">
              Nuevo enlace
              </button>';
            }



                //INSERTAR FORMULARIO NUEVO ENLACE





            echo '<div class="row">';
              foreach($enlaces as $enlace) {
                echo '<div class="col-4 me-4">
                <div class="card shadow-sm">
                <img src='.$enlace->getImagen().' width="100%" height="400px"/>
                  <div class="card-body">
                    <p class="card-text">'.$enlace->getNombre().'</p>
                    <p class="card-text"><a href="'.$enlace->getEnlace().'">Ver en tienda</a></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="enrutador.php?accion=verPelicula&id='.$enlace->getId().'" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
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