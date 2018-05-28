<?php
	session_start();
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Modelo.php");
	
	$oMod           = new Modelo();
	$accion 	    = $_POST['accion'];
	$idAsociados    = $_POST['idAsociados'];
	$ordenAsociados	= $_POST['ordenAsociados'];

	
	function fnOrdenAsociados( $idAsociado, $ordenAsociado )
	{
		global $oMod;
		foreach($idAsociado as $key => $id){
			$oMod->fnActualizaOrdenAsociado($id, $ordenAsociado[$key]);
		}
		return "OK";
	}
	
	if($estatus == 1) $estatus = '0';
	else
		$estatus = '1';
	
	
	
	switch( $accion ){
		case 'eliminar':
			$oMod->fnEliminarSociados( $idAsociados );
		break;
		case 'guardarOrden':
   			$ordenAsociados = $_POST['ordenAsociados'];
			fnOrdenAsociados( $idAsociados, $ordenAsociados );
		break;
	}
	
	echo json_encode( array("success"=>"OK"));
	
?>
