<?php
require_once 'model/condicionModel.php';
$c=new Condicion();

if (isset($_GET["pos"])) {
    $inicio=$_GET["pos"];
}else{
    $inicio=0;
}

$datos=$c->get_Obras($inicio);
require_once 'vista/condicion.php';
?>
