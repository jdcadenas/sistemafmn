<?php
require_once 'model/usuarioModel.php';
$u= new Usuarios();
if (isset($_GET["pos"])) {
    $inicio=$_GET["pos"];
}else{
    $inicio=0;
}
$meses=$u->get_meses();
$datos=$u->get_Usuarios($inicio);

require_once 'vista/repUsuarios.php';
?>
