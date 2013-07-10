<?php
require_once 'model/premioModel.php';
$p= new Premios();
if (isset($_GET["pos"])) {
    $inicio=$_GET["pos"];
}else{
    $inicio=0;
}
$meses=$p->get_meses();
$datos=$p->get_premio($inicio);

require_once 'vista/repPremios.php';
?>
