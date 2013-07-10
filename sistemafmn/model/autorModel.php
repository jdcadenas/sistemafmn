<?php

class Autores extends Conectar {

    private $autor;
  
    public function __construct() {
        $this->autor = array();
    }

    public function get_autor() {
        $sql = "select id_autor,nom_autor,ape_autor, pais_autor from autores";
        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {
            $this->autor[] = $reg;
        }
        return $this->autor;
    }

    public function agregar_autor() {

        if (empty($_POST["nom_autor"]) or empty($_POST["ape_autor"]) or empty($_POST["pais_autor"]) ) {
            header("Location: " . Conectar::ruta() . "/?accion=agregarAutor&m=1");
            exit();
        }
        parent::con();
        $sql = sprintf
            (
            "select nom_autor,ape_autor 
                from autores 
                where nom_autor=%s and ape_autor=%s", 
            parent::comillas_inteligentes($_POST["nom_autor"]),
            parent::comillas_inteligentes($_POST["ape_autor"])
        );
         $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {

            $query = sprintf(
                "insert into autores 
                    values 
                    (null, %s, %s,%s);", parent::comillas_inteligentes($_POST["nom_autor"]), parent::comillas_inteligentes($_POST["ape_autor"]),parent::comillas_inteligentes($_POST["pais_autor"])
            );
            mysql_query($query);

            header("Location: " . Conectar::ruta() . "/?accion=agregarAutor&m=3");
            exit();
        } else {
            header("Location: " . Conectar::ruta() . "/?accion=agregarAutor&m=2");
            exit();
        }
    }
 public function get_Autores_por_id() {
        parent::con();

        $sql = sprintf(
            "select
            a.id_autor,a.nom_autor,a.ape_autor,a.pais_autor
            from
            autores as a
            where
            a.id_autor=%s",
            parent::comillas_inteligentes($_GET["v"]));

        $res = mysql_query($sql);
        while ($reg = mysql_fetch_array($res)) {

            $this->autor[] = $reg;
        }

        return $this->autor;
    }
    public function get_Autores_por_nombre() {
        
         if (empty($_POST["nombre"])) {
            header("Location: " . Conectar::ruta() . "/?accion=buscarAutor&m=1");
            exit();
        }
        
        parent::con();

        $sql = "select
            a.id_autor,a.nom_autor,a.ape_autor,a.pais_autor
            from
            autores as a
            where
            a.nom_autor like '%".$_POST["nombre"]."%' or
                a.ape_autor like '%".$_POST["nombre"]."%'"
                ;
        $res = mysql_query($sql);
        
        if (mysql_num_rows($res) == 0) {
            header("Location: " . Conectar::ruta() . "/?accion=buscarAutor&m=2");
            exit;
        } else {
        while ($reg = mysql_fetch_array($res)) {

            $this->autor[] = $reg;
        }
   
        
        return $this->autor;
         header("Location: " . Conectar::ruta() . "/?accion=buscarAutor&m=3");
        }
    } 
    public function modificar_Autor() {

        if (empty($_POST["nom_autor"]) or empty($_POST["ape_autor"]) or empty($_POST["pais_autor"]) ){
            header("Location: " . Conectar::ruta() . "/?accion=modificarAutor&m=1&v=" . $_POST["id_autor"]);
            exit();
        }
        parent::con();

        $sql = sprintf(
            "update autores 
                    set
                    nom_autor=%s,
                    ape_autor=%s,
                    pais_autor=%s
                    where
                    id_autor=%s", parent::comillas_inteligentes($_POST["nom_autor"]), parent::comillas_inteligentes($_POST["ape_autor"]),parent::comillas_inteligentes($_POST["pais_autor"]), parent::comillas_inteligentes($_POST["id_autor"])
        );
        mysql_query($sql);

        header("Location: " . Conectar::ruta() . "/?accion=modificarAutor&m=3&v=" . $_POST["id_autor"]);
        exit();
    }

    public function eliminarAutor() {
        parent::con();

        $sql = sprintf("delete from autores where id_autor=%s", parent::comillas_inteligentes($_GET["v"]));
        $res = mysql_query($sql);

        header("Location: " . Conectar::ruta() . "/?accion=autores");
        exit();
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
