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
                        <h1 class="page-header">Lista de Profesores y Cursos</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <?php
                include_once 'system/connection.php';
                $con = ConnectionDb::getInstance();

                $sql_profesores = "SELECT * FROM usuarios INNER JOIN datosusuarios ON usuarios.id_usuario=datosusuarios.id_datosusuario WHERE usuarios.role=2";

                $con->connect();
                $result_profesores = $con->query($sql_profesores);

                $con->close();

                if ($con->getnumrows($result_profesores)>0){
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Datos Almacenados
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>Profesores</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while ($row = $con->getarray($result_profesores)){
                                            ?>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row['id_usuario']; ?>"><?php echo $row['nombres']." ".$row['apellidos']; ?></a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse<?php echo $row['id_usuario']; ?>" class="panel-collap   se collapse">
                                                            <div class="panel-body">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        Cursos en los grados que dicta
                                                                    </div>
                                                                    <!-- /.panel-heading -->
                                                                    <div class="panel-body">
                                                                        <!-- Nav tabs -->
                                                                        <ul class="nav nav-tabs">
                                                                            <li class="active"><a href="#primero<?php echo $row['id_usuario']; ?>" data-toggle="tab">Primer grado</a>
                                                                            </li>
                                                                            <li><a href="#segundo<?php echo $row['id_usuario']; ?>" data-toggle="tab">Segundo Grado</a>
                                                                            </li>
                                                                            <li><a href="#tercero<?php echo $row['id_usuario']; ?>" data-toggle="tab">Tercer Grado</a>
                                                                            </li>
                                                                            <li><a href="#cuarto<?php echo $row['id_usuario']; ?>" data-toggle="tab">Cuarto Grado</a>
                                                                            </li>
                                                                            <li><a href="#quinto<?php echo $row['id_usuario']; ?>" data-toggle="tab">Quinto Grado</a>
                                                                            </li>
                                                                        </ul>
                                                                        <?php
                                                                        $sql_cursos_primero = "SELECT cursos.* FROM cursos INNER JOIN cursoprofesores ON cursos.id_curso=cursoprofesores.id_curso WHERE cursoprofesores.id_profesor=".$row['id_usuario']." AND cursos.grado_curso='PRIMERO'";
                                                                        $sql_cursos_segundo = "SELECT cursos.* FROM cursos INNER JOIN cursoprofesores ON cursos.id_curso=cursoprofesores.id_curso WHERE cursoprofesores.id_profesor=".$row['id_usuario']." AND cursos.grado_curso='SEGUNDO'";
                                                                        $sql_cursos_tercero = "SELECT cursos.* FROM cursos INNER JOIN cursoprofesores ON cursos.id_curso=cursoprofesores.id_curso WHERE cursoprofesores.id_profesor=".$row['id_usuario']." AND cursos.grado_curso='TERCERO'";
                                                                        $sql_cursos_cuarto = "SELECT cursos.* FROM cursos INNER JOIN cursoprofesores ON cursos.id_curso=cursoprofesores.id_curso WHERE cursoprofesores.id_profesor=".$row['id_usuario']." AND cursos.grado_curso='CUARTO'";
                                                                        $sql_cursos_quinto = "SELECT cursos.* FROM cursos INNER JOIN cursoprofesores ON cursos.id_curso=cursoprofesores.id_curso WHERE cursoprofesores.id_profesor=".$row['id_usuario']." AND cursos.grado_curso='QUINTO'";

                                                                        $con->connect();
                                                                        $result_cursos_primero = $con->query($sql_cursos_primero);
                                                                        $result_cursos_segundo = $con->query($sql_cursos_segundo);
                                                                        $result_cursos_tercero = $con->query($sql_cursos_tercero);
                                                                        $result_cursos_cuarto = $con->query($sql_cursos_cuarto);
                                                                        $result_cursos_quinto = $con->query($sql_cursos_quinto);
                                                                        $con->close();
                                                                        ?>
                                                                        <!-- Tab panes -->
                                                                        <div class="tab-content">
                                                                            <div class="tab-pane fade in active" id="primero<?php echo $row['id_usuario']; ?>">
                                                                                <h4>En Primer grado</h4>
                                                                                <?php
                                                                                if ($con->getnumrows($result_cursos_primero)>0){
                                                                                    ?>
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-hover">
                                                                                            <thead>
                                                                                            <tr>
                                                                                                <th>#</th>
                                                                                                <th>Nombre curso</th>
                                                                                            </tr>
                                                                                            </thead>
                                                                                            <tbody>

                                                                                                <?php
                                                                                                $num = 1;
                                                                                                while ($row_cursos = $con->getarray($result_cursos_primero)){
                                                                                                    ?>
                                                                                                <tr>
                                                                                                    <td><?php echo $num++; ?></td>
                                                                                                    <td><?php echo $row_cursos['nombre_curso']; ?></td>
                                                                                                </tr>
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                <?php
                                                                                }else{
                                                                                    echo "<h3>No registra cursos en este grado.</h3>";
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="segundo<?php echo $row['id_usuario']; ?>">
                                                                                <h4>En Segundo Grado</h4>
                                                                                <?php
                                                                                if ($con->getnumrows($result_cursos_segundo)>0){
                                                                                    ?>
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-hover">
                                                                                            <thead>
                                                                                            <tr>
                                                                                                <th>#</th>
                                                                                                <th>Nombre curso</th>
                                                                                            </tr>
                                                                                            </thead>
                                                                                            <tbody>

                                                                                                <?php
                                                                                                $num = 1;
                                                                                                while ($row_cursos = $con->getarray($result_cursos_segundo)){
                                                                                                    ?>
                                                                                                <tr>
                                                                                                    <td><?php echo $num++; ?></td>
                                                                                                    <td><?php echo $row_cursos['nombre_curso']; ?></td>
                                                                                                </tr>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                    <?php
                                                                                }else{
                                                                                    echo "<h3>No registra cursos en este grado.</h3>";
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="tercero<?php echo $row['id_usuario']; ?>">
                                                                                <h4>En Tercer Grado</h4>
                                                                                <?php
                                                                                if ($con->getnumrows($result_cursos_tercero)>0){
                                                                                    ?>
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-hover">
                                                                                            <thead>
                                                                                            <tr>
                                                                                                <th>#</th>
                                                                                                <th>Nombre curso</th>
                                                                                            </tr>
                                                                                            </thead>
                                                                                            <tbody>

                                                                                                <?php
                                                                                                $num = 1;
                                                                                                while ($row_cursos = $con->getarray($result_cursos_tercero)){
                                                                                                    ?>
                                                                                                <tr>
                                                                                                    <td><?php echo $num++; ?></td>
                                                                                                    <td><?php echo $row_cursos['nombre_curso']; ?></td>
                                                                                                </tr>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                    <?php
                                                                                }else{
                                                                                    echo "<h3>No registra cursos en este grado.</h3>";
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="cuarto<?php echo $row['id_usuario']; ?>">
                                                                                <h4>En Cuarto Grado</h4>
                                                                                <?php
                                                                                if ($con->getnumrows($result_cursos_cuarto)>0){
                                                                                    ?>
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-hover">
                                                                                            <thead>
                                                                                            <tr>
                                                                                                <th>#</th>
                                                                                                <th>Nombre curso</th>
                                                                                            </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                $num = 1;
                                                                                                while ($row_cursos = $con->getarray($result_cursos_cuarto)){
                                                                                                    ?>
                                                                                                <tr>
                                                                                                    <td><?php echo $num++; ?></td>
                                                                                                    <td><?php echo $row_cursos['nombre_curso']; ?></td>
                                                                                                </tr>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                    <?php
                                                                                }else{
                                                                                    echo "<h3>No registra cursos en este grado.</h3>";
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="quinto<?php echo $row['id_usuario']; ?>">
                                                                                <h4>En Quinto Grado</h4>
                                                                                <?php
                                                                                if ($con->getnumrows($result_cursos_quinto)>0){
                                                                                    ?>
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-hover">
                                                                                            <thead>
                                                                                            <tr>
                                                                                                <th>#</th>
                                                                                                <th>Nombre curso</th>
                                                                                            </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                $num = 1;
                                                                                                while ($row_cursos = $con->getarray($result_cursos_quinto)){
                                                                                                    ?>
                                                                                                <tr>
                                                                                                    <td><?php echo $num++; ?></td>
                                                                                                    <td><?php echo $row_cursos['nombre_curso']; ?></td>
                                                                                                </tr>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                    <?php
                                                                                }else{
                                                                                    echo "<h3>No registra cursos en este grado.</h3>";
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
                                                </td>
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
                        </div>
                    </div>
                <?php
                }else{
                    echo "<div class='row'> <div class='col-lg-12 text-center'> NO REGISTRA NINGUN PROFESOR EN EL SISTEMA</div> </div>";
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

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    !-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
</body>

</html>
