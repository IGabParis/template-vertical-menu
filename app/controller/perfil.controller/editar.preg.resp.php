<?php

  include '../../model/perfil.class.php';

  $codigo = htmlspecialchars($_POST['codigo']);
  $respuesta = htmlspecialchars($_POST['respuesta']);
  $pregunta = htmlspecialchars($_POST['pregunta']);
  $correo = htmlspecialchars($_POST['correo']);

  $objeto = new Perfiles;

    $con_correo = $objeto->confirmar_correo($correo, $codigo);
    if(mysqli_num_rows($con_correo)<=0) { echo $codigo; } 
    else {
      if ($objeto->cambiar_preg_resp(array($pregunta, $respuesta, $codigo))) { echo '1'; }
      else { echo '2'; }
    }  

?>
  