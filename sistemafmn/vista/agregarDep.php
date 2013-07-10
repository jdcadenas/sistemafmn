<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Principal</title>
        <link href="public/estilo.css" rel="stylesheet" type="text/css">
         <script type="text/javascript" language="javascript" src="<?php echo Conectar::ruta()?>/public/js/funciones.js"></script>
    </head>
    <body onunload="cargar();">
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
            <div align="center" class="Estilo7">Operaciones Dependencias</div>
            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
            Principal</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=dep" title="Dependencias" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/list.png" >
            Dependencias</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarDep" title="Buscar Dependencias" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
            Buscar</a> 
            <p class="Estilo7">Agregar Nueva Dependencia</p>
            <?php
            if (isset($_GET["m"])) {
                switch ($_GET["m"]) {
                    case '1':
                        ?>
                        <h5 style="color: red;">Los dato están vacíos</h5>
                        <?php
                        break;
                    case '2':
                        ?>
                        <h5 style="color: red;">La dependencia ya existe en la base de datos</h5>
                        <?php
                        break;
                    case '3':
                        ?>
                        <h5 style="color: green;">La Dependencia ha sido creado exitosamente</h5>
                        <?php
                        break;
                }
            }
            ?>

            <form action="" method="post" name="ingreso_dep">
                <table width="700" border="0" align="center" class="Estilo1">
                    <tr>
                        <td width="30" height="30" align="right">Rif:</td><td width="300"><input name="rif_dep" type="text" ><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Nombre:</td><td><input name="nom_dep" type="text" size="60" maxlength="60"><span class="Estilo2">*</span> </td>
                    </tr>
                    <tr>
                        <td align="right" height="30">dirección:</td><td><textarea name="dir_dep" rows="5" cols="50"></textarea><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Teléfono:</td><td><input name="telf_dep" type="text" size="30" maxlength="15"><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><span class="Estilo3">los campos con * son obligatorios</span><br>
                            <br><input type="hidden" name="grabar" value="si">
                            <input class="Estilo1" type="submit" name="mant_dep" value="aceptar">
                            <input class="Estilo1" type="reset" value="limpiar">
                            <input class="Estilo1" type="button" name="mant_dep1" value="cancelar" onclick="history.back()"></td>
                    </tr>
                </table>
            </form>
        </div>   
    </body>