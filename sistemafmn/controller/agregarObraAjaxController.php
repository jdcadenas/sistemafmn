<?php

require_once("../include/config.php");
require_once '../model/movimientosModel.php';
$o = new Movimientos();
$id = $_POST["id"];
$accion_mov = $_POST["accion_mov"];

switch ($accion_mov) {
    case "agregar":
        if (isset($_SESSION['carro'])) {
            $carro = $_SESSION['carro'];
        }
        $carro[md5($id)] = array('identificador' => md5($id), 'id' => $id);
        $_SESSION['carro'] = $carro;

        break;
    case "eliminar":
        $carro = $_SESSION['carro'];
        unset($carro[md5($id)]);
        $_SESSION['carro'] = $carro;

        break;
    default:

        break;
}

if (isset($_SESSION['carro'])) {
    $carro = $_SESSION['carro'];
} else {
    $carro = false;
}


foreach ($_SESSION["carro"] as $valor) {
    $datosRes = $o->get_obras_por_id($valor["id"]);
}
$tipoObra = $o->get_tipoObra();
$autores = $o->get_autor();
$deps = $o->get_dependencias();
$premios = $o->get_premio();
$meses = $o->get_meses();
if (isset($datosRes)) {
    require_once("../vista/obraAgregada.php");
} else {
    echo "<p class='Estilo2'> Ninguna obra Agregada a movimiento</p>";
}
?>
