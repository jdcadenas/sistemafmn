function mmLoadMenus() {
  if (window.mm_menu_1220002951_0) return;
                  window.mm_menu_1220002951_0 = new Menu("root",151,20,"Verdana, Arial, Helvetica, sans-serif",10,"#000000","#FFFFFF","#CCCCCC","#000084","center","middle",5,5,200,-5,7,true,true,true,0,true,true);
  mm_menu_1220002951_0.addMenuItem("Usuarios","window.open('frmmantusu.php', '_self');");
  mm_menu_1220002951_0.addMenuItem("Obras","window.open('frmmantobra.php', '_self');");
  mm_menu_1220002951_0.addMenuItem("Dependencias","window.open('frmmantdepend.php', '_self');");
  mm_menu_1220002951_0.addMenuItem("Premios","window.open('frmmantpremios', '_self');");
  mm_menu_1220002951_0.addMenuItem("Condicion&nbsp;de&nbsp;la&nbsp;Obra","window.open('frmmantcond.php', '_self');");
  mm_menu_1220002951_0.addMenuItem("Autor","window.open('frmmantautor.php', '_self');");
   mm_menu_1220002951_0.fontWeight="bold";
   mm_menu_1220002951_0.hideOnMouseOut=true;
   mm_menu_1220002951_0.bgColor='#555555';
   mm_menu_1220002951_0.menuBorder=1;
   mm_menu_1220002951_0.menuLiteBgColor='#FFFFFF';
   mm_menu_1220002951_0.menuBorderBgColor='#777777';

      window.mm_menu_1220010509_0 = new Menu("root",141,20,"Verdana, Arial, Helvetica, sans-serif",10,"#000000","#FFFFFF","#CCCCCC","#000084","center","middle",5,5,200,-5,7,true,true,true,0,false,true);
  mm_menu_1220010509_0.addMenuItem("Adquisici�n&nbsp;de&nbsp;Obras","window.open('frmadqobras.php', '_self');");
  mm_menu_1220010509_0.addMenuItem("Movimientos","window.open('frmovimientos.php', '_self');");
  mm_menu_1220010509_0.addMenuItem("Restauracion","window.open('frrestauracion.php.php', '_self');");
   mm_menu_1220010509_0.fontWeight="bold";
   mm_menu_1220010509_0.hideOnMouseOut=true;
   mm_menu_1220010509_0.bgColor='#555555';
   mm_menu_1220010509_0.menuBorder=1;
   mm_menu_1220010509_0.menuLiteBgColor='#FFFFFF';
   mm_menu_1220010509_0.menuBorderBgColor='#777777';

  window.mm_menu_1220011136_0 = new Menu("root",159,16,"Verdana, Arial, Helvetica, sans-serif",10,"#000000","#FFFFFF","#CCCCCC","#000084","center","middle",3,0,200,-5,7,true,true,true,0,true,true);
  mm_menu_1220011136_0.addMenuItem("Usuarios","window.open('frrepusuarios.php', '_self');");
  mm_menu_1220011136_0.addMenuItem("Autor","window.open('frrepautor.php', '_self');");
  mm_menu_1220011136_0.addMenuItem("Premios&nbsp;Otorgados","window.open('frrepprmotor.php', '_self');");
  mm_menu_1220011136_0.addMenuItem("Dependencias","window.open('frrepdependencias.php', '_self');");
  mm_menu_1220011136_0.addMenuItem("Movimientos","window.open('frrepmov.php', '_self');");
  mm_menu_1220011136_0.addMenuItem("Adquisicion&nbsp;de&nbsp;Obras","window.open('frrepadqobras.php', '_self');");
  mm_menu_1220011136_0.addMenuItem("Restauracion&nbsp;de&nbsp;Obras","window.open('frreprestobras.php', '_self');");
   mm_menu_1220011136_0.fontWeight="bold";
   mm_menu_1220011136_0.hideOnMouseOut=true;
   mm_menu_1220011136_0.bgColor='#555555';
   mm_menu_1220011136_0.menuBorder=1;
   mm_menu_1220011136_0.menuLiteBgColor='#FFFFFF';
   mm_menu_1220011136_0.menuBorderBgColor='#777777';

    window.mm_menu_1220011918_0 = new Menu("root",145,20,"Verdana, Arial, Helvetica, sans-serif",10,"#000000","#FFFFFF","#CCCCCC","#000084","center","middle",5,5,200,-5,7,true,true,true,0,false,true);
  mm_menu_1220011918_0.addMenuItem("Usuarios","window.open('frrepusuarios.php', '_self');");
  mm_menu_1220011918_0.addMenuItem("Autores","window.open('frrepautores.php', '_self');");
  mm_menu_1220011918_0.addMenuItem("Premios&nbsp;Otorgados","window.open('frreppremotor.php', '_self');");
  mm_menu_1220011918_0.addMenuItem("Dependencias","window.open('frrepdependencias.php', '_self');");
  mm_menu_1220011918_0.addMenuItem("Movimientos","window.open('frrepmov.php', '_self');");
  mm_menu_1220011918_0.addMenuItem("Adquisicion&nbsp;de&nbsp;Obras","window.open('frrepadqobras.php', '_self');");
  mm_menu_1220011918_0.addMenuItem("Restauracion&nbsp;de&nbsp;Obras","window.open('frreprestobras.php', '_self');");
   mm_menu_1220011918_0.fontWeight="bold";
   mm_menu_1220011918_0.hideOnMouseOut=true;
   mm_menu_1220011918_0.bgColor='#555555';
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

