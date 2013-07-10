<?php
require_once 'model/obrasModel.php';

$ob=new Obras();

if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    $ob->modificar_obra();
    exit;
}
$meses=$ob->get_meses();
$tipoObra=$ob->get_tipoObra();
$autores=$ob->get_autor();
$deps=$ob->get_dependencias();
$premios=$ob->get_premio();
$datos=$ob->get_obras_por_id();

require_once 'vista/modificarObra.php';
?>
