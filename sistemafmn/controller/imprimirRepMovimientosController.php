<?php

require_once 'public/pdfClasses/class.pdf.php';
require_once 'public/pdfClasses/class.ezpdf.php';
require_once 'model/movimientosModel.php';
$pdf = new Cezpdf('A3');
//seleccionamos la fuente
$pdf->selectFont('public/pdfClasses/fonts/Helvetica.afm');
//seteamos la información del documento que se creará

$pdf->ezStartPageNumbers(650, 18, 20, '', 'Pagina : {PAGENUM} de {TOTALPAGENUM}', 1);
// coloca una linea arriba y abajo de todas las paginas
$fechs = date("d/m/y");
$all = $pdf->openObject();
$pdf->saveState();
$pdf->setStrokeColor(0, 0, 0, 1);
$pdf->line(20, 30, 750, 30);
$pdf->line(20, 1180, 750, 1180);
$pdf->addText(20, 1165, 10, 'Ministerio del Poder Popular para la Cultura - Reporte de Autores');
$pdf->addText(650, 1165, 10, 'Sistema fmn');
$pdf->addText(20, 18, 10, $fechs);
$pdf->restoreState();
$pdf->closeObject();
// termina las lineas
$pdf->addObject($all, 'all');
//--------

$datacreator = array(
    'Title' => 'Reporte Autor PDF',
    'Author' => 'Andreina Delgado',
    'Subject' => 'Reporte Movimientos PDF',
    'Creator' => 'elandelo83@gmail.com',
    'Producer' => ''
);
$pdf->addInfo($datacreator);
//traemos la data de nuestra base de datos
$m = new Movimientos();
$meses = $m->get_meses();
$tipoMov=$m->get_tipoMov();
$tipo=$_GET["tipo"];
if ($tipo==0){
$datos = $m->get_movimientos($inicio='');
}else{
    $datos = $m->get_movimientos_tipo($tipo);
}
/* $dompdf= new DOMPDF();
  $dompdf->load_html_file("vista/RepUsuariosSalida.php");
  $dompdf->render();
  $dompdf->stream("RepUsuariosfmn.pdf");
  require_once 'vista/RepUsuarios.php';
 */

function puntos_cm($medida, $resolucion = 72) {
    //// 2.54 cm / pulgada
    return ($medida / (2.54)) * $resolucion;
}

//cargamos la información en el array multidimensional llamado data
for ($i = 0; $i < sizeof($meses); $i++) {
    if (date("m") == $meses[$i]["id_mes"]) {
        $mes = $meses[$i]["mes"];
    }
}

$grupo = "";
for ($i = 0; $i < sizeof($datos); $i++) {//inicio for
    $grupoant = $grupo;
    $grupo = $datos[$i]["id_mov"];
    if ($grupoant != $grupo) {


        $data[] = array
            (
            "movimiento" => utf8_decode($datos[$i]["id_mov"]),
            "tipomov"=>'',
            "nombre" => '',
            "desde" => '',
            "hacia" => '',
            "fecha" => '',
            "responsable" => ''
      
            
        );
    }//fin for
$fecha = $datos[$i]["fec_mov"];

$dia = substr($fecha, 8, 2);
$mes = substr($fecha, 5, 2);
$anio = substr($fecha, 0, 4);
$fecha = $dia . "-" . $mes . "-" . $anio;
$idMov=$datos[$i]["tipomov"];


    $data[] = array
        (
        "movimiento" => '',
        "tipomov" =>utf8_decode($tipoMov[$idMov]),
        "nombre" => utf8_decode($datos[$i]["nom_obra"]),
        "desde" => utf8_decode($datos[$i]["Desde"]),
        "hacia" => utf8_decode($datos[$i]["Hacia"]),
        "fecha" => $fecha,
        "responsable" => utf8_decode($datos[$i]["nom_usu"])
        
    );
    


}



    $titles = array
        (
        
        "movimiento" => "Movimiento",
        "tipomov" =>"Tipo Mov",
        "nombre" => "Nombre de la Obra",
        "desde" => "Desde",
        "hacia" => "Hacia",
        "fecha" => "Fecha del Mov.",
        "responsable" => "Responsable"
      
        );





    $options = array(
        'shadeCol' => array(0.9, 0.9, 0.9), //Color de las Celdas.
        'xOrientation' => 'center', //El reporte aparecerá Centrado.
        'width' => 700//Ancho de la Tabla.
    );
//ponemos un título, 0, 200, 'full', 'center'
    $pdf->ezText("<b>Reporte de Movimientos</b>\n ", 16);


//creamos la tabla dentro del pdf
    $pdf->ezTable($data, $titles, 'Listado de Movimientos', $options);
//mostramos el pdf
//$documento_pdf = $pdf->ezOutput();
//$fichero = fopen('public/reportes/repUsuario.pdf','wb');
//fwrite ($fichero, $documento_pdf);
//fclose ($fichero);


    $pdf->stream();
?>