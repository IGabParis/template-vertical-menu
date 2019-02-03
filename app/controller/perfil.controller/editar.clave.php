<?php

  include '../../model/perfil.class.php';

  $codigo = htmlspecialchars($_POST['codigo']);
  $clave_nuev = htmlspecialchars($_POST['clave_nuev']);
  $clave_conf = htmlspecialchars($_POST['clave_conf']);
  $clave_cif = password_hash($clave_nuev, PASSWORD_DEFAULT);
  $correo = htmlspecialchars($_POST['correo']);

  $objeto = new Perfiles;

    $con_correo = $objeto->confirmar_correo($correo, $codigo);
    if(mysqli_num_rows($con_correo)<=0) { echo $codigo; } 
    else {
      if ($objeto->cambiar_clave(array($clave_cif, $codigo))) { echo '1'; }
      else { echo '2'; }
    }  

?>
  