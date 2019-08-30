<?php
include_once '../system/checkLogin.php';

include_once '../system/connection.php';

$con = ConnectionDb::getInstance();

$sql_insert_nom_curso = "INSERT INTO cursos(nombre_curso) VALUES ('".$_POST['nombre_curso']."')";

$con->connect();

$result_insert_curso = $con->query($sql_insert_nom_curso);

if ($result_insert_curso){
    $nivel = $_POST['nivel'];
    $id_curso = $con->lastid();

    $sql_curso_grado = "INSERT INTO cursosgrado(id_curso_fk,id_grado_fk) VALUES ($id_curso,$nivel)";

    $result_insert_relacion = $con->query($sql_curso_grado);
    if ($result_insert_relacion){
        header("Location: ../cursos.php");
    }else{
        header("Location: ../error.php");
    }
}else{ // Si salio mal
    header("Location: ../error.php");
}