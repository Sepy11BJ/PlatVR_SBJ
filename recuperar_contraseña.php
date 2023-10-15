<?php

require 'modelo/conexion.php';

?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" style="margin-left: 26rem;">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recuperar Contraseña</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/estiloRC.css">
    <script src="js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Recuperar Contraseña</div>
                    <div style="float:right; font-size: 94%; position: relative; top:-20px" class="panel-ini"><a href="login.php">Iniciar Sesi&oacute;n</a></div>
                </div>

                <div style="padding-top:30px" class="panel-body">

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="email" class="form-control" name="email" placeholder="email" required>
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <button id="btn-login" type="submit" class="btn btn-success">Enviar</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>