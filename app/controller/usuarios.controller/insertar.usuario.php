<?php

if ($_POST['clave'] == $_POST['clave2']) {
  include '../../model/usuarios.class.php';
  ini_set('date.timezone','America/La_Paz');
  $fecha = date('Y-m-d');
  $hora = date('H:i:s');
  $codigo = time();
  $nombre = htmlspecialchars($_POST['nombre']);
  $apellido = htmlspecialchars($_POST['apellido']);
  $usuario = htmlspecialchars($_POST['usuario']);
  $tipo = htmlspecialchars($_POST['tipo']);
  $clave = htmlspecialchars($_POST['clave']);
  $cifrado = password_hash($clave, PASSWORD_DEFAULT);
  $correo = htmlspecialchars($_POST['correo']);
  $telf = htmlspecialchars($_POST['telf']);
  $pregunta = htmlspecialchars($_POST['pregunta']);
  $respuesta =htmlspecialchars($_POST['respuesta']);
  $status = 1;

  $objeto = new Usuarios;

  $con_email = $objeto->listar_correo($correo);
  if(mysqli_num_rows($con_email)>0) { echo '2'; }
  else {
    $con_nombre = $objeto->listar_nombre($usuario);
    if(mysqli_num_rows($con_nombre)>0) { echo '3'; } 
    else {
      if ($objeto->insertar(array($codigo, $nombre, $apellido, $usuario, $tipo, $cifrado, $correo, $telf, $pregunta, $respuesta, $status))) { echo '1'; }
      else { echo '4'; }
    } 
  } 
} 
else { echo '5'; }

?>
  