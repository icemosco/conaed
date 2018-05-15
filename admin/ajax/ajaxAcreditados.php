<?php
	session_start();
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Modelo.php");
	
	$oMod         = new Modelo();
	$accion 	  = $_POST['accion'];
	$idAcreditado = $_POST['id'];
	$nombre		  =  $_POST['nombre']; 
	$pagina		  =  $_POST['pagina'];
	$fechaI		  =  $_POST['fechaI'];
	$fechaF		  =  $_POST['fechaF'];
	
	function fnGuardarAcreditados( $nombreUni, $paginaWeb, $fechaIni, $fechaFin, $idAcreditado = '' )
	{
		global $oMod;
		$error = '';
		if( empty($idAcreditado )){
			$id = $oMod->fnInsertaAcreditados( $nombreUni, $paginaWeb, $fechaIni, $fechaFin );
		}else{
			$id = $oMod->fnActualizaAcreditados( $idAcreditado, $nombreUni, $paginaWeb, $fechaIni, $fechaFin);
		}	
		
		
		return $error;
	}
	
	if($estatus == 1) $estatus = '0';
	else
		$estatus = '1';
	
	
	
	switch( $accion ){
		case 'desactivar':
			$oMod->fnDesactivarAcreditados( $idAcreditado );
		break;
		case 'guardar':
			fnGuardarAcreditados( $nombre, $pagina, $fechaI, $fechaF, $idAcreditado );
		break;
	}
	
	echo json_encode( array("success"=>"OK"));
	
?>
