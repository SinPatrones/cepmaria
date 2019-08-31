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
                        <h1 class="page-header">Asignar Grados y Cursos a Profesores</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Basic Tabs
                            </div>
                                <form action="actions/asignarprofesor.php" method="post">
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#profesores" data-toggle="tab">Profesor</a>
                                            </li>
                                            <li><a href="#primero" data-toggle="tab">Primer Grado</a>
                                            </li>
                                            <li><a href="#segundo" data-toggle="tab">Segundo Grado</a>
                                            </li>
                                            <li><a href="#tercero" data-toggle="tab">Tercer Grado</a>
                                            </li>
                                            <li><a href="#cuarto" data-toggle="tab">Cuarto Grado</a>
                                            </li>
                                            <li><a href="#quinto" data-toggle="tab">Quinto Grado</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <?php
                                            include_once 'system/connection.php';

                                            $con = ConnectionDb::getInstance();

                                            $sql_profesores = "SELECT * FROM usuarios INNER JOIN datosusuarios ON usuarios.id_usuario=datosusuarios.id_datosusuario WHERE usuarios.role=2 ORDER BY apellidos DESC";

                                            $con->connect();
                                            $result_profesores = $con->query($sql_profesores);

                                            $con->close();
                                            ?>
                                            <div class="tab-pane fade in active" id="profesores">
                                                <h4>Lista de Profesores</h4>
                                                <?php
                                                if ($con->getnumrows($result_profesores) > 0){
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    Datos Recopilados
                                                                </div>
                                                                <!-- /.panel-heading -->
                                                                <div class="panel-body">
                                                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Nombres</th>
                                                                            <th>Apellidos</th>
                                                                            <th>Seleccionar</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        while ($row = $con->getarray($result_profesores)){
                                                                            ?>
                                                                            <tr class="odd gradeX">
                                                                                <td><?php echo $row['nombres']; ?></td>
                                                                                <td><?php echo $row['apellidos']; ?></td>
                                                                                <td align="center"><input type="radio" name="seleccionado" value="<?php echo $row['id_usuario']; ?>"></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <!-- /.table-responsive -->
                                                                </div>
                                                                <!-- /.panel-body -->
                                                            </div>
                                                            <!-- /.panel -->
                                                        </div>
                                                        <!-- /.col-lg-12 -->
                                                    </div>
                                                <?php
                                                }else{
                                                    echo "<h3>No registra profesores</h3>";
                                                }
                                                ?>

                                            </div>
                                            <?php
                                            include_once 'system/connection.php';

                                            $con = ConnectionDb::getInstance();

                                            $sql_cursos_primero = "SELECT * FROM cursos WHERE grado_curso='PRIMERO' ORDER BY nombre_curso ASC";

                                            $con->connect();
                                            $result_cursos_primero = $con->query($sql_cursos_primero);

                                            $con->close();
                                            ?>
                                            <div class="tab-pane fade" id="primero">
                                                <h4>Primer Grado</h4>
                                                <?php
                                                if ($con->getnumrows($result_cursos_primero) > 0){
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    Datos Recopilados
                                                                </div>
                                                                <!-- /.panel-heading -->
                                                                <div class="panel-body">
                                                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Nombre del Curso</th>
                                                                            <th>Seleccionar</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        while ($row = $con->getarray($result_cursos_primero)){
                                                                            ?>
                                                                            <tr class="odd gradeX">
                                                                                <td><?php echo $row['nombre_curso']; ?></td>
                                                                                <td align="center"><input type="checkbox" name="cursoprimero[]" value="<?php echo $row['id_curso']; ?>"></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <!-- /.table-responsive -->
                                                                </div>
                                                                <!-- /.panel-body -->
                                                            </div>
                                                            <!-- /.panel -->
                                                        </div>
                                                        <!-- /.col-lg-12 -->
                                                    </div>
                                                    <?php
                                                }else{
                                                    echo "<h3>No registra cursos</h3>";
                                                }
                                                ?>
                                            </div>
                                            <?php
                                            include_once 'system/connection.php';

                                            $con = ConnectionDb::getInstance();

                                            $sql_cursos_segundo = "SELECT * FROM cursos WHERE grado_curso='SEGUNDO' ORDER BY nombre_curso ASC";

                                            $con->connect();
                                            $result_cursos_segundo = $con->query($sql_cursos_segundo);

                                            $con->close();
                                            ?>
                                            <div class="tab-pane fade" id="segundo">
                                                <?php
                                                if ($con->getnumrows($result_cursos_segundo) > 0){
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    Datos Recopilados
                                                                </div>
                                                                <!-- /.panel-heading -->
                                                                <div class="panel-body">
                                                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Nombre del Curso</th>
                                                                            <th>Seleccionar</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        while ($row = $con->getarray($result_cursos_segundo)){
                                                                            ?>
                                                                            <tr class="odd gradeX">
                                                                                <td><?php echo $row['nombre_curso']; ?></td>
                                                                                <td align="center"><input type="checkbox" name="cursosegundo[]" value="<?php echo $row['id_curso']; ?>"></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <!-- /.table-responsive -->
                                                                </div>
                                                                <!-- /.panel-body -->
                                                            </div>
                                                            <!-- /.panel -->
                                                        </div>
                                                        <!-- /.col-lg-12 -->
                                                    </div>
                                                    <?php
                                                }else{
                                                    echo "<h3>No registra cursos</h3>";
                                                }
                                                ?>
                                            </div>

                                            <?php
                                            include_once 'system/connection.php';

                                            $con = ConnectionDb::getInstance();

                                            $sql_cursos_tercero = "SELECT * FROM cursos WHERE grado_curso='TERCERO' ORDER BY nombre_curso ASC";

                                            $con->connect();
                                            $result_cursos_tercero = $con->query($sql_cursos_tercero);

                                            $con->close();
                                            ?>
                                            <div class="tab-pane fade" id="tercero">
                                                <h4>Tercer Grado</h4>
                                                <?php
                                                if ($con->getnumrows($result_cursos_tercero) > 0){
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    Datos Recopilados
                                                                </div>
                                                                <!-- /.panel-heading -->
                                                                <div class="panel-body">
                                                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Nombre del Curso</th>
                                                                            <th>Seleccionar</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        while ($row = $con->getarray($result_cursos_tercero)){
                                                                            ?>
                                                                            <tr class="odd gradeX">
                                                                                <td><?php echo $row['nombre_curso']; ?></td>
                                                                                <td align="center"><input type="checkbox" name="cursotercero[]" value="<?php echo $row['id_curso']; ?>"></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <!-- /.table-responsive -->
                                                                </div>
                                                                <!-- /.panel-body -->
                                                            </div>
                                                            <!-- /.panel -->
                                                        </div>
                                                        <!-- /.col-lg-12 -->
                                                    </div>
                                                    <?php
                                                }else{
                                                    echo "<h3>No registra cursos</h3>";
                                                }
                                                ?>
                                            </div>

                                            <?php
                                            include_once 'system/connection.php';

                                            $con = ConnectionDb::getInstance();

                                            $sql_cursos_cuarto = "SELECT * FROM cursos WHERE grado_curso='CUARTO' ORDER BY nombre_curso ASC";

                                            $con->connect();
                                            $result_cursos_cuarto = $con->query($sql_cursos_cuarto);

                                            $con->close();
                                            ?>
                                            <div class="tab-pane fade" id="cuarto">
                                                <h4>Cuarto Grado</h4>
                                                <?php
                                                if ($con->getnumrows($result_cursos_cuarto) > 0){
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    Datos Recopilados
                                                                </div>
                                                                <!-- /.panel-heading -->
                                                                <div class="panel-body">
                                                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Nombre del Curso</th>
                                                                            <th>Seleccionar</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        while ($row = $con->getarray($result_cursos_cuarto)){
                                                                            ?>
                                                                            <tr class="odd gradeX">
                                                                                <td><?php echo $row['nombre_curso']; ?></td>
                                                                                <td align="center"><input type="checkbox" name="cursocuarto[]" value="<?php echo $row['id_curso']; ?>"></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <!-- /.table-responsive -->
                                                                </div>
                                                                <!-- /.panel-body -->
                                                            </div>
                                                            <!-- /.panel -->
                                                        </div>
                                                        <!-- /.col-lg-12 -->
                                                    </div>
                                                    <?php
                                                }else{
                                                    echo "<h3>No registra cursos</h3>";
                                                }
                                                ?>
                                            </div>

                                            <?php
                                            include_once 'system/connection.php';

                                            $con = ConnectionDb::getInstance();

                                            $sql_cursos_quinto = "SELECT * FROM cursos WHERE grado_curso='QUINTO' ORDER BY nombre_curso ASC";

                                            $con->connect();
                                            $result_cursos_quinto = $con->query($sql_cursos_quinto);

                                            $con->close();
                                            ?>
                                            <div class="tab-pane fade" id="quinto">
                                                <h4>Quinto Grado</h4>
                                                <?php
                                                if ($con->getnumrows($result_cursos_quinto) > 0){
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    Datos Recopilados
                                                                </div>
                                                                <!-- /.panel-heading -->
                                                                <div class="panel-body">
                                                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Nombre del Curso</th>
                                                                            <th>Seleccionar</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        while ($row = $con->getarray($result_cursos_quinto)){
                                                                            ?>
                                                                            <tr class="odd gradeX">
                                                                                <td><?php echo $row['nombre_curso']; ?></td>
                                                                                <td align="center"><input type="checkbox" name="cursoquinto[]" value="<?php echo $row['id_curso']; ?>"></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <!-- /.table-responsive -->
                                                                </div>
                                                                <!-- /.panel-body -->
                                                            </div>
                                                            <!-- /.panel -->
                                                        </div>
                                                        <!-- /.col-lg-12 -->
                                                    </div>
                                                    <?php
                                                }else{
                                                    echo "<h3>No registra cursos</h3>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin: 20px;">
                                        <div class="row">
                                            <div class="col-12 col-sm-4 col-sm-offset-4">
                                                <button class="btn btn-success btn-block">GUARDAR</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.panel-body -->
                                </form>
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

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
</body>

</html>
