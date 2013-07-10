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
            <div align="center" class="Estilo7">Reportes Autores</div>

            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
                Principal</a>

   <a href="<?php echo Conectar::ruta() ?>/?accion=imprimirRepAutor" title="Imprimir Autor" >
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
                  <div align="center" class="Estilo7">Listado de Autores</div>
                  <br>    
            </tr>
 <table class="Estilodatos" align="center" >

                    <tr style="font-weight: bold">
                        <td valign="top" align="center">
                            nombre autor:
                        </td>
                        <td valign="top" align="center">
                            Apellido Autor:
                        </td>
                        <td valign="top" align="center">
                            país Autor:
                        </td>

                      

                    </tr>
                    <?php
                    for ($i = 0; $i < sizeof($datos); $i++) {
                        ?>
                        <tr style="background-color: inherit">
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["nom_autor"]; ?>
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["ape_autor"]; ?>
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["pais_autor"]; ?>
                            </td>

                           
                            </td>
                        </tr>
                    <?php } ?>

                </table>
        </div>
    </body>

</HTML>