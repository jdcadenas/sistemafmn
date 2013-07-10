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
            <div align="center" class="Estilo7">Operaciones Dependencias</div>

            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
                Principal</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=agregarDep" title="Nueva Dependencia" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/add_32.png" >
                Agregar </a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=buscarDep" title="Buscar Dependencia" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
                Buscar</a> 
            <hr>
            <div id ="tabla1">
                <table width="600" border="0" align="center" class="Estilodatos" align="center">

                    <tr style="font-weight: bold;background-color: inherit" >
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
                        <tr >
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


                            <td valign="top" align="center">
                                <a href="<?php echo Conectar::ruta() ?>/?accion=modificarDep&v=<?php echo $datos[$i]["id_dep"]; ?>" title="Modificar">
                                    <img src="<?php echo Conectar::ruta() ?>/public/images/address_book_add_32.png" border="0"  width="24" height="24"> 
                                </a>
                            </td>
                            <td valign="top" align="center">
                                <a href="#" title="Eliminar"
                                   onclick="eliminar('<?php echo Conectar::ruta(); ?>/?accion=eliminarDep&v=<?php echo $datos[$i]["id_dep"]; ?>')" >


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