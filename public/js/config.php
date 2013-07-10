<?php

session_start();
date_default_timezone_set("America/Caracas");
class Conectar {

    public function con() {
        $con = mysql_connect("localhost", "root", "admin");
        mysql_query("SET NAMES 'utf8'");
        mysql_select_db("sscpoa");
        return $con;
    }

    public static function ruta() {
        return "http://localhost/sistemafmn";
    }
//tomado del manual de php
    
    public function comillas_inteligentes($valor) {
        // Retirar las barras
        if (get_magic_quotes_gpc()) {
            $valor = stripslashes($valor);
        }

        // Colocar comillas si no es entero
        if (!is_numeric($valor)) {
            $valor = "'" . mysql_real_escape_string($valor) . "'";
        }
        return $valor;
    }

   

}

?>
