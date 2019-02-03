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
    					<h3 class="page-header title-bg"><i class="fa fa-laptop"></i> Edicion de Usuarios</h3>
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
    							Editar Usuario # <?php echo $cod; ?> | <a class="btn btn-warning" href="control.usuarios.php">Regresar</a>
    						</div>
    						<div class="panel-body">
    							<form id="editarUs">
                      <div class="form-group col-lg-6 col-sm-12">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $atributo['nombre'] ?>" id="nombre" required/>
                        <input type="hidden" name="codigo" value="<?php echo $cod; ?>">
                      </div>
                      <div class="form-group col-lg-6 col-sm-12">
                          <label for="apellido">Apellido</label>
                          <input type="text" class="form-control" placeholder="Apellido" name="apellido" value="<?php echo $atributo['apellido'] ?>" id="apellido" required/>
                      </div>
                      <div class="form-group col-lg-6 col-sm-12">
                          <label for="usuario">Nombre de Usuario</label>
                          <input type="text" class="form-control" placeholder="Nombre de Usuario" id="usuario" value="<?php echo $atributo['nombre_usuario'] ?>" name="usuario" required/>
                      </div>
                      <div class="form-group col-lg-6 col-sm-12">
                          <label for="tipo">Tipo de Usuario</label>
                          <?php 
                            $consulta2=$objeto->listar_tipo();
                          ?>
                          <select class="form-control" placeholder="Tipo de Usuario" id="tipo" name="tipo">
                            <optgroup label="Seleccionado">
                              <option value="<?php echo $atributo['tipo_usuario'] ?>"><?php echo $atributo['text_tipo_usuario'] ?></option>
                            </optgroup>
                            <optgroup label="Otras Opciones">
                              <?php while ($atributo2=mysqli_fetch_array($consulta2, MYSQLI_ASSOC)) {  ?>
                                <option value="<?php echo $atributo2['id_tipo_usuario'] ?>">
                                  <?php echo $atributo2['text_tipo_usuario'] ?>
                                </option>
                              <?php } ?>
                            </optgroup>
                          </select>
                      </div>
                      <?php } ?>
                      <div class="form-group col-lg-12 btn-center">
                        <input type="submit" name="submit" class="btn btn-success btn-width" value="Editar Usuario">
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