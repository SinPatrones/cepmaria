<?php
include_once '../system/checkLogin.php';

include_once '../system/connection.php';

$con = ConnectionDb::getInstance();

$id_alumno = $_POST['id_alumno'];
$id_curso = $_POST['id_curso'];
$grado = $_POST['grado'];
$fecha_actual = date("Y")."-".date("m")."-".date("d");

if (isset($_POST['primerbimestre'])){
    $primerbimestre = $_POST['primerbimestre'];
    // PRIMERO VERIFICAMOS SI EXISTE EL REGISTRO DE NOTA DEL ALUMNO
    $sql_verificar_registro = "SELECT * FROM notasalumnos WHERE id_alumno=$id_alumno AND id_curso=$id_curso";

    $con->connect();
    $result_verificar_registro = $con->query($sql_verificar_registro);
    $con->close();

    if ($con->getnumrows($result_verificar_registro)>0){
        echo "Ya tiene nota";

        switch ($grado){
            case 1:
                header("Location: ../notasprimergrado.php");
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
        }
    }else{
        // EN EL CASO QUE NO TENGA NOTAS EN ESE CURSO
        $sql_insertar_nota = "INSERT INTO notasalumnos(id_alumno,id_curso,primer_bimestre,fecha_primer) VALUES ($id_alumno,$id_curso,".$_POST['primerbimestre'].",'$fecha_actual')";
        $con->connect();
        $result_insertar_nota = $con->query($sql_insertar_nota);
        $con->close();

        switch ($grado){
            case 1:
                header("Location: ../notasprimergrado.php");
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
        }
    }
}elseif (isset($_POST['segundobimestre'])){
    $segundobimestre = $_POST['segundobimestre'];

    // PRIMERO VERIFICAMOS SI EXISTE EL REGISTRO DE NOTA DEL ALUMNO
    $sql_verificar_registro = "SELECT * FROM notasalumnos WHERE id_alumno=$id_alumno AND id_curso=$id_curso";

    $con->connect();
    $result_verificar_registro = $con->query($sql_verificar_registro);
    $con->close();

    if ($con->getnumrows($result_verificar_registro)>0){
        echo "Ya tiene nota";
    }else{
        // EN EL CASO QUE NO TENGA NOTAS EN ESE CURSO
        $sql_insertar_nota = "INSERT INTO notasalumnos(id_alumno,id_curso,segundo_bimestre,)";
    }
}elseif (isset($_POST['tercerbimestre'])){
    $tercerbimestre = $_POST['tercerbimestre'];

    // PRIMERO VERIFICAMOS SI EXISTE EL REGISTRO DE NOTA DEL ALUMNO
    $sql_verificar_registro = "SELECT * FROM notasalumnos WHERE id_alumno=$id_alumno AND id_curso=$id_curso";

    $con->connect();
    $result_verificar_registro = $con->query($sql_verificar_registro);
    $con->close();

    if ($con->getnumrows($result_verificar_registro)>0){
        echo "Ya tiene nota";
    }else{
        // EN EL CASO QUE NO TENGA NOTAS EN ESE CURSO
        $sql_insertar_nota = "INSERT INTO notasalumnos(id_alumno,id_curso,primer_bimestre,)";
    }
}elseif (isset($_POST['cuartobimestre'])){
    $cuartobimestre = $_POST['cuartobimestre'];

    // PRIMERO VERIFICAMOS SI EXISTE EL REGISTRO DE NOTA DEL ALUMNO
    $sql_verificar_registro = "SELECT * FROM notasalumnos WHERE id_alumno=$id_alumno AND id_curso=$id_curso";

    $con->connect();
    $result_verificar_registro = $con->query($sql_verificar_registro);
    $con->close();

    if ($con->getnumrows($result_verificar_registro)>0){
        echo "Ya tiene nota";
    }else{
        // EN EL CASO QUE NO TENGA NOTAS EN ESE CURSO
        $sql_insertar_nota = "INSERT INTO notasalumnos(id_alumno,id_curso,primer_bimestre,)";
    }
}


