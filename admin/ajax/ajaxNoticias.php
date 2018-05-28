<?php
	session_start();
	
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Modelo.php");
	include_once("../php/Funciones.php");
	
	$oMod       = new Modelo();
	$oFun 		= new Funciones();

	function fnGuardarNoticia( $id, $titulo,$contenido, $folderNoticias, $fileImgNoticia, $idNoticia = '' )
		
	{
		global $oMod, $oFun;
		//Guardamos la imagen 
		$nomImgNoticia = '';
		$error		   = '';

		if(isset($fileImgNoticia['name'][$id]) && !empty($fileImgNoticia['name'][$id])){

			$infoImg = array( 'name' => $fileImgNoticia['name'][$id]
							, 'type' => $fileImgNoticia['type'][$id]
							, 'tmp_name' => $fileImgNoticia['tmp_name'][$id]
							, 'error' =>  $fileImgNoticia['error'][$id]
							, 'size' =>$fileImgNoticia['size'][$id]);	
			$newSizeW = 820;
			$newSizeH = 327;
			$msgArch = $oFun->guardarArchivos( $folderNoticias, $infoImg, $newSizeW, $newSizeH );

			if($msgArch == "OK"){ 
				$nomImgNoticia  = $oFun->getnameArch();}
			else{
				$error = "Hubo un problema con la imagen";
			} 
		}

		if(empty($error)){
			$nomImagen = (!empty($nomImgNoticia) ? $nomImgNoticia : '');
			if( empty($idNoticia )){
				$id = $oMod->fnInsertaNotica(  $titulo, $contenido, $nomImagen);
			}else{
				$id = $oMod->fnActualizaNoticia( $idNoticia,  $titulo, $contenido, $nomImagen);
			}	
		}
		return $error;
	}


	if(isset($_POST['accion']) &&  $_POST['accion'] == 'eliminar'){
		$idNoticia = $_POST['id'];
		$msg = $oMod->fnEliminarNoticia ( $idNoticia );
	}
	else{
		if(isset($_POST['idNoticia'])){
			$idNoticia = $_POST['idNoticia'];
			$msgErr    = '';
			
			foreach( $idNoticia as $key => $info){
				$msgErr .= fnGuardarNoticia( $key
									, $_POST['titulo'][ $key ]
									, $_POST['contenido'][ $key ]
									, $folderNoticias
									, $_FILES['imagenNoticia']
									, $idNoticia[ $key ] );
			}
			
		}
	}	
	
	echo json_encode( array("success"=>"OK"));
	
?>
