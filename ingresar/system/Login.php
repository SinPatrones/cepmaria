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


    public function logIn($user, $pass, $days = 1, &$token = "", &$role){
        if($this->con->connect()){
            $this->security->applySecurityToObj($user);
            $this->security->applySecurityToObj($pass);

            $this->con->realescape($user);
            $this->con->realescape($pass);

            $sql = "SELECT * FROM usuarios WHERE usuario='$user'";
            $result = $this->con->query($sql);
            if ($result){
                $result = $this->con->getarray($result);
                 if ($this->security->verifyEncryptObj($pass, $result['clave'])){

                     // ['id' => 1, 'name' => 'Eduardo'] EJEMPLO
                     // DATOS PARA GUARDAR EN EL TOKEN
                     $role = $result['role'];
                     // seleccionamos los datos dependiendo de quien sea
                     $sql_command_data = "SELECT * FROM datosusuarios WHERE id_datousuario=".$result['id_usuario'];
                     $result_data = $this->con->query($sql_command_data);

                     $data = ['id'=>strval($result['id_usuario']), 'username'=> strval($result['usuario']), 'nombres' => strval($result_data['nombres']), 'apellidos' => strval($result_data['apellidos']), 'sexo' => strval($result_data['sexo']), 'role' => strval($result['role'])];

                     Auth::$days = $days;
                     // GENERACION DEL TOKEN
                     $token = strval(Auth::SignIn($data));

                     $sql_command_save_token = "UPDATE usuarios SET token='$token' WHERE id_usuario=".$result['id_usuario'];
                     $this->con->query($sql_command_save_token);

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