<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Principal</title>
        <link href="public/estilo.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" language="javascript" src="<?php echo Conectar::ruta() ?>/public/js/funciones.js"></script>
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
            <div align="center" class="Estilo7">      Movimientos de Obras</div>

            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
            Principal</a>
              <a href="<?php echo Conectar::ruta() ?>/?accion=obras" title="Nueva Obra" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/list.png" >
            Obras</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarObras" title="Buscar Obras" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
            Buscar</a> 
              <a href="<?php echo Conectar::ruta() ?>/?accion=repMovimientos&tipo=2" title="Ir Reporte de movimientos" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/report_go.png" >
            Ir Reporte de movimientos</a>
            <hr>
            <?php
            if (isset($_GET["m"])) {
                switch ($_GET["m"]) {
                    case '1':
                        ?>
                        <h5 style="color: red;">Algunos datos están vacíos</h5>
                        <?php
                        break;
                    case '2':
                        ?>
                        <h5 style="color: red;">No puede trasladarse la obra</h5>
                        <?php
                        break;
                    case '3':
                        ?>
                        <h5 style="color: green;">El movimiento ha sido Realizado exitosamente</h5>
                        <?php
                        break;
                }
            }
            ?>

            <div id ="tabla1">
                <form action="" method="post" name="form_o">
                    <table border="0" >
                        <tr>
                            <td valign="top" align="center">Fecha Movimiento:</td>
                            <td >
                                <select name="dia" id="dia">
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
                                <select name="mes" id="mes">
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
                                <select name="anio" id="anio">
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
                                </select></td>
                        </tr>
                        <tr >
                            <td>Desde:</td>
                            <td><select name="id_depDesde" class="Estilo1" id="id_depDesde" onchange="from_post(this.value,'selObras','selectobras','controller/agregarSelectObrasController.php')" >
                                    <option value="0" selected="selected">Seleccione</option>
                                    <?php
                                    for ($i = 0; $i < sizeof($depen); $i++) {
                                        ?>
                                        <option value="<?php echo $depen[$i]["id_dep"]; ?>"
                                                title="<?php echo $depen[$i]["rif_dep"]; ?>">
                                            <?php echo "Rif: " . $depen[$i]["rif_dep"] . "   Nombre  " . $depen[$i]["nom_dep"]; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr >
                            <td>Hacia:</td>
                            <td><select name="id_depHacia" class="Estilo1" id="id_depHacia">
                                    <option value="0" selected="selected">Seleccione</option>
                                    <?php
                                    for ($i = 0; $i < sizeof($depen); $i++) {
                                        ?>
                                        <option value="<?php echo $depen[$i]["id_dep"]; ?>"
                                                title="<?php echo $depen[$i]["rif_dep"]; ?>">
                                            <?php echo "Rif: " . $depen[$i]["rif_dep"] . "   Nombre  " . $depen[$i]["nom_dep"]; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div id="selectobras"></div>
                    <div align="center">
                        <input type="hidden" name="tipoMov" value="2">
                        <input class="Estilo1" type="submit" name="grabar_mov" value="aceptar">
                        <input class="Estilo1" type="reset" value="limpiar">
                        <input class="Estilo1" type="button" name="cancelar" value="cancelar" onclick="history.back()">
                    </div>
                </form>
                <hr>

            </div>
    </body>

</HTML>