<?php
require_once 'model/depModel.php';
$d= new Dependencias();
if (isset($_GET["pos"])) {
    $inicio=$_GET["pos"];
}else{
    $inicio=0;
}

$datos=$d->get_dependencias();

require_once 'vista/repDep.php';
?>
