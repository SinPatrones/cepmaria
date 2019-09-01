<?php
include_once '../system/connection.php';

$con = ConnectionDb::getInstance();

$id_alumno = $_POST['id_alumno'];
$id_curso = $_POST['id_curso'];

// asignar nota
$sql_notas = "SELECT * FROM notasalumnos WHERE id_alumno=$id_alumno AND id_curso=$id_curso";
$con->connect();
$result_notas = $con->query($sql_notas);
$con->close();

$result_notas = $con->getarray($result_notas);

$n1 = $result_notas['primer_bimestre'];
$n2 = $result_notas['segundo_bimestre'];
$n3 = $result_notas['tercer_bimestre'];
$n4 = $result_notas['cuarto_bimestre'];

$fecha_actual = date("Y")."-".date("m")."-".date("d");

$promedio = round(($n1 + $n2 + $n3 + $n4) / 4);

$sql_actualizar_final = "UPDATE notasalumnos SET nota_final=$promedio, fecha_final='$fecha_actual' WHERE id_alumno=$id_alumno AND id_curso=$id_curso";

$con->connect();
$result_actualizar = $con->query($sql_actualizar_final);
$con->close();

echo '{"nota":'.$promedio.', "mensaje": "Se actualizo la nota final"}';