<?php 
    session_start();
    if (isset($_SESSION["id_usuario"])){
    if($_SESSION['tipo_usuario'] == '1' || $_SESSION['tipo_usuario'] == '2') { 
    $id = $_SESSION['id_usuario'];
    $cod = $_SESSION['codigo'];
    include('../includes/head.php');
 ?>

      <?php include('../includes/menu.php'); ?>
          <section class="container-section col-lg-9 col-sm-9 col-xs-12 col-lg-offset-3 col-sm-offset-3">            
    			  <div class="row">
    				<div class="col-lg-12">
    					<h3 class="page-header title-bg"><i class="fa fa-laptop"></i> Edicion de Datos de Seguridad</h3>
    					<ol class="breadcrumb">
    						<li><i class="fa fa-home"></i><a href="../index/home.php">Inicio</a></li>
    						<li><i class="fa fa-laptop"></i>Perfil</li>
                <li><i class="fa fa-laptop"></i>Editar datos de Seguridad</li>
    					</ol>
    				</div>
    			</div>
          <?php 
            include("../../model/perfil.class.php");
            $objeto=new Perfiles;
            $consulta=$objeto->buscar($cod);
            if($consulta) {
            $atributo=mysqli_fetch_array($consulta, MYSQLI_ASSOC); 
           ?>
    			<div class="row">
    				<div class="col-lg-12 col-md-12">	
    					<div class="panel panel-default">
    						<div class="panel-heading">
    							Editar Usuario # <?php echo $cod; ?> | <a class="btn btn-warning" href="ver.perfil.php">Regresar</a>
    						</div>
    						<div class="panel-body">
    							<form id="editarDatSeg">
                      <div class="form-group col-lg-6 col-sm-12">
                        <label for="pregunta">Pregunta</label>
                        <input type="text" class="form-control" placeholder="Pregunta" name="pregunta" value="<?php echo $atributo['pregunta'] ?>" id="pregunta" />
                      </div>
                      <div class="form-group col-lg-6 col-sm-12">
                        <label for="respuesta">Respuesta</label>
                        <input type="text" class="form-control" placeholder="Respuesta" name="respuesta" value="<?php echo $atributo['respuesta'] ?>" id="respuesta" />
                      </div>
                      <div class="form-group col-lg-12">
                        <label for="correo">Correo</label>
                        <input type="password" class="form-control" placeholder="Correo" name="correo" id="correo" />
                        <input type="hidden" name="codigo" value="<?php echo $cod; ?>">
                      </div>
                      <?php } ?>
                      <div class="form-group col-lg-12">
                        <input type="submit" name="submit" class="btn btn-success btn-width" value="Editar Datos">
                      </div>
						    </div>
              </div>
            </div>
      		</div>
        </section>
    <?php include('../includes/footer.php'); ?>
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