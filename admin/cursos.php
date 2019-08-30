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
                $con->connect();

                $slq_primaria_cursos = "SELECT * FROM cursos INNER JOIN cursosgrado ON cursos.id_curso=cursosgrado.id_curso_fk INNER JOIN grados ON grados.id_grado=cursosgrado.id_grado_fk WHERE grados.nivel='PRIMARIA' ORDER BY grados.numero ASC";
                $slq_secundaria_cursos = "SELECT * FROM cursos INNER JOIN cursosgrado ON cursos.id_curso=cursosgrado.id_curso_fk INNER JOIN grados ON grados.id_grado=cursosgrado.id_grado_fk WHERE grados.nivel='SECUNDARIA' ORDER BY grados.numero ASC";

                $result_primaria_cursos = $con->query($slq_primaria_cursos);
                $result_secundaria_cursos = $con->query($slq_secundaria_cursos);

                $num_primaria = $con->getnumrows($result_primaria_cursos);
                $num_secundaria = $con->getnumrows($result_secundaria_cursos);

                $con->close();
                ?>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h2 class="subtitulos">Lista de Cursos Primaria</h2>
                        <?php
                        if ($num_primaria < 0){
                            echo "<h3>NO REGISTRA CURSOS EN PRIMARIA</h3>";
                        }else{
                            ?>
                            <div class="responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"></th>
                                        <th scope="col">Grado</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 1;
                                    while ($row = $con->getarray($result_primaria_cursos)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $count++; ?></th>
                                            <td><?php echo $row['nombre_curso']; ?></td>
                                            <td><?php echo $row['grado']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Grado</th>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="col-12 col-sm-6">
                        <h2 class="subtitulos">Lista de Cursos Secundaria</h2>
                        <?php
                        if ($num_secundaria < 0){
                            echo "<h3>NO REGISTRA CURSOS EN PRIMARIA</h3>";
                        }else{
                            ?>
                            <div class="responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"></th>
                                        <th scope="col">Grado</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 1;
                                    while ($row = $con->getarray($result_secundaria_cursos)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $count++; ?></th>
                                            <td><?php echo $row['nombre_curso']; ?></td>
                                            <td><?php echo $row['grado']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Grado</th>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>
                            <?php
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

                            <div class="form-group">
                                <label>Primaria</label>
                                <?php
                                if ($count_primaria > 0 ){
                                    while ($row = $con->getarray($result_primaria)){
                                        ?>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="nivel" value="<?php echo $row['id_grado'] ?>"><?php echo $row['grado'] ?>
                                        </label>
                                        <?php
                                    }
                                }else{
                                    echo "<h4>No registra grados en primaria</h4>";
                                }
                                ?>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Secundaria</label>
                                <?php
                                if ($count_secundaria > 0 ){
                                    while ($row = $con->getarray($result_secundaria)){
                                        ?>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="nivel" value="<?php echo $row['id_grado'] ?>"><?php echo $row['grado'] ?>
                                        </label>
                                        <?php
                                    }
                                }else{
                                    echo "<h4>No registra grados en secundaria</h4>";
                                }
                                ?>
                            </div>

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
