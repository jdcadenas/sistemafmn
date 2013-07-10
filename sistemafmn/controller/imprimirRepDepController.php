<?php
require_once 'public/pdfClasses/class.ezpdf.php';
require_once 'model/depModel.php';
$pdf =new Cezpdf('A3');
//seleccionamos la fuente
$pdf->selectFont('public/pdfClasses/fonts/Helvetica.afm');
//seteamos la información del documento que se creará

$pdf->ezStartPageNumbers(300, 500, 10, '', 'Pagina : {PAGENUM} de {TOTALPAGENUM}', 1);
// coloca una linea arriba y abajo de todas las paginas
$fechs = date("d/m/y");
$all = $pdf->openObject();
$pdf->saveState();
$pdf->setStrokeColor(0,0,0,1);
$pdf->line(20,30,750,30);
$pdf->line(20,1180,750,1180);
$pdf->addText(20,1165,10,'Ministerio del Poder Popular para la Cultura - Reporte de Dependencias');
$pdf->addText(650,1165,10,'Sistema fmn');
$pdf->addText(20,18,10,$fechs);
$pdf->restoreState();
$pdf->closeObject();
// termina las lineas
$pdf->addObject($all,'all');
//--------

$datacreator = array(
    'Title' => 'Reporte Autor PDF',
    'Author' => 'Andreina Delgado',
    'Subject' => 'Reporte Usuarios PDF',
    'Creator' => 'elandelo83@gmail.com',
    'Producer' => ''
);
$pdf->addInfo($datacreator);
//traemos la data de nuestra base de datos
$d = new Dependencias();

$datos = $d->get_dependencias();
/* $dompdf= new DOMPDF();
  $dompdf->load_html_file("vista/RepUsuariosSalida.php");
  $dompdf->render();
  $dompdf->stream("RepUsuariosfmn.pdf");
  require_once 'vista/RepUsuarios.php';
 */

//cargamos la información en el array multidimensional llamado data

for ($i = 0; $i < sizeof($datos); $i++) {//inicio for
    $data[] = array
        (
        "rif" => utf8_decode($datos[$i]["rif_dep"]),
        "nombre" => utf8_decode($datos[$i]["nom_dep"]),
        "direccion" => utf8_decode($datos[$i]["dir_dep"]),
        "telefono" => utf8_decode($datos[$i]["telf_dep"])
    );
}//fin for
$titles = array
    (
    "rif" => "Rif",
    "nombre" => "Nombre",
    "direccion" => utf8_decode("Dirección"),
    "telefono" => utf8_decode("Teléfono")
    
);

$options = array(
    'shadeCol' => array(0.9, 0.9, 0.9), //Color de las Celdas.
    'xOrientation' => 'center', //El reporte aparecerá Centrado.
    'width' => 700//Ancho de la Tabla.
);
//ponemos un título, 0, 200, 'full', 'center'
$pdf->ezText("<b>Listado de dependencias</b>\n ", 16);


//creamos la tabla dentro del pdf
$pdf->ezTable($data, $titles, 'Listado de Dependencias', $options);
//mostramos el pdf
//$documento_pdf = $pdf->ezOutput();
//$fichero = fopen('public/reportes/repUsuario.pdf','wb');
//fwrite ($fichero, $documento_pdf);
//fclose ($fichero);


$pdf->stream();

?>