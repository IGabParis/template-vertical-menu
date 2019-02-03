<?php

include_once("conexion.php");

class Usuarios{
 	var $conex;
 	function Usuarios(){
 		$this->conex=new Conectar;	
 	}
    
    function insertar($campos){
		if($this->conex->con()==true){
			return mysqli_query($this->conex->con(), "INSERT INTO usuario (codigo,nombre,apellido,nombre_usuario,tipo_usuario,clave,correo,telefono, pregunta,respuesta,estatus) 
			VALUES (
			'".$campos[0]."',
			'".$campos[1]."',
			'".$campos[2]."',
			'".$campos[3]."',
			'".$campos[4]."',
			'".$campos[5]."',
			'".$campos[6]."',
			'".$campos[7]."',
			'".$campos[8]."',
			'".$campos[9]."',
			'".$campos[10]."'
		);");
		}
	}
    
    function listar(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT A.*, B.text_tipo_usuario 
			FROM usuario A 
			INNER JOIN tipo_usuario B ON A.tipo_usuario = B.id_tipo_usuario 
			ORDER BY A.id_usuario DESC;");
		}
	}

	function listar_tipo(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM tipo_usuario ORDER BY id_tipo_usuario ASC;");
		}
	}

	function listar_correo($correo){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT correo FROM usuario WHERE correo = '".$correo."';");
		}
	}

	function listar_nombre($nombre){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT nombre_usuario FROM usuario WHERE nombre_usuario = '".$nombre."';");
		}
	}

	function listar_nombre_id($nombre, $id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT nombre_usuario FROM usuario WHERE nombre_usuario = '".$nombre."'  AND codigo != '".$id."';");
		}
	}

	function cambiar_st($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "UPDATE usuario SET
				estatus='".$campos[0]."'
				WHERE codigo='".$campos[1]."';");
		}
	}
    
    function cambiar($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "UPDATE usuario SET
				nombre='".$campos[0]."',
				apellido='".$campos[1]."',
				nombre_usuario='".$campos[2]."',
				tipo_usuario = '".$campos[3]."'
				WHERE codigo='".$campos[4]."';");
		}
	}
    
    function buscar($codigo){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT A.*, B.*
				FROM usuario A
				INNER JOIN tipo_usuario B on A.tipo_usuario = B.id_tipo_usuario
				WHERE A.codigo='".$codigo."';");
		}
	}

	function eliminar($cod){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "DELETE FROM usuario WHERE codigo='".$cod."';");
		}
	}
    
}

?>