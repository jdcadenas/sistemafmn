<?php

require_once 'model/depModel.php';
$d= new Dependencias();
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    $d->agregar_dependencia();
    exit;
}

require_once 'vista/agregarDep.php';
?>
