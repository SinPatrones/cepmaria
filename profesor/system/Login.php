<?php
include_once "connection.php";
include_once "security.php";
include_once "auth.php";

class Login
{
    private $security = null;
    private $con = null;
    private static $instance = null;

    private function __construct()
    {
        $this->security = Security::getInstance();
        $this->con = ConnectionDb::getInstance();
        $this->con->connect();
    }

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new self();
        return self::$instance;
    }


    public function logIn($user, $pass, $days = 1, &$token = ""){
        if($this->con->connect()){
            $this->security->applySecurityToObj($user);
            $this->security->applySecurityToObj($pass);

            $this->con->realescape($user);
            $this->con->realescape($pass);

            $sql = "SELECT * FROM usuarios WHERE username='$user'";
            $result = $this->con->query($sql);
            if ($result){
                $result = $this->con->getarray($result);
                 if ($this->security->verifyEncryptObj($pass, $result['pass'])){

                     // ['id' => 1, 'name' => 'Eduardo'] EJEMPLO
                     // DATOS PARA GUARDAR EN EL TOKEN
                     $data = ['id'=>strval($result['id_administrador']), 'username'=> strval($result['username'])];

                     Auth::$days = $days;
                     // GENERACION DEL TOKEN
                     $token = strval(Auth::SignIn($data));

                     return true;
                 }
                 return false;
            }
            return false;
        }
        // sin conexion
        return false;
    }
}