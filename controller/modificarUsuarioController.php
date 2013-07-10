<?php
require_once 'model/usuarioModel.php';

$u=new Usuarios();

if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    $u->modificar_usuario();
    exit;
}


$datos=$u->get_Usuarios_por_id();

$tipo=$u->get_tipos();
$cargo=$u->get_cargo();
$dpto=$u->get_dpto();
require_once 'vista/modificarUsuario.php';
?>
