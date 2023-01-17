            

                </div>
                <!-- End of Page Content -->

            </div>
            <!-- End of Main Content -->
            
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Formulario modal nuevo regalo -->
    <div class='modal fade' id='nuevoRegalo'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <div class='modal-title'>
                        <h1 class='h4 text-gray-900 mb-4'>Nuevo regalo</h1>
                    </div>            
                </div>
                <div class='modal-body'>
                    <div class='container-fluid'>
                        <form id="nuevoRegaloForm">
                            <div class='form-group'>
                                <input type='hidden' name='accion' class='form-control form-control-user'
                                    value='nuevoRegalo'>
                            </div>
                            <div class='form-group'>
                                <label for='nombre'>Nombre:</label>
                                <input type='text' name='nombre' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label for='destinatario'>Destinatario:</label>
                                <input type='text' name='destinatario' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label for='Precio'>Precio:</label>
                                <input type='text' name='precio' class='form-control'>
                            </div>
                            <div class='form-group'>
                            <label for='estado'>Estado:</label>
                                <select name='estado' class='form-control'>
                                    <option value='Pendiente' selected>Pendiente</option>
                                    <option value='Comprado'>Comprado</option>
                                    <option value='Envuelto'>Envuelto</option>
                                    <option value='Entregado'>Entregado</option>
                                </select>
                            </div>
                            <div class='form-group'>
                                <label for='year'>Año:</label>
                                <input type='text' name='year' class='form-control'>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" formaction="enrutador.php" formmethod="POST" form="nuevoRegaloForm">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario modal nuevo enlace -->
    <div class='modal fade' id='nuevoEnlace'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <div class='modal-title'>
                        <h1 class='h4 text-gray-900 mb-4'>Nuevo enlace</h1>
                    </div>            
                </div>
                <div class='modal-body'>
                    <div class='container-fluid'>
                        <form id="nuevoEnlaceForm" enctype="multipart/form-data">
                            <div class='form-group'>
                                <input type='hidden' name='accion' class='form-control form-control-user'
                                    value='nuevoEnlace'>
                            </div>
                            <?php
                                // Leemos $_GET[id] que lleva el id de regalo
                                if (isset($_GET['id'])) {
                                    echo "<input type='hidden' name='id_regalo' value='".$_GET['id']."'>";
                                }

                            ?>
                            <div class='form-group'>
                                <label for='nombre'>Nombre:</label>
                                <input type='text' name='nombre' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label for='enlace'>Enlace:</label>
                                <input type='text' name='enlace' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label for='Precio'>Precio:</label>
                                <input type='text' name='precio' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label for='imagen'>Imagen:</label>
                                <input type='file' name='imagen' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label for='prioridad'>Prioridad:</label>
                                <input type='range' name='prioridad' class='form-control' min="0" max="2">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" formaction="enrutador.php" formmethod="POST" form="nuevoEnlaceForm">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vistas/styles/jquery/jquery.min.js"></script>
    <script src="vistas/styles/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vistas/styles/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="vistas/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vistas/styles/datatables/jquery.dataTables.min.js"></script>
    <script src="vistas/styles/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="vistas/js/demo/datatables-demo.js"></script>
    



    <!-- Necesario para que funcione formulario en modal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


</body>

</html>