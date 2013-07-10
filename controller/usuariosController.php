<?php
require_once 'model/usuarioModel.php';
$u=new Usuarios();

if (isset($_GET["pos"])) {
    $inicio=$_GET["pos"];
}else{
    $inicio=0;
}

$datos=$u->get_Usuarios($inicio);
require_once 'vista/usuarios.php';
?>
