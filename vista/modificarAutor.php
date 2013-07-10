<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Principal</title>
    <link href="public/estilo.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" language="javascript" src="<?php echo Conectar::ruta() ?>/public/js/funciones.js"></script>
  </head>
  <body onload="limpiar();">
    <div id="contenedor">
      <div id="cabecera"><img src="public/images/encabezado.gif" alt="logo"></div>
      <div id="sesion">
        <?php include("sesion.php"); ?>
      </div>
      <div id="menu">
        <?php include("selecmenu.php"); ?>
      </div>
      <div align="center" class="Estilo7">Operaciones Usuarios</div>

      <a href="<?php echo Conectar::ruta() ?>/?accion=principal" title="Volver al principal"><img src="<?php echo Conectar::ruta() ?>/public/images/home.png" border="0">Principal</a>
      <a href="<?php echo Conectar::ruta() ?>/?accion=autores" title="Volver a lista autores"><img src="<?php echo Conectar::ruta() ?>/public/images/list.png" border="0">Autores</a>
      <a href="<?php echo Conectar::ruta() ?>/?accion=buscarAutores" title="Buscar Autor" >
        <img src="<?php echo Conectar::ruta() ?>/public/images/search_32.png" >
        Buscar</a> 
      <p class="Estilo7">Editar Autor (<?php echo $datos[0]["nom_autor"]; ?>)</p>
      <?php
      if (isset($_GET["m"])) {
        switch ($_GET["m"]) {
          case '1':
            ?>
            <h5 style="color: red;">Los dato están vacíos</h5>
            <?php
            break;
          case '2':
            ?>
            <h5 style="color: red;">El login ingresado ya existe en la base de datos</h5>
            <?php
            break;
          case '3':
            ?>
            <h5 style="color: green;">El usuario ha sido modificado exitosamente</h5>
            <?php
            break;
        }
      }
      ?>

      <form action="" method="post" name="mod_autor">
        <table width="385" border="0" align="center" class="Estilo1">
          <tr>
            <td width="168" height="30" align="right">Nombre Autor:</td>
            <td width="207"><input name="nom_autor" type="text" size="20" maxlength="20" value="<?php echo $datos[0]["nom_autor"] ?>" ><span class="Estilo2">*</span></td>
          </tr>
          <tr>
            <td align="right" height="30">Apellido Autor:</td><td><input name="ape_autor" type="text" size="20" maxlength="20" value="<?php echo $datos[0]["ape_autor"] ?>"><span class="Estilo2">*</span> </td>
          </tr>
          <tr>
            <td align="right" height="30">País Autor:</td><td><input name="pais_autor" type="text" size="20" maxlength="20" value="<?php echo $datos[0]["pais_autor"] ?>"><span class="Estilo2">*</span></td>
          </tr>

          <tr>
            <td colspan="2" align="center"><span class="Estilo3">los campos con * son obligatorios</span><br>
              <br>

              <input type="hidden" name="id_autor" value="<?php echo $_GET["v"]; ?>">
              <input type="hidden" name="grabar" value="si">
              <input class="Estilo1" type="submit" name="mant_usu" value="aceptar">
              <input class="Estilo1" type="reset" value="limpiar">
              <input class="Estilo1" type="button" name="cancelar" value="cancelar" onclick="history.back()"></td>
          </tr>
        </table>
      </form>
    </div>