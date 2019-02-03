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
    					<h3 class="page-header title-bg"><i class="fa fa-laptop"></i> Perfil</h3>
    					<ol class="breadcrumb">
    						<li><i class="fa fa-home"></i><a href="../index/home.php">Inicio</a></li>
                <li><i class="fa fa-laptop"></i>Ver Perfil</li>    						  	
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
    							Ver Perfil # <?php echo $cod; ?> | <a class="btn btn-warning" href="../index/home.php">Regresar</a>
    						</div>
    						<div class="panel-body">
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Nombre - Apellido</label>
                        <p><?php echo $atributo['nombre'] ?> <?php echo $atributo['apellido'] ?></p>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Nombre y Tipo de Usuario</label>
                        <p><?php echo $atributo['nombre_usuario'] ?> - <?php echo $atributo['text_tipo_usuario'] ?></p>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Correo y Telefono</label>
                        <p><?php echo $atributo['correo'] ?> - <?php echo $atributo['telefono'] ?></p>
                      </div>
                      <?php } ?>
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Acciones</label>
                        <p>
                          <a href="editar.datos.php?cod=<?php echo $atributo['codigo'] ?>" class="label label-primary">Editar Datos de Contacto</a> - 
                          <a href="editar.preg.resp.php?cod=<?php echo $atributo['codigo'] ?>" class="label label-primary">Editar Pregunta y Respuesta de Seguridad</a> - 
                          <a href="editar.clave.php?cod=<?php echo $atributo['codigo'] ?>" class="label label-primary">Editar Clave</a>
                        </p>
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