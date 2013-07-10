<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Modificar Obra</title>
        <link href="public/estilo.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" language="javascript" src="<?php echo Conectar::ruta() ?>/public/js/funciones.js"></script>
    </head>
    <body >
        <div id="contenedor">
            <div id="cabecera"><img src="public/images/encabezado.gif" alt="logo"></div>
            <div id="sesion">
                <?php include("sesion.php"); ?>
            </div>
            <div id="menu">
                <?php include("selecmenu.php"); ?>
            </div>
            <div align="center" class="Estilo7">Operación Condición Obras</div>

            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver al principal"><img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">Principal</a>
            <a href="<?php echo Conectar::ruta() ?>/?accion=condicion" title="Volver a Condiciones de las Obras"><img src="<?php echo Conectar::ruta() ?>/public/images/list.png" border="0">Condiciones</a>
            <a href="<?php echo Conectar::ruta() ?>/?accion=obras" title="Volver a lista Obras"><img src="<?php echo Conectar::ruta() ?>/public/images/list.png" border="0">Obras</a>
            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarObras" title="Buscar Obras" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
            Buscar</a> 
            <p class="Estilo7">Editar Condición de la Obra <?php echo $datos[0]["nom_obra"]; ?></p>
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
                        <h5 style="color: red;">El nombre de la Obra ya existe en la base de datos</h5>
                        <?php
                        break;
                    case '3':
                        ?>
                        <h5 style="color: green;">La Obra ha sido modificado exitosamente</h5>
                        <?php
                        break;
                }
            }
            ?>

            <form action="" method="post" name="mod_obra" enctype="multipart/form-data">
                <table width="385" border="0" align="center" class="Estilo1">
                    <tr>
                        <td width="168" height="30" align="right">Nombre Obra:</td>
                        <td width="207"><input name="nom_obra" type="text" size="50" maxlength="50" value="<?php echo $datos[0]["nom_obra"] ?>" readonly="">
                    </tr>
                   
                    
                    <tr>
                        <td align="right" height="30">Condición de la obra:</td><td><textarea name="cond_obra"  rows="5" cols="50"><?php echo $datos[0]["cond_obra"] ?></textarea><span class="Estilo2">*</span></td>
                    </tr>
                   
                   
                    
                  

                    <tr>
                        <td colspan="2" align="center">

                            <input type="hidden" name="id_obra" value="<?php echo $_GET["v"]; ?>">
                           
                            <input type="hidden" name="grabar" value="si">
                            <input class="Estilo1" type="submit" name="mant_usu" value="aceptar">
                            <input class="Estilo1" type="reset" value="limpiar">
                            <input class="Estilo1" type="button" name="cancelar" value="cancelar" onclick="history.back()"></td>
                    </tr>
                </table>
            </form>
        </div>