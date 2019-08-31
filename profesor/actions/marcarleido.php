<?php
include_once '../system/checkLogin.php';

include_once '../system/connection.php';

$con = ConnectionDb::getInstance();

$sql_update = "UPDATE notificaciones SET leido=1 WHERE id_notificacion=".$_GET['id_notificacion'];

$con->connect();
$result_update = $con->query($sql_update);
$con->close();

if ($result_update){
    header("Location: ../notificaciones.php");
}else{
    header("Location: ../error.php");
}
