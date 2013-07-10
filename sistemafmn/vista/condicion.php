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
            <div align="center" class="Estilo7">Operaciones Condición</div>

            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
            Principal</a>

           <a href="<?php echo Conectar::ruta() ?>/?accion=obras" title="Volver a lista Obras"><img src="<?php echo Conectar::ruta() ?>/public/images/list.png" border="0">Obras</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarObras" title="Buscar Obra" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
             Buscar</a>
            <hr>
            <div id ="tabla1">
                <table class="Estilodatos">

                    <tr style="font-weight: bold;background-color: inherit">

                        <td valign="top" align="center">
                            Nombre Obra
                        </td>
                        <td valign="top" align="center">
                            Coondición Obra
                        </td>

                        <td valign="top" align="center">
                            Modificar
                        </td>


                    </tr>
                    <?php
                    for ($i = 0; $i < sizeof($datos); $i++) {
                        ?>
                        <tr >

                            <td valign="top" align="center">
                                <?php echo $datos[$i]["nom_obra"]; ?>
                            </td>


                            <td valign="top" align="center">
                                <?php echo $datos[$i]["cond_obra"]; ?>
                            </td>


                            <td valign="top" align="center">
                                <a href="<?php echo Conectar::ruta() ?>/?accion=modificarCondicionObra&v=<?php echo $datos[$i]["id_obra"]; ?>" title="Modificar">
                                    <img src="<?php echo Conectar::ruta() ?>/public/images/address_book_add_32.png" border="0"  width="24" height="24"> 
                                </a>
                            </td>

                        </tr>
                    <?php } ?>

                </table>
            </div>
        </div>
    </body>

</HTML>