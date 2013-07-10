<?php

require_once 'model/obrasModel.php';
$ob= new Obras();
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    $ob-> agregar_obra();
    exit;
}


$tipoObra=$ob->get_tipoObra();
$autores=$ob->get_autor();
$deps=$ob->get_dependencias();
$premios=$ob->get_premio();
$meses=$ob->get_meses();
require_once 'vista/agregarObra.php';
?>
