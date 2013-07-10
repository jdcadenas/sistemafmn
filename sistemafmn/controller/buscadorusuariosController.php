<?php

require_once 'model/usuarioModel.php';
$u = new Usuarios();

if (isset($_GET["pos"])) {
    $inicio = $_GET["pos"];
} else {
    $inicio = 0;
}
echo $_GET["s"];
echo '<br>';

print_r($datos); exit;
if (isset($_GET["s"])) {
    $datos = $u->get_Usuarios_por_cedula();
} else {
    $datos = $u->get_Usuarios();
}

require_once 'vista/buscarUsuario.php';