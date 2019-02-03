<?php

  include '../../model/perfil.class.php';

  $codigo = htmlspecialchars($_POST['codigo']);
  $telf = htmlspecialchars($_POST['telf']);
  $correo = htmlspecialchars($_POST['correo']);

  $objeto = new Perfiles;

    $con_correo = $objeto->listar_correo($correo, $codigo);
    if(mysqli_num_rows($con_correo)>0) { echo $codigo; } 
    else {
      if ($objeto->cambiar_datos(array($correo,$telf, $codigo))) { echo '1'; }
      else { echo '2'; }
    }  

?>
  