<?php include_once 'system/checkLogin.php'; ?>
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
                        <h1 class="page-header">Nueva Matrícula</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12 col-sm-10 col-sm-offset-1 col-lg-6 col-lg-offset-3">
                        <form role="form" action="actions/nuevamatricula.php" method="post">
                            <div class="form-group">
                                <label>Seleccione el grado de Educación</label>
                                <label class="radio-inline">
                                    <input type="radio" name="grado" id="grado1" value="PRIMERO" required>Primero
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="grado" id="grado2" value="SEGUNDO" required>Segundo
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="grado" id="grado2" value="TERCERO" required>Tercero
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="grado" id="grado2" value="CUARTO" required>Cuarto
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="grado" id="grado2" value="QUINTO" required>Quinto
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Nombres</label>
                                <input class="form-control" name="nombres" type="text" required>
                                <p class="help-block">Ingrese los nombres del alumno.</p>
                            </div>

                            <div class="form-group">
                                <label>Apellidos</label>
                                <input class="form-control" name="apellidos" type="text" required>
                                <p class="help-block">Ingrese los apellidos del alumno.</p>
                            </div>

                            <div class="form-group">
                                <label>Seleccione Sexo</label>
                                <label class="radio-inline">
                                    <input type="radio" name="sexo" id="grado1" value="1" required>Hombre
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="sexo" id="grado2" value="0" required>Mujer
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Fecha de Nacimiento</label>
                                <input class="form-control" type="date" name="fecha_nacimiento" required>
                            </div>

                            <button type="submit" class="btn btn-success">MATRÍCULAR</button>
                            <button type="reset" class="btn btn-primary">LIMPIAR FORMULARIO</button>
                        </form>
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
