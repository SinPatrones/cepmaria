<?php
include_once "auth.php";

try{
    if (!isset($_COOKIE['colegiocookie'])){
        header("LOCATION: ../ingresar/index.php");
        die();
    }else{
        $token = $_COOKIE['colegiocookie'];
        try{
            if (!Auth::Check($token, $err)){
                header("LOCATION: ../ingresar/index.php");
            }else{
                $data = Auth::GetData($token);
                if ($data->role != "1"){
                    switch ($data->role){
                        case 2:
                            header("LOCATION: ../profesor/denegado.php");
                            break;
                        case 3:
                            header("LOCATION: ../padre/denegado.php");
                            break;
                    }
                }
            }
        }catch (Exception $e){
            header("LOCATION: ../ingresar/index.php");
        }
    }
}
catch (Exception $e){
    header("LOCATION: ../ingresar/index.php");
}