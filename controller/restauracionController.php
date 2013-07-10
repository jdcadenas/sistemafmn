<?php
require_once 'model/movimientosModel.php';
require_once 'model/usuarioModel.php';
require_once 'model/depModel.php';
require_once 'model/obrasModel.php';
$u=new Usuarios();
$d=new Dependencias();
$m=new Movimientos();
$o=new Obras();



if(isset($_POST["grabar_rest"]) and $_POST["grabar_rest"]=="aceptar")
{  
    $_POST["id_depHacia"]=$_POST["id_depDesde"];
    $m-> agregar_obramov();
   
 
}
$meses=$m->get_meses();
$usuarios=$u->get_Usuarios();
$depen=$d->get_dependencias();
$obras=$m->get_Obras();
require_once 'vista/restauracion.php';
?>
