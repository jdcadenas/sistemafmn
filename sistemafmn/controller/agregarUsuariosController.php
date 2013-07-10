<?php

require_once 'model/usuarioModel.php';
$u= new Usuarios();
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    $u->agregar_usuario();
    exit;
}


$tipo=$u->get_tipos();
$cargo=$u->get_cargo();
$dpto=$u->get_dpto();
$login=$u->get_login();

require_once 'vista/agregarUsuario.php';
?>
