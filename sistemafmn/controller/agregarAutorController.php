<?php
require_once 'model/autorModel.php';
$a= new Autores();
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    $a->agregar_autor();
    exit;
}

require_once 'vista/agregarAutor.php';
?>
