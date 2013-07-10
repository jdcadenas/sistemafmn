function eliminar(url){
    if( confirm("¿realmente desea eliminar este registro?") )
    {
        
        window.location=url;
    }
}

function limpiar()
{
    document.form.reset();
    document.form.ci_usu.focus();
}
function limpiardep()
{
    document.form.reset();
    document.form.rif_dep.focus();
}
function limpiar_2()
{
    document.form.reset();
    document.form.nom.focus();
}


function tomarvalor(){
    
    $valor=document.getElementById("id_dep").value;
    document.getElementById("id_depDesde").value=$valor;
    document.getElementById("id_depHacia").value=$valor;
   
}




function valid_email(email) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
        return (true)
    } else {
        return (false);
    }
}
function add_user()
{
    var form=document.form;
    if(form.perfil.value==0)
    {
        document.getElementById("error").innerHTML="Debe seleccionar un perfil";
        form.perfil.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.nom.value==0)
    {
        document.getElementById("error").innerHTML="El nombre está vacío";
        form.nom.value="";
        form.nom.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.cedula.value==0)
    {
        document.getElementById("error").innerHTML="La cédula está vacía";
        form.cedula.value="";
        form.cedula.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.correo.value==0)
    {
        document.getElementById("error").innerHTML="El E-Mail está vacío";
        form.correo.value="";
        form.correo.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(valid_email(form.correo.value)==false)
    {
        document.getElementById("error").innerHTML="El E-Mail ingresado no es válido";
        form.correo.value="";
        form.correo.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.sexo.value==0)
    {
        document.getElementById("error").innerHTML="Debe seleccionar un sexo";
        form.sexo.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.dia.value==0)
    {
        document.getElementById("error").innerHTML="Debe seleccionar un día";
        form.dia.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.mes.value==0)
    {
        document.getElementById("error").innerHTML="Debe seleccionar un mes";
        form.mes.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.anio.value==0)
    {
        document.getElementById("error").innerHTML="Debe seleccionar un año";
        form.anio.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.tel.value==0)
    {
        document.getElementById("error").innerHTML="El Teléfono está vacío";
        form.tel.value="";
        form.tel.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.correo.value==0)
    {
        document.getElementById("error").innerHTML="El E-Mail está vacío";
        form.correo.value="";
        form.correo.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.login.value==0)
    {
        document.getElementById("error").innerHTML="El login está vacío";
        form.login.value="";
        form.login.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.pass.value==0)
    {
        document.getElementById("error").innerHTML="El Password está vacío";
        form.pass.value="";
        form.pass.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.pass_2.value==0)
    {
        document.getElementById("error").innerHTML="Debe repetir el Password";
        form.pass_2.value="";
        form.pass_2.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.pass.value != form.pass_2.value)
    {
        document.getElementById("error").innerHTML="Los password ingresados no coiciden";
        form.pass.value="";
        form.pass_2.value="";
        form.pass.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.dir.value==0)
    {
        document.getElementById("error").innerHTML="La dirección está vacía";
        form.dir.value="";
        form.dir.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    form.submit();
}
function add_asig()
{
    var form=document.form;
    if(form.nom.value==0)
    {
        document.getElementById("error").innerHTML="El nombre está vacio";
        form.nom.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.des.value==0)
    {
        document.getElementById("error").innerHTML="la descripción está vacía";
        form.des.value="";
        form.des.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    if(form.codigo.value==0)
    {
        document.getElementById("error").innerHTML="El código está vacío";
        form.codigo.value="";
        form.codigo.focus();
        return false;
    }else
    {
        document.getElementById("error").innerHTML="";
    }
    form.submit();
}
function ordenar(ruta,valor){

    if( (document.getElementById("ordenar")).value > 0){
        window.location=ruta+"&v="+valor;
    }
}

function cargar(){
      opener.location.reload();
      window.close();
}

function recarga(){
    var pos_url = '';
    var nombre = document.getElementById('lautores').value;
    var req = new XMLHttpRequest();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4 && (req.status == 200 || req.status == 304)) {
                document.getElementById('lautores').innerHTML = req.responseText;
                req.responseText;
            }
        }
        req.open('GET', pos_url +'?accion=agregarAutor',true);
        req.send(null);
    }
}
function llenarUsuario(id){
        
    divResultado = document.getElementById('resultado');
    ajax=objetoAjax();
    ajax.open("GET", id);
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            divResultado.innerHTML = ajax.responseText
        }
    }
    ajax.send(null)
}
function objetoAjax(){
    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function MostrarConsulta(datos){
    divResultado = document.getElementById('resultado');
    divResultado.innerHTML= '<img src="anim.gif">';
    ajax=objetoAjax();
    ajax.open("GET", datos);
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            divResultado.innerHTML = ajax.responseText
        }
    }
    ajax.send(null)
}
/********************************************/



