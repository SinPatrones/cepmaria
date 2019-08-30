<?php
include_once 'system/checkLogin.php';
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
                        <h1 class="page-header">Cursos</h1>
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                            CREAR CURSO
                        </button>
                    </div>
                </div>
                <!-- /.row -->
                <?php
                include_once 'system/connection.php';

                $con = ConnectionDb::getInstance();

                $sql_primero = "SELECT * FROM cursos WHERE grado_curso='PRIMERO'";
                $sql_segundo = "SELECT * FROM cursos WHERE grado_curso='SEGUNDO'";
                $sql_tercero = "SELECT * FROM cursos WHERE grado_curso='TERCERO'";
                $sql_cuarto = "SELECT * FROM cursos WHERE grado_curso='CUARTO'";
                $sql_quinto = "SELECT * FROM cursos WHERE grado_curso='QUINTO'";

                $con->connect();

                $result_primero = $con->query($sql_primero);
                $result_segundo = $con->query($sql_segundo);
                $result_tercero = $con->query($sql_tercero);
                $result_cuarto = $con->query($sql_cuarto);
                $result_quinto = $con->query($sql_quinto);

                $con->close();
                ?>
                <div class="row" align="center">
                    <div class="col-6 col-sm-6 col-md-4 col-xs-2">
                        <h2 class="subtitulos">Primero</h2>
                        <?php
                        if ($con->getnumrows($result_primero) > 0){
                            ?>
                            <div class="responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $num = 1;
                                    while ($row = $con->getarray($result_primero)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $num++; ?></th>
                                            <td><?php echo $row['nombre_curso']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>
                        <?php
                        }else{
                            echo "<h3>No registra cursos.</h3>";
                        }
                        ?>
                    </div>

                    <div class="col-6 col-sm-6 col-md-4 col-xs-2">
                        <h2 class="subtitulos">Segundo</h2>
                        <?php
                        if ($con->getnumrows($result_segundo) > 0){
                            ?>
                            <div class="responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $num = 1;
                                    while ($row = $con->getarray($result_segundo)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $num++; ?></th>
                                            <td><?php echo $row['nombre_curso']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>
                            <?php
                        }else{
                            echo "<h3>No registra cursos.</h3>";
                        }
                        ?>
                    </div>

                    <div class="col-6 col-sm-6 col-md-4 col-xs-2">
                        <h2 class="subtitulos">Tercero</h2>
                        <?php
                        if ($con->getnumrows($result_tercero) > 0){
                            ?>
                            <div class="responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $num = 1;
                                    while ($row = $con->getarray($result_tercero)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $num++; ?></th>
                                            <td><?php echo $row['nombre_curso']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>
                            <?php
                        }else{
                            echo "<h3>No registra cursos.</h3>";
                        }
                        ?>
                    </div>

                    <div class="col-6 col-sm-6 col-md-4 col-xs-2">
                        <h2 class="subtitulos">Cuarto</h2>
                        <?php
                        if ($con->getnumrows($result_cuarto) > 0){
                            ?>
                            <div class="responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $num = 1;
                                    while ($row = $con->getarray($result_cuarto)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $num++; ?></th>
                                            <td><?php echo $row['nombre_curso']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>
                            <?php
                        }else{
                            echo "<h3>No registra cursos.</h3>";
                        }
                        ?>
                    </div>

                    <div class="col-6 col-sm-6 col-md-4 col-xs-2">
                        <h2 class="subtitulos">Quinto</h2>
                        <?php
                        if ($con->getnumrows($result_quinto) > 0){
                            ?>
                            <div class="responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $num = 1;
                                    while ($row = $con->getarray($result_quinto)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $num++; ?></th>
                                            <td><?php echo $row['nombre_curso']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>
                            <?php
                        }else{
                            echo "<h3>No registra cursos.</h3>";
                        }
                        ?>
                    </div>


                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="actions/crearcursogrado.php" method="post">
                    <div class="modal-body">
                        <h2 class="subtitulos">Crear Curso</h2>
                        <br>
                            <div class="form-group">
                                <label>Grado</label>
                                <label class="checkbox-inline">
                                    <input type="radio" name="grado" value="PRIMERO">Primero
                                </label>

                                <label class="checkbox-inline">
                                    <input type="radio" name="grado" value="SEGUNDO">Segundo
                                </label>

                                <label class="checkbox-inline">
                                    <input type="radio" name="grado" value="TERCERO">Tercero
                                </label>

                                <label class="checkbox-inline">
                                    <input type="radio" name="grado" value="CUARTO">Cuarto
                                </label>

                                <label class="checkbox-inline">
                                    <input type="radio" name="grado" value="QUINTO">Quinto
                                </label>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Nombre del Curso</label>
                                <input class="form-control" name="nombre_curso" required>
                                <p class="help-block">No se aceptaran duplicados.</p>
                            </div>

                            <div class="form-group">

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                        <button type="submit" class="btn btn-success ">CREAR</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

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
