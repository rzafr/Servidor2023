            

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

    <!-- Formulario modal nueva partida -->
    <div class='modal fade' id='nuevaPartida'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <div class='modal-title'>
                        <h1 class='h4 text-gray-900 mb-4'>Nueva partida</h1>
                    </div>            
                </div>
                <div class='modal-body'>
                    <div class='container-fluid'>
                        <form id="nuevaPartidaForm">
                            <div class='form-group'>
                                <input type='hidden' name='accion' class='form-control form-control-user'
                                    value='nuevaPartida'>
                            </div>
                            <div class='form-group'>
                                <label for='fecha'>Fecha:</label>
                                <input type='date' name='fecha' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label for='hora'>Hora:</label>
                                <input type='text' name='hora' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label for='ciudad'>Ciudad:</label>
                                <input type='text' name='ciudad' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label for='lugar'>Lugar:</label>
                                <input type='text' name='lugar' class='form-control'>
                            </div>
                            <div class='form-check'>
                                <input type='checkbox' name='cubierta' class='form-check'>
                                <label for='cubierta'>Cubierta</label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" formaction="enrutador.php" formmethod="POST" form="nuevaPartidaForm">Agregar</button>
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