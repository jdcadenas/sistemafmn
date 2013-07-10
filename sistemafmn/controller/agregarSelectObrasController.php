<?php

require_once("../include/config.php");
require_once '../model/movimientosModel.php';
$o = new Movimientos();
$id = $_POST["id"];
$accion_mov = $_POST["accion_mov"];

$obras = $o->get_obras_por_dep($id);

if (empty($obras)){
     echo "<p class='Estilo2'>Esta dependencia no tiene obras</p>";
}else{
    require_once("../vista/obrasSelectDep.php");
}



?>
