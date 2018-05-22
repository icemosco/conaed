<?php
	session_start();
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Usuario.php");
	
	$oUsu         = new Usuario();

	$accion 	  = $_POST['accion'];
	$idUsuario    = $_POST['id'];
	$nombre		  =  $_POST['nombre']; 
	$paterno	  =  $_POST['paterno']; 
	$materno	  =  $_POST['materno']; 
	$usuario	  =  $_POST['usuario'];
	$email		  =  $_POST['email'];
	$password	  =  $_POST['pass'];
	$permisos	  =  $_POST['permisos'];

	if(!empty($permisos))  $permisos = implode( "|", $permisos );
	
	function fnGuardarUsuarios( $nombre, $paterno, $materno, $usuario, $email, $password, $permisos, $idUsuario = '' )
	{
		global $oUsu, $_SESSION;
		$error = '';
		$usrReg = $_SESSION['usrName'];

		if( empty( $idUsuario )){
			$id = $oUsu->fnInsertaUsuarios( $usrReg, $nombre, $paterno, $materno, $usuario, $email, $password, $permisos );
		}else{
			$id = $oUsu->fnActualizarUsuario( $usrReg, $nombre, $paterno, $materno, $email, $password, $permisos, $idUsuario);
		}
		
		
		return $id;
	}
	
	switch( $accion ){
		case 'eliminar':
			$oUsu->desactivarUsuario( $idUsuario );
		break;
		case 'guardar':
			$id = fnGuardarUsuarios( $nombre, $paterno, $materno, $usuario, $email, $password, $permisos, $idUsuario );
		break;
	}
	
	echo json_encode( array("success"=>"OK"));
	
?>
