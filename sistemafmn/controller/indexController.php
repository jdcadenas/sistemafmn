<?php
if (isset($_SESSION["id_u"])) {
    
    header("Location: ".Conectar::ruta()."/?accion=principal");
        exit();
    
}
require_once 'model/usuarioModel.php';

$u= new Usuarios();
if (isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
    
    $u->logueo();
    exit();
    
}
require_once 'vista/index.php';
?>
