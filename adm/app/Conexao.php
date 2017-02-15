<?php

//namespace Libs;

class Conexao{
    
    private static $cnx;
    
    public static function getConexao(){
        if (!self::$cnx) {
            self::open();
        }
        return self::$cnx;
    }

    private static function open() {
        
        $host= HOST;
        $port = PORT;
        $database = DB_NAME;
        $user = USER_NAME;
        $pass = PASSWORD;

        self::$cnx = new PDO("mysql:host={$host};dbname={$database}", 
                             $user, 
                             $pass, 
                             array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"
                                  ,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
                                  ,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ));
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

}
?>