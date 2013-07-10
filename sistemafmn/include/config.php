<?php

session_start();
date_default_timezone_set("America/Caracas");
class Conectar {

    public function con() {
        $con = mysql_connect("mysql3.000webhost.com", "a5888104_sscpoa", "j6816938");
        mysql_query("SET NAMES 'utf8'");
        mysql_select_db("a5888104_sscpoa");
        return $con;
    }

    public static function ruta() {
        return "http://www.cursophpve.site90.net/sistemafmn";
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
