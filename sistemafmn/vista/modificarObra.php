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
            <div align="center" class="Estilo7">Operaciones Obras</div>

            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver al principal"><img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">Principal</a>
            <a href="<?php echo Conectar::ruta() ?>/?accion=obras" title="Volver a lista Obras"><img src="<?php echo Conectar::ruta() ?>/public/images/list.png" border="0">Obras</a>
            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarObras" title="Buscar Obras" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
                Buscar</a> 
            <p class="Estilo7">Editar Obra (<?php echo $datos[0]["nom_obra"]; ?>)</p>
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
                        <td align="right" height="30">Imagen de la obra:</td>
                        <td><img src="<?php echo Conectar::ruta() ?>/public/images/fotoObras/<?php echo $datos[0]["foto_obra"] ?>"  width="300" height="200">
                            <input  type="file" name="foto_obra" value="<?php echo $datos[0]["foto_obra"] ?>"><?php echo $datos[0]["foto_obra"] ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="168" height="30" align="right">Nombre Obra:</td>
                        <td width="207"><textarea name="nom_obra" rows="3" cols="50"><?php echo $datos[0]["nom_obra"] ?></textarea><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Tipo de Obra:</td><td><select name="tip_obra" class="Estilo1">
                                <?php
                                for ($i = 0; $i < sizeof($tipoObra); $i++) {
                                    if ($tipoObra[$i] == $datos[0]["tip_obra"]) {
                                        ?>
                                        <option value="<?php echo $tipoObra[$i]; ?>" title="<?php echo $tipoObra[$i]; ?>" selected="selected">
                                            <?php echo $tipoObra[$i]; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $tipoObra[$i]; ?>" title="<?php echo $tipoObra[$i]; ?>"><?php echo $tipoObra[$i]; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select><span class="Estilo2">*</span>

                        </td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Fecha de creación:</td>
                        <td><select name="dia">
                                <?php
                                for ($i = 1; $i <= 31; $i++) {

                                    if (strlen($i) == 1) {
                                        $dia = "0" . $i;
                                    } else {
                                        $dia = $i;
                                    }
                                    if ($datos[0]["dia"] == $i) {
                                        ?>
                                        <option value="<?php echo $i; ?>" title="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $i; ?>" title="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <select name="mes">
                                <?php
                                for ($i = 0; $i < sizeof($meses); $i++) {
                                    if ($datos[0]["mes"] == $meses[$i]["id_mes"]) {
                                        ?>
                                        <option value="<?php echo $meses[$i]["id_mes"]; ?>" title="<?php echo $meses[$i]["mes"]; ?>" selected="selected"><?php echo $meses[$i]["mes"]; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $meses[$i]["id_mes"]; ?>" title="<?php echo $meses[$i]["mes"]; ?>"><?php echo $meses[$i]["mes"]; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <select name="anio">
                                <?php
                                for ($i = 1900; $i <= date("Y"); $i++) {
                                    if ($datos[0]["anio"] == $i) {
                                        ?>
                                        <option value="<?php echo $i; ?>" title="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $i; ?>" title="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Dimensión:</td><td><input name="dimen_obra" type="text" size="40" maxlength="40" value="<?php echo $datos[0]["dimen_obra"] ?>"><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Nombre de la Colección:</td><td><textarea name="colec_obra" rows="3" cols="50"><?php echo $datos[0]["colec_obra"] ?></textarea><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Condición de la obra:</td><td><textarea name="cond_obra" rows="3" cols="50"><?php echo $datos[0]["cond_obra"] ?></textarea><span class="Estilo2">*</span></td>
                    </tr>
                   
                    <tr>
                        <td align="right" height="30">Autor:</td><td><select name="id_autor" class="Estilo1">
<?php
for ($i = 0; $i < sizeof($autores); $i++) {
    if ($autores[$i]["id_autor"] == $datos[0]["id_autor"]) {
        ?>
                                        <option value="<?php echo $autores[$i]["id_autor"]; ?>" title="<?php echo $autores[$i]["nom_autor"] . " " . $autores[$i]["ape_autor"]; ?>" selected="selected"><?php echo $autores[$i]["nom_autor"] . " " . $autores[$i]["ape_autor"]; ?></option>
        <?php
    } else {
        ?>
                                        <option value="<?php echo $autores[$i]["id_autor"]; ?>" title="<?php echo $autores[$i]["nom_autor"] . " " . $autores[$i]["ape_autor"]; ?>"><?php echo $autores[$i]["nom_autor"] . " " . $autores[$i]["ape_autor"]; ?></option>
        <?php
    }
}
?>
                            </select><span class="Estilo2">*</span>

                        </td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Premios:</td><td><select name="id_premio" class="Estilo1">
                                <?php
                                for ($i = 0; $i < sizeof($premios); $i++) {
                                    if ($premios[$i]["id_premio"] == $datos[0]["id_premio"]) {
                                        ?>
                                        <option value="<?php echo $premios[$i]["id_premio"]; ?>" title="<?php echo $premios[$i]["nom_premio"] . " " . $premios[$i]["event_premio"]; ?>" selected="selected"><?php echo $premios[$i]["nom_premio"] . " " . $premios[$i]["event_premio"]; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $premios[$i]["id_premio"]; ?>" title="<?php echo $premios[$i]["nom_premio"] . " " . $premios[$i]["event_premio"]; ?>"><?php echo $premios[$i]["nom_premio"] . " " . $premios[$i]["event_premio"]; ?></option>
        <?php
    }
}
?>
                            </select><span class="Estilo2">*</span>

                        </td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Ubicación:</td><td><select name="id_dep" class="Estilo1">
                                <?php
                                for ($i = 0; $i < sizeof($deps); $i++) {
                                    if ($deps[$i]["id_dep"] == $datos[0]["id_dep"]) {
                                        ?>
                                        <option value="<?php echo $deps[$i]["id_dep"]; ?>" title="<?php echo $deps[$i]["nom_dep"]; ?>" selected="selected">
                                        <?php echo $deps[$i]["nom_dep"]; ?>
                                        </option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $deps[$i]["id_dep"]; ?>" title="<?php echo $deps[$i]["nom_dep"]; ?>">
        <?php echo $deps[$i]["nom_dep"]; ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select><span class="Estilo2">*</span>

                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center"><span class="Estilo3">los campos con * son obligatorios</span><br>
                            <br>

                            <input type="hidden" name="id_obra" value="<?php echo $_GET["v"]; ?>">
                            <input type="hidden" name="archivo" value="<?php echo $datos[0]["foto_obra"] ?>">
                            <input type="hidden" name="grabar" value="si">
                            <input class="Estilo1" type="submit" name="mant_usu" value="aceptar">
                            <input class="Estilo1" type="reset" value="limpiar">
                            <input class="Estilo1" type="button" name="cancelar" value="cancelar" onclick="history.back()"></td>
                    </tr>
                </table>
            </form>
        </div>