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
            <div align="center" class="Estilo7">Reportes Movimientos</div>

            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
                Principal</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=imprimirRepMovimientos&tipo=<?php echo $_GET["tipo"] ?>" title="Imprimir Movimientos" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/print_32.png" >
                Imprimir</a> 
            <hr>

            <table width="450" border="1" align="center" class="Estilo1">


                <?php
                for ($i = 0; $i < sizeof($meses); $i++) {
                    if (date("m") == $meses[$i]["id_mes"]) {
                        $mes = $meses[$i]["mes"];
                    }
                }
                ?>

                <div align="right" class="fecha">Fecha:  <?php echo date("d") . "/" . $mes . "/" . date("Y") ?> 
                </div>

                <tr >
                    <?php if (isset($tipoMov)) { ?>
                <div align="center" class="Estilo7">Listado de Movimientos por: <?php echo $tipoMov[$_GET["tipo"]] ?></div>
                <?php }else{?>
                <div align="center" class="Estilo7">Listado de Movimientos </div>
                <?php }?>
                <br>    
                </tr>
                <table align="center" class="Estilodatos">

                    <tr style="font-weight: bold">

                        <td valign="top" align="center" >
                            Número Mov:
                        </td>
                        <td valign="top" align="center">
                            Nombre Obra:
                        </td>


                        <td valign="top" align="center">
                            desde:
                        </td>

                        <td valign="top" align="center">
                            Hacia:
                        </td>
                        <td valign="top" align="center">
                            Fecha Movimiento:
                        </td>      
                        <td valign="top" align="center">
                            Responsable:
                        </td>
                        <td valign="top" align="center">
                            Tipo Movimiento:
                        </td>

                    </tr>
                    <?php
                    $grupo = "";
                    for ($i = 0; $i < sizeof($datos); $i++) {
                        $grupoant = $grupo;
                        $grupo = $datos[$i]["id_mov"];
                        if ($grupoant != $grupo) {
                            ?>
                            <tr style="background-color: inherit">

                                <td valign="top" align="center" colspan="7" class="mov">
                                    &nbsp;&nbsp;<?php echo $datos[$i]["id_mov"]; ?>
                                </td>
                            </tr>
                        <?php } else {
                            ?>
                            <tr><td valign="top" align="center" colspan="6" >

                                </td>
                            </tr> 
                            <?php }
                        ?>
                        <tr> <td></td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["nom_obra"]; ?>
                            </td>


                            <td valign="top" align="center">
                                <?php echo $datos[$i]["Desde"]; ?>
                            </td>

                            <td valign="top" align="center">
                                <?php echo $datos[$i]["Hacia"]; ?>
                            </td>
                            <td valign="top" align="center">
                                <?php
                                $fecha = $datos[$i]["fec_mov"];

                                $dia = substr($fecha, 8, 2);
                                $mes = substr($fecha, 5, 2);
                                $anio = substr($fecha, 0, 4);
                                $fecha = $dia . "-" . $mes . "-" . $anio;
                                echo $fecha
                                ?>
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["nom_usu"] . " " . $datos[$i]["ape_usu"]; ?>
                            </td>
                            <td valign="top" align="center">
                                
                                <?php echo $tipoMov[$datos[$i]["tipomov"]] ?>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
        </div>
    </body>

</HTML>