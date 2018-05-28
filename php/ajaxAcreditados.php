<?php

	session_start();

	include_once("../admin/php/config.php");
	include_once("../admin/php/DbConnect.php");
	include_once("../admin/php/Modelo.php");	
	include_once("../php/functions.php");
	
	$oMod         = new Modelo();

	$numPagina    =  $_POST['numPagina'];
	$idCategoria  =  $_POST['idCategoria'];
	if($idCategoria == '0') $idCategoria = '';

	$info = programas( $numPagina, $idCategoria );


	//print_r();
	
	echo json_encode( $info );
	
?>
