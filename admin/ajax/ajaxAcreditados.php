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
	$anio		  =  $_POST['anio'];
	$categoria    =  $_POST['categoria'];
	
	function fnGuardarAcreditados( $nombreUni, $paginaWeb, $anio, $categoria, $idAcreditado = '' )
	{
		global $oMod;
		$error = '';
		if( empty($idAcreditado )){
			$id = $oMod->fnInsertaAcreditados( $nombreUni, $paginaWeb, $anio, $categoria );
		}else{
			$id = $oMod->fnActualizaAcreditados( $idAcreditado, $nombreUni, $paginaWeb, $anio, $categoria );
		}	
	}
	
	if($estatus == 1) $estatus = '0';
	else
		$estatus = '1';
	
	
	
	switch( $accion ){
		case 'eliminar':
			$oMod->fnEliminarAcreditados( $idAcreditado );
		break;
		case 'guardar':
			fnGuardarAcreditados( $nombre, $pagina, $anio, $categoria, $idAcreditado );
		break;
	}
	
	echo json_encode( array("success"=>"OK"));
	
?>
