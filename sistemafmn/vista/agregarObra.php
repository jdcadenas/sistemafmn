<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Principal</title>
        <link href="public/estilo.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?php echo Conectar::ruta() ?>/public/js/funciones.js"></script>
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
            <div align="center" class="Estilo7">Operaciones Obras</div>
            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
            Principal</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=obras" title="Nueva Obra" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/list.png" >
            Obras</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarObras" title="Buscar Obras" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
            Buscar</a> 
            <p class="Estilo7">Agregar Nueva Obra</p>
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
                        <h5 style="color: red;">El nombre de la obra ya existe en la base de datos</h5>
                        <?php
                        break;
                    case '3':
                        ?>
                        <h5 style="color: green;">La obra ha sido creada exitosamente</h5>
                        <?php
                        break;
                }
            }
            ?>

            <form action="" method="post" enctype="multipart/form-data" name="ingreso_obra">
                <table width="700" border="0" align="center" class="Estilo1">
                    <tr>
                        <td height="30" align="right">Nombre Obra:</td>
                        <td ><textarea name="nom_obra" rows="3" cols="50"></textarea><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Tipo de Obra:</td><td><select name="tip_obra" class="Estilo1">
                                <?php for ($i = 0; $i < sizeof($tipoObra); $i++) { ?>                                                  <option value="<?php echo $tipoObra[$i]; ?>" title="<?php echo $tipoObra[$i]; ?>"><?php echo $tipoObra[$i]; ?></option>
                                    <?php
                                }
                                ?>
                            </select><span class="Estilo2">*</span> </td>
                    </tr>
                    <tr>
                        <td align="right" height="30">Fecha de Creación:</td> 
                        <td>
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
                            </select>
                            <span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="40">Dimensión:</td><td><input name="dimen_obra" type="text" size="30" maxlength="30"><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="40">Nombre de la colección:</td><td><textarea name="colec_obra" rows="3" cols="50"></textarea><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="40">Condición de la obra:</td><td><textarea name="cond_obra" rows="3" cols="50"></textarea><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="40">Imagen de la Obra:</td><td><input name="foto_obra" type="file" ><span class="Estilo2"></span></td>
                    </tr>
                    <tr>
                        <td align="right" height="40">Autor:</td><td><select id="lautores" name="id_autor" class="Estilo1">
                                <?php for ($i = 0; $i < sizeof($autores); $i++) { ?>                                                  <option value="<?php echo $autores[$i]["id_autor"]; ?>" title="<?php echo $autores[$i]["nom_autor"] . " " . $autores[$i]["ape_autor"]; ?>"><?php echo $autores[$i]["nom_autor"] . " " . $autores[$i]["ape_autor"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select><span class="Estilo2">*</span>
                            <a href="<?php echo Conectar::ruta() ?>/?accion=agregarAutor" target="popup" onClick="window.open(this.href, this.target, 'width=750,height=520,menubar=no,scrollbars=no,toolbar=no,location=no,directories=no,resizable=yes,top=0,left=0'); return false;" title="Agregar Autor"><img src="<?php echo Conectar::ruta() ?>/public/images/new.png" ></a>

                        </td>
                    </tr>
                    <tr>
                        <td align="right" height="40">Premio:</td><td><select name="id_premio" class="Estilo1">
                                <?php for ($i = 0; $i < sizeof($premios); $i++) { ?>                                                  <option value="<?php echo $premios[$i]["id_premio"]; ?>" title="<?php echo $premios[$i]["nom_premio"] . " " . $premios[$i]["event_premio"]; ?>"><?php echo $premios[$i]["nom_premio"] . " " . $premios[$i]["event_premio"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select><a href="<?php echo Conectar::ruta() ?>/?accion=agregarPremio" target="popup" onClick="window.open(this.href, this.target, 'width=750,height=550,menubar=no,scrollbars=no,toolbar=no,location=no,directories=no,resizable=yes,top=0,left=0'); return false;" title="Agregar Premio"><img src="<?php echo Conectar::ruta() ?>/public/images/new.png" ></a><span class="Estilo2">*</span></td>
                    </tr>
                    <tr>
                        <td align="right" height="40">Ubicación:</td><td><select name="id_dep" class="Estilo1">
                                <?php for ($i = 0; $i < sizeof($deps); $i++) { ?>                                                  <option value="<?php echo $deps[$i]["id_dep"]; ?>" title="<?php echo $deps[$i]["nom_dep"]; ?>"><?php echo $deps[$i]["nom_dep"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select><span class="Estilo2">*</span>
                            <a href="<?php echo Conectar::ruta() ?>/?accion=agregarDep" target="popup" onClick="window.open(this.href, this.target, 'width=750,height=520,0,0,0'); return false;" title="Agregar Dependencia"><img src="<?php echo Conectar::ruta() ?>/public/images/new.png" ></a>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><span class="Estilo3">los campos con * son obligatorios</span><br>
                            <br><input type="hidden" name="grabar" value="si">


                            <input class="Estilo1" type="submit" name="mant_obra" value="aceptar">
                            <input class="Estilo1" type="reset" value="limpiar">
                            <input class="Estilo1" type="button" name="mant_obra" value="cancelar" onclick="history.back()"></td>
                    </tr>
                </table>
            </form>