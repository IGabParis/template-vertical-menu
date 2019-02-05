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
          <form class="" id="autenticarUsuario">        
            <div>
                <p class=""><img src="assets/img/TALogo.png"></p>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Usuario" name="login">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Clave" name="clave">
                </div>
                <label>
                    <span class="label label-warning"><a href="recuperar.clave.php" style="">¿Olvidó su clave?</a></span>
                </label>
                <input type="submit" class="btn btn-success btn-width" name="submit" value="Ingresar al Sistema">
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