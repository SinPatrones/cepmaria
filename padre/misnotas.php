<?php
include_once 'system/checkLogin.php';
include_once 'actions/obtenerDatosToken.php';
$id_usuario = $token->id;
include_once 'system/connection.php';
$con = ConnectionDb::getInstance();
$sql_grado = "SELECT grado_matricula FROM matriculas WHERE id_alumno=$id_usuario";
$con->connect();
$grado = $con->query($sql_grado);
$con->close();
$grado = $con->getarray($grado);
$grado = $grado['grado_matricula'];
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Panel de control para la página de C.E.P. Mária Auxiliadora Arequipa">
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
                        <h1 class="page-header">Mis Notas</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <?php
                $sql_mis_notas = "SELECT notasalumnos.*,cursos.nombre_curso,datosusuarios.nombres,datosusuarios.apellidos FROM notasalumnos INNER JOIN cursos ON notasalumnos.id_curso=cursos.id_curso INNER JOIN cursoprofesores ON cursoprofesores.id_curso=cursos.id_curso INNER JOIN datosusuarios ON cursoprofesores.id_profesor=datosusuarios.id_datosusuario WHERE notasalumnos.id_alumno=$id_usuario";

                $con->connect();
                $result_mis_notas = $con->query($sql_mis_notas);
                $con->close();

                if ($con->getnumrows($result_mis_notas) > 0){
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Curso</th>
                                        <th>Profesor</th>
                                        <th>Primer Bimestre</th>
                                        <th>Segundo Bimestre</th>
                                        <th>Tercer Bimestre</th>
                                        <th>Cuarto Bimestre</th>
                                        <th>Nota Final</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $indice = 1;
                                    while ($row_notas = $con->getarray($result_mis_notas)){
                                        $primera = $row_notas['primer_bimestre'];
                                        $segunda = $row_notas['segundo_bimestre'];
                                        $tercera = $row_notas['tercer_bimestre'];
                                        $cuarta = $row_notas['cuarto_bimestre'];
                                        $final = $row_notas['nota_final'];
                                        $profesor = $row_notas['nombres']." ".$row_notas['apellidos'];
                                        $promedio = ($primera + $segunda + $tercera + $cuarta)/4;
                                        ?>
                                        <tr class="<?php echo $promedio>10.5? "success":"danger"; ?>">
                                            <td><?php echo $indice++; ?></td>
                                            <td><?php echo $row_notas['nombre_curso']; ?></td>
                                            <td><?php echo $profesor; ?></td>
                                            <td><?php echo $primera; ?></td>
                                            <td><?php echo $segunda; ?></td>
                                            <td><?php echo $tercera; ?></td>
                                            <td><?php  echo $cuarta; ?></td>
                                            <td>
                                                <?php
                                                if ($final != "")
                                                    echo $final;
                                                else{
                                                    echo "NO REGISTRA NOTA FINAL - Promedio hasta ahora es: $promedio";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="subtitulos">Aún No Registra Notas</h2>
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

</body>

</html>
