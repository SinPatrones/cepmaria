<?php
include_once '../system/checkLogin.php';

include_once '../system/connection.php';

$seleccionado = "";

$cursoprimero = Array();
$cursosegundo = Array();
$cursotercero = Array();
$cursocuarto = Array();
$cursoquinto = Array();

$p = false;
$s = false;
$t = false;
$c = false;
$q = false;

if (isset($_POST['seleccionado'])){
    $seleccionado = $_POST['seleccionado'];
}

if (isset($_POST['cursoprimero'])){
    $cursoprimero = $_POST['cursoprimero'];
    $p = true;
}

if (isset($_POST['cursosegundo'])){
    $cursosegundo = $_POST['cursosegundo'];
    $s = true;
}

if (isset($_POST['cursotercero'])){
    $cursotercero = $_POST['cursotercero'];
    $t = true;
}

if (isset($_POST['cursocuarto'])){
    $cursocuarto = $_POST['cursocuarto'];
    $c = true;
}

if (isset($_POST['cursoquinto'])){
    $cursoquinto = $_POST['cursoquinto'];
    $q = true;
}



$con = ConnectionDb::getInstance();

$sql_primero = "";
$sql_segundo = "";
$sql_tercero = "";
$sql_cuarto = "";
$sql_quinto = "";

if ($p){
    $sql_primero = "INSERT INTO cursoprofesores(id_profesor,id_curso) VALUES ";
    $values = "";
    for ($i = 0; $i < sizeof($cursoprimero) - 1; $i++){
        $values .= "($seleccionado,".$cursoprimero[$i]."),";
    }

    $values .= "($seleccionado, ".$cursoprimero[sizeof($cursoprimero) - 1].")";

    $sql_primero .= $values;

    echo $sql_primero."<br>";
}

if ($s){
    $sql_segundo = "INSERT INTO cursoprofesores(id_profesor,id_curso) VALUES ";
    $values = "";
    for ($i = 0; $i < sizeof($cursosegundo) - 1; $i++){
        $values .= "($seleccionado,".$cursosegundo[$i]."),";
    }

    $values .= "($seleccionado, ".$cursosegundo[sizeof($cursosegundo) - 1].")";

    $sql_segundo .= $values;

    echo $sql_segundo."<br>";
}

if ($t){
    $sql_tercero = "INSERT INTO cursoprofesores(id_profesor,id_curso) VALUES ";
    $values = "";
    for ($i = 0; $i < sizeof($cursotercero) - 1; $i++){
        $values .= "($seleccionado,".$cursotercero[$i]."),";
    }

    $values .= "($seleccionado, ".$cursotercero[sizeof($cursotercero) - 1].")";

    $sql_tercero .= $values;

    echo $sql_tercero."<br>";
}

if ($c){
    $sql_cuarto = "INSERT INTO cursoprofesores(id_profesor,id_curso) VALUES ";
    $values = "";
    for ($i = 0; $i < sizeof($cursocuarto) - 1; $i++){
        $values .= "($seleccionado,".$cursocuarto[$i]."),";
    }

    $values .= "($seleccionado, ".$cursocuarto[sizeof($cursocuarto) - 1].")";

    $sql_cuarto .= $values;

    echo $sql_cuarto."<br>";
}

if ($q){
    $sql_quinto = "INSERT INTO cursoprofesores(id_profesor,id_curso) VALUES ";
    $values = "";
    for ($i = 0; $i < sizeof($cursoquinto) - 1; $i++){
        $values .= "($seleccionado,".$cursoquinto[$i]."),";
    }

    $values .= "($seleccionado, ".$cursoquinto[sizeof($cursoquinto) - 1].")";

    $sql_quinto .= $values;

    echo $sql_quinto."<br>";
}


$con->connect();

$result_primero = null;
$result_segundo = null;
$result_tercero = null;
$result_cuarto = null;
$result_quinto = null;

if ($p)
    $result_primero = $con->query($sql_primero);

if ($s)
    $result_segundo = $con->query($sql_segundo);

if ($t)
    $result_tercero = $con->query($sql_tercero);

if ($c)
    $result_cuarto = $con->query($sql_cuarto);

if ($q)
    $result_quinto = $con->query($sql_quinto);


$con->close();


header("Location: ../asignarprofesor.php");





