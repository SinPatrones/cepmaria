<?php
include_once "auth.php";

try{
    if (!isset($_COOKIE['colegiocookie'])){
        header("LOCATION: ingresar.php");
        die();
    }else{
        $token = $_COOKIE['colegiocookie'];
        try{
            if (!Auth::Check($token, $err)){
                header("LOCATION: ingresar.php");
            }
        }catch (Exception $e){
            header("LOCATION: ingresar.php");
        }
    }
}
catch (Exception $e){
    header("LOCATION: ingresar.php");
}