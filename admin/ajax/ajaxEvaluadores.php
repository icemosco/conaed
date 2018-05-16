<?php
	session_start();
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Modelo.php");
	
	$oMod         =  new Modelo();
	$accion 	  =  $_POST['accion'];
	$idEvaluador  =  $_POST['id'];
	$nombre		  =  $_POST['nombre']; 
	$paterno	  =  $_POST['paterno'];
	$materno	  =  $_POST['materno'];
	
	function fnGuardarEvaluadores( $nombre, $paterno, $materno, $idEvaluador = '' )
	{
		global $oMod;
		$error = '';
		if( empty($idEvaluador )){
			$id = $oMod->fnInsertaEvaluadores( $nombre, $paterno, $materno );
		}else{
			$id = $oMod->fnActualizaEvaluadores( $idEvaluador, $nombre, $paterno, $materno);
		}	
		
		
		return $error;
	}
	
	if($estatus == 1) $estatus = '0';
	else
		$estatus = '1';
	
	
	
	switch( $accion ){
		case 'eliminar':
			$oMod->fnEliminarEvaluadores( $idEvaluador );
		break;
		case 'guardar':
			fnGuardarEvaluadores( $nombre, $paterno, $materno, $idEvaluador );
		break;
	}
	
	echo json_encode( array("success"=>"OK"));
	
?>
