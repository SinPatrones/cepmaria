<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Panel de control para la página de Kratos">
    <meta name="author" content="Ganesha">

    <title>Kratos - Panel</title>

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
                <a class="navbar-brand" href="index.php">KRATOS</a>
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
                    <div class="col-12 col-sm-6">
                        <h3 class="subtitulos">Registrar nuevo grado</h3>
                        <br>
                        <form role="form" action="actions/creargrado.php" method="post">
                            <div class="form-group">
                                <label>Nivel Educativo</label>
                                <label class="checkbox-inline">
                                    <input type="radio" name="nivel" value="PRIMARIA">Primaria
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" name="nivel" value="SECUNDARIA">Secundaria
                                </label>
                            </div>
                            <hr>
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
                                <label class="checkbox-inline">
                                    <input type="radio" name="grado" value="SEXTO">Sexto
                                </label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg btn-block">CREAR</button>
                            </div>
                        </form>
                    </div>
                    <?php
                    include_once 'system/connection.php';
                    $con = ConnectionDb::getInstance();

                    $sql_primaria = "SELECT * FROM grados WHERE nivel='PRIMARIA' ORDER BY numero";
                    $sql_secundaria = "SELECT * FROM grados WHERE nivel='SECUNDARIA' ORDER BY numero";

                    $con->connect();
                    $result_primaria = $con->query($sql_primaria);
                    $result_secundaria = $con->query($sql_secundaria);

                    $count_primaria = $con->getnumrows($result_primaria);
                    $count_secundaria = $con->getnumrows($result_secundaria);

                    $con->close();

                    ?>
                    <div class="col-12 col-sm-6">
                        <h3 class="subtitulos">Tabla</h3>
                        <div class="responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nivel</th>
                                    <th scope="col">Grado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                if ($count_primaria > 0){
                                    while($row = $con->getarray($result_primaria)){?>
                                        <tr>
                                            <th scope="row"><?php echo $i++; ?></th>
                                            <td><?php echo $row['nivel']; ?></td>
                                            <td><?php echo $row['grado']; ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                                <?php
                                if ($count_secundaria > 0){
                                    while($row = $con->getarray($result_secundaria)){?>
                                        <tr>
                                            <th scope="row"><?php echo $i++; ?></th>
                                            <td><?php echo $row['nivel']; ?></td>
                                            <td><?php echo $row['grado']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>

                                </tbody>
                                <tfooter>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nivel</th>
                                    <th scope="col">Grado</th>
                                </tr>
                                </tfooter>
                            </table>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
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
