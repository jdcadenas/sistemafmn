<?php

require_once 'public/pdfClasses/class.pdf.php';
require_once 'public/pdfClasses/class.ezpdf.php';
require_once 'model/usuarioModel.php';
$pdf = new Cezpdf('a3');
//seleccionamos la fuente
$pdf->selectFont('public/pdfClasses/fonts/Helvetica.afm');

// coloca una linea arriba y abajo de todas las paginas
$fechs = date("d/m/y");
$all = $pdf->openObject();
$pdf->saveState();
$pdf->setStrokeColor(0, 0, 0, 1);
$pdf->line(20, 30, 750, 30);
$pdf->line(20, 1180, 750, 1180);
$pdf->addText(20, 1165, 10, 'Ministerio del Poder Popular para la Cultura - Reporte de Usuarios');
$pdf->addText(650, 1165, 10, 'Sistema fmn');
$pdf->addText(20, 18, 10, $fechs);
$pdf->ezStartPageNumbers(320, 18, 8, '','Pagina : {PAGENUM} de {TOTALPAGENUM}', 1);
$pdf->restoreState();
$pdf->closeObject();
// termina las lineas
$pdf->addObject($all, 'all');
//--------
//seteamos la información del documento que se creará
$datacreator = array(
    'Title' => 'Reporte USUARIOS PDF',
    'Author' => 'Andreina Delgado',
    'Subject' => 'Reporte Usuarios PDF',
    'Creator' => 'elandelo83@gmail.com',
    'Producer' => ''
);
$pdf->addInfo($datacreator);
//traemos la data de nuestra base de datos
$u = new Usuarios();
$meses = $u->get_meses();
$tipos = $u->get_tipos();
$datos = $u->get_Usuarios();
/* $dompdf= new DOMPDF();
  $dompdf->load_html_file("vista/RepUsuariosSalida.php");
  $dompdf->render();
  $dompdf->stream("RepUsuariosfmn.pdf");
  require_once 'vista/RepUsuarios.php';
 */

//cargamos la información en el array multidimensional llamado data

$grupo = "";
for ($i = 0; $i < sizeof($datos); $i++) {//inicio for
    $grupoant = $grupo;
    $grupo = $datos[$i]["tip_usu"];
    if ($grupoant != $grupo) {


        $data[] = array
            (
            "tipo" => $datos[$i]["tip_usu"],
            "cedula" => '',
            "nombre" => '',
            "apellido" => '',
            "cargo" => ''
        );
    }//fin for
    $data[] = array
        (
        "tipo" => '',
        "cedula" => utf8_decode($datos[$i]["ci_usu"]),
        "nombre" => utf8_decode($datos[$i]["nom_usu"]),
        "apellido" => utf8_decode($datos[$i]["ape_usu"]),
        "cargo" => utf8_decode($datos[$i]["cargo_usu"])
    );
}


$titles = array
    (
    "tipo" =>"Tipo",
    "cedula" => utf8_decode("Cédula"),
    "nombre" => "Nombre",
    "apellido" => "Apellido",
    "cargo" => "Cargo Usuario"
);

$options = array(
    'shadeCol' => array(0.9, 0.9, 0.9), //Color de las Celdas.
    'xOrientation' => 'center', //El reporte aparecerá Centrado.
    'width' => 700//Ancho de la Tabla.
);
//ponemos un título, 0, 200, 'full', 'center'
$pdf->ezText("<b>Reporte de Usuarios</b>\n ", 16);


//creamos la tabla dentro del pdf
$pdf->ezTable($data, $titles, 'Listado de Usuarios', $options);
//mostramos el pdf
//$documento_pdf = $pdf->ezOutput();
//$fichero = fopen('public/reportes/repUsuario.pdf','wb');
//fwrite ($fichero, $documento_pdf);
//fclose ($fichero);


$pdf->stream();
?>