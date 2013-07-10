<script language="JavaScript" type="text/JavaScript">
<!--
function mmLoadMenus() {
  if (window.mm_menu_1220002951_0) return;
                  window.mm_menu_1220002951_0 = new Menu("root",151,22,"Verdana, Arial, Helvetica, sans-serif",11,"#7f7266","#FFFFFF","#ffcc66","#6599ff","center","middle",5,2,200,-5,7,true,true,true,0,true,true);
  mm_menu_1220002951_0.addMenuItem("Usuarios","window.open('<?php echo Conectar::ruta();?>/?accion=usuarios', '_self');");
  mm_menu_1220002951_0.addMenuItem("Obras","window.open('<?php echo Conectar::ruta();?>/?accion=obras', '_self');");
  mm_menu_1220002951_0.addMenuItem("Dependencias","window.open('<?php echo Conectar::ruta();?>/?accion=dep', '_self');");
  mm_menu_1220002951_0.addMenuItem("Premios","window.open('<?php echo Conectar::ruta();?>/?accion=premios', '_self');");
  mm_menu_1220002951_0.addMenuItem("Condici&oacute;n&nbsp;de&nbsp;la&nbsp;Obra","window.open('<?php echo Conectar::ruta();?>/?accion=condicion', '_self');");
  mm_menu_1220002951_0.addMenuItem("Autor","window.open('<?php echo Conectar::ruta();?>/?accion=autores', '_self');");
   mm_menu_1220002951_0.fontWeight="bold";
   mm_menu_1220002951_0.hideOnMouseOut=true;
   mm_menu_1220002951_0.bgColor='#7f6633';
   mm_menu_1220002951_0.menuBorder=1;
   mm_menu_1220002951_0.menuLiteBgColor='#FFFFFF';
   mm_menu_1220002951_0.menuBorderBgColor='#777777';

      window.mm_menu_1220010509_0 = new Menu("root",141,22,"Verdana, Arial, Helvetica, sans-serif",11,"#7f7266","#FFFFFF","#ffcc66","#6599ff","center","middle",5,2,200,-5,7,true,true,true,0,false,true);
  mm_menu_1220010509_0.addMenuItem("Adquisici&oacute;n&nbsp;de&nbsp;Obras","window.open('<?php echo Conectar::ruta();?>/?accion=adquisicion', '_self');");
  mm_menu_1220010509_0.addMenuItem("Movimientos","window.open('<?php echo Conectar::ruta();?>/?accion=movimientos', '_self');");
  mm_menu_1220010509_0.addMenuItem("Restauraci&oacute;n","window.open('<?php echo Conectar::ruta();?>/?accion=restauracion', '_self');");
   mm_menu_1220010509_0.fontWeight="bold";
   mm_menu_1220010509_0.hideOnMouseOut=true;
   mm_menu_1220010509_0.bgColor='#7f6633';
   mm_menu_1220010509_0.menuBorder=1;
   mm_menu_1220010509_0.menuLiteBgColor='#FFFFFF';
   mm_menu_1220010509_0.menuBorderBgColor='#777777';

  window.mm_menu_1220011136_0 = new Menu("root",159,22,"Verdana, Arial, Helvetica, sans-serif",11,"#7f7266","#FFFFFF","#ffcc66","#6599ff","center","middle",3,2,200,-5,7,true,true,true,0,true,true);
  mm_menu_1220011136_0.addMenuItem("Usuarios","window.open('<?php echo Conectar::ruta();?>/?accion=repUsuarios', '_self');");
  mm_menu_1220011136_0.addMenuItem("Autor","window.open('<?php echo Conectar::ruta();?>/?accion=repAutor', '_self');");
  mm_menu_1220011136_0.addMenuItem("Premios&nbsp;Otorgados","window.open('<?php echo Conectar::ruta();?>/?accion=repPreOtor', '_self');");
  mm_menu_1220011136_0.addMenuItem("Dependencias","window.open('<?php echo Conectar::ruta();?>/?accion=repDependencias', '_self');");
  mm_menu_1220011136_0.addMenuItem("Todos&nbsp;Movimientos","window.open('<?php echo Conectar::ruta();?>/?accion=repMovimientos&tipo=0', '_self');");
 mm_menu_1220011136_0.addMenuItem("Traslados","window.open('<?php echo Conectar::ruta();?>/?accion=repMovimientos&tipo=2', '_self');");
 mm_menu_1220011136_0.addMenuItem("Adquisici&oacute;n&nbsp;de&nbsp;Obras","window.open('<?php echo Conectar::ruta();?>/?accion=repMovimientos&tipo=1', '_self');");
  mm_menu_1220011136_0.addMenuItem("Restauraci&oacute;n&nbsp;de&nbsp;Obras","window.open('<?php echo Conectar::ruta();?>/?accion=repMovimientos&tipo=3', '_self');");
   mm_menu_1220011136_0.fontWeight="bold";
   mm_menu_1220011136_0.hideOnMouseOut=true;
   mm_menu_1220011136_0.bgColor='#7f6633';
   mm_menu_1220011136_0.menuBorder=1;
   mm_menu_1220011136_0.menuLiteBgColor='#FFFFFF';
   mm_menu_1220011136_0.menuBorderBgColor='#777777';

    window.mm_menu_1220011918_0 = new Menu("root",145,22,"Verdana, Arial, Helvetica, sans-serif",11,"#7f7266","#FFFFFF","#ffcc66","#6599ff","center","middle",5,2,200,-5,7,true,true,true,0,false,true);
  mm_menu_1220011918_0.addMenuItem("Usuarios","window.open('<?php echo Conectar::ruta();?>/?accion=repUsuarios', '_self');");
  mm_menu_1220011918_0.addMenuItem("Autores","window.open('<?php echo Conectar::ruta();?>/?accion=repAutor', '_self');");
  mm_menu_1220011918_0.addMenuItem("Premios&nbsp;Otorgados","window.open('<?php echo Conectar::ruta();?>/?accion=repPreOtor', '_self');");
  mm_menu_1220011918_0.addMenuItem("Dependencias","window.open('<?php echo Conectar::ruta();?>/?accion=repDependencias', '_self');");
  mm_menu_1220011918_0.addMenuItem("Todos&nbsp;Movimientos","window.open('<?php echo Conectar::ruta();?>/?accion=repMovimientos&tipo=0', '_self');");
  mm_menu_1220011918_0.addMenuItem("Traslados","window.open('<?php echo Conectar::ruta();?>/?accion=repMovimientos&tipo=2', '_self');");
 mm_menu_1220011918_0.addMenuItem("Adquisici&oacute;n&nbsp;de&nbsp;Obras","window.open('<?php echo Conectar::ruta();?>/?accion=repMovimientos&tipo=1', '_self');");
  mm_menu_1220011918_0.addMenuItem("Restauraci&oacute;n&nbsp;de&nbsp;Obras","window.open('<?php echo Conectar::ruta();?>/?accion=repMovimientos&tipo=3', '_self');");
   mm_menu_1220011918_0.fontWeight="bold";
   mm_menu_1220011918_0.hideOnMouseOut=true;
   mm_menu_1220011918_0.bgColor='#7f6633';
   mm_menu_1220011918_0.menuBorder=1;
   mm_menu_1220011918_0.menuLiteBgColor='#FFFFFF';
   mm_menu_1220011918_0.menuBorderBgColor='#777777';

mm_menu_1220011918_0.writeMenus();
} // mmLoadMenus()

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<script language="JavaScript" src="public/js/mm_menu.js"></script>

