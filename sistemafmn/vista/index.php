<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>Sistema de Seguimiento y Control de Prestamos de Obras de Arte</title>
        <link href="public/estilo.css" rel="stylesheet" type="text/css">
         <script type="text/javascript" languge="javascript" src="<?php echo Conectar::ruta() ?>/public/js/funciones.js"></script>
    </head>
    <body >
        <div id="contenedor" >
            <div id="cabecera" >
                <div class="centrar-imagen"><img src="public/images/encabezado.gif" ></div>
            </div>
            <div id="izquierda">
                <img src="public/images/obra_inicio.jpg" alt="obra">
            </div>
            <div id="derecha">
                <?php include("vista/centro.php"); ?>
            </div>
        </div>
    </body>

</HTML>