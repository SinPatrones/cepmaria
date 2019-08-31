<?php include_once 'system/checkLogin.php'; ?>
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
                        <h1 class="page-header">Notificación</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <?php
                include_once 'system/connection.php';

                $con = ConnectionDb::getInstance();

                $sql = "SELECT * FROM notificaciones INNER JOIN datosusuarios ON notificaciones.id_reportante=datosusuarios.id_datosusuario WHERE notificaciones.id_notificacion=".$_GET['id_notificacion'];

                $con->connect();
                $result_notificacion = $con->query($sql);
                $con->close();

                $result_notificacion = $con->getarray($result_notificacion);
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="subtitulos">Titulo</h3>
                        <?php echo $result_notificacion['titulo']; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <h3 class="subtitulos">Enviado por:</h3>
                        <?php echo $result_notificacion['nombres']. " ".$result_notificacion['apellidos']; ?>
                    </div>
                    <div class="col-6 col-sm-6">
                        <h3 class="subtitulos">El día:</h3>
                        <?php echo $result_notificacion['fecha']; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="subtitulos">Mensaje</h3>
                        <?php echo $result_notificacion['mensaje']; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="actions/marcarleido.php?id_notificacion=<?php echo $result_notificacion['id_notificacion']; ?>" class="btn btn-success">MARCAR COMO LEIDO</a>
                    </div>
                </div>
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
