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
                        <h1 class="page-header">Lista de Alumnos de Segundo Grado</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <?php
                include_once 'system/connection.php';

                $con = ConnectionDb::getInstance();

                $sql_esta_en_grado = "SELECT * FROM cursos INNER JOIN cursoprofesores ON cursos.id_curso=cursoprofesores.id_curso WHERE cursoprofesores.id_profesor=".strval($id_usuario)." AND cursos.grado_curso='SEGUNDO'";
                $con->connect();
                $result_esta_grado = $con->query($sql_esta_en_grado);
                $con->close();
                if ($con->getnumrows($result_esta_grado)>0){

                    $sql_lista_grado = "SELECT * FROM matriculas INNER JOIN datosusuarios ON matriculas.id_alumno=datosusuarios.id_datosusuario WHERE matriculas.grado_matricula='SEGUNDO' ORDER BY datosusuarios.apellidos ASC";

                    $con->connect();
                    $result_lista_grado = $con->query($sql_lista_grado);
                    $con->close();

                    if ($con->getnumrows($result_lista_grado)>0){
                        ?>
                        <div class="row">
                            <div class="col-12 col-sm-8 col-sm-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Lista de Alumnado
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Sexo</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while ($row = $con->getarray($result_lista_grado)){
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $row['nombres']; ?></td>
                                                    <td><?php echo $row['apellidos']; ?></td>
                                                    <?php
                                                    if ($row['sexo'] == 1){
                                                        echo "<td>HOMBRE</td>";
                                                    }else{
                                                        echo "<td>MUJER</td>";
                                                    }
                                                    ?>
                                                    <td class="center"><?php echo $row['fecha_nacimiento']; ?></td>
                                                    <td class="center"><a href="/datosalumna.php?id=<?php echo $row['id_datosusuario']; ?>" class="btn btn-success">VER DATOS</a></td>
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
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>No tenemos ninguna alumna registrada aún.</h3>
                            </div>
                        </div>
                <?php
                    }
                    ?>
                    <?php
                }else{
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Usted no esta asignado para ningun curso de la educación de Segundo grado</h3>
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

    <!-- DataTables JavaScript -->
    <script src=".vendor/datatables/js/jquery.dataTables.min.js"></script>
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
