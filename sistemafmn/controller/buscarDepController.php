<?php

require_once 'model/depModel.php';

$d = new Dependencias();

if (isset($_GET["pos"])) {
    $inicio = $_GET["pos"];
} else {
    $inicio = 0;
}


if (isset($_POST["buscar"]) and $_POST["buscar"] == "si") {

    $datos = $d->get_Dep_por_nombre();
}elseif (isset($_POST["buscarRif"]) and $_POST["buscarRif"] == "si") {
    $datos = $d->get_Dep_por_rif();
}


require_once 'vista/buscarDep.php';
?>
