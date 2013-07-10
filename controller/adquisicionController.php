<?php

require_once 'model/adquisicionModel.php';
require_once 'model/usuarioModel.php';
require_once 'model/depModel.php';
require_once 'model/obrasModel.php';
$ob = new Obras();
$u = new Usuarios();
$d = new Dependencias();
$a = new Adquisicion();

if (isset($_POST["grabar_mov"]) and $_POST["grabar_mov"] == "aceptar") {

  $a->agregar_obraAdquirida();

  exit;
}

$tipoObra = $ob->get_tipoObra();
$autores = $ob->get_autor();
$deps = $ob->get_dependencias();
$premios = $ob->get_premio();
$meses = $ob->get_meses();
require_once 'vista/adquisicionObra.php';
?>
