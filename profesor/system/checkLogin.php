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
                header("LOCATION: ../ingresar/index.php");
            }else{
                $data = Auth::GetData($token);
                if ($data->role != "2"){
                    switch ($data->role){
                        case 1:
                            header("LOCATION: ../admin/denegado.php");
                            break;
                        case 3:
                            header("LOCATION: ../padre/denegado.php");
                            break;
                    }
                }
            }
        }catch (Exception $e){
            header("LOCATION: ingresar.php");
        }
    }
}
catch (Exception $e){
    header("LOCATION: ingresar.php");
}