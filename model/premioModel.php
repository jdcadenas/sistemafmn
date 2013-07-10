<?php

class Premios extends Conectar {

    private $premio;
  
    public function __construct() {
        $this->premio = array();
    }

    public function get_premio() {
        $sql = "select id_premio,nom_premio,fec_premio,event_premio,pais_premio, ciudad_premio from premios";
        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {
            $this->premio[] = $reg;
        }
        return $this->premio;
    }
 public function get_meses() {
        $sql = "select id_mes,mes from meses";
        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {


            $this->meses[] = $reg;
        }
        return $this->meses;
    }
    public function agregar_premio() {

        if (empty($_POST["nom_premio"]) or empty($_POST["event_premio"]) ) {
            header("Location: " . Conectar::ruta() . "/?accion=agregarPremio&m=1");
            exit();
        }
        parent::con();
        $sql = sprintf
            (
            "select nom_premio 
                from premios
                where nom_premio=%s ", 
            parent::comillas_inteligentes($_POST["nom_premio"])
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

            $query = sprintf(
                "insert into premios 
                    values 
                    (null, %s, '$fecha',%s,%s,%s);", parent::comillas_inteligentes($_POST["nom_premio"]), parent::comillas_inteligentes($_POST["event_premio"]),parent::comillas_inteligentes($_POST["pais_premio"]),parent::comillas_inteligentes($_POST["ciudad_premio"])
            );
            mysql_query($query);

            header("Location: " . Conectar::ruta() . "/?accion=agregarPremio&m=3");
            exit();
        } else {
            header("Location: " . Conectar::ruta() . "/?accion=agregarPremio&m=2");
            exit();
        }
    }
 public function get_Premio_por_id() {
        parent::con();

        $sql = sprintf(
            "select
            p.id_premio,p.nom_premio,p.fec_premio,p.event_premio,p.pais_premio,p.ciudad_premio,
            day(p.fec_premio) as dia, month(p.fec_premio) as mes, year(p.fec_premio) as anio
            from
            premios as p
            where
            p.id_premio=%s",
            parent::comillas_inteligentes($_GET["v"]));

        $res = mysql_query($sql);
        while ($reg = mysql_fetch_array($res)) {

            $this->premio[] = $reg;
        }
   
        
        return $this->premio;
    }
    
    public function modificar_Premio() {

        if (empty($_POST["nom_premio"]) or empty($_POST["event_premio"]) ){
            header("Location: " . Conectar::ruta() . "/?accion=modificarPremio&m=1&v=" . $_POST["id_premio"]);
            exit();
        }
        parent::con();
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
        
        $sql = sprintf(
            "update premios 
                    set
                    nom_premio=%s,
                    fec_premio='$fecha',
                    event_premio=%s,
                    pais_premio=%s,
                    ciudad_premio=%s
                    where
                    id_premio=%s",
            parent::comillas_inteligentes($_POST["nom_premio"]),
            parent::comillas_inteligentes($_POST["event_premio"]), 
            parent::comillas_inteligentes($_POST["pais_premio"]),
            parent::comillas_inteligentes($_POST["ciudad_premio"]),
            parent::comillas_inteligentes($_POST["id_premio"])
        );
        mysql_query($sql);

        header("Location: " . Conectar::ruta() . "/?accion=modificarPremio&m=3&v=" . $_POST["id_premio"]);
        exit();
    }

    public function eliminarPremio() {
        parent::con();

        $sql = sprintf("delete from premios where id_premio=%s", 
            parent::comillas_inteligentes($_GET["v"]));

        $res = mysql_query($sql);

        header("Location: " . Conectar::ruta() . "/?accion=premios");
        exit();
    }

    public function get_Premios_por_nombre() {
         if (empty($_POST["nombre"])) {
            header("Location: " . Conectar::ruta() . "/?accion=buscarPremios&m=1");
            exit();
        }
        
        parent::con();

        $sql = "select
            p.id_premio,p.nom_premio,p.fec_premio,p.event_premio,p.pais_premio,p.ciudad_premio
            from
            premios as p
            where
            p.nom_premio like '%".$_POST["nombre"]."%'";
        
        $res = mysql_query($sql);
        
        if (mysql_num_rows($res) == 0) {
            header("Location: " . Conectar::ruta() . "/?accion=buscarPremios&m=2");
            exit;
        } else {
        while ($reg = mysql_fetch_array($res)) {

            $this->premio[] = $reg;
        }
   
        
        return $this->premio;
         header("Location: " . Conectar::ruta() . "/?accion=buscarPremios&m=3");
        }
    }

}

?>
