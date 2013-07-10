<?php

require_once 'model/movimientosModel.php';
$m = new Movimientos();
if (isset($_GET["pos"])) {
    $inicio = $_GET["pos"];
} else {
    $inicio = 0;
}

$meses = $m->get_meses();
$tipoMov = $m->get_tipoMov();

switch ($_GET["tipo"]) {
    case 0:
        $datos = $m->get_movimientos($inicio);

        break;
    case 1:
    case 2:
    case 3:
        $datos = $m->get_movimientos_tipo($_GET["tipo"]);

        break;
    default:
        break;
}






require_once 'vista/repMovimientos.php';
?>
