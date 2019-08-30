<?php
include_once '../system/checkLogin.php';

include_once '../system/connection.php';
include_once '../system/security.php';

$seg = Security::getInstance();
$con = ConnectionDb::getInstance();

$grado = strtoupper($_POST['grado']);
$nombres = strtoupper($_POST['nombres']);
$apellidos = strtoupper($_POST['apellidos']);
$sexo = $_POST['sexo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$usuario = strtolower(str_split($nombres, 4)[0].str_split($apellidos, 3)[0]);
$usuario = str_replace(" ","z",$usuario);
$clave = $usuario;

$seg->encryptObj($clave);

$sql_insertar_usuario = "INSERT INTO usuarios(usuario,clave,role) VALUES ('$usuario','$clave',2)";

$con->connect();
$result_insertar_usuario = $con->query($sql_insertar_usuario);

if ($result_insertar_usuario){
    $ultimo_id = $con->lastid();

    // insertando datos del profesor nuevo
    $sql_insertar_datosprofesor = "INSERT INTO datosusuarios(id_datosusuario,nombres,apellidos,sexo,fecha_nacimiento) VALUES ($ultimo_id,'$nombres','$apellidos',$sexo,'$fecha_nacimiento')";

    $result_datos_usuario = $con->query($sql_insertar_datosprofesor);
    if ($result_datos_usuario){
        // REGISTRAR EN QUE GRADO ENSEÑA
        $fecha_actual = date("Y")."-".date("m")."-".date("d");
        $sql_grado_profesor = "INSERT INTO profesoresasignados(id_profesor,grado_profesor,fecha) VALUES ($ultimo_id,'$grado','$fecha_actual')";

        $result_inserta_grado_profesor = $con->query($sql_grado_profesor);
        if ($result_inserta_grado_profesor){
            header("Location: ../registrarprofesor.php");
        }else{
            header("Location: ../error.php?error=gradoprofesor");
        }
    }else{
        header("Location: ../error.php?error=datosusuario");
    }
}else{
    header("Location: ../error.php?error=usuario");
}