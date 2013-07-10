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
            <div align="center" class="Estilo7">Reportes Premios</div>

            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
                Principal</a>

   <a href="<?php echo Conectar::ruta() ?>/?accion=imprimirRepPremio" title="Imprimir Premios" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/print_32.png" >
          Imprimir</a> 
            <hr>

            <table width="450" border="1" align="center" class="Estilo1">

                <tr>
                    <td width="150" colspan="6" class="Estilo7"></td>
                
                </tr>
                            
                 <?php
                                for ($i = 0; $i < sizeof($meses); $i++) {
                                    if (date("m") == $meses[$i]["id_mes"]) {
                                        $mes=$meses[$i]["mes"];
                                    }
                                    }
?>
  
                <div align="right" class="fecha">Fecha:  <?php echo date("d")."/".$mes."/". date("Y")  ?> 
                </div>
                
                <tr >
                  <div align="center" class="Estilo7">Listado de Premios</div>
                  <br>    
            </tr>
  <table align="center" class="Estilodatos">

                    <tr style="font-weight: bold">
                        <td valign="top" align="center">
                            nombre:
                        </td>
                        <td valign="top" align="center">
                            Fecha:
                        </td>
                        <td valign="top" align="center">
                            Evento:
                        </td>

                        <td valign="top" align="center">
                            País:
                        </td>
                        <td valign="top" align="center">
                            Ciudad:
                        </td>         
                        

                    </tr>
                    <?php
                    for ($i = 0; $i < sizeof($datos); $i++) {
                        ?>
                        <tr style="background-color: inherit">
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["nom_premio"]; ?>
                            </td>
                            <td valign="top" align="center">
                                <?php
                                $fecha = $datos[$i]["fec_premio"];

                                $dia = substr($fecha, 8, 2);
                                $mes = substr($fecha, 5, 2);
                                $anio = substr($fecha, 0, 4);
                                $fecha = $dia . "-" . $mes . "-" . $anio;
                                echo $fecha
                                ?>
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["event_premio"]; ?>
                            </td>

                            <td valign="top" align="center">
                                <?php echo $datos[$i]["pais_premio"]; ?>
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["ciudad_premio"]; ?>
                            </td>

                          
                        </tr>
                    <?php } ?>

                </table>
        </div>
    </body>

</HTML>