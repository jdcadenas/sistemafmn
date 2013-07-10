
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
            <div align="center" class="Estilo7">Operaciones Autores</div>

            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
                Principal</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=agregarAutor" title="Nuevo Autor" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/add_32.png" >
                Agregar</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=autores" title="Listar Autores" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/list.png" >
                Autores</a>
            <hr>
            <div align="left"> Nombre ó Apellido: 
                <form name="buscar1" action="<?php echo Conectar::ruta() ?>/?accion=buscarAutor" method="post">
                    <input type="hidden" name="buscar" value="si">
                    <input type="text" name="nombre" />
                    <input type="image" src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" border="0" width="24" height="24" value="enviar"/>
                </form>
            </div>
            <hr>
            <?php
            if (isset($_GET["m"])) {
                switch ($_GET["m"]) {
                    case '1':
                        ?>
                        <h5 style="color: red;">Debe introducir Nombre</h5>
                        <?php
                        break;
                    case '2':
                        ?>
                        <h5 style="color: red;">No se encuentra en la base de datos</h5>
                        <?php
                        break;
                }
            }
            ?>
            <?php if (isset($datos)) { ?>
                <h5 style="color: green;">Búsqueda exitosa</h5>
                <div id ="tabla1">
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
                                    <?php echo $datos[$i]["nom_autor"]; ?>
                                </td>
                                <td valign="top" align="center">
                                    <?php echo $datos[$i]["ape_autor"]; ?>
                                </td>
                                <td valign="top" align="center">
                                    <?php echo $datos[$i]["pais_autor"]; ?>
                                </td>

                                <td valign="top" align="center">
                                    <a href="<?php echo Conectar::ruta() ?>/?accion=modificarAutor&v=<?php echo $datos[$i]["id_autor"]; ?>" title="Modificar">
                                        <img src="<?php echo Conectar::ruta() ?>/public/images/address_book_add_32.png" border="0"  width="24" height="24"> 
                                    </a>
                                </td>
                                <td valign="top" align="center">
                                    <a href="" title="Eliminar"
                                       onclick="eliminar('<?php echo Conectar::ruta(); ?>/?accion=eliminarAutor&v=<?php echo $datos[$i]["id_autor"]; ?>')" >


                                        <img src="<?php echo Conectar::ruta() ?>/public/images/address_book_close_32.png" border="0" width="24" height="24"> 
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
            <?php } ?>
        </div>
    </body>

</HTML>