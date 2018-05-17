<?php
	session_start();
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Modelo.php");
	
	$oMod         = new Modelo();
	$accion 	  = $_POST['accion'];
	$srcImg		  = $_POST['file']; 


	switch ( $accion ) {
		case 'imagen_perfil':
			if (isset($_POST['file'])) {
    		    $datos = base64_decode(
    		     	 preg_replace('/^[^,]*,/', '', $_POST['file']);
    		    );
    		    
    		    $nombreArchivo = rand(1,3000).strtotime(date('Y-m-d H:i:m'));
    		    
    		    file_put_contents($folderPerfilUsu.$nombreArchivo.'.png', $datos);
    		    
    		    echo trim($folderPerfilUsu.$nombreArchivo.'.png');
    		}
		break;
		
		default:
			# code...
			break;
	}
?>