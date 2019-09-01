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
        $sql_actualizar_nota = "UPDATE notasalumnos SET primer_bimestre=".$_POST['primerbimestre'].",fecha_primer='$fecha_actual' WHERE id_alumno=$id_alumno AND id_curso=$id_curso";
        $con->connect();
        $result_actualizar_nota = $con->query($sql_actualizar_nota);
        $con->close();

        switch ($grado){
            case 1:
                header("Location: ../notasprimergrado.php");
                break;
            case 2:
                header("Location: ../notassegundogrado.php");
                break;
            case 3:
                header("Location: ../notastercergrado.php");
                break;
            case 4:
                header("Location: ../notascuartogrado.php");
                break;
            case 5:
                header("Location: ../notasquintogrado.php");
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
                header("Location: ../notassegundogrado.php");
                break;
            case 3:
                header("Location: ../notastercergrado.php");
                break;
            case 4:
                header("Location: ../notascuartogrado.php");
                break;
            case 5:
                header("Location: ../notasquintogrado.php");
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
        $sql_actualizar_nota = "UPDATE notasalumnos SET segundo_bimestre=".$_POST['segundobimestre'].",fecha_primer='$fecha_actual' WHERE id_alumno=$id_alumno AND id_curso=$id_curso";
        $con->connect();
        $result_actualizar_nota = $con->query($sql_actualizar_nota);
        $con->close();

        switch ($grado){
            case 1:
                header("Location: ../notasprimergrado.php");
                break;
            case 2:
                header("Location: ../notassegundogrado.php");
                break;
            case 3:
                header("Location: ../notastercergrado.php");
                break;
            case 4:
                header("Location: ../notascuartogrado.php");
                break;
            case 5:
                header("Location: ../notasquintogrado.php");
                break;

        }
    }else{
        // EN EL CASO QUE NO TENGA NOTAS EN ESE CURSO
        $sql_insertar_nota = "INSERT INTO notasalumnos(id_alumno,id_curso,segundo_bimestre,fecha_primer) VALUES ($id_alumno,$id_curso,".$_POST['segundobimestre'].",'$fecha_actual')";
        $con->connect();
        $result_insertar_nota = $con->query($sql_insertar_nota);
        $con->close();

        switch ($grado){
            case 1:
                header("Location: ../notasprimergrado.php");
                break;
            case 2:
                header("Location: ../notassegundogrado.php");
                break;
            case 3:
                header("Location: ../notastercergrado.php");
                break;
            case 4:
                header("Location: ../notascuartogrado.php");
                break;
            case 5:
                header("Location: ../notasquintogrado.php");
                break;

        }
    }
}elseif (isset($_POST['tercerbimestre'])){
    $tercerbimestre = $_POST['tercerbimestre'];

    // PRIMERO VERIFICAMOS SI EXISTE EL REGISTRO DE NOTA DEL ALUMNO
    $sql_verificar_registro = "SELECT * FROM notasalumnos WHERE id_alumno=$id_alumno AND id_curso=$id_curso";

    $con->connect();
    $result_verificar_registro = $con->query($sql_verificar_registro);
    $con->close();

    if ($con->getnumrows($result_verificar_registro)>0){
        $sql_actualizar_nota = "UPDATE notasalumnos SET tercer_bimestre=".$_POST['tercerbimestre'].",fecha_primer='$fecha_actual' WHERE id_alumno=$id_alumno AND id_curso=$id_curso";
        $con->connect();
        $result_actualizar_nota = $con->query($sql_actualizar_nota);
        $con->close();

        switch ($grado){
            case 1:
                header("Location: ../notasprimergrado.php");
                break;
            case 2:
                header("Location: ../notassegundogrado.php");
                break;
            case 3:
                header("Location: ../notastercergrado.php");
                break;
            case 4:
                header("Location: ../notascuartogrado.php");
                break;
            case 5:
                header("Location: ../notasquintogrado.php");
                break;

        }
    }else{
        // EN EL CASO QUE NO TENGA NOTAS EN ESE CURSO
        $sql_insertar_nota = "INSERT INTO notasalumnos(id_alumno,id_curso,tercer_bimestre,fecha_primer) VALUES ($id_alumno,$id_curso,".$_POST['tercerbimestre'].",'$fecha_actual')";
        $con->connect();
        $result_insertar_nota = $con->query($sql_insertar_nota);
        $con->close();

        switch ($grado){
            case 1:
                header("Location: ../notasprimergrado.php");
                break;
            case 2:
                header("Location: ../notassegundogrado.php");
                break;
            case 3:
                header("Location: ../notastercergrado.php");
                break;
            case 4:
                header("Location: ../notascuartogrado.php");
                break;
            case 5:
                header("Location: ../notasquintogrado.php");
                break;

        }
    }
}elseif (isset($_POST['cuartobimestre'])){
    $cuartobimestre = $_POST['cuartobimestre'];

    // PRIMERO VERIFICAMOS SI EXISTE EL REGISTRO DE NOTA DEL ALUMNO
    $sql_verificar_registro = "SELECT * FROM notasalumnos WHERE id_alumno=$id_alumno AND id_curso=$id_curso";

    $con->connect();
    $result_verificar_registro = $con->query($sql_verificar_registro);
    $con->close();

    if ($con->getnumrows($result_verificar_registro)>0){
        $sql_actualizar_nota = "UPDATE notasalumnos SET cuarto_bimestre=".$_POST['cuartobimestre'].",fecha_primer='$fecha_actual' WHERE id_alumno=$id_alumno AND id_curso=$id_curso";
        $con->connect();
        $result_actualizar_nota = $con->query($sql_actualizar_nota);
        $con->close();

        switch ($grado){
            case 1:
                header("Location: ../notasprimergrado.php");
                break;
            case 2:
                header("Location: ../notassegundogrado.php");
                break;
            case 3:
                header("Location: ../notastercergrado.php");
                break;
            case 4:
                header("Location: ../notascuartogrado.php");
                break;
            case 5:
                header("Location: ../notasquintogrado.php");
                break;

        }
    }else{
        // EN EL CASO QUE NO TENGA NOTAS EN ESE CURSO
        $sql_insertar_nota = "INSERT INTO notasalumnos(id_alumno,id_curso,cuarto_bimestre,fecha_primer) VALUES ($id_alumno,$id_curso,".$_POST['cuartobimestre'].",'$fecha_actual')";
        $con->connect();
        $result_insertar_nota = $con->query($sql_insertar_nota);
        $con->close();

        switch ($grado){
            case 1:
                header("Location: ../notasprimergrado.php");
                break;
            case 2:
                header("Location: ../notassegundogrado.php");
                break;
            case 3:
                header("Location: ../notastercergrado.php");
                break;
            case 4:
                header("Location: ../notascuartogrado.php");
                break;
            case 5:
                header("Location: ../notasquintogrado.php");
                break;

        }
    }
}


