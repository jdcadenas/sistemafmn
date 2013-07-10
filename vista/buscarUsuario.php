<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Principal</title>
        <link href="public/estilo.css" rel="stylesheet" type="text/css">
         <script type="text/javascript" language="javascript" src="<?php echo Conectar::ruta()?>/public/js/funciones.js"></script>
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
            <div align="center" class="Estilo7">Operaciones Usuarios</div>
            
            <a href="<?php echo Conectar::ruta()?>/?accion=principal" title="Volver a principal">
<img src="<?php echo Conectar::ruta()?>/public/images/home.png" border="0">
Principal</a>
            
            <a href="<?php echo Conectar::ruta() ?>/?accion=agregarUsuarios" title="Nuevo Usuario" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/add_32.png" >
            Agregar</a>
            <a href="<?php echo Conectar::ruta() ?>/?accion=usuarios" title="Listar Usuarios" >
                <img src="<?php echo Conectar::ruta() ?>/public/images/list.png" >
            Usuarios</a>
            <hr>
            <div align="left"> cédula: 
                <form name="buscar1" action="<?php echo Conectar::ruta()?>/?accion=buscarUsuario" method="post">
                    <input type="text" name="ci" />
                    <input type="hidden" name="buscar" value="si">
                    <input type="image" src="<?php echo Conectar::ruta()?>/public/images/search_32.png" border="0" width="24" height="24" value="enviar" />
                </form>
            </div>
            <hr>
           <?php
            if (isset($_GET["m"])) {
                switch ($_GET["m"]) {
                    case '1':
                        ?>
                        <h5 style="color: red;">Debe introducir cédula</h5>
                            <?php
                            break;
                        case '2':
                            ?>
                            <h5 style="color: red;">No se encuentra en la base de datos</h5>
                                <?php
                                break;
                            case '3':
                                ?>
                                
                                    <?php 
                                    break;
                            }
                        }
                        ?>
            
            
            
            <?php if (isset($datos)){ ?><h5 style="color: green;">Búsqueda exitosa</h5>
            <table class="Estilodatos">
                <tr style="font-weight: bold">
                    <td valign="top" align="center">
                        Cédula
                    </td>
                    <td valign="top" align="center">
                        Nombre
                    </td>
                    <td valign="top" align="center">
                        apellido
                    </td>
                    <td valign="top" align="center">
                        tipo
                    </td>
                    <td valign="top" align="center">
                        Departamento
                    </td>
                    <td valign="top" align="center">
                        cargo
                    </td>
                    <td valign="top" align="center">
                        login
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
                            <?php echo $datos[$i]["ci_usu"]; ?>
                        </td>
                        <td valign="top" align="center">
                            <?php echo $datos[$i]["nom_usu"]; ?>
                        </td>
                        <td valign="top" align="center">
                            <?php echo $datos[$i]["ape_usu"]; ?>
                        </td>
                        <td valign="top" align="center">
                            <?php echo $datos[$i]["tip_usu"]; ?>
                        </td>
                        <td valign="top" align="center">
                            <?php echo $datos[$i]["dep_usu"]; ?>
                        </td>
                        <td valign="top" align="center">
                            <?php echo $datos[$i]["cargo_usu"]; ?>
                        </td>
                        <td valign="top" align="center">
                            <?php echo $datos[$i]["login"]; ?>
                        </td>
                        <td valign="top" align="center">
                            <a href="<?php echo Conectar::ruta() ?>/?accion=modificarUsuario&v=<?php echo $datos[$i]["id_usuario"]; ?>" title="Modificar">
                                <img src="<?php echo Conectar::ruta() ?>/public/images/address_book_add_32.png" border="0"  width="24" height="24"> 
                            </a>
                        </td>
                        <td valign="top" align="center">
                            <a href="" title="Eliminar"
 onclick="eliminar('<?php echo Conectar::ruta(); ?>/?accion=eliminarUsuario&v=<?php echo $datos[$i]["id_usuario"]; ?>')" >


                                <img src="<?php echo Conectar::ruta() ?>/public/images/address_book_close_32.png" border="0" width="24" height="24"> 
                            </a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
            <?php } ?>
        </div>
    </body>

</HTML>