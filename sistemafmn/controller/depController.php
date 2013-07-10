<?php
require_once 'model/depModel.php';
$d=new Dependencias();

$datos=$d->get_dependencias();
require_once 'vista/dep.php';
?>
