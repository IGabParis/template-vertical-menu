
<?php 
    session_start();
    if (isset($_SESSION["id_usuario"])){
    if($_SESSION['tipo_usuario'] == '1' || $_SESSION['tipo_usuario'] == '2') { 
    $id = $_SESSION['id_usuario'];
    include('../includes/head.php') ?>
	<?php include('../includes/menu.php') ?>
    <section class="container-section col-lg-9 col-sm-9 col-xs-12 col-lg-offset-3 col-sm-offset-3">
      <div class="row">
        <h2 class="title-bg">Temp Admin</h2>
        <div class="col-lg-12">
          <div class="col-lg-4 col-sm-12">          
            <div class="panel panel-back panel-red box">
                <span class="icon-set col-lg-4">
                    <i class="fa fa-bolt"></i>
                </span>
                <br>
                <div class="text-box col-lg-8">
                  <p class="number">1000</p>
                  <p class="text">Tis' Just But Item #1</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="panel panel-back panel-green box">
                <span class="icon-set col-lg-4">
                    <i class="fa fa-home"></i>
                </span>
                <br>
                <div class="text-box col-lg-8">
                  <p class="number">1500</p>
                  <p class="text">Tis' Just But Item #2</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="panel panel-back panel-blue box">
                <span class="icon-set col-lg-4">
                    <i class="fa fa-user"></i>
                </span>
                <br>
                <div class="text-box col-lg-8">
                  <p class="number">1700</p>
                  <p class="text">Tis' Just But Item #3</p>
                </div>
            </div>
          </div>
        </div> 
      </div>
      <div class="row">
        <h2 class="title-bg">Title Goes Here</h2>
        <div class="panel panel-chart">
          <div id="container-chart"></div>
              <script type="text/javascript">
                Highcharts.chart('container-chart', {
                  chart: {
                      type: 'line'
                  },
                  title: {
                      text: 'Fallas reportadas'
                  },
                  subtitle: {
                      text: ''
                  },
                  xAxis: {
                      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']
                  },
                  yAxis: {
                      title: {
                           text: 'Reportes'
                      }
                  },
                  plotOptions: {
                      line: {
                          dataLabels: {
                              enabled: true
                          },
                           enableMouseTracking: false
                      }
                  },
                  series: [{
                      name: 'Cantidad',
                      data: [300,500,200,400,650,700,500,800,120,200,390,560]
                  }]
               });
              </script>
          </div>
        </div>
      </div>
    </section>
	<?php include('../includes/footer.php') ?>
  </body>
</html>
<?php 
  } else { 
      include('../includes/head.php');
      ?>
      <body onload="alerta()"></body>
      <script type="text/javascript">
          function alerta (){
              alertify.alert('Atencion', 'Usted no tiene accesos a ésta página', function(){ window.location = "../../../index.php"; });
          }
      </script>
  <?php }
  } else {
      include('../includes/head.php');
      ?>
      <body onload="alerta()"></body>
      <script type="text/javascript">
          function alerta (){
              alertify.alert('Atencion', 'Usted no tiene accesos a ésta página', function(){ window.location = "../../../index.php"; });
          }
      </script>
  <?php } ?>