function obtiene_http_request()
{
var req = false;
try
  {
    req = new XMLHttpRequest(); /* p.e. Firefox */
  }
catch(err1)
  {
  try
    {
     req = new ActiveXObject("Msxml2.XMLHTTP");
  /* algunas versiones IE */
    }
  catch(err2)
    {
    try
      {
       req = new ActiveXObject("Microsoft.XMLHTTP");
  /* algunas versiones IE */
      }
      catch(err3)
        {
         req = false;
        }
    }
  }
return req;
}
var miPeticion = obtiene_http_request();



function from(id,ide,url)
{
		//para que no guarde la página en el caché...
		var mi_aleatorio=parseInt(Math.random()*99999999);
		//creo la URL dinámica
		var vinculo=url+"?id="+id+"&rand="+mi_aleatorio;
		//alert(vinculo);
		//ponemos true para que la petición sea asincrónica
		miPeticion.open("GET",vinculo,true);
		
		
		//ahora procesamos la información enviada
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=
            function()
            {
               //alert("ready_State="+miPeticion.readyState);
               if (miPeticion.readyState==4)
               {
				   //alert(miPeticion.readyState);
                       //alert("status ="+miPeticion.status);
                       if (miPeticion.status==200)
                       {
                                //alert(miPeticion.status);
                               //var http=miPeticion.responseXML;
                               //alert("http="+http);
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;

                       }
               }
               
       }
       miPeticion.send(null);

}
/********************************************/
function from_post(id,ide,url)
{
        //para que no guarde la página en el caché...
		var mi_aleatorio=parseInt(Math.random()*99999999);
		//creo la URL dinámica
		var vinculo=url+"?rand="+mi_aleatorio+"&id="+id;
		//alert(vinculo);
		//ponemos true para que la petición sea asincrónica
		miPeticion.open("POST",vinculo,true);
		miPeticion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		miPeticion.send(vinculo);
		
		
		//ahora procesamos la información enviada
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
               //alert("ready_State="+miPeticion.readyState);
               if (miPeticion.readyState==4)
               {
				   //alert(miPeticion.readyState);
                       //alert("status ="+miPeticion.status);
                       if (miPeticion.status==200)
                       {
                                //alert(miPeticion.status);
                               //var http=miPeticion.responseXML;
                               //alert("http="+http);
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;

                       }
               }
               
       }
       miPeticion.send(null);
	
}
function from_post(id,accion_mov,ide,url)
{
   
        //para que no guarde la página en el caché...
		var mi_aleatorio=parseInt(Math.random()*99999999);
		//creo la URL dinámica
		var vinculo=url+"?rand="+mi_aleatorio+"&id="+id+"&accion_mov="+accion_mov;
		//alert(vinculo);
		//ponemos true para que la petición sea asincrónica
		miPeticion.open("POST",vinculo,true);
		miPeticion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		miPeticion.send(vinculo);
		
		
		//ahora procesamos la información enviada
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
               //alert("ready_State="+miPeticion.readyState);
               if (miPeticion.readyState==4)
               {
				   //alert(miPeticion.readyState);
                       //alert("status ="+miPeticion.status);
                       if (miPeticion.status==200)
                       {
                                //alert(miPeticion.status);
                               //var http=miPeticion.responseXML;
                               //alert("http="+http);
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;

                       }
               }
               
       }
       miPeticion.send(null);
	
}



