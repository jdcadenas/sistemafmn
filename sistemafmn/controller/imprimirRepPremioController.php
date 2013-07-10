<?php
require_once 'public/pdfClasses/class.pdf.php';
require_once 'public/pdfClasses/class.ezpdf.php';
require_once 'model/premioModel.php';
$pdf =new Cezpdf('a3');
//seleccionamos la fuente
$pdf->selectFont('public/pdfClasses/fonts/Helvetica.afm');
//seteamos la información del documento que se creará
$datacreator = array(
    'Title' => 'Reporte Autor PDF',
    'Author' => 'Andreina Delgado',
    'Subject' => 'Reporte Usuarios PDF',
    'Creator' => 'elandelo83@gmail.com',
    'Producer' => ''
);
$pdf->addInfo($datacreator);
//traemos la data de nuestra base de datos
$p = new Premios();
$meses = $p->get_meses();

$datos = $p->get_premio();
/* $dompdf= new DOMPDF();
  $dompdf->load_html_file("vista/RepUsuariosSalida.php");
  $dompdf->render();
  $dompdf->stream("RepUsuariosfmn.pdf");
  require_once 'vista/RepUsuarios.php';
 */
function puntos_cm ($medida, $resolucion=72)
{
   //// 2.54 cm / pulgada
   return ($medida/(2.54))*$resolucion;
}
//cargamos la información en el array multidimensional llamado data
for ($i = 0; $i < sizeof($meses); $i++) {
    if (date("m") == $meses[$i]["id_mes"]) {
        $mes = $meses[$i]["mes"];
    }
}
$fecha= date("d")."/".$mes."/". date("Y"); 
for ($i = 0; $i < sizeof($datos); $i++) {//inicio for
    $data[] = array
        (
        "nombre" => utf8_decode($datos[$i]["nom_premio"]),
        "fecha" => utf8_decode($datos[$i]["fec_premio"]),
        "evento" => utf8_decode($datos[$i]["event_premio"]),
        "pais" => utf8_decode($datos[$i]["pais_premio"]),
        "ciudad" => utf8_decode($datos[$i]["ciudad_premio"])
    );
}//fin for
$titles = array
    (
    "nombre" => "Nombre",
    "fecha" => "Fecha del Premio",
    "evento" => "Evento",
    "pais" => utf8_decode("País"),
    "ciudad" => "Ciudad"
    
);

$options = array(
    'shadeCol' => array(0.9, 0.9, 0.9), //Color de las Celdas.
    'xOrientation' => 'center', //El reporte aparecerá Centrado.
    'width' => 700//Ancho de la Tabla.
);
//ponemos un título, 0, 200, 'full', 'center'
$pdf->ezText("<b>Reporte de Premios Otorgados</b>\n ", 16);


//creamos la tabla dentro del pdf
$pdf->ezTable($data, $titles, 'Listado de Premios Otorgados', $options);
//mostramos el pdf
//$documento_pdf = $pdf->ezOutput();
//$fichero = fopen('public/reportes/repUsuario.pdf','wb');
//fwrite ($fichero, $documento_pdf);
//fclose ($fichero);
$pdf->ezText("\n\n\n",10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n",10);

$pdf->stream();

?>