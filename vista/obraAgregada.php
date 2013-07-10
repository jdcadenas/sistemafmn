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
                Fecha de creación
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
                Dirección
            </td>
            <td></td>

        </tr>
        <?php
        for ($i = 0; $i < sizeof($datosRes); $i++) {
            ?>
            <tr style="background-color: inherit">
                <td valign="top" align="center">
                    <?php echo $datosRes[$i]["nom_obra"]; ?>
                </td>
                <td valign="top" align="center">
                    <?php echo $datosRes[$i]["tip_obra"]; ?>
                </td>
                <td valign="top" align="center">
                    <?php
                    /* cambiar fecha    Tambien en el sql poner date_format(fecha,'%d-%m-%Y') as fecha
                     */
                    $fecha = $datosRes[$i]["fec_obra"];

                    $dia = substr($fecha, 8, 2);
                    $mes = substr($fecha, 5, 2);
                    $anio = substr($fecha, 0, 4);
                    $fecha = $dia . "-" . $mes . "-" . $anio;
                    echo $fecha
                    ?>
                </td>
                <td valign="top" align="center">
    <?php echo $datosRes[$i]["dimen_obra"]; ?>
                </td>
                <td valign="top" align="center">
    <?php echo $datosRes[$i]["colec_obra"]; ?>
                </td>
                <td valign="top" align="center">
    <?php echo $datosRes[$i]["cond_obra"]; ?>
                </td>                        

                <td valign="top" align="center">
                    <img src="<?php echo Conectar::ruta() ?>/public/images/fotoObras/<?php echo $datosRes[$i]["foto_obra"]; ?>" height="50" width="50" >
                </td>

                <td valign="top" align="center">
    <?php echo $datosRes[$i]["nom_autor"] . " " . $datosRes[$i]["ape_autor"]; ?>
                </td>
                <td valign="top" align="center">
    <?php echo $datosRes[$i]["nom_premio"]; ?>
                </td>
                <td valign="top" align="center">
    <?php echo $datosRes[$i]["nom_dep"]; ?>
                </td>
                <td valign="top" align="center">
    <?php echo $datosRes[$i]["dir_dep"]; ?>
                </td>
                <td valign="top" align="center">
                    <a href="#" title="Eliminar"
                       onclick="from_post('<?php echo $datosRes[$i]["id_obra"]; ?>','eliminar','resultado','controller/agregarObraAjaxController.php')" >
                        <img src="<?php echo Conectar::ruta() ?>/public/images/address_book_close_32.png" border="0" width="24" height="24"> 
                    </a>
                </td>
            </tr>

<?php } ?>
    </table>
</div>


</body>

</HTML>