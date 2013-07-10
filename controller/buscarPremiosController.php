<?php

require_once 'model/premioModel.php';

$p = new Premios();

if (isset($_GET["pos"])) {
    $inicio = $_GET["pos"];
} else {
    $inicio = 0;
}


if (isset($_POST["buscar"]) and $_POST["buscar"] == "si") {

    $datos = $p->get_Premios_por_nombre();
}


require_once 'vista/buscarPremios.php';
?>
