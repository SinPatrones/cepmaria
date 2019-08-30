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
                        <h1 class="page-header">Lista de Profesores</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <?php
                include_once 'system/connection.php';

                $con = ConnectionDb::getInstance();

                $sql_primero = "SELECT * FROM usuarios INNER JOIN datosusuarios ON usuarios.id_usuario=datosusuarios.id_datosusuario INNER JOIN profesoresasignados ON datosusuarios.id_datosusuario=profesoresasignados.id_profesor WHERE usuarios.role=2 AND profesoresasignados.grado_profesor='PRIMERO' ORDER BY datosusuarios.apellidos ASC";
                $sql_segundo = "SELECT * FROM usuarios INNER JOIN datosusuarios ON usuarios.id_usuario=datosusuarios.id_datosusuario INNER JOIN profesoresasignados ON datosusuarios.id_datosusuario=profesoresasignados.id_profesor WHERE usuarios.role=2 AND profesoresasignados.grado_profesor='SEGUNDO' ORDER BY datosusuarios.apellidos ASC";
                $sql_tercero = "SELECT * FROM usuarios INNER JOIN datosusuarios ON usuarios.id_usuario=datosusuarios.id_datosusuario INNER JOIN profesoresasignados ON datosusuarios.id_datosusuario=profesoresasignados.id_profesor WHERE usuarios.role=2 AND profesoresasignados.grado_profesor='TERCERO' ORDER BY datosusuarios.apellidos ASC";
                $sql_cuarto = "SELECT * FROM usuarios INNER JOIN datosusuarios ON usuarios.id_usuario=datosusuarios.id_datosusuario INNER JOIN profesoresasignados ON datosusuarios.id_datosusuario=profesoresasignados.id_profesor WHERE usuarios.role=2 AND profesoresasignados.grado_profesor='CUARTO' ORDER BY datosusuarios.apellidos ASC";
                $sql_quinto = "SELECT * FROM usuarios INNER JOIN datosusuarios ON usuarios.id_usuario=datosusuarios.id_datosusuario INNER JOIN profesoresasignados ON datosusuarios.id_datosusuario=profesoresasignados.id_profesor WHERE usuarios.role=2 AND profesoresasignados.grado_profesor='QUINTO' ORDER BY datosusuarios.apellidos ASC";


                $con->connect();

                $result_primero = $con->query($sql_primero);
                $result_segundo = $con->query($sql_segundo);
                $result_tercero = $con->query($sql_tercero);
                $result_cuarto = $con->query($sql_cuarto);
                $result_quinto = $con->query($sql_quinto);


                $con->close();
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Grados
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#primero" data-toggle="tab">Primer Grado</a>
                                    </li>
                                    <li><a href="#segundo" data-toggle="tab">Segundo Grado</a>
                                    </li>
                                    <li><a href="#tercero" data-toggle="tab">Tercero Grado</a>
                                    </li>
                                    <li><a href="#cuarto" data-toggle="tab">Cuarto Grado</a>
                                    </li>
                                    <li><a href="#quinto" data-toggle="tab">Quinto Grado</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="primero">
                                        <h4>Profesores del Primer Grado</h4>
                                        <?php
                                        if ($con->getnumrows($result_primero) > 0){
                                            ?>
                                            <div class="responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Apellidos</th>
                                                        <th scope="col">Usuario</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $num = 1;
                                                    while ($row = $con->getarray($result_primero)){
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $num++; ?></th>
                                                            <td><?php echo $row['nombres']; ?></td>
                                                            <td><?php echo $row['apellidos']; ?></td>
                                                            <td><?php echo $row['usuario']; ?></td>
                                                            <td><a href="#" class="btn btn-success">VER INFORMACIÓN</a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                    <tfooter>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Apellidos</th>
                                                            <th scope="col">Usuario</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </tfooter>
                                                </table>
                                            </div>
                                            <?php
                                        }else{
                                            echo "<h3>No registra profesores en este grado.</h3>";
                                        }
                                        ?>
                                    </div>

                                    <div class="tab-pane fade " id="segundo">
                                        <h4>Profesores del Segundo Grado</h4>
                                        <?php
                                        if ($con->getnumrows($result_segundo) > 0){
                                            ?>
                                            <div class="responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Apellidos</th>
                                                        <th scope="col">Usuario</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $num = 1;
                                                    while ($row = $con->getarray($result_segundo)){
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $num++; ?></th>
                                                            <td><?php echo $row['nombres']; ?></td>
                                                            <td><?php echo $row['apellidos']; ?></td>
                                                            <td><?php echo $row['usuario']; ?></td>
                                                            <td><a href="#" class="btn btn-success">VER INFORMACIÓN</a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                    <tfooter>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Apellidos</th>
                                                            <th scope="col">Usuario</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </tfooter>
                                                </table>
                                            </div>
                                            <?php
                                        }else{
                                            echo "<h3>No registra profesores en este grado.</h3>";
                                        }
                                        ?>
                                    </div>

                                    <div class="tab-pane fade" id="tercero">
                                        <h4>Profesores del Tercer Grado</h4>
                                        <?php
                                        if ($con->getnumrows($result_tercero) > 0){
                                            ?>
                                            <div class="responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Apellidos</th>
                                                        <th scope="col">Usuario</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $num = 1;
                                                    while ($row = $con->getarray($result_tercero)){
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $num++; ?></th>
                                                            <td><?php echo $row['nombres']; ?></td>
                                                            <td><?php echo $row['apellidos']; ?></td>
                                                            <td><?php echo $row['usuario']; ?></td>
                                                            <td><a href="#" class="btn btn-success">VER INFORMACIÓN</a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                    <tfooter>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Apellidos</th>
                                                            <th scope="col">Usuario</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </tfooter>
                                                </table>
                                            </div>
                                            <?php
                                        }else{
                                            echo "<h3>No registra profesores en este grado.</h3>";
                                        }
                                        ?>
                                    </div>

                                    <div class="tab-pane fade" id="cuarto">
                                        <h4>Profesores del Cuarto Grado</h4>
                                        <?php
                                        if ($con->getnumrows($result_cuarto) > 0){
                                            ?>
                                            <div class="responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Apellidos</th>
                                                        <th scope="col">Usuario</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $num = 1;
                                                    while ($row = $con->getarray($result_cuarto)){
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $num++; ?></th>
                                                            <td><?php echo $row['nombres']; ?></td>
                                                            <td><?php echo $row['apellidos']; ?></td>
                                                            <td><?php echo $row['usuario']; ?></td>
                                                            <td><a href="#" class="btn btn-success">VER INFORMACIÓN</a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                    <tfooter>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Apellidos</th>
                                                            <th scope="col">Usuario</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </tfooter>
                                                </table>
                                            </div>
                                            <?php
                                        }else{
                                            echo "<h3>No registra profesores en este grado.</h3>";
                                        }
                                        ?>
                                    </div>

                                    <div class="tab-pane fade" id="quinto">
                                        <h4>Profesores del Quinto Grado</h4>
                                        <?php
                                        if ($con->getnumrows($result_quinto) > 0){
                                            ?>
                                            <div class="responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Apellidos</th>
                                                        <th scope="col">Usuario</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $num = 1;
                                                    while ($row = $con->getarray($result_quinto)){
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $num++; ?></th>
                                                            <td><?php echo $row['nombres']; ?></td>
                                                            <td><?php echo $row['apellidos']; ?></td>
                                                            <td><?php echo $row['usuario']; ?></td>
                                                            <td><a href="#" class="btn btn-success">VER INFORMACIÓN</a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                    <tfooter>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Apellidos</th>
                                                            <th scope="col">Usuario</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </tfooter>
                                                </table>
                                            </div>
                                            <?php
                                        }else{
                                            echo "<h3>No registra profesores en este grado.</h3>";
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
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
