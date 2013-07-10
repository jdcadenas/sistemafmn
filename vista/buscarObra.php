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
            <div align="center" class="Estilo7">Operaciones Obras</div>

            <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver a principal">
                <img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">
            Principal</a>

            <a href="<?php echo Conectar::ruta() ?>/?accion=agregarObra" title="Nueva Obra" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/add_32.png" >
            Agregar</a>

                      <a href="<?php echo Conectar::ruta() ?>/?accion=obras" title="Volver a lista Obras"><img src="<?php echo Conectar::ruta() ?>/public/images/list.png" border="0">Obras</a>
                      <hr>
            <div align="left"> Nombre Obra: 
                <form name="buscar1" action="<?php echo Conectar::ruta()?>/?accion=buscarObras" method="post">
                    <input type="hidden" name="buscar" value="si">
                    <input type="text" name="nombre" />
                    <input type="image" src="<?php echo Conectar::ruta()?>/public/images/search_32.png" border="0" width="24" height="24" value="enviar"/>
                </form>
            </div>
           <hr>
             <?php
            if (isset($_GET["m"])) {
                switch ($_GET["m"]) {
                    case '1':
                        ?>
                        <h5 style="color: red;">Debe introducir Nombre de la Obra</h5>
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
            <?php if (isset($datos)){ ?>
                            <h5 style="color: green;">Búsqueda exitosa</h5>

            <div id ="tabla1">
                <table class="Estilodatos">

                    <tr style="font-weight: bold">
                        <td valign="top" align="center">
                            Nombre de la Obra
                        </td>
                        <td valign="top" align="center">
                            Tipo Obra
                        </td>
                        <td valign="top" align="center">
                            fecha de creación
                        </td>
                        <td valign="top" align="center">
                            Dimensión
                        </td>
                        <td valign="top" align="center">
                            Nombre de la colección
                        </td>
                        <td valign="top" align="center">
                            Condición de la Obra
                        </td>
                        <td valign="top" align="center">
                            Imagen de la Obra
                        </td>
                        <td valign="top" align="center">
                            Nombre  del autor
                        </td>
                        <td valign="top" align="center">
                            Premios
                        </td>
                        <td valign="top" align="center">
                            Ubicación
                        </td>
                        <td valign="top" align="center">
                            dirección
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
                                <?php echo $datos[$i]["nom_obra"]; ?>
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["tip_obra"]; ?>
                            </td>
                            <td valign="top" align="center">
 <?php /*cambiar fecha    Tambien en el sql poner date_format(fecha,'%d-%m-%Y') as fecha
  */                        
$fecha = $datos[$i]["fec_obra"];

$dia= substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio= substr($fecha,0,4);
$fecha = $dia."-".$mes."-".$anio;
echo $fecha
?>
                            
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["dimen_obra"]; ?>
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["colec_obra"]; ?>
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["cond_obra"]; ?>
                            </td>                        

                            <td valign="top" align="center">
                                <img src="<?php echo Conectar::ruta() ?>/public/images/fotoObras/<?php echo $datos[$i]["foto_obra"]; ?>" height="50" width="50" >
                            </td>

                            <td valign="top" align="center">
                                <?php echo $datos[$i]["nom_autor"] . " " . $datos[$i]["ape_autor"]; ?>
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["nom_premio"]; ?>
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["nom_dep"]; ?>
                            </td>
                            <td valign="top" align="center">
                                <?php echo $datos[$i]["dir_dep"]; ?>
                            </td>

                            <td valign="top" align="center">
                                <a href="<?php echo Conectar::ruta() ?>/?accion=modificarObra&v=<?php echo $datos[$i]["id_obra"]; ?>" title="Modificar">
                                    <img src="<?php echo Conectar::ruta() ?>/public/images/address_book_add_32.png" border="0"  width="24" height="24"> 
                                </a>
                            </td>
                            <td valign="top" align="center">
                                <a href="" title="Eliminar"
                                   onclick="eliminar('<?php echo Conectar::ruta(); ?>/?accion=eliminarObra&v=<?php echo $datos[$i]["id_obra"]; ?>')" >


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