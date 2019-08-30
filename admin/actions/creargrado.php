<?php
include_once '../system/checkLogin.php';

include_once '../system/connection.php';

$con = ConnectionDb::getInstance();

$sql_insert = "INSERT INTO grados(nivel,grado) VALUES ('".$_POST['nivel']."','".$_POST['grado']."')";

$con->connect();
$result = $con->query($sql_insert);
if ($result){
    header("Location: ../grados.php");
}else{
    header("Location: ../error.php");

}
