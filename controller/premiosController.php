<?php
require_once 'model/premioModel.php';
$p=new Premios();

$datos=$p->get_premio();
require_once 'vista/premios.php';
?>
