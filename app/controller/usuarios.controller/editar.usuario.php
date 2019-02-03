<?php

  include '../../model/usuarios.class.php';

  $codigo = htmlspecialchars($_POST['codigo']);
  $nombre = htmlspecialchars($_POST['nombre']);
  $apellido = htmlspecialchars($_POST['apellido']);
  $usuario = htmlspecialchars($_POST['usuario']);
  $tipo = htmlspecialchars($_POST['tipo']);

  $objeto = new Usuarios;

    $con_nombre = $objeto->listar_nombre_id($usuario, $codigo);
    if(mysqli_num_rows($con_nombre)>0) { echo $codigo; } 
    else {
      if ($objeto->cambiar(array($nombre, $apellido, $usuario, $tipo, $codigo))) { echo '1'; }
      else { echo '2'; }
    }  

?>
  