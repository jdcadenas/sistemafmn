<?php

class Condicion extends Conectar {

    private $obra;
    private $autor;
    private $premio;
    private $dependencia;

    public function __construct() {
        $this->obra = array();
        $this->autor = array();
        $this->premio = array();
        $this->dependencia= array();
        
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
            "select
            o.id_obra,o.id_autor,o.id_premio,o.id_premio,o.id_dep,o.nom_obra,o.tip_obra,fec_obra,o.dimen_obra,o.colec_obra,con_obra,a.id_autor,a.pe_autor,a.pais_autor,p.id_premio,p.nom_premio,p.fec_premio,p.event_premio,p.pais_premio,p.ciudad_premio
            from
            obras as o, autores as , premios as p
            where
            o.id_autor=a.id_autor and o.id_premios = p. id_premio
            and
            u.id_obra=%s
            ", parent::comillas_inteligentes($_GET["v"]));

        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {

            $this->obra[] = $reg;
        }
        return $this->obra;
    }
public function get_Usuarios_por_cedula() {
    
     $sql = "select
            u.id_usuario,u.ci_usu,u.nom_usu,u.ape_usu,u.tip_usu,u.dep_usu,u.cargo_usu, l.login, l.id_login, l.contrasena
            from
            usuarios as u, login as l
            where
            l.id_login=u.id_login and
            u.ci_usu='121'
            order by u.id_usuario desc
            ";


        $res = mysql_query($sql, parent::con());

        while ($reg = mysql_fetch_array($res)) {

            $this->usuario[] = $reg;
    }
}
    
    public function get_Usuarios_por_id_login($id_login) {
        parent::con();

        $sql = sprintf(
            "select
            u.id_usuario,u.ci_usu,u.nom_usu,u.ape_usu,u.tip_usu,u.dep_usu,u.cargo_usu,l.login
            from
            usuarios as u, login as l
            where
            l.id_login=u.id_login
            and
            l.id_login=%s
            ", parent::comillas_inteligentes($id_login));

        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {

            $this->usuario[] = $reg;
        }

        return $this->usuario;
    }

    public function get_Obras() {
        $sql = "select o.id_obra,o.id_autor,o.id_premio,o.id_premio,o.id_dep,o.nom_obra,o.tip_obra,fec_obra,o.dimen_obra,o.colec_obra,o.cond_obra,a.id_autor,a.nom_autor,a.ape_autor,a.pais_autor,p.id_premio,p.nom_premio,p.fec_premio,p.event_premio,p.pais_premio,p.ciudad_premio,d.id_dep,d.rif_dep,d.nom_dep,d.dir_dep,d.telf_dep from obras as o, autores as a , premios as p, dependencias as d where o.id_autor=a.id_autor and o.id_premio = p. id_premio and d.id_dep=o.id_dep order by o.id_obra desc  
            
            ";


        $res = mysql_query($sql, parent::con());

        while ($reg = mysql_fetch_array($res)) {

            $this->obra[] = $reg;
        }

        return $this->obra;
    }

    public function agregar_obra() {

        if (empty($_POST["nom_obra"]) or empty($_POST["tip_obra"]) or empty($_POST["fec_obra"]) or empty($_POST["dimen_obra"]) or empty($_POST["colec_obra"]) or empty($_POST["con_obra"]) ) {
            header("Location: " . Conectar::ruta() . "/?accion=agregarObra&m=1");
            exit();
        }

        parent::con();
        $sql = sprintf
            (
            "select nom_autor from autor where autor=%s", parent::comillas_inteligentes($_POST["nom_autor"])
        );
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {


            $query = sprintf(
                "insert into login 
                    values 
                    (null, %s, %s);", parent::comillas_inteligentes($_POST["login"]), parent::comillas_inteligentes($_POST["contrasena"])
            );



            mysql_query($query);
            $id_login = mysql_insert_id();

            $query1 = sprintf
                (
                "insert into usuarios 
                values
                (null, %s, %s, %s, %s,%s,%s,%s);
                ", parent::comillas_inteligentes($id_login), parent::comillas_inteligentes($_POST["ci_usu"]), parent::comillas_inteligentes($_POST["nom_usu"]), parent::comillas_inteligentes($_POST["ape_usu"]), parent::comillas_inteligentes($_POST["tip_usu"]), parent::comillas_inteligentes($_POST["dep_usu"]), parent::comillas_inteligentes($_POST["cargo_usu"])
            );

            mysql_query($query1);

            header("Location: " . Conectar::ruta() . "/?accion=agregarObras&m=3");
            exit();
        } else {
            header("Location: " . Conectar::ruta() . "/?accion=agregarObras&m=2");
            exit();
        }
    }

    public function modificar_usuario() {

        if (empty($_POST["ci_usu"]) or empty($_POST["nom_usu"]) or empty($_POST["ape_usu"]) or empty($_POST["tip_usu"]) or empty($_POST["dep_usu"]) or empty($_POST["cargo_usu"]) or empty($_POST["login"])) {
            header("Location: " . Conectar::ruta() . "/?accion=modificarUsuario&m=1&v=" . $_POST["id_usuario"]);
            exit();
        }
        parent::con();

        $sql = sprintf(
            "update login 
                    set
                    login=%s,
                    contrasena=%s
                    where
                    id_login=%s", parent::comillas_inteligentes($_POST["login"]), parent::comillas_inteligentes($_POST["contrasena"]), parent::comillas_inteligentes($_POST["id_login"])
        );
        mysql_query($sql);


        parent::con();
        $sql1 = sprintf
            (
            "update usuarios
            set
            ci_usu=%s,
            nom_usu=%s,
            ape_usu=%s,
            tip_usu=%s,
            dep_usu=%s,
            cargo_usu=%s
            where
            id_usuario=%s", parent::comillas_inteligentes($_POST["ci_usu"]), parent::comillas_inteligentes($_POST["nom_usu"]), parent::comillas_inteligentes($_POST["ape_usu"]), parent::comillas_inteligentes($_POST["tip_usu"]), parent::comillas_inteligentes($_POST["dep_usu"]), parent::comillas_inteligentes($_POST["cargo_usu"]), parent::comillas_inteligentes($_POST["id_usuario"])
        );

        mysql_query($sql1);


        header("Location: " . Conectar::ruta() . "/?accion=modificarUsuario&m=3&v=" . $_POST["id_usuario"]);
        exit();
    }

    public function eliminarUsuario() {
        parent::con();

        $sql = sprintf("delete from login where id_login=%s", parent::comillas_inteligentes($_GET["v"]));

        $res = mysql_query($sql);


        $sql1 = sprintf("delete from usuarios where id_usuario=%s", parent::comillas_inteligentes($_GET["v"]));

        $res = mysql_query($sql1);

        header("Location: " . Conectar::ruta() . "/?accion=usuarios");
        exit();
    }

}

?>
