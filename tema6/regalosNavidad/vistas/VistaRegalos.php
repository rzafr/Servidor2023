<?php

    class VistaRegalos {

        /**
         * Muestra la tabla de regalos
         */
        public static function mostrarRegalos($regalos) {

            include("./vistas/cabecera.php");

            // HAY QUE MODIFICAR LOS BUSCADORES

            echo "<div class='row justify-content-end p-3'>";
                echo "<div class='col-2'>";
                    echo "<form action='enrutador.php' method='get'>";
                        echo "<input type='text' name='buscadorYear' class='form-control' placeholder='Buscar por año'>";
                echo "</div>";
                echo "<div class='col-2'>";
                        echo "<input type='submit' name='buscarYear' value='Buscar' class='form-control btn btn-success'>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            
            
            echo '<div class="card shadow mb-4 mt-5">
                    <div class="card-body">';
                        echo '<div class="table-responsive">';
                        echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>Nombre</th>
                                    <th>Destinatario</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                    <th>Año</th>
                                    <th colspan='3'>Acciones</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                            foreach($regalos as $regalo) {
                                echo "<tr>";
                                    echo "<td>
                                            <form method='get' class='user' action='./enrutador.php'>
                                            <div class='form-group'>
                                                <input type='text' name='nombre' class='form-control' value='".$regalo->getNombre()."'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='form-group'>
                                                <input type='text' name='destinatario' class='form-control' value='".$regalo->getDestinatario()."'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='form-group'>
                                                <input type='text' name='precio' class='form-control' value='".$regalo->getPrecio()."' style='width:100px;'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='form-group'>
                                            <select name='estado' class='form-control' style='width:150px;'>";
                                                if ($regalo->getEstado() == "Pendiente") {
                                                    echo "<option value='Pendiente' selected>Pendiente</option>
                                                            <option value='Comprado'>Comprado</option>
                                                            <option value='Envuelto'>Envuelto</option>
                                                            <option value='Entregado'>Entregado</option>";
                                                } else if ($regalo->getEstado() == "Comprado") {
                                                    echo "<option value='Pendiente'>Pendiente</option>
                                                            <option value='Comprado' selected>Comprado</option>
                                                            <option value='Envuelto'>Envuelto</option>
                                                            <option value='Entregado'>Entregado</option>";
                                                } else if ($regalo->getEstado() == "Envuelto") {
                                                    echo "<option value='Pendiente'>Pendiente</option>
                                                            <option value='Comprado'>Comprado</option>
                                                            <option value='Envuelto' selected>Envuelto</option>
                                                            <option value='Entregado'>Entregado</option>";
                                                } else {
                                                    echo "<option value='Pendiente'>Pendiente</option>
                                                            <option value='Comprado'>Comprado</option>
                                                            <option value='Envuelto'>Envuelto</option>
                                                            <option value='Entregado' selected>Entregado</option>";
                                                }
                                        echo "</select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='form-group'>
                                                <input type='text' name='year' class='form-control' value='".$regalo->getYear()."' style='width:100px;'>
                                            </div>
                                            <div class='form-group'>
                                                <input type='hidden' name='accion' class='form-control form-control-user'
                                                    value='modificarRegalo'>
                                            </div>
                                            <div class='form-group'>
                                                <input type='hidden' name='id' class='form-control form-control-user'
                                                    value='".$regalo->getId()."'>
                                            </div>
                                        </td>
                                        <td>
                                            <input type='submit' name='modificarRegalo' value='Modificar' class='btn btn-success btn-user btn-block'>
                                            </form>
                                        </td>
                                        <td>
                                            <a class='btn btn-outline-success' href='./enrutador.php?accion=mostrarEnlaces&id=".$regalo->getId()."' role='button'>
                                                Tienda
                                            </a>
                                        </td>
                                        <td>
                                            <a class='btn btn-danger' href='./enrutador.php?accion=eliminarRegalo&id=".$regalo->getId()."' role='button'>
                                                Eliminar
                                            </a>
                                        </td>";
                                echo "</tr>";
                            }
                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";

            include("./vistas/pie.php");
        }

        /**
         * Muestra un mensaje indicando que el usuario no tiene regalos
         */
        public static function sinRegalos() {

            include("./vistas/cabecera.php");

            echo "<div class='row justify-content-center p-3'>";
                echo "<div class='col-5'>";
                    echo "<h4>No dispones de regalos actualmente</h4>";
                echo "</div>";
            echo "</div>";

            include("./vistas/pie.php");
        }

        /**
         * Genera un PDF con los regalos y enlaces del usuario de la sesion
         * Si los regalos no tienen enlaces no aparecen en el PDF aquellos no aparecen
         */
        public static function generarPDF($regalosConEnlaces) {

            // create new PDF document
            $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->setCreator(PDF_CREATOR);
            $pdf->setAuthor('Ruben');
            $pdf->setTitle('Regalos de Navidad');
            $pdf->setSubject('Regalos');
            $pdf->setKeywords('PHP, PDF, regalos, enlaces');

            // set default header data
            //$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
            $pdf->setFooterData(array(0,64,0), array(0,64,128));

            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->setFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            // ---------------------------------------------------------

            // set default font subsetting mode
            $pdf->setFontSubsetting(true);

            // Set font
            // dejavusans is a UTF-8 Unicode font, if you only need to
            // print standard ASCII chars, you can use core fonts like
            // helvetica or times to reduce file size.
            $pdf->setFont('dejavusans', '', 14, '', true);

            // Add a page
            // This method has several options, check the source code documentation for more information.
            $pdf->AddPage();


            // CREAR TABLA SIN FUNCION

            // set text shadow effect
            $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

            // Set some content to print
            $html = "
            <h1>REGALOS DE NAVIDAD</h1>
            <i>Ideas para regalar en Navidad</i><br><br>";
            $html .= "<table border='1'>";
            $html .= "<tr><td>Nombre</td><td>Destinatario</td><td>Precio</td><td>Enlaces</td></tr><br/>";

            foreach($regalosConEnlaces as $regaloConEnlace) {
                $html .= "<tr>";
                $html .= "<td>".$regaloConEnlace->getNombre()."</td>";
                $html .= "<td>".$regaloConEnlace->getDestinatario()."</td>";
                $html .= "<td>".$regaloConEnlace->getPrecio()."</td>";
                $html .= "<td>".$regaloConEnlace->enlace."</td>";
                $html .= "</tr>";
                $html .= "<br/>";
            }

            $html .= "</table>";

            // Print text using writeHTMLCell()
            $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

            // ---------------------------------------------------------

            // echo "Generando ...";

            // Close and output PDF document
            // This method has several options, check the source code documentation for more information.
            $flujo = $pdf->Output('regalos.pdf', 'S');
            file_put_contents("regalos.pdf", $flujo);

            // echo "Generado.";
            //============================================================+
            // END OF FILE
            //============================================================+
            
        }

    }

?>