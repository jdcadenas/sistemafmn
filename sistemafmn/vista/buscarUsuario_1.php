<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Principal</title>
        <link href="public/estilo.css" rel="stylesheet" type="text/css">
         <script type="text/javascript" language="javascript" src="<?php echo Conectar::ruta()?>/public/js/funciones.js"></script>
    </head>
    <body >
        <div id="contenedor" >
            <div id="cabecera" >
                <img src="public/images/encabezado.gif" >
            </div>
            <div id="sesion">
                <?php include("sesion.php"); ?>
            </div>
            <div id="menu">
                <?php include("selecmenu.php"); ?>
            </div>
            <div align="center" class="Estilo7">Operaciones Usuarios</div>
            
            <a href="<?php echo Conectar::ruta()?>/?accion=principal" title="Volver a principal">
<img src="<?php echo Conectar::ruta()?>/public/images/home.png" border="0">
</a>Principal
            
            <a href="<?php echo Conectar::ruta() ?>/?accion=agregarUsuarios" title="Nuevo Usuario" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/add_32.png" >
            </a>Agregar
           
            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarUsuario" title="Buscar Usuario" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
            </a> Buscar
            <hr>
            
           
        </div>
    </body>

</HTML>