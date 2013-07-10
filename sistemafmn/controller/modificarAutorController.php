<?php
require_once 'model/autorModel.php';

$a=new Autores();

if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    $a->modificar_Autor();
    exit;
}


$datos=$a->get_Autores_por_id();

require_once 'vista/modificarAutor.php';
?>
