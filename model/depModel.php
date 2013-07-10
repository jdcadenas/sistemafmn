<?php

class Dependencias extends Conectar {

   private $dependencia;

    public function __construct() {
      
        $this->dependencia= array();
        
    }

       
    public function get_dependencias() {
        $sql = "select id_dep,rif_dep,nom_dep,dir_dep,telf_dep from dependencias";
        $res = mysql_query($sql, parent::con());
        while ($reg = mysql_fetch_array($res)) {
            $this->dependencia[] = $reg;
        }
        return $this->dependencia;
    }
    
   public function get_Dep_por_id() {
        parent::con();

        $sql = sprintf(
            "select
            d.id_dep,d.rif_dep,d.nom_dep,d.dir_dep,d.telf_dep
            from
            dependencias as d
            where
            d.id_dep=%s",
            parent::comillas_inteligentes($_GET["v"]));

        $res = mysql_query($sql);
        while ($reg = mysql_fetch_array($res)) {

            $this->dependencia[] = $reg;
        }
   
        
        return $this->dependencia;
    }
    
    public function get_Dep_por_nombre(){
    if (empty($_POST["nombre"])) {
            header("Location: " . Conectar::ruta() . "/?accion=buscarDep&m=1");
            exit();
        }
        
        parent::con();

        $sql = "select
            d.id_dep,d.rif_dep,d.nom_dep,d.dir_dep,d.telf_dep
            from
            dependencias as d
            where
            d.nom_dep like '%".$_POST["nombre"]."%'"
                ;
        $res = mysql_query($sql);
        
        if (mysql_num_rows($res) == 0) {
            header("Location: " . Conectar::ruta() . "/?accion=buscarDep&m=2");
            exit;
        } else {
        while ($reg = mysql_fetch_array($res)) {

            $this->Dep[] = $reg;
        }
   
        
        return $this->Dep;
         header("Location: " . Conectar::ruta() . "/?accion=buscarDep&m=3");
        }
    } 
    
    
    
    
    
    
   public function agregar_dependencia() {

        if (empty($_POST["rif_dep"]) or empty($_POST["nom_dep"]) or empty($_POST["dir_dep"]) or empty($_POST["telf_dep"])) {
            header("Location: " . Conectar::ruta() . "/?accion=agregarDep&m=1");
            exit();
        }

        parent::con();
        $sql = sprintf
            (
            "select rif_dep from dependencias where rif_dep=%s", parent::comillas_inteligentes($_POST["rif_dep"])
        );
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {

           $query = sprintf
                (
                "insert into dependencias 
                values
                (null, %s, %s, %s, %s);
                ", parent::comillas_inteligentes($_POST["rif_dep"]), parent::comillas_inteligentes($_POST["nom_dep"]), parent::comillas_inteligentes($_POST["dir_dep"]), parent::comillas_inteligentes($_POST["telf_dep"])
            );

            mysql_query($query);

            header("Location: " . Conectar::ruta() . "/?accion=agregarDep&m=3");
            exit();
        } else {
            header("Location: " . Conectar::ruta() . "/?accion=agregarDep&m=2");
            exit();
        }
    }

    public function modificar_Dependencia() {

        if (empty($_POST["rif_dep"]) or empty($_POST["nom_dep"]) or empty($_POST["dir_dep"]) or empty($_POST["telf_dep"])) {
            header("Location: " . Conectar::ruta() . "/?accion=modificarDep&m=1&v=" . $_POST["id_dep"]);
            exit();
        }
        parent::con();

        $sql = sprintf
            (
            "update dependencias
            set
            rif_dep=%s,
            nom_dep=%s,
            dir_dep=%s,
            telf_dep=%s
            where
            id_dep=%s",
            parent::comillas_inteligentes($_POST["rif_dep"]), 
            parent::comillas_inteligentes($_POST["nom_dep"]),
            parent::comillas_inteligentes($_POST["dir_dep"]), 
            parent::comillas_inteligentes($_POST["telf_dep"]),
            parent::comillas_inteligentes($_POST["id_dep"])
        );

        mysql_query($sql);


        header("Location: " . Conectar::ruta() . "/?accion=modificarDep&m=3&v=" . $_POST["id_dep"]);
        exit();
    }

    public function eliminarDep() {
        parent::con();

        $sql = sprintf("delete from dependencias where id_dep=%s", parent::comillas_inteligentes($_GET["v"]));

        $res = mysql_query($sql);

        header("Location: " . Conectar::ruta() . "/?accion=dep");
        exit();
    }

    public function get_Dep_por_rif() {
        if (empty($_POST["rif"])) {
            header("Location: " . Conectar::ruta() . "/?accion=buscarDep&m=4");
            exit();
        }
        
         parent::con();

        $sql = sprintf(
            "select
            d.id_dep,d.rif_dep,d.nom_dep,d.dir_dep,d.telf_dep
            from
            dependencias as d
            where
            d.rif_dep=%s",
            parent::comillas_inteligentes($_POST["rif"]));

        $res = mysql_query($sql);
        
        if (mysql_num_rows($res) == 0) {
            header("Location: " . Conectar::ruta() . "/?accion=buscarDep&m=2");
            exit;
        } else {
        while ($reg = mysql_fetch_array($res)) {

            $this->Dep[] = $reg;
        }
   
        
        return $this->Dep;
         header("Location: " . Conectar::ruta() . "/?accion=buscarDep&m=3");
        }
    }

}

?>
