<?php
include_once 'system/connection.php';
include_once 'actions/obtenerDatosToken.php';
$id_usuario = $token->id;

$sql_notifiaciones_sinleer = "SELECT * FROM notificaciones WHERE id_usuario=$id_usuario AND leido=false";

$con = ConnectionDb::getInstance();
$con->connect();

$result_notifiacion_sinleer = $con->query($sql_notifiaciones_sinleer);
$con->close();
?>
<ul class="nav navbar-top-links navbar-right">
    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
            <?php
            if ($con->getnumrows($result_notifiacion_sinleer) > 0){
                ?>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            <?php
            }else{
                ?>
                <li>
                    <div class="text-center">
                        <strong>No tiene notificaciones</strong>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>
        <!-- /.dropdown-alerts -->
    </li>
    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> Mi Perfil</a>
            </li>
            <li class="divider"></li>
            <li><a href="actions/logout_admin.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
              <!-- /.dropdown -->
</ul>