<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Principal</title>
        <link href="public/estilo.css" rel="stylesheet" type="text/css">
         <script type="text/javascript" language="javascript" src="<?php echo Conectar::ruta()?>/public/js/funciones.js"></script>
    </head>
    <body >
        <div id="contenedorp" >
            <div id="cabezera" >
                <img src="public/images/encabezado.gif" >
            </div>
            <div id="sesion">
                <?php include("sesion.php"); ?>
            </div>
            <div id="menu">
                <?php include("selecmenu.php"); ?>
            </div>
            <div align="center" class="Estilo7">Operaciones Premios</div>
            
            <a href="<?php echo Conectar::ruta()?>/?accion=principal" title="Volver a principal">
<img src="<?php echo Conectar::ruta()?>/public/images/home.png" border="0">
</a>Principal
            
            <a href="<?php echo Conectar::ruta() ?>/?accion=agregarPremio" title="Nuevo Premio" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/add_32.png" >
            </a>Agregar
           
            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarPremio" title="Buscar Premio" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
            </a> Buscar
            <hr>
            <div id ="tabla1">
            <table class="Estilodatos">
               
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
                    <td valign="top" align="center">
                        Modificar
                    </td>
                    <td valign="top" align="center">
                        Eliminar
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
                            <?php echo $datos[$i]["fec_premio"]; ?>
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
                        
                        <td valign="top" align="center">
                            <a href="<?php echo Conectar::ruta() ?>/?accion=modificarPremio&v=<?php echo $datos[$i]["id_premio"]; ?>" title="Modificar">
                                <img src="<?php echo Conectar::ruta() ?>/public/images/address_book_add_32.png" border="0"  width="24" height="24"> 
                            </a>
                        </td>
                        <td valign="top" align="center">
                            <a href="#" title="Eliminar"
 onclick="eliminar('<?php echo Conectar::ruta(); ?>/?accion=eliminarPremio&v=<?php echo $datos[$i]["id_Premio"]; ?>')" >


                                <img src="<?php echo Conectar::ruta() ?>/public/images/address_book_close_32.png" border="0" width="24" height="24"> 
                            </a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
            </div>
    </body>

</HTML>