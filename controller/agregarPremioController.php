<?php

require_once 'model/premioModel.php';
$p= new Premios();
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    $p->agregar_premio();
    exit;
}
$meses=$p->get_meses();
require_once 'vista/agregarPremio.php';
?>
