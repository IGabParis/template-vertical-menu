<?php 
    session_start();
    if (isset($_SESSION["id_usuario"])){
    if($_SESSION['tipo_usuario'] == '1') { 
    $id = $_SESSION['id_usuario'];
    include('../includes/head.php');
 ?>
    <?php include('../includes/menu.php'); ?>
        <section class="container-section col-lg-9 col-sm-9 col-xs-12 col-lg-offset-3 col-sm-offset-3">    
    			  <div class="row">
    				<div class="col-lg-12">
    					<h3 class="page-header title-bg"><i class="fa fa-laptop"></i> Control de Usuarios</h3>
    					<ol class="breadcrumb">
    						<li><i class="fa fa-home"></i><a href="../index/home.php">Inicio</a></li>
    						<li><i class="fa fa-laptop"></i>Control de Usuarios</li>						  	
    					</ol>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-lg-12 col-md-12">	
    					<div class="panel panel-default">
    						<div class="panel-heading">
    							Usuarios Administradores Registrados | <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar Usuario</button>
    						</div>
    						<div class="panel-body">
    							<table class="table table-data table-striped table-bordered table-hover" id="dataTables-example">
    								<thead>
                      <tr>
                        <th>Usuario - Tipo</th>
                        <th>Nombre</th>
                        <th>Correo - Telf.</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <?php 
                      include("../../model/usuarios.class.php");
                      $objeto=new Usuarios;
                      $consulta=$objeto->listar();
                      if($consulta) { 
                    ?>
                    <tbody>
                    <?php 
                      $i = 0;
                      while ($atributo=mysqli_fetch_array($consulta, MYSQLI_ASSOC)) { 
                    ?>
                    <tr>
                      <td>
                        <?php echo $atributo['nombre_usuario'].' - '.$atributo['text_tipo_usuario']; ?>
                      </td>
                      <td>
                        <?php echo $atributo['nombre'].' - '.$atributo['apellido']; ?>
                      </td>
                      <td>
                        <?php echo $atributo['correo'].' - '.$atributo['telefono']; ?>
                      </td>
                      <td>
                        <?php if ($id == $atributo['id_usuario']) { 
                          echo '';
                        } else { ?>
                          <a href="ver.usuario.php?cod=<?php echo $atributo['codigo'] ?>" class="button label label-success">Ver</a> -
                          <a href="editar.usuario.php?cod=<?php echo $atributo['codigo'] ?>"" class="button label label-primary">Editar</a> - 
                          <?php if ($atributo['estatus'] == '1') { ?>
                          <button onclick="return confirmDeshabilitar()" value="<?php echo $atributo['codigo'] ?>" id='des' class="button label label-warning">Deshabilitar</button> - 
                          <?php } else { ?>
                          <button onclick="return confirmHabilitar()" value="<?php echo $atributo['codigo'] ?>" id="hab" class="button label label-info">Habilitar</button> -
                          <?php } ?>
                          <button onclick="return confirmEliminar()" value="<?php echo $atributo['codigo'] ?>" id="eli" class="button label label-danger" title="Eliminar">Eliminar</button>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <?php } ?>
                  </table>
                  <?php  ?>
						    </div>
              </div>
            </div>
      			</div>
      			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Registrar Usuario</h4>
                  </div>
                  <div class="modal-body">
                    <form id="agregarUs">
                      <div class="form-group col-lg-6 col-sm-12">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" required/>
                      </div>
                      <div class="form-group col-lg-6 col-sm-12">
                          <label for="apellido">Apellido</label>
                          <input type="text" class="form-control" placeholder="Apellido" name="apellido" id="apellido" required/>
                      </div>
                      <div class="form-group col-lg-6 col-sm-12">
                          <label for="usuario">Nombre de Usuario</label>
                          <input type="text" class="form-control" placeholder="Nombre de Usuario" id="usuario" name="usuario" required/>
                      </div>
                      <div class="form-group col-lg-6 col-sm-12">
                          <label for="tipo">Tipo de Usuario</label>
                          <?php 
                            $consulta2=$objeto->listar_tipo();
                          ?>
                          <select class="form-control" placeholder="Tipo de Usuario" id="tipo" name="tipo">
                            <optgroup label="Opciones">
                              <?php while ($atributo2=mysqli_fetch_array($consulta2, MYSQLI_ASSOC)) {  ?>
                                <option value="<?php echo $atributo2['id_tipo_usuario'] ?>">
                                  <?php echo $atributo2['text_tipo_usuario'] ?>
                                </option>
                              <?php } ?>
                            </optgroup>
                          </select>
                      </div>
                      <div class="form-group col-lg-6 col-sm-12">
                          <label for="clave">Clave</label>
                          <input type="password" class="form-control" placeholder="Clave" name="clave" id="clave" required minlength="8" maxlength="20"/>
                      </div>
                      <div class="form-group col-lg-6 col-sm-12">
                          <label for="clave2">Confirmar Clave</label>
                          <input type="password" class="form-control" placeholder="Repetir Clave" name="clave2" id="clave2"  minlength="8" maxlength="20" />
                      </div>
                      <div class="form-group col-lg-6 col-sm-12">
                          <label for="correo">Correo</label>
                          <input type="email" class="form-control" placeholder="Correo" name="correo" id="correo" required/>
                      </div>
                      <div class="form-group col-lg-6 col-sm-12">
                          <label for="telf">Telefono</label>
                          <input type="text" class="form-control" placeholder="Telf." id="telf" name="telf" required/>
                      </div>
                      <div class="form-group col-lg-6 col-sm-12">
                          <label for="pregunta">Pregunta de Seguridad</label>
                          <input type="text" class="form-control" placeholder="Pregunta de seguridad" id="pregunta" name="pregunta" required/>
                      </div>
                      <div class="form-group col-lg-6 col-sm-12">
                          <label for="respuesta">Respuesta de Seguridad</label>
                          <input type="text" class="form-control" placeholder="Respuesta de Seguridad" id="respuesta" name="respuesta" required/>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <input type="submit" name="submit" class="btn btn-success" value="Registrar">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
    <?php include('../includes/footer.php'); ?>

    <script type="text/javascript">
      $(document).ready(function () {
        $(".table-data").DataTable({
          "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
          "sort": true,
           "order": [[0,"desc"]],
          "searching": true,
          "language": {
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                   "sFirst":    "Primero",
                   "sLast":     "Último",
                    "sNext":     "Siguiente",
                   "sPrevious": "Anterior"
               },
               "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
          }
        });
      });

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