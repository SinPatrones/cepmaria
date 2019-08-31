<?php
include_once 'system/checkLogin.php';
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
                        <h1 class="page-header">Notas De Cursos de Primer Grado</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <?php
                include_once 'system/connection.php';

                $con = ConnectionDb::getInstance();

                $sql_cursos = "SELECT cursos.* FROM cursos INNER JOIN cursoprofesores ON cursos.id_curso=cursoprofesores.id_curso WHERE cursos.grado_curso='PRIMERO' AND cursoprofesores.id_profesor=$id_usuario";

                $con->connect();
                $result_cursos = $con->query($sql_cursos);
                $con->close();
                $panel_cursos = null;
                if ($result_cursos){
                    if ($con->getnumrows($result_cursos)){
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Cursos Asignados
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                            <?php
                                            $i = 1;
                                            $cursos_array = Array();
                                            while ($row_curso = $con->getarray($result_cursos)){
                                                array_push($cursos_array, $row_curso);
                                                if ($i == 1){
                                                    ?>
                                                    <li class="active"><a href="#curso<?php echo $row_curso['id_curso']; ?>" data-toggle="tab"><?php echo $row_curso['nombre_curso']; ?></a>
                                                    </li>
                                            <?php
                                                }else{
                                                    ?>
                                                    <li><a href="#curso<?php echo $row_curso['id_curso']; ?>" data-toggle="tab"><?php echo $row_curso['nombre_curso']; ?></a>
                                                    </li>
                                            <?php
                                                }
                                                $i++;
                                            }
                                            ?>
                                        </ul>
                                        <?php
                                        $sql_alumnos = "SELECT datosusuarios.* FROM datosusuarios INNER JOIN matriculas ON datosusuarios.id_datosusuario=matriculas.id_alumno WHERE matriculas.grado_matricula='PRIMERO'";
                                        $con->connect();
                                        $result_alumnos = $con->query($sql_alumnos);
                                        $con->close();

                                        $array_alumnos = Array();

                                        while ($row_alumno = $con->getarray($result_alumnos)){
                                            array_push($array_alumnos, $row_alumno);
                                        }

                                        ?>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                        <?php
                                        for ($x = 0; $x < sizeof($cursos_array); $x++){
                                            if ($x == 0){
                                                ?>
                                                <div class="tab-pane fade in active" id="curso1">
                                                    <h4><?php echo $cursos_array[$x]['nombre_curso']; ?></h4>
                                                        <div class="table-responsive table-bordered">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nombres</th>
                                                                    <th>Apellidos</th>
                                                                    <th>Primer Bimestre</th>
                                                                    <th>Segundo Bimestre</th>
                                                                    <th>Tercero Bimestre</th>
                                                                    <th>Cuarto Bimestre</th>
                                                                    <th>Nota Final</th>
                                                                    <th>Acciones</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                for ($k = 0; $k < sizeof($array_alumnos); $k++){
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $k+1;?></td>
                                                                        <td><?php echo $array_alumnos[$k]['nombres']; ?></td>
                                                                        <td><?php echo $array_alumnos[$k]['apellidos']; ?></td>
                                                                        <td><input type="number"></td>
                                                                        <td><input type="number"></td>
                                                                        <td><input type="number"></td>
                                                                        <td><input type="number"></td>
                                                                        <td><input type="number" readonly></td>
                                                                        <input type="text" style="display: none" value="<?php echo $array_alumnos[$k]['id_datosusuario']; ?>">
                                                                        <td><button class="btn btn-success">Guardar</button></td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                        </div>
                                        <?php
                                            }else{
                                                ?>
                                                <div class="tab-pane fade" id="curso6">
                                                    <h4><?php echo $cursos_array[$x]['nombre_curso']; ?></h4>
                                                    <?php
                                                    for ($k = 0; $k < sizeof($array_alumnos); $k++){
                                                        echo "<p>".$array_alumnos[$k]['nombres']."</p>";
                                                    }
                                                    ?>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        </div>
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                            </div>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>No tiene asignado cursos en primer grado</h3>
                            </div>
                        </div>
                        <?php
                    }
                }else{?>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>ERROR AL OBTENER DATOS, RECARGUE PÁGINA POR FAVOR.</h3>
                        </div>
                    </div>
                    <?php
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

    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
</body>

</html>
