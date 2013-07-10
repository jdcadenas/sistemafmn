<?php
require_once 'model/obrasModel.php';
$o=new Obras();

if (isset($_GET["pos"])) {
    $inicio=$_GET["pos"];
}else{
    $inicio=0;
}

$datos=$o->get_Obras($inicio);
require_once 'vista/obras.php';
?>
