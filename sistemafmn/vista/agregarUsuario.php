<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Principal</title>
        <link href="public/estilo.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" language="javascript" src="<?php echo Conectar::ruta()?>/public/js/funciones.js"></script>
    </head>
    <body onload="limpiar();">
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
            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
            Principal</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=usuarios" title="Listar Usuarios" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/list.png" >
            Usuarios</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarUsuario" title="Buscar Usuario" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
            Buscar</a> 
            <p class="Estilo7">Agregar Nuevo Usuario</p>
            <?php
            if (isset($_GET["m"])) {
                switch ($_GET["m"]) {
                    case '1':
                        ?>
                        <h5 style="color: red;">Los dato están vacíos</h2>
                        <?php
                        break;
                    case '2':
                        ?>
                            <h5 style="color: red;">El login ingresado ya existe en la base de datos</h2>
                            <?php
                            break;
                        case '3':
                            ?>
                                <h5 style="color: green;">El usuario ha sido creado exitosamente</h2>
                                <?php
                                break;
                        }
                    }
                    ?>

                      <form action="" method="post" enctype="multipart/form-data" name="ingreso_usuario">
                            <table width="385" border="0" align="center" class="Estilo1">
                                <tr>
                                    <td width="168" height="30" align="right">Cedula de Identidad:</td><td width="207"><input name="ci_usu" type="text" size="10" maxlength="10"><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td align="right" height="30">Nombre:</td><td><input name="nom_usu" type="text" size="20" maxlength="20"><span class="Estilo2">*</span> </td>
                                </tr>
                                <tr>
                                    <td align="right" height="30">Apellido:</td><td><input name="ape_usu" type="text" size="20" maxlength="20"><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td align="right" height="30">Perfil:</td><td><select name="tip_usu" class="Estilo1">
<?php for ($i = 0; $i < sizeof($tipo); $i++) { ?>                                                  <option value="<?php echo $tipo[$i]; ?>" title="<?php echo $tipo[$i]; ?>"><?php echo $tipo[$i]; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td align="right" height="30">Departamento:</td><td><select name="dep_usu" class="Estilo1"><?php for ($i = 0; $i < sizeof($dpto); $i++) { ?>                                                  <option value="<?php echo $dpto[$i]; ?>" title="<?php echo $dpto[$i]; ?>"><?php echo $dpto[$i]; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td align="right" height="30">Cargo:</td><td><select name="cargo_usu" class="Estilo1">
                                            <?php for ($i = 0; $i < sizeof($cargo); $i++) { ?>                                                  <option value="<?php echo $cargo[$i]; ?>" title="<?php echo $cargo[$i]; ?>"><?php echo $cargo[$i]; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td align="right" height="30">Login de sesion:</td><td><input name="login" type="text" size="15" maxlength="15"><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td align="right" height="30">Contrase&ntilde;a</td><td><input name="contrasena" type="password" size="15" maxlength="15"><span class="Estilo2">*</span></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><span class="Estilo3">los campos con * son obligatorios</span><br>
                                        <br><input type="hidden" name="grabar" value="si">
                                        <input class="Estilo1" type="submit" name="mant_usu" value="aceptar">
                                        <input class="Estilo1" type="reset" value="limpiar">
                                        <input class="Estilo1" type="button" name="mant_usu" value="cancelar" onclick="history.back()"></td>
                                </tr>
                            </table>
                        </form>