<?php
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Modelo.php");
	
	$oMod         = new Modelo();
	$accion 	  = $_POST['accion'];
	$idAcreditado = $_POST['id'];
	$estatus      = $_POST['estatus'];
	
	if($estatus == 1) $estatus = '0';
	else
		$estatus = '1';
	
	switch( $accion ){
		case 'desactivar':
			$oMod->fnDesactivarAcreditados( $idAcreditado, $estatus );
		break;
	}
	
	echo json_encode( array("success"=>"OK"));
	
?>
