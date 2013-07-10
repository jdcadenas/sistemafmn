<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Principal</title>
        <link href="public/estilo.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?php echo Conectar::ruta() ?>/public/js/funciones.js"></script>
    </head>
    <body onload="limpiar();"  onunload="cargar();" >
        <div id=contenedor >
            <div id="cabecera" >
                <img src="public/images/encabezado.gif" >
            </div>
            <div id="sesion">
                <?php include("sesion.php"); ?>
            </div>
            <div id="menu">
                <?php include("selecmenu.php"); ?>
            </div> 
            <div align="center" class="Estilo7">Operaciones Autor</div>
            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
           Principal </a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=autores" title="Autores" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/list.png" >
           Autores </a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarAutor" title="Buscar Autor" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
            Buscar</a> 
            <p class="Estilo7">Agregar Nuevo Autor</p>
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
                        <h5 style="color: red;">El autor ya existe en la base de datos</h5>
                        <?php
                        break;
                    case '3':
                        ?>
                        <h5 style="color: green;">El autor ha sido creado exitosamente</h5>
                        <?php
                        break;
                }
            }
            ?>

            <form action="" method="post" name="ingreso_autor">
                <table width="385" border="0" align="center" class="Estilo1">
                    <tr>
                        <td width="168" height="30" align="right">nombre Autor:</td><td width="207"><input name="nom_autor" type="text" ><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Apellido Autor:</td><td><input name="ape_autor" type="text" size="20" maxlength="20"><span class="Estilo2">*</span> </td>
                    </tr>
                    <tr>
                        <td align="right" height="30">País Autor:</td><td><input name="pais_autor" type="text" size="20" maxlength="20"><span class="Estilo2">*</span></td>
                    </tr>

                    <tr align="center">
                        <td colspan="2" align="center"><span class="Estilo3">los campos con * son obligatorios</span><br>
                            <br><input type="hidden" name="grabar" value="si">
                            <input class="Estilo1" type="submit" name="mant_aut" value="aceptar" >
                            <input class="Estilo1" type="reset" value="limpiar">
                            <input class="Estilo1" type="button" name="mant_usu" value="cancelar" onclick="history.back()" ></td>
                    </tr>
                </table>
            </form>
        </div>   
    </body>