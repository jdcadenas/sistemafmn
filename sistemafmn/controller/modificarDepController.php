<?php
require_once 'model/depModel.php';

$d=new Dependencias();

if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    $d->modificar_Dependencia();
    exit;
}


$datos=$d->get_Dep_por_id();

require_once 'vista/modificarDep.php';
?>
