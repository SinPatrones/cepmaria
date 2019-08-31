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
                        <h1 class="page-header">Notificar Alumno</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- TITULO Y MENSAJE DE LA NOTIFICACION -->
                <form action="actions/notificar.php" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Notificación</h3>
                            <div class="form-group">
                                <label for="titulo">Titulo:</label>
                                <input type="text" id="titulo" name="titulo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Mensaje</label>;
                                <textarea name="mensaje" id="mensaje" rows="5" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                    include_once 'system/connection.php';
                    $con = ConnectionDb::getInstance();

                    $sql_lista = "SELECT DISTINCT datosusuarios.* FROM cursoprofesores INNER JOIN cursos ON cursoprofesores.id_curso=cursos.id_curso INNER JOIN matriculas ON matriculas.grado_matricula=cursos.grado_curso INNER JOIN datosusuarios ON matriculas.id_alumno=datosusuarios.id_datosusuario WHERE cursoprofesores.id_profesor=$id_usuario ORDER BY datosusuarios.apellidos";

                    $con->connect();
                    $result_lista = $con->query($sql_lista);
                    $con->close();

                    ?>
                    <!-- LISTA DE ALUMNOS -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="subtitulos">Lista</h3>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Seleccionar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $indice = 1;
                                while($row_lista = $con->getarray($result_lista)){
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $indice++; ?></td>
                                        <td><?php echo $row_lista['nombres']; ?></td>
                                        <td><?php echo $row_lista['apellidos']; ?></td>
                                        <td align="center"><input type="radio" name="id_usuario" value="<?php echo $row_lista['id_datosusuario']; ?>"></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <!-- BOTONES DEL FORMULARIO -->
                    <div class="row">
                        <input type="text" name="id_reportante" value="<?php echo $id_usuario; ?>" style="display: none;">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success btn-block">ENVIAR NOTIFICACIÓN</button>
                            <button type="reset" class="btn btn-dark btn-block">LIMPIAR FORMULARIO</button>
                        </div>
                    </div>
                </form>
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
