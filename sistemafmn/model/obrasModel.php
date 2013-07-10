<?php

class Obras extends Conectar {

    private $obra;
    private $autor;
    private $premio;
    private $dependencia;
    private $tipoObra;
    private $meses;

    public function __construct() {
        $this->obra = array();
        $this->autor = array();
        $this->premio = array();
        $this->dependencia = array();
        $this->tipoObra = array("Pintura", "Escultura", "Papel", "Instalaciones");
    }

    public function get_meses() {
        $sql = "select id_mes,mes from meses";
        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {


            $this->meses[] = $reg;
        }
        return $this->meses;
    }

    public function get_tipoObra() {

        return $this->tipoObra;
    }

    public function get_autor() {
        $sql = "select id_autor,nom_autor,ape_autor, pais_autor from autores";
        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {
            $this->autor[] = $reg;
        }
        return $this->autor;
    }

    public function get_premio() {
        $sql = "select id_premio,nom_premio,fec_premio, event_premio, pais_premio,ciudad_premio from premios";
        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {
            $this->premio[] = $reg;
        }
        return $this->premio;
    }

    public function get_dependencias() {
        $sql = "select id_dep,rif_dep,nom_dep,dir_dep,telf_dep from dependencias";

        $res = mysql_query($sql, parent::con());

        while ($reg = mysql_fetch_array($res)) {
            $this->dependencia[] = $reg;
        }


        return $this->dependencia;
    }

    public function get_obras_por_id() {
        parent::con();

        $sql = sprintf(
                "select o.id_obra,o.id_autor,o.id_premio,o.id_dep,o.nom_obra,o.tip_obra,o.fec_obra,o.dimen_obra,o.colec_obra,o.cond_obra,o.foto_obra,a.id_autor,a.nom_autor,a.ape_autor,a.pais_autor,p.id_premio,p.nom_premio,p.fec_premio,p.event_premio,p.pais_premio,p.ciudad_premio,d.id_dep,d.rif_dep,d.nom_dep,d.dir_dep,d.telf_dep,
day(o.fec_obra) as dia, month(o.fec_obra) as mes, year(o.fec_obra) as anio
            from
            obras as o, autores as a, premios as p,
              dependencias as d             
where
            o.id_autor=a.id_autor and
            o.id_premio=p.id_premio and 
            d.id_dep=o.id_dep and
            o.id_obra=%s
            ", parent::comillas_inteligentes($_REQUEST["v"]));

        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {

            $this->obra[] = $reg;
        }
        return $this->obra;
    }

    public function get_Obras() {
        $sql = "select o.id_obra,o.id_autor,o.id_premio,o.id_dep,o.nom_obra,o.tip_obra,o.fec_obra,o.dimen_obra,o.colec_obra,o.cond_obra,o.foto_obra,a.id_autor,a.nom_autor,a.ape_autor,a.pais_autor,p.id_premio,p.nom_premio,p.fec_premio,p.event_premio,p.pais_premio,p.ciudad_premio,d.id_dep,d.rif_dep,d.nom_dep,d.dir_dep,d.telf_dep 
            from 
            obras as o, autores as a , premios as p, 
            dependencias as d 
            where 
            o.id_autor=a.id_autor and 
            o.id_premio = p.id_premio and 
            d.id_dep=o.id_dep order 
            by d.nom_dep,o.nom_obra asc
            ";
        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {
            $this->obra[] = $reg;
        }
        return $this->obra;
    }
public function get_Obra_por_nombre(){
     if (empty($_POST["nombre"])) {
            header("Location: " . Conectar::ruta() . "/?accion=buscarObras&m=1");
            exit();
        }
     parent::con();
 $sql = "select o.id_obra,o.id_autor,o.id_premio,o.id_dep,o.nom_obra,o.tip_obra,o.fec_obra,o.dimen_obra,o.colec_obra,o.cond_obra,o.foto_obra,a.id_autor,a.nom_autor,a.ape_autor,a.pais_autor,p.id_premio,p.nom_premio,p.fec_premio,p.event_premio,p.pais_premio,p.ciudad_premio,d.id_dep,d.rif_dep,d.nom_dep,d.dir_dep,d.telf_dep from obras as o, autores as a , premios as p, dependencias as d where 
     o.id_autor=a.id_autor and o.id_premio = p.id_premio and d.id_dep=o.id_dep 
     
and o.nom_obra like '%".$_POST["nombre"]."%'

order by o.id_obra desc
            ";

        
        $res = mysql_query($sql);
        
        if (mysql_num_rows($res) == 0) {
            header("Location: " . Conectar::ruta() . "/?accion=buscarObras&m=2");
            exit;
        } else {
        while ($reg = mysql_fetch_array($res)) {

            $this->obra[] = $reg;
        }
   
        return $this->obra;
         header("Location: " . Conectar::ruta() . "/?accion=buscarObras&m=3");
        }
}
    
    public function agregar_obra() {

        if (empty($_POST["nom_obra"]) or empty($_POST["tip_obra"]) or empty($_POST["dimen_obra"]) or empty($_POST["colec_obra"]) or empty($_POST["cond_obra"])) {
            header("Location: " . Conectar::ruta() . "/?accion=agregarObra&m=1");
            exit();
        }

        parent::con();
        $sql = sprintf
                (
                "select nom_obra from obras where nom_obra=%s", parent::comillas_inteligentes($_POST["nom_obra"])
        );
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            if (strlen($_POST["dia"]) == 1) {
                $dia = "0" . $_POST["dia"];
            } else {
                $dia = $_POST["dia"];
            }
            if (strlen($_POST["mes"]) == 1) {
                $mes = "0" . $_POST["mes"];
            } else {
                $mes = $_POST["mes"];
            }
            $fecha = $_POST["anio"] . "-" . $mes . "-" . $dia;

            $query = sprintf
                    (
                    "insert into obras
                values
                (null, %s, %s, %s, %s,%s,'$fecha',%s,%s,%s,'')", parent::comillas_inteligentes($_POST["id_autor"]), parent::comillas_inteligentes($_POST["id_premio"]), parent::comillas_inteligentes($_POST["id_dep"]), parent::comillas_inteligentes($_POST["nom_obra"]), parent::comillas_inteligentes($_POST["tip_obra"]), parent::comillas_inteligentes($_POST["dimen_obra"]), parent::comillas_inteligentes($_POST["colec_obra"]), parent::comillas_inteligentes($_POST["cond_obra"])
            );
            mysql_query($query);
            
            if (!empty($_FILES["foto_obra"]["tmp_name"])) {
                $foto = "foto_" . mysql_insert_id() . ".jpg";
                copy($_FILES["foto_obra"]["tmp_name"], "public/images/fotoObras/$foto");
                $sql2 = "update obras set foto_obra='$foto' where id_obra=" . mysql_insert_id();
                mysql_query($sql2);
            }else{
                $foto="foto_0.jpg";
                $sql2 = "update obras set foto_obra='$foto' where id_obra=" . mysql_insert_id();
                mysql_query($sql2);
            }

            header("Location: " . Conectar::ruta() . "/?accion=agregarObra&m=3");
            exit();
        } else {
            header("Location: " . Conectar::ruta() . "/?accion=agregarObra&m=2");
            exit();
        }
    }

