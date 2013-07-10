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
            <div align="center" class="Estilo7">Operaciones Premios</div>

            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
                Principal</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=agregarPremio" title="Nuevo Premio" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/add_32.png" >
                Agregar</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=premios" title="Volver a lista premios"><img src="<?php echo Conectar::ruta() ?>/public/images/list.png" border="0">Premios</a>
            <hr>
            <div align="left"> Nombre Premio: 
                <form name="buscar1" action="<?php echo Conectar::ruta() ?>/?accion=buscarPremios" method="post">
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

                                <td valign="top" align="center">
                                    <a href="<?php echo Conectar::ruta() ?>/?accion=modificarPremio&v=<?php echo $datos[$i]["id_premio"]; ?>" title="Modificar">
                                        <img src="<?php echo Conectar::ruta() ?>/public/images/address_book_add_32.png" border="0"  width="24" height="24"> 
                                    </a>
                                </td>
                                <td valign="top" align="center">
                                    <a href="" title="Eliminar"
                                       onclick="eliminar('<?php echo Conectar::ruta(); ?>/?accion=eliminarPremio&v=<?php echo $datos[$i]["id_premio"]; ?>')" >
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