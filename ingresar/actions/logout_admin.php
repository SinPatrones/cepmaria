<?php
if (isset($_COOKIE['colegiocookie'])){
    setcookie("colegiocookie", "", time() - 1, "/");
    header("LOCATION: ../ingresar.php");
}