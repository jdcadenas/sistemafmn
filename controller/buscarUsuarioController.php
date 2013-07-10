<?php

require_once 'model/usuarioModel.php';

$u = new Usuarios();

if (isset($_POST["buscar"]) and $_POST["buscar"] == "si") {

    $datos = $u->get_Usuarios_por_cedula();
}


require_once 'vista/buscarUsuario.php';
?>
