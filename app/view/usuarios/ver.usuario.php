<?php 
    session_start();
    if (isset($_SESSION["id_usuario"])){
    if($_SESSION['tipo_usuario'] == '1') { 
    $id = $_SESSION['id_usuario'];
    $cod = $_GET['cod'];
    include('../includes/head.php');
 ?>
      <?php include('../includes/menu.php'); ?>
          <section class="container-section col-lg-9 col-sm-9 col-xs-12 col-lg-offset-3 col-sm-offset-3">            
    			  <div class="row">
    				<div class="col-lg-12">
    					<h3 class="page-header title-bg"><i class="fa fa-laptop"></i> Ver datos de usuario</h3>
    					<ol class="breadcrumb">
    						<li><i class="fa fa-home"></i><a href="../index/home.php">Inicio</a></li>
    						<li><i class="fa fa-laptop"></i>Control de Usuarios</li>
                <li><i class="fa fa-laptop"></i>Editar Usuario</li>    						  	
    					</ol>
    				</div>
    			</div>
          <?php 
            include("../../model/usuarios.class.php");
            $objeto=new Usuarios;
            $consulta=$objeto->buscar($cod);
            if($consulta) {
            $atributo=mysqli_fetch_array($consulta, MYSQLI_ASSOC); 
           ?>
    			<div class="row">
    				<div class="col-lg-12 col-md-12">	
    					<div class="panel panel-default">
    						<div class="panel-heading">
    							Ver Usuario # <?php echo $cod; ?> | <a class="btn btn-warning" href="control.usuarios.php">Regresar</a>
    						</div>
    						<div class="panel-body">
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Nombre - Apellido</label>
                        <p><?php echo $atributo['nombre'] ?> <?php echo $atributo['apellido'] ?></p>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Nombre y Tipo de Usuario:</label>
                        <p><?php echo $atributo['nombre_usuario'] ?> - <?php echo $atributo['text_tipo_usuario'] ?></p>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Correo y Telefono</label>
                        <p><?php echo $atributo['correo'] ?> - <?php echo $atributo['telefono'] ?></p>
                      </div>
                      <?php } ?>
                      <div class="col-lg-6 col-md-6 col-sm-12 button-div">
                        <label>Acciones</label>
                        <p>
                        <a href="editar.usuario.php?cod=<?php echo $atributo['codigo'] ?>" class="label label-primary">Editar</a> - 
                        <?php if ($atributo['estatus'] == '1') { ?>
                          <button onclick="return confirmDeshabilitar()" value="<?php echo $atributo['codigo'] ?>" id='des' class="button label label-warning">Deshabilitar</button> - 
                          <?php } else { ?>
                          <button onclick="return confirmHabilitar()" value="<?php echo $atributo['codigo'] ?>" id="hab" class="button label label-info">Habilitar</button> -
                          <?php } ?>
                          <button onclick="return confirmEliminar()" value="<?php echo $atributo['codigo'] ?>" id="eli" class="button label label-danger" title="Eliminar">Eliminar</button>
                        </p>
                      </div>
						    </div>
              </div>
            </div>
      		</div>
        </section>
    <?php include('../includes/footer.php'); ?>
    <script type="text/javascript">
      function confirmDeshabilitar() {
        var id = document.getElementById('des').value;
        console.log(id);
          alertify.confirm('Atencion', 'Seguro desea realizar esta accion?', 
            function(){ 
              window.location = "../../controller/usuarios.controller/deshabilitar.usuario.php?cod="+id;
             }, function(){ alertify.error('Cancelado')});
      }
      function confirmHabilitar() {
          var id = document.getElementById('hab').value;
          alertify.confirm('Atencion', 'Seguro desea realizar esta accion?', 
            function(){ 
              window.location = "../../controller/usuarios.controller/habilitar.usuario.php?cod="+id;
             }, function(){ alertify.error('Cancelado')});
      }
      function confirmEliminar() {
          var id = document.getElementById('eli').value;
          alertify.confirm('Atencion', 'Seguro desea realizar esta accion?', 
            function(){ 
              window.location = "../../controller/usuarios.controller/eliminar.usuario.php?cod="+id;
             }, function(){ alertify.error('Cancelado')});
      }    
    </script>
  </body>
</html>
<?php 
  } else { 
      include('../includes/head.php');
      ?>
      <body onload="alerta()"></body>
      <script type="text/javascript">
          function alerta (){
              alertify.alert('Atencion', 'Usted no tiene accesos a ésta página, usted no es administrador', function(){ window.location = "../index/home.php"; });
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