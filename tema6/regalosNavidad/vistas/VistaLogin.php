<?php

    class VistaLogin {

        public static function mostrarFormularioLogin($mensaje) {

?>


            <!DOCTYPE html>
            <html lang="en">

            <head>

                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="">

                <title>Regalos de Navidad</title>

                <!-- Custom fonts for this template-->
                <link href="vistas/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
                <link
                    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                    rel="stylesheet">

                <!-- Custom styles for this template-->
                <link href="vistas/css/sb-admin-2.min.css" rel="stylesheet">

            </head>

            <body class="bg-gradient-danger">

                <div class="container">

                    <!-- Outer Row -->
                    <div class="row justify-content-center">

                        <div class="col-xl-5 col-lg-7 col-md-4">

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">¬°Bienvenido!</h1>
                                                    <p class='text-danger'><?= $mensaje; ?></p>
                                                </div>

                                                <!-- <?php
                                                    // if ($_GET) {
                                                    //     if (isset($_GET['mensaje'])) {
                                                    //         if ($_GET['mensaje'] == "passwordCorta")
                                                    //             echo "<p class='text-danger'>La password tiene que tener mas de 8 caracteres</p>";
                                                    //         if ($_GET['mensaje'] == "passwordMayuscula")
                                                    //             echo "<p class='text-danger'>La password tiene que tener al menos una mayuscula</p>";
                                                    //         if ($_GET['mensaje'] == "introduceEmail")
                                                    //             echo "<p class='text-danger'>Email no introducido</p>";
                                                    //     }
                                                    // }
                                                ?> -->

                                                <!-- Formulario login  -->
                                                <form method='post' class="user" action='enrutador.php'>
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-control form-control-user"
                                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                                            placeholder="Enter Email Address...">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="password" class="form-control form-control-user"
                                                            id="exampleInputPassword" placeholder="Password">
                                                    </div>
                                                    <input type='hidden' name='accion' value='checkLogin'>
                                                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                                                        <button type="submit" class="btn btn-success">Login</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="vistas/vendor/jquery/jquery.min.js"></script>
                <script src="vistas/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vistas/vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="vistas/js/sb-admin-2.min.js"></script>

            </body>

            </html>

<?php
        }


    }

?>