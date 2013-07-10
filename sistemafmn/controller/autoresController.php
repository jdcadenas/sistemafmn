<?php
require_once 'model/autorModel.php';
$a=new Autores();

if (isset($_GET["pos"])) {
    $inicio=$_GET["pos"];
}else{
    $inicio=0;
}

$datos=$a->get_autor($inicio);
require_once 'vista/autor.php';
?>
