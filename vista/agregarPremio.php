<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Principal</title>
        <link href="public/estilo.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" language="javascript" src="<?php echo Conectar::ruta()?>/public/js/funciones.js"></script>
    </head>
    <body onunload="cargar();"  onBlur="self.focus()" onLoad="self.focus()">
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

            <a href="<?php echo Conectar::ruta() ?>/?accion=premios" title="Premios" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/list.png" >
            Premios</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarAutor" title="Buscar Autor" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
            Buscar</a> 
            <p class="Estilo7">Agregar Nuevo Premio</p>
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
                        <h5 style="color: red;">El premio ya existe en la base de datos</h5>
                        <?php
                        break;
                    case '3':
                        ?>
                        <h5 style="color: green;">El premio ha sido creado exitosamente</h5>
                        <?php
                        break;
                }
            }
            ?>

            <form action="" method="post" name="ingreso_premio">
                <table width="385" border="0" align="center" class="Estilo1">
                    <tr>
                        <td width="168" height="30" align="right">Nombre Premio:</td><td width="207"><input name="nom_premio" type="text" ><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Fecha Premio:</td> <td>
                            <select name="dia">
                                <?php
                                for ($i = 1; $i <= 31; $i++) {

                                    if (strlen($i) == 1) {
                                        $dia = "0" . $i;
                                    } else {
                                        $dia = $i;
                                    }
                                    if (date("d") == $i) {
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
                                    if (date("m") == $meses[$i]["id_mes"]) {
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
                                    if (date("Y") == $i) {
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
                            </select><span class="Estilo2">*</span> </td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Evento :</td><td><input name="event_premio" type="text" size="20" maxlength="20"><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="30">país:</td><td><input name="pais_premio" type="text" size="20" maxlength="20"><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Ciudad:</td><td><input name="ciudad_premio" type="text" size="20" maxlength="20"><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><span class="Estilo3">los campos con * son obligatorios</span><br>
                            <br><input type="hidden" name="grabar" value="si">
                            <input class="Estilo1" type="submit" name="mant_premio" value="aceptar">
                            <input class="Estilo1" type="reset" value="limpiar">
                            <input class="Estilo1" type="button" name="mant_premio" value="cancelar" onclick="history.back()"></td>
                    </tr>
                </table>
            </form>
        </div>   
        </body>