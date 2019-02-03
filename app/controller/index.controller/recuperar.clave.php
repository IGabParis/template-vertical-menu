<?php

if ($_POST['clave'] == $_POST['clave2']) {
  include '../../model/index.class.php';
  $correo= htmlspecialchars($_POST['correo']);
  $clave = htmlspecialchars($_POST['clave']);
  $cifrado = password_hash($clave, PASSWORD_DEFAULT);
  $pregunta = htmlspecialchars($_POST['pregunta']);
  $respuesta =htmlspecialchars($_POST['respuesta']);
  $status = 1;

  $objeto = new Indexes;

  $con_respuesta = $objeto->listar_preg_resp($correo,$pregunta, $respuesta);
  if(mysqli_num_rows($con_respuesta)>0) { 
      if ($objeto->actualizar_clave(array($cifrado, $correo))) { echo '1'; }
      else { echo '2'; }
  } else { echo '3'; }
} else { echo '4'; }

?>
  