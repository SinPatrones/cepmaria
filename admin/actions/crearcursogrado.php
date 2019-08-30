<?php
include_once '../system/checkLogin.php';

include_once '../system/connection.php';

$con = ConnectionDb::getInstance();

$sql_insert_nom_curso = "INSERT INTO cursos(nombre_curso,grado_curso) VALUES ('".$_POST['nombre_curso']."','".$_POST['grado']."')";

$con->connect();

$result_insert_curso = $con->query($sql_insert_nom_curso);

if ($result_insert_curso){
    header("Location: ../cursos.php");
}else{ // Si salio mal
    header("Location: ../error.php");
}