    public function modificar_obra() {

        if (empty($_POST["nom_obra"]) or empty($_POST["tip_obra"]) or empty($_POST["dimen_obra"]) or empty($_POST["colec_obra"]) or empty($_POST["cond_obra"])) {
            header("Location: " . Conectar::ruta() . "/?accion=modificarObra&m=1&v=" . $_POST["id_obra"]);
            exit();
        }
        parent::con();
//identifico la foto a usar
        if (empty($_FILES["foto_obra"]["name"])) {
            $foto = $_POST["archivo"];
        } else {
            $foto = "foto_" . $_POST["id_obra"] . ".jpg";
            copy($_FILES["foto_obra"]["tmp_name"], "public/images/fotoObras/$foto");
        }

        if (strlen($_POST["dia"]) == 1) {
            $dia = "0" . $_POST["dia"];
        } else {
            $dia = $_POST["dia"];
        }
        if (strlen($_POST["mes"]) == 1) {
            $mes = "0" . $_POST["mes"];
        } else {
            $mes = $_POST["mes"];
        }
        $fecha = $_POST["anio"] . "-" . $mes . "-" . $dia;


        $sql = sprintf
                (
                "update obras
            set
            nom_obra=%s,
            tip_obra=%s,
            fec_obra='$fecha',
            dimen_obra=%s,
            colec_obra=%s,
            cond_obra=%s,
            foto_obra='$foto',
            id_autor=%s,
            id_premio=%s,
            id_dep=%s
            where
            id_obra=%s", parent::comillas_inteligentes($_POST["nom_obra"]), parent::comillas_inteligentes($_POST["tip_obra"]), parent::comillas_inteligentes($_POST["dimen_obra"]), parent::comillas_inteligentes($_POST["colec_obra"]), parent::comillas_inteligentes($_POST["cond_obra"]), parent::comillas_inteligentes($_POST["id_autor"]), parent::comillas_inteligentes($_POST["id_premio"]), parent::comillas_inteligentes($_POST["id_dep"]), parent::comillas_inteligentes($_POST["id_obra"])
        );

        mysql_query($sql);


        header("Location: " . Conectar::ruta() . "/?accion=modificarObra&m=3&v=" . $_POST["id_obra"]);
        exit();
    }

    public function eliminar_Obra() {
        parent::con();

        $sql=sprintf
                (
                "select foto_obra from obras where id_obra=%s", parent::comillas_inteligentes($_GET["v"])
        );
        $res = mysql_query($sql);
        $reg = mysql_fetch_array($res);
       
        $foto= $reg["foto_obra"];
        unlink("public/images/fotoObras/".$foto);
        
        
        $sql1 = sprintf("delete from obras where id_obra=%s", parent::comillas_inteligentes($_GET["v"]));

        $res = mysql_query($sql1);

        header("Location: " . Conectar::ruta() . "/?accion=obras");
        exit();
    }
public function modificarCondicion_obra() {

        parent::con();

        $sql = sprintf
                (
                "update obras
            set
            cond_obra=%s
            where
            id_obra=%s", parent::comillas_inteligentes($_POST["cond_obra"]), parent::comillas_inteligentes($_POST["id_obra"])
        );

        mysql_query($sql);


        header("Location: " . Conectar::ruta() . "/?accion=modificarCondicionObra&m=3&v=" . $_POST["id_obra"]);
        exit();
    }
}

?>
