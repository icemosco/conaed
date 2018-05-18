<?php
	session_start();
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Usuario.php");
	
	$oUsr         = new Usuario();
	$accion 	  = $_POST['accion'];
	$srcImg		  = $_POST['file']; 
	$usuario	  = $_SESSION['usrName'];   


	switch ( $accion ) {
		case 'imagen_perfil':
			if (isset($_POST['file'])) {
    		    $datos = base64_decode(preg_replace('/^[^,]*,/', '', $_POST['file']));
    		    $nombreArchivo = rand(1,3000).strtotime(date('Y-m-d H:i:m'));
    		    file_put_contents($folderPerfilUsu.$nombreArchivo.'.png', $datos);
    		    
    		    $imageNueva =  trim( $nombreArchivo.'.png' );
    		    //Guardamos la imagen
    		    $oUsr->fnGuardarImgUsuario( $usuario, $imageNueva  );
    		    
    		}
		break;
		
		default:
			# code...
			break;
	}
	
	echo json_encode( array("imagenResize" => $imageNueva ));
?>