<script language="JavaScript1.2">mmLoadMenus();</script>
<?php
	$perfil=$_SESSION["tipo"];
	switch ($perfil)
		{
		case "Administrador":
                    
		echo"<table width=\"700\" border=\"0\" align=\"center\" >";
		echo"<tr>";
		echo"<td width=\"141\" class=\"Estilo1\"><div align=\"center\" ><a href=\"#\" name=\"link3\" class=\"Estilo1\" id=\"link1\" onMouseOver=\"MM_showMenu(window.mm_menu_1220002951_0,-2,19,null,'link3')\" onMouseOut=\"MM_startTimeout();\">Mantenimiento</a></div></td>";
		echo"<td width=\"141\" class=\"Estilo1\"><div align=\"center\"><a href=\"#\" name=\"link5\" id=\"link2\" onMouseOver=\"MM_showMenu(window.mm_menu_1220010509_0,-2,19,null,'link5')\" onMouseOut=\"MM_startTimeout();\">Procesamiento</a></div></td>";
		echo"<td width=\"141\" class=\"Estilo1\"><div align=\"center\"><a href=\"#\" name=\"link6\" id=\"link4\" onMouseOver=\"MM_showMenu(window.mm_menu_1220011918_0,-2,19,null,'link6')\" onMouseOut=\"MM_startTimeout();\">Reportes</a></div></td>";
		echo"<td width=\"141\" class=\"Estilo1\"><div align=\"center\"><a href=\"".Conectar::ruta()."/?accion=cerrarsesion\">Salir</a></div></td>";
		echo"</tr>";
		echo"</table>";
		break;
		case "Supervisor":
		echo"<table width=\"700\" border=\"0\" align=\"center\">";
		echo"<tr>";
		echo"<td width=\"141\"><div align=\"center\" class=\"Estilo2\"><a href=\"#\" class=\"Estilo1\">Mantenimiento</a></div></td>";
		echo"<td width=\"141\" class=\"Estilo1\"><div align=\"center\"><a href=\"#\" name=\"link5\" id=\"link2\" onMouseOver=\"MM_showMenu(window.mm_menu_1220010509_0,-2,19,null,'link5')\" onMouseOut=\"MM_startTimeout();\">Procesamiento</a></div></td>";
		echo"<td width=\"141\" class=\"Estilo1\"><div align=\"center\"><a href=\"#\" name=\"link6\" id=\"link4\" onMouseOver=\"MM_showMenu(window.mm_menu_1220011918_0,-2,19,null,'link6')\" onMouseOut=\"MM_startTimeout();\">Reportes</a></div></td>";
		echo"<td width=\"141\" class=\"Estilo1\"><div align=\"center\"><a href=\"".Conectar::ruta()."/?accion=cerrarsesion\">Salir</a></div></td>";
		echo"</tr>";
		echo"</table>";
		break;
		case "Especialista":
		echo"<table width=\"700\" border=\"0\" align=\"center\">";
		echo"<tr>";
		echo"<td width=\"141\"><div align=\"center\" class=\"Estilo2\"><a href=\"#\" name=\"link3\" class=\"Estilo1\">Mantenimiento</a></div></td>";
		echo"<td width=\"141\" class=\"Estilo1\"><div align=\"center\"><a href=\"#\" name=\"link5\" id=\"link2\" onMouseOver=\"MM_showMenu(window.mm_menu_1220010509_0,-2,19,null,'link5')\" onMouseOut=\"MM_startTimeout();\">Procesamiento</a></div></td>";
		echo"<td width=\"141\" class=\"Estilo1\"><div align=\"center\"><a href=\"#\" name=\"link6\">Reportes</a></div></td>";
		echo"<td width=\"141\" class=\"Estilo1\"><div align=\"center\"><a href=\"".Conectar::ruta()."/?accion=cerrarsesion\">Salir</a></div></td>";
		echo"</tr>";
		echo"</table>";
		break;
		}
	//mysql_close($db);
?>