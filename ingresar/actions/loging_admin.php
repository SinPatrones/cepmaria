<?php
if (isset($_POST['username']) and isset($_POST['pass'])){
    include_once "../system/Login.php";

    $login = Login::getInstance();
    $valueDays = 1;

    // SI SOLO ES POR UN MOMENTO
    $valueDays = 1; // 1 día
    if ($login->logIn($_POST['username'], $_POST['pass'], $valueDays,$token,$role)){
        // LOGUEADO, Y LA VARIABLE $TOKEN TRAERA EL CONTENIDO DE NUESTRO TOQUEN
        if (setcookie("colegiocookie", $token, time() + (86400 * $valueDays), "/")){
            switch ($role){
                case 1:
                    header("LOCATION: ../../admin/index.php");
                    break;
                case 3:
                    header("LOCATION: ../../padre/index.php");
                    break;
                case 2:
                    header("LOCATION: ../../profesor/index.php");
                    break;
                default:
                    echo "Ningun rol registrado";
            }
        }
        else
            header("LOCATION: ../index.php");
    }else{
        // NO SE PUDO LOGEAR
        header("LOCATION: ../index.php");
    }
}else{
    header("LOCATION: ../index.php");
}