<?php

class Usuarios extends Conectar {

    private $usuario;
    private $login;
    private $tipo;
    private $dpto;

    public function __construct() {
        $this->usuario = array();
        $this->login = array();
        $this->tipo = array("Supervisor", "Administrador", "Especialista");
        $this->dpto = array("Registro", "Conservación");
        $this->cargo = array("Jefe de Registro", "Jefe de conservación", "Registrador I");
    }

    public function get_login() {
        $sql = "select id_login,login,contrasena from login";
        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {
            $this->login[] = $reg;
        }
        return $this->login;
    }

    public function get_tipos() {

        return $this->tipo;
    }

    public function get_dpto() {

        return $this->dpto;
    }

    public function get_cargo() {

        return $this->cargo;
    }

    public function get_Usuarios_por_id() {
        parent::con();

        $sql = sprintf(
                "select
            u.id_usuario,u.ci_usu,u.nom_usu,u.ape_usu,u.tip_usu,u.dep_usu,u.cargo_usu,l.login,l.id_login ,l.contrasena
            from
            usuarios as u, login as l
            where
            l.id_login=u.id_login
            and
            u.id_usuario=%s
            ", parent::comillas_inteligentes($_GET["v"]));

        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {

            $this->usuario[] = $reg;
        }
        return $this->usuario;
    }
    
    public function get_Usuarios_por_cedula() {
        if (empty($_POST["ci"])) {
            header("Location: " . Conectar::ruta() . "/?accion=buscarUsuario&m=1");
            exit();
        }

        $sql = "select
            u.id_usuario,u.ci_usu,u.nom_usu,u.ape_usu,u.tip_usu,u.dep_usu,u.cargo_usu,l.login,l.id_login ,l.contrasena
            from
            usuarios as u, login as l
            where
            l.id_login=u.id_login
            and
            u.ci_usu='" . $_POST["ci"] . "'";

        $res = mysql_query($sql, parent::con());
        if (mysql_num_rows($res) == 0) {
            header("Location: " . Conectar::ruta() . "/?accion=buscarUsuario&m=2");
            exit;
        } else {
            while ($reg = mysql_fetch_array($res)) {

                $this->usuario[] = $reg;
            }
            return $this->usuario;
        }
         header("Location: " . Conectar::ruta() . "/?accion=buscarUsuario&m=3");
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

    public function get_Usuarios() {
        $sql = "select
            u.id_usuario,u.ci_usu,u.nom_usu,u.ape_usu,u.tip_usu,u.dep_usu,u.cargo_usu, l.login, l.id_login, l.contrasena
            from
            usuarios as u, login as l
            where
            l.id_login=u.id_login
            order by u.tip_usu,u.ape_usu
            ";


        $res = mysql_query($sql, parent::con());

        while ($reg = mysql_fetch_array($res)) {

            $this->usuario[] = $reg;
        }

        return $this->usuario;
    }

    function logueo() {
        //print_r($_POST);

        if (empty($_POST["usuario"])) {
            header("Location: " . Conectar::ruta() . "/?accion=index&m=1");
            exit();
        }
        if (empty($_POST["passwd"])) {
            header("Location: " . Conectar::ruta() . "/?accion=index&m=2");
            exit();
        }
        parent::con();
        $sql = sprintf
                (
                "select id_login,login,contrasena from login where login=%s and contrasena=%s", parent::comillas_inteligentes($_POST["usuario"]), parent::comillas_inteligentes($_POST["passwd"])
        );

        $res = mysql_query($sql);
        if (mysql_num_rows($res) == 0) {
            header("Location: " . Conectar::ruta() . "/?accion=index&m=3");
            exit;
        } else {
            if ($reg = mysql_fetch_array($res)) {

                $_SESSION["id_u"] = $reg["id_login"];
                $datos_u = $this->get_Usuarios_por_id_login($reg["id_login"]);
                $_SESSION["nombre"] = $datos_u[0]["nom_usu"];
                $_SESSION["apellido"] = $datos_u[0]["ape_usu"];
                $_SESSION["tipo"] = $datos_u[0]["tip_usu"];


                header("Location: " . Conectar::ruta() . "/?accion=principal");
                exit;
            }
        }
    }

    public function agregar_usuario() {

        if (empty($_POST["ci_usu"]) or empty($_POST["nom_usu"]) or empty($_POST["ape_usu"]) or empty($_POST["tip_usu"]) or empty($_POST["dep_usu"]) or empty($_POST["cargo_usu"]) or empty($_POST["login"]) or empty($_POST["contrasena"])) {
            header("Location: " . Conectar::ruta() . "/?accion=agregarUsuarios&m=1");
            exit();
        }

        parent::con();
        $sql = sprintf
                (
                "select login from login where login=%s", parent::comillas_inteligentes($_POST["login"])
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

            header("Location: " . Conectar::ruta() . "/?accion=agregarUsuarios&m=3");
            exit();
        } else {
            header("Location: " . Conectar::ruta() . "/?accion=agregarUsuarios&m=2");
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

    public function salir() {
        session_destroy();
        header("Location: " . Conectar::ruta() . "/?accion=index&m=4");
        exit;
    }

     public function get_meses() {
        $sql = "select id_mes,mes from meses";
        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {


            $this->meses[] = $reg;
        }
        return $this->meses;
    }

}

?>
