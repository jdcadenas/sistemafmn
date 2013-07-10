<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Principal</title>
        <link href="public/estilo.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" language="javascript" src="<?php echo Conectar::ruta()?>/public/js/funciones.js"></script>
    </head>
    <body onload="limpiar();">
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
            <a href="<?php echo Conectar::ruta() ?>/?accion=usuarios" title="Volver a lista usuarios"><img src="<?php echo Conectar::ruta() ?>/public/images/list.png" border="0">usuarios</a>
            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarUsuario" title="Buscar Usuario" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
            Buscar</a> 
            <p class="Estilo7">Editar Usuario (<?php echo $datos[0]["nom_usu"]; ?>)</p>
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
                            <h5 style="color: red;">El login ingresado ya existe en la base de datos</h5>
                                <?php
                                break;
                            case '3':
                                ?>
                                <h5 style="color: green;">El usuario ha sido modificado exitosamente</h5>
                                    <?php
                                    break;
                            }
                        }
                        ?>

                        <form action="" method="post" name="mod_usuario">
                            <table width="385" border="0" align="center" class="Estilo1">
                                <tr>
                                    <td width="168" height="30" align="right">Cedula de Identidad:</td><td width="207"><input name="ci_usu" type="text" size="10" maxlength="10" value="<?php echo $datos[0]["ci_usu"] ?>" ><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td align="right" height="30">Nombre:</td><td><input name="nom_usu" type="text" size="15" maxlength="15" value="<?php echo $datos[0]["nom_usu"] ?>"><span class="Estilo2">*</span> </td>
                                </tr>
                                <tr>
                                    <td align="right" height="30">Apellido:</td><td><input name="ape_usu" type="text" size="15" maxlength="15" value="<?php echo $datos[0]["ape_usu"] ?>"><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td align="right" height="30">Perfil:</td>
                                    <td><select name="tip_usu" class="Estilo1">
                                            <?php
                                            for ($i = 0; $i < sizeof($tipo); $i++) {
                                                if ($tipo[$i] == $datos[0]["tip_usu"]) {
                                                    ?>
                                                    <option value="<?php echo $tipo[$i]; ?>" title="<?php echo $tipo[$i]; ?>" selected="selected"><?php echo $tipo[$i]; ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $tipo[$i]; ?>" title="<?php echo $tipo[$i]; ?>"><?php echo $tipo[$i]; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td align="right" height="30">Departamento:</td><td><select name="dep_usu" class="Estilo1">
                                            <?php
                                            for ($i = 0; $i < sizeof($dpto); $i++) {
                                                if ($dpto[$i] == $datos[0]["dep_usu"]) {
                                                    ?>
                                                    <option value="<?php echo $dpto[$i]; ?>" title="<?php echo $dpto[$i]; ?>" selected="selected"><?php echo $dpto[$i]; ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $dpto[$i]; ?>" title="<?php echo $dpto[$i]; ?>"><?php echo $dpto[$i]; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select><span class="Estilo2">*</span></td>
                                        </tr>
                                        <tr>
                                            <td align="right" height="30">Cargo:</td><td><select name="cargo_usu" class="Estilo1">
                                            <?php
                                            for ($i = 0; $i < sizeof($cargo); $i++) {
                                                if ($cargo[$i] == $datos[0]["cargo_usu"]) {
                                                    ?>
                                                    <option value="<?php echo $cargo[$i]; ?>" title="<?php echo $cargo[$i]; ?>" selected="selected"><?php echo $cargo[$i]; ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $cargo[$i]; ?>" title="<?php echo $cargo[$i]; ?>"><?php echo $cargo[$i]; ?></option>
                                                    <?php 
                                                }
                                            }
                                            ?>
                                        </select><span class="Estilo2">*</span></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" height="30">Login de sesion:</td><td><input name="login" type="text" size="15" maxlength="15" value="<?php echo $datos[0]["login"] ; ?>"><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td align="right" height="30">Contrase&ntilde;a</td><td><input name="contrasena" type="password" size="15" maxlength="15" value="<?php echo $datos[0]["contrasena"] ?>"><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><span class="Estilo3">los campos con * son obligatorios</span><br>
                                        <br>
                                        <input type="hidden" name="id_login" value="<?php echo $datos[0]["id_login"]; ?>">
                                        
                                        <input type="hidden" name="id_usuario" value="<?php echo $_GET["v"]; ?>">
                                        <input type="hidden" name="grabar" value="si">
                                        <input class="Estilo1" type="submit" name="mant_usu" value="aceptar">
                                        <input class="Estilo1" type="reset" value="limpiar">
                                        <input class="Estilo1" type="button" name="mant_usu" value="cancelar" onclick="history.back()"></td>
                                </tr>
                            </table>
                        </form>
