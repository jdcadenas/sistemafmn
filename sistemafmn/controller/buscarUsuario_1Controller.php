<?php
require_once 'model/usuarioModel.php';
$u= new Usuarios();
$datos=$u->get_Usuarios();
require_once 'vista/usuarios.php';
?>
