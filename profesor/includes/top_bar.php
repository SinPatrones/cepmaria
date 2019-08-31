<?php
include_once 'system/connection.php';
include_once 'actions/obtenerDatosToken.php';
$id_usuario = $token->id;
$usuario = $token->username;

$sql_notifiaciones_sinleer = "SELECT * FROM notificaciones WHERE id_usuario=$id_usuario AND leido=false";

$con = ConnectionDb::getInstance();
$con->connect();

$result_notificacion_sinleer = $con->query($sql_notifiaciones_sinleer);
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
            if ($con->getnumrows($result_notificacion_sinleer) > 0){
                while ($row_notificacion = $con->getarray($result_notificacion_sinleer)){
                    ?>
                    <li>
                        <a href="vernotificacion.php?id_notificacion=<?php echo $row_notificacion['id_notificacion']; ?>">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> <?php echo $row_notificacion['titulo']; ?>
                                <span class="pull-right text-muted small"><?php echo $row_notificacion['fecha']; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
            <?php
                }
                ?>
                <li>
                    <a class="text-center" href="notificaciones.php">
                        <strong>Ver todo</strong>
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
            <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $usuario; ?></a>
            </li>
            <li class="divider"></li>
            <li><a href="actions/logout_admin.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
              <!-- /.dropdown -->
</ul>