<?php

require_once 'model/obrasModel.php';

$o=new Obras();

$datos=$o->get_obras_por_id();

$o->eliminar_Obra();
?>
