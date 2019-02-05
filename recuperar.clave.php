<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Template</title>
        <!-- Bootstrap CSS -->    
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Others -->
        <link rel="stylesheet" href="assets/lib/jquery-wizard/libs/formvalidation/formValidation.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/lib/alertifyjs/css/alertify.min.css">
        <link rel="stylesheet" href="assets/lib/alertifyjs/css/themes/bootstrap.min.css">
        <!-- JQuery UI -->
        <link href="assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
        <!-- Custom styles -->
        <link href="assets/css/styles.css" rel="stylesheet">
        <!-- JQuery -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- Alertify -->
        <script src="assets/lib/alertifyjs/alertify.min.js"></script>
        <!-- HighCharts -->
        <script src="assets/js/highcharts.js"></script> 
        <script src="assets/js/highcharts-3d.js"></script> 
    </head>
    <body>
        <div class="container index">
          <form class="" id="recuperarClave">        
            <div>
                <p class=""><img src="assets/img/TALogo.png"></p>
                <p><a href="index.php" class="btn btn-warning">Regresar</a></p>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Correo" name="correo">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Pregunta de Seguridad" name="pregunta">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Respuesta" name="respuesta">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Nueva Clave" name="clave">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirmar Clave" name="clave2">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Confirmar nueva clave">
                </div>

            </div>
          </form>        
        </div>
        <footer class="footer-black footer-index">Temp Admin - IGabParis 2019</footer>
        <script src="assets/js/jquery-1.10.2.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/lib/jquery-wizard/libs/formvalidation/formValidation.min.js"></script>
        <script src="assets/lib/jquery-wizard/libs/formvalidation/bootstrap.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/validations.js"></script>
    </body>
</html>