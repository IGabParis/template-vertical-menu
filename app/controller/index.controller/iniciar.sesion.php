<?php

    include("../../model/index.class.php");

    $login=$_POST['login']; //carga la variable que contiene el valor nombre de usuario 
    $contrasena=$_POST['clave']; //carga la variable que contiene el valor clave
    $objeto=new Indexes;
    $clave=$objeto->validar_usuario(array($login));
    $consulta=$objeto->validar(array($login));

    if($clave){
        if ($clav=mysqli_fetch_array($clave, MYSQLI_ASSOC)){
            $verify=password_verify($contrasena,$clav['clave']);
            if($verify){
              if($consulta){
                    if ($atributo=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
                        session_start();
                        $_SESSION['usuario']=$login;
                        $_SESSION['tiempo']=time();
                        $_SESSION['tipo_usuario'] = $atributo['tipo_usuario'];
                        $_SESSION['id_usuario'] = $atributo['id_usuario'];
                        $_SESSION['codigo'] = $atributo['codigo'];
                        $_SESSION['nombre'] = $atributo['nombre'];
                        $_SESSION['apellido'] = $atributo['apellido'];
                        $_SESSION['estatus'] = $atributo['estatus'];
                        $id_ing = $_SESSION['id_usuario'];
                        if ($atributo['estatus'] == 1){
                            echo '1';
                        } else {
                            echo '4';
                        }
                    } else{    
                        echo '2';
                    }
                }  else{
                    echo '2';
                }
            } else {
                echo '3';
            }
        } else {
            echo '2';
        }
    } else {
        echo '2';
    }


?>