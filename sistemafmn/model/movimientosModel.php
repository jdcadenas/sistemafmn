<?php

class Movimientos extends Conectar {

    private $movimientos;
    private $obra;
    private $usuario;
    private $dependencia;
    private $tipoObra;
    private $autor;
    private $tipoMov;

    public function __construct() {
        $this->obra = array();
        $this->autor = array();
        $this->dependencia = array();
        $this->movimientos = array();
        $this->usuario = array();
        $this->tipoObra = array("Pintura", "Escultura", "Papel", "Instalaciones");
        $this->tipoMov = array("Todos", "Adquisición", "Traslado", "Restauración");
    }

    public function get_tipoObra() {

        return $this->tipoObra;
    }

    public function get_tipoMov() {

        return $this->tipoMov;
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

    public function get_obras_por_id($id_obras) {
        parent::con();

        $sql = sprintf(
            "select o.id_obra,o.id_autor,o.id_premio,o.id_dep,o.nom_obra,o.tip_obra,o.fec_obra,o.dimen_obra,o.colec_obra,o.cond_obra,o.foto_obra,a.id_autor,a.nom_autor,a.ape_autor,a.pais_autor,p.id_premio,p.nom_premio,p.fec_premio,p.event_premio,p.pais_premio,p.ciudad_premio,d.id_dep,d.rif_dep,d.nom_dep,d.dir_dep,d.telf_dep
            from
            obras as o, autores as a, premios as p, dependencias as d
            where
            o.id_autor=a.id_autor and
            o.id_premio=p.id_premio and
            o.id_dep=d.id_dep and
            o.id_obra=%s
            ", parent::comillas_inteligentes($id_obras));

        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {

            $this->obra[] = $reg;
        }
        return $this->obra;
    }

    public function get_Obras() {
        $sql = "select o.id_obra,o.id_autor,o.id_premio,o.id_dep,o.nom_obra,o.tip_obra,o.fec_obra,o.dimen_obra,o.colec_obra,o.cond_obra,o.foto_obra,a.id_autor,a.nom_autor,a.ape_autor,a.pais_autor,p.id_premio,p.nom_premio,p.fec_premio,p.event_premio,p.pais_premio,p.ciudad_premio,d.id_dep,d.rif_dep,d.nom_dep,d.dir_dep,d.telf_dep from obras as o, autores as a , premios as p, dependencias as d where o.id_autor=a.id_autor and o.id_premio = p.id_premio and d.id_dep=o.id_dep order by o.id_obra desc  
            
            ";


        $res = mysql_query($sql, parent::con());

        while ($reg = mysql_fetch_array($res)) {

            $this->obra[] = $reg;
        }

        return $this->obra;
    }

    public function agregar_obramov() {


        if (empty($_POST["id_depDesde"]) or empty($_POST["id_depHacia"])) {
            if ($_POST["grabar_rest"]) {
                header("Location: " . Conectar::ruta() . "/?accion=restauracion&m=1");
                exit();
            } else {
                header("Location: " . Conectar::ruta() . "/?accion=movimientos&m=1");
                exit();
            }
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

        $query1 = sprintf
            (
            "insert into movimientos  
                values
                (null, %s, %s, %s, '$fecha',%s)", parent::comillas_inteligentes($_SESSION["id_u"]), parent::comillas_inteligentes($_POST["id_depDesde"]), parent::comillas_inteligentes($_POST["id_depHacia"]), parent::comillas_inteligentes($_POST["tipoMov"])
        );

        mysql_query($query1);
        /* colocar si se realizo consulta */
        $idmov = mysql_insert_id();
        foreach ($_SESSION["carro"] as $valor) {

            $query2 = sprintf
                (
                "insert into obrasmov 
                values
                (null, $idmov, %s)", parent::comillas_inteligentes($valor["id"])
            );

            mysql_query($query2);

            $query3 = sprintf
                (
                "update obras
            set
            id_dep=%s
            where
            id_obra=%s", parent::comillas_inteligentes($_POST["id_depHacia"]), parent::comillas_inteligentes($valor["id"])
            );

            mysql_query($query3);
        }
//Remover obras de carro
        unset($_SESSION['carro']);
        if ($_POST["grabar_rest"]) {
            header("Location: " . Conectar::ruta() . "/?accion=restauracion&m=3");
            exit();
        } else {
            header("Location: " . Conectar::ruta() . "/?accion=movimientos&m=3");
            exit();
        }
    }

    public function get_obras_por_dep($id_dep) {
        parent::con();

        $sql = sprintf(
            "select *
            from
            obras as o
            where
            o.id_dep=%s
            ", parent::comillas_inteligentes($id_dep));


        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {

            $this->obra[] = $reg;
        }
        return $this->obra;
    }

    public function get_movimientos() {
        $sql = "select m.id_mov,m.id_usu, u.nom_usu,u.ape_usu,m.id_depDesde,m.id_depHacia, d1.nom_dep as Desde, d2.nom_dep as Hacia,m.fec_mov,m.tipomov, om.id_obras,o.nom_obra from movimientos as m, obrasmov as om, obras as o, dependencias as d1, dependencias as d2, usuarios as u where
m.id_mov=om.id_mov and
om.id_obras=o.id_obra and
m.id_depDesde=d1.id_dep and
m.id_depHacia=d2.id_dep and
u.id_usuario=m.id_usu 
order by m.id_mov DESC,o.nom_obra,m.fec_mov";

        $res = mysql_query($sql, parent::con());

        while ($reg = mysql_fetch_array($res)) {

            $this->obra[] = $reg;
        }

        return $this->obra;
    }
public function get_movimientos_tipo($tip) {
        $sql = "select m.id_mov,m.id_usu, u.nom_usu,u.ape_usu,m.id_depDesde,m.id_depHacia, d1.nom_dep as Desde, d2.nom_dep as Hacia,m.fec_mov,m.tipomov, om.id_obras,o.nom_obra from movimientos as m, obrasmov as om, obras as o, dependencias as d1, dependencias as d2, usuarios as u where
m.id_mov=om.id_mov and
om.id_obras=o.id_obra and
m.id_depDesde=d1.id_dep and
m.id_depHacia=d2.id_dep and
u.id_usuario=m.id_usu and
m.tipomov=$tip
order by m.id_mov DESC,o.nom_obra,m.fec_mov";

        $res = mysql_query($sql, parent::con());

        while ($reg = mysql_fetch_array($res)) {

            $this->obra[] = $reg;
        }

        return $this->obra;
    }
    

}

?>
