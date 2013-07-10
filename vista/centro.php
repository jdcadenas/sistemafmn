<div class="Estilo7">
    <br><br>
    Sistema de Seguimiento y <br>Control de Prestamos de <br>Obras de Arte<br><br>
</div>
<form action="" method="post" id="ingreso" >

    <table class="tinicial" width="200" border="0">	
        <tr>
            <td><label class="Estilo1" >Usuario:</label></td>
            <td><input name="usuario" type="text" size="10" maxlength="14"></td>
        </tr>
        <tr>
            <td> <label class="Estilo1">Contrase&ntilde;a:</label></td>
            <td><input name="passwd" type="password" size="10" maxlength="14"></td>
        </tr>
        <tr>
            <td align="center" colspan="2"><br>
                <input type="hidden" name="grabar" value="si">
                <input name="aceptar" type="submit" value="aceptar"><br></td>
        </tr>
        <tr>
            <td align="center" colspan="2"><span class="Estilo4">&iquest;olvid&oacute; su contrase&ntilde;a?</span></td>
        </tr>
    </table>

</form>
<?php
if (isset($_GET["m"])) {
    ?>
    
    <?php
    switch ($_GET["m"]) {
        case '1':
            ?>
<h6 style="color:red">El formulario presenta los siguientes errores:<br>
    Debe colocar su nombre de Usuario.</h6>
            <?php
            break;
        case '2':
            ?>
            <h6 style="color:red">El formulario presenta los siguientes errores:<br>
                Debe colocar su contrase&ntilde;a.</h6>
            <?php
            break;
        case '3':
            ?>
            <h6 style="color:red">El formulario presenta los siguientes errores:<br>
                El usuario o la contrase&ntilde;a es incorrecto o no existe,<br> por favor intente de nuevo.</h6>
            <?php
            break;
        case '4':
            ?>
            <h6 style="color: green">Usted ha cerrado sesi&oacute;n exitosamente.</h6>
            <?php
            break;
        default:
            break;
    }
}
?>
    