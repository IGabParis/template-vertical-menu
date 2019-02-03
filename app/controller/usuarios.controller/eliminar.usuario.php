<?php

if (isset($_GET['cod'])){
    include("../../model/usuarios.class.php");
    include("../../view/includes/head.php");
    session_start();

    ini_set('date.timezone','America/La_Paz');
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');

    $cod = trim($_GET['cod']);

    $objeto=new Usuarios;

    $objeto->eliminar($cod);
}

?>

<body onload="alerta()"></body>


<script type="text/javascript">
    function alerta (){
        alertify.alert('Atencion', 'Usuario Eliminado!', function(){ window.location = "../../view/usuarios/control.usuarios.php"; });
    }
</script>