<?php

require_once 'model/autorModel.php';

$a = new Autores();

if (isset($_GET["pos"])) {
    $inicio = $_GET["pos"];
} else {
    $inicio = 0;
}


if (isset($_POST["buscar"]) and $_POST["buscar"] == "si") {

    $datos = $a->get_autor();
}


require_once 'vista/buscarAutor.php';
?>
