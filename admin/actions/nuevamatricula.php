<?php
include_once '../system/checkLogin.php';

include_once '../system/connection.php';
include_once '../system/security.php';

$seg = Security::getInstance();
$con = ConnectionDb::getInstance();

$grado = $_POST['grado'];
$nombres = strtoupper($_POST['nombres']);
$apellidos = strtoupper($_POST['apellidos']);
$sexo = $_POST['sexo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$usuario = strtolower(str_split($nombres, 4)[0].str_split($apellidos, 3)[0]);
$clave = $usuario;

$seg->encryptObj($clave);

$sql_insertar_usuario = "INSERT INTO usuarios(usuario,clave,role) VALUES ('$usuario','$clave',3)";

$con->connect();
$result_insertar_usuario = $con->query($sql_insertar_usuario);

if ($result_insertar_usuario){
    $ultimo_id = $con->lastid();

    // insertando datos del alumno nuevo
    $sql_insertar_datosalumno = "INSERT INTO datosusuarios(id_datosusuario,nombres,apellidos,sexo,fecha_nacimiento) VALUES ($ultimo_id,'$nombres','$apellidos',$sexo,'$fecha_nacimiento')";

    $result_datos_usuario = $con->query($sql_insertar_datosalumno);
    if ($result_datos_usuario){
        // insertando la relación de matricula
        setlocale(LC_TIME,"es_ES"); // fecha en castellano
        $fecha_actual = date("Y")."-".date("m")."-".date("d");
        $sql_matricula = "INSERT INTO matriculas(id_alumno,grado_matricula,fecha) VALUES ($ultimo_id,'$grado','$fecha_actual')";
        echo $sql_matricula."<br>";
        $result_matricula = $con->query($sql_matricula);
        if ($result_matricula){
            header("Location: ../nuevamatricula.php");
        }else{
            echo $con->error();
            //header("Location: ../error.php?error=matricula");
        }
    }else{
        header("Location: ../error.php?error=datosusuario");
    }
}else{
    header("Location: ../error.php?error=usuario");
}