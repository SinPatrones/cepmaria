<?php

$name = $_POST['name'];
$email = $_POST['email'];
$numero = $_POST['numero'];
$mensaje = $_POST['message'];

$con = mysqli_connect("localhost", "root", "", "mariadb");
$fecha_actual = date("Y")."-".date("m")."-".date("d");

$sql = "INSERT INTO consultas(nombre,email,numero,mensaje,fecha) VALUES ('$name','$email','$numero','$mensaje','$fecha_actual')";

$result = mysqli_query($con, $sql);
header("Location: index.php");