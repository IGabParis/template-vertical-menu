<?php

include_once("conexion.php");

class Indexes{
    //constructor
 	var $conex;
 	function Indexes(){
 		$this->conex=new Conectar;	
 	}
    
	function validar($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM usuario WHERE nombre_usuario='".$campos[0]."';");
		}
	}

	function validar_usuario($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT clave FROM usuario WHERE nombre_usuario='".$campos[0]."';");
		}
	}

	function listar_preg_resp($correo, $pregunta, $respuesta){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT correo FROM usuario WHERE correo = '".$correo."' AND pregunta = '".$pregunta."' AND respuesta = '".$respuesta."';");
		}
	}

	function actualizar_clave($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "UPDATE usuario SET clave='".$campos[0]."' WHERE correo='".$campos[1]."';");
		}
	}
    
}

?>