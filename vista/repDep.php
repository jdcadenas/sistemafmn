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
            <div align="center" class="Estilo7">Reportes Dependencias</div>

            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
                Principal</a>

   <a href="<?php echo Conectar::ruta() ?>/?accion=imprimirRepDep" title="Imprimir Dependencia" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/print_32.png" >
          Imprimir</a> 
            <hr>

            <table width="450" border="1" align="center" class="Estilo1">

               
                
                <tr >
                  <div align="center" class="Estilo7">Listado de Dependencias</div>
                  <br>    
            </tr>
 <table class="Estilodatos" align="center" >

                    <tr style="font-weight: bold">
                         <td valign="top" align="center" >
                            Rif:   
                        </td>
                        <td valign="top" align="center">
                            Nombre:
                        </td>
                        <td valign="top" align="center">
                            Dirección:
                        </td>
                        <td valign="top" align="center">
                            Teléfono:
                        </td>
                    </tr>
                    <?php
                    for ($i = 0; $i < sizeof($datos); $i++) {
                        ?>
                        <tr style="background-color: inherit">
                           <td valign="top" align="center">
                                <?php echo $datos[$i]["rif_dep"]; ?>
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["nom_dep"]; ?>
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["dir_dep"]; ?>
                            </td>

                            <td valign="top" align="center">
                                <?php echo $datos[$i]["telf_dep"]; ?>
                            </td>

                        </tr>
                    <?php } ?>

                </table>
        </div>
    </body>

</HTML>