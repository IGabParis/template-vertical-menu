<?php

include_once("conexion.php");

class Perfiles{
 	var $conex;
 	function Perfiles(){
 		$this->conex=new Conectar;	
 	}
    
    function buscar($codigo){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT A.*, B.*
				FROM usuario A
				INNER JOIN tipo_usuario B on A.tipo_usuario = B.id_tipo_usuario
				WHERE A.codigo='".$codigo."';");
		}
	}
    
	function listar_correo($correo, $codigo){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT correo FROM usuario WHERE correo = '".$correo."' AND codigo != '".$codigo."';");
		}
	}

	function confirmar_correo($correo, $codigo){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT correo FROM usuario WHERE correo = '".$correo."' AND codigo = '".$codigo."';");
		}
	}
    
    function cambiar_datos($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "UPDATE usuario SET
				correo='".$campos[0]."',
				telefono='".$campos[1]."'
				WHERE codigo='".$campos[2]."';");
		}
	}

	function cambiar_preg_resp($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "UPDATE usuario SET
				pregunta='".$campos[0]."',
				respuesta='".$campos[1]."'
				WHERE codigo='".$campos[2]."';");
		}
	}
    
    function cambiar_clave($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "UPDATE usuario SET clave='".$campos[0]."' WHERE codigo='".$campos[1]."';");
		}
	}
    
}

?>