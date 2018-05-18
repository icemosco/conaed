<?php
	session_start();
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Funciones.php");
	include_once("../php/Usuario.php");
	include_once("../php/Modelo.php");
	
	
	$oFun 		  = new Funciones();
	$oMod 		  = new Modelo();
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
    		    $_SESSION['imgPerfil'] = $imageNueva;
    		    //Guardamos la imagen
    		    $oUsr->fnGuardarImgUsuario( $usuario, $imageNueva  );
    		    
    		}
		break;
		
		case 'imagen_Asociado':
				$srcImg = $_FILES['file'];
				if (!empty($srcImg)) {	
					$newSizeW = 300;
					$newSizeH = 200;
					$msgArch = $oFun->guardarArchivos( $folderAsociados, $srcImg, $newSizeW, $newSizeH );
					
					if($msgArch == "OK"){ 
						$nomImgen  = $oFun->getnameArch();}
					else{
						$error = "Hubo un problema con la imagen";
					} 
					
					if(empty($error)){
						$oMod->fnInsertaAsociados( $nomImgen );
						$imageNueva = 'OK';
					}
					echo $error;
				}	
			
			break;
	}
	
	echo json_encode( array("imagenResize" => $imageNueva ));
?>