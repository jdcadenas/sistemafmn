<?php
require_once 'model/premioModel.php';

$p=new Premios();

if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    $p->modificar_Premio();
    exit;
}

$meses=$p->get_meses();
$datos=$p->get_Premio_por_id();

require_once 'vista/modificarPremio.php';
?>
