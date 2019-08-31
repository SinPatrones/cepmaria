<?php include_once 'system/checkLogin.php';
include_once 'actions/obtenerDatosToken.php';
$id_usuario = $token->id;
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Panel de control para la página de Kratos">
    <meta name="author" content="Ganesha">

    <title>C.E.P. María Auxiliadora Arequipa - Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="dist/css/mystyle.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">C.E.P. María Auxiliadora Arequipa</a>
            </div>
            <!-- /.navbar-header -->

            <?php include_once 'includes/top_bar.php'; ?>
            <!-- /.navbar-top-links -->

            <?php include_once 'includes/left_bar.php'; ?>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Notificaciones</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <?php
                include_once 'system/connection.php';
                $con = ConnectionDb::getInstance();

                $sql_notificaciones = "SELECT * FROM notificaciones INNER JOIN datosusuarios ON notificaciones.id_reportante=datosusuarios.id_datosusuario WHERE notificaciones.id_usuario=$id_usuario";

                $con->connect();
                $result_notificaciones = $con->query($sql_notificaciones);
                $con->close();

                if ($result_notificaciones){
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Lista de Notificaciones
                                </div>
                                <!-- .panel-heading -->
                                <div class="panel-body">
                                    <div class="panel-group" id="accordion">
                                        <?php
                                        while ($row_notificacion = $con->getarray($result_notificaciones)){
                                            ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <strong><a data-toggle="collapse" data-parent="#accordion" href="#notificacion<?php echo $row_notificacion['id_notificacion'];?>"><?php echo $row_notificacion['titulo'];
                                                        if ($row_notificacion['leido']==1){
                                                            echo "<strong style='color: blue;'> ((MENSAJE LEIDO))</strong>";
                                                        } else{
                                                            echo "<strong style='color: red;'> ((MENSAJE NO LEIDO AÚN))</strong>";
                                                        }
                                                                ?></a></strong>
                                                        <br>
                                                        <br>
                                                        De: <?php echo $row_notificacion['nombres']." ".$row_notificacion['apellidos']; ?>
                                                        <br>
                                                        Fecha: <?php echo $row_notificacion['fecha']; ?>
                                                    </h4>
                                                </div>
                                                <div id="notificacion<?php echo $row_notificacion['id_notificacion'];?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <?php echo $row_notificacion['mensaje']; ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if ($row_notificacion['leido'] == 0){
                                                            ?>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <a href="actions/marcarleido.php?id_notificacion=<?php echo $row_notificacion['id_notificacion']; ?>" class="btn btn-success">Marcar como leido</a>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- .panel-body -->
                            </div>
                        </div>
                    </div>
                <?php
                }else{
                    header("Location: error.php");
                }
                ?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
