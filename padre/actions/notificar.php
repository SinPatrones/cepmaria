<?php
include_once '../system/checkLogin.php';

$id_usuario = $_POST['id_usuario'];
$id_reportante = $_POST['id_reportante'];
$titulo = $_POST['titulo'];
$mensaje = $_POST['mensaje'];

$fecha_actual = date("Y")."-".date("m")."-".date("d");

include_once '../system/connection.php';

$con = ConnectionDb::getInstance();

$sql_notificacion = "INSERT INTO notificaciones(id_usuario,id_reportante,leido,titulo,mensaje,fecha) VALUES ($id_usuario,$id_reportante,false,'$titulo','$mensaje','$fecha_actual')";

$con->connect();
$result_notificacion = $con->query($sql_notificacion);
$con->close();

if ($result_notificacion){
    header("Location: ../notificar.php");
}else{
    header("Location: ../error.php");
}