<?php

class Adquisicion extends Conectar {

    private $movimientos;
    private $obra;
    private $usuario;
    private $dependencia;
    private $tipoObra;
    private $autor;

    public function __construct() {
        $this->obra = array();
        $this->autor = array();
        $this->dependencia = array();
        $this->movimientos = array();
        $this->usuario = array();
        $this->tipoObra = array("Pintura", "Escultura", "Papel", "Instalaciones");
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

    public function get_meses() {
        $sql = "select id_mes,mes from meses";
        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {


            $this->meses[] = $reg;
        }
        return $this->meses;
    }

    public function agregar_obraAdquirida() {
        if (empty($_POST["nom_obra"]) or empty($_POST["tip_obra"]) or empty($_POST["dimen_obra"]) or empty($_POST["colec_obra"]) or empty($_POST["cond_obra"])) {
            header("Location: " . Conectar::ruta() . "/?accion=adquisicion&m=1");
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
$idObra = mysql_insert_id();
            
            
            if (!empty($_FILES["foto_obra"]["tmp_name"])) {
                $foto = "foto_" . mysql_insert_id() . ".jpg";
                copy($_FILES["foto_obra"]["tmp_name"], "public/images/fotoObras/$foto");
                $sql2 = "update obras set foto_obra='$foto' where id_obra=" . mysql_insert_id();
                mysql_query($sql2);
            } else {
                $foto = "foto_0.jpg";
                $sql2 = "update obras set foto_obra='$foto' where id_obra=" . mysql_insert_id();
                mysql_query($sql2);
            }
            
            $fechaActual = date("Y-m-d");
            
             $query1 = sprintf
            (
            "insert into movimientos  
                values
                (null, %s, %s, %s, '$fechaActual',%s)", parent::comillas_inteligentes($_SESSION["id_u"]), parent::comillas_inteligentes($_POST["id_dep"]), parent::comillas_inteligentes($_POST["id_dep"]), parent::comillas_inteligentes($_POST["tipoMov"])
        );
     
  
            
            mysql_query($query1);

            $idmov = mysql_insert_id();

            $query2 = sprintf
                (
                "insert into obrasmov 
                values
                (null, $idmov, %s)", parent::comillas_inteligentes($idObra)
            );

            mysql_query($query2);



            header("Location: " . Conectar::ruta() . "/?accion=adquisicion&m=3");
            exit();
        } else {
            header("Location: " . Conectar::ruta() . "/?accion=adquisicion&m=2");
            exit();
        }
    }

}

?>
