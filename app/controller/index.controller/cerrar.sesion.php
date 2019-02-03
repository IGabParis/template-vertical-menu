<?php 
  ob_start();
  session_start();
  ini_set('date.timezone','America/La_Paz');
  $fecha = date('Y-m-d');
  $hora = date('H:i:s');
  include("../../view/includes/head.php");

  session_destroy(); ?>
  <body onload="alerta()"></body>


<script type="text/javascript">
	function alerta (){
		alertify.alert('Atencion', 'Cerraste Sesion con Exito!', function(){ window.location = "../../../index.php"; });
	}
</script>