<?php

require_once 'model/obrasModel.php';

$o = new Obras();

if (isset($_GET["pos"])) {
    $inicio = $_GET["pos"];
} else {
    $inicio = 0;
}


if (isset($_POST["buscar"]) and $_POST["buscar"] == "si") {

    $datos = $o->get_Obra_por_nombre();
}


require_once 'vista/buscarObra.php';
?>
