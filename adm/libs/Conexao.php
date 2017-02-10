<?php

namespace Libs;

class Conexao{
    
    private static $cnx;
    
    public static function getConexao(){
        if (!self::$cnx) {
            self::open();
        }
        return self::$cnx;
    }

    private static function open() {
        
        $host= "localhost";
        $port = "3306";
        $database = "wandall_ca";
        $user = "root";
        $pass = "root";

        /*
        $host= "mysql.ms-project-rj.com.br";
        $port = "3306";
        $database = "msprojectrj01";
        $user = "msprojectrj01";
        $pass = "rafa130899";
        */

        self::$cnx = new PDO("mysql:host={$host};dbname={$database}", 
                             $user, 
                             $pass, 
                             array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    }
    /*    
    public function RunQuery($sql){
        $stm = $this->Connect()->prepare($sql);
        return $stm->execute();
    }

    public function RunSelect($sql){
        $stm = $this->Connect()->prepare($sql);
        $stm = $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    */

    public function setLimpaConexao()
    {
        if (self::$cnx) {
            self::$cnx = null;
        }
    }
}
?>