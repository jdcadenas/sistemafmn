<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Principal</title>
        <link href="public/estilo.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" language="javascript" src="<?php echo Conectar::ruta()?>/public/js/funciones.js"></script>
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
            <div align="center" class="Estilo7">Operaciones Usuarios</div>
            
            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver al principal"><img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">Principal</a>
            <a href="<?php echo Conectar::ruta() ?>/?accion=dep" title="Volver a lista Dependencias"><img src="<?php echo Conectar::ruta() ?>/public/images/list.png" border="0">Dependencias</a>
            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarDep" title="Buscar Dependencias" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
           Buscar </a> 
            <p class="Estilo7">Editar Dependencia(<?php echo $datos[0]["rif_dep"]; ?>)</p>
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
                                <h5 style="color: green;">La dependencia ha sido modificado exitosamente</h5>
                                    <?php
                                    break;
                            }
                        }
                        ?>

                        <form action="" method="post" name="mod_dep">
                            <table width="500" border="0" align="center" class="Estilo1">
                                <tr>
                                    <td width="30" height="30" align="right">Rif:</td>
                                    <td width="300"><input name="rif_dep" type="text" size="40" maxlength="40" value="<?php echo $datos[0]["rif_dep"] ?>" ><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td align="right" height="30">Nombre:</td><td><input name="nom_dep" type="text" size="80" maxlength="100" value="<?php echo $datos[0]["nom_dep"] ?>"><span class="Estilo2">*</span> </td>
                                </tr>
                                <tr>
                                    <td align="right" >Dirección:</td><td><textarea name="dir_dep" rows="5" cols="50"><?php echo $datos[0]["dir_dep"] ?></textarea>

<span class="Estilo2">*</span></td>
                                </tr>
<tr>
                                    <td align="right" height="30">Teléfono:</td><td><input name="telf_dep" type="text" size="28" maxlength="28" value="<?php echo $datos[0]["telf_dep"] ?>"><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><span class="Estilo3">los campos con * son obligatorios</span><br>
                                        <br>
                                                                             
                                        <input type="hidden" name="id_dep" value="<?php echo $_GET["v"]; ?>">
                                        <input type="hidden" name="grabar" value="si">
                                        <input class="Estilo1" type="submit" name="mant_usu" value="aceptar">
                                        <input class="Estilo1" type="reset" value="limpiar">
                                        <input class="Estilo1" type="button" name="cancelar" value="cancelar" onclick="history.back()"></td>
                                </tr>
                            </table>
                        </form>
        </div>