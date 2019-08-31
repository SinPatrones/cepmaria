<?php
class ConnectionDb{
    private static $instance = null;
    private static $host = "localhost";
    private static $user = "root";
    //private static $user = "u972238859_maria";

    private static $pass = "";
    //private static $pass = "patrones0-";

    private static $db = "mariadb";
    //private static $db = "u972238859_maria";

    private static $mysql = null;
    private function __construct(){
        // singleton mode
    }
    public static function getInstance(){
        if (self::$instance == null)
            self::$instance = new self();
        return self::$instance;
    }
    public function connect(){
        self::$mysql = mysqli_connect(self::$host, self::$user, self::$pass, self::$db);
        return self::$mysql;
    }

    function query($query){
        mysqli_set_charset(self::$mysql,'utf8');
        return mysqli_query(self::$mysql, $query);
    }
    function error(){
        return mysqli_error(self::$mysql);
    }
    function realescape(&$data){
        return mysqli_real_escape_string(self::$mysql,$data);
    }
    function lastid(){
        return mysqli_insert_id(self::$mysql);
    }
    function close(){
        mysqli_close(self::$mysql);
    }
    public function getnumrows($results){
        return mysqli_num_rows($results);
    }
    public function getarray($results){
        return mysqli_fetch_array($results);
    }
    function getobj($results){
        return mysqli_fetch_object($results);
    }
    function  getrows($obj){
        return mysqli_num_rows($obj);
    }
}
?>