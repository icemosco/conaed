<?php
	session_start();
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Modelo.php");
	
	$oMod           = new Modelo();

	function fnGuardarSlide( $id, $idSlide, $titulo, $subTitulo, $numSlide, $folderSlider, $fileImgSlide )
	{
		global $oMod, $oFun;
		//Guardamos la imagen 
		$nomImgSlide = '';
		$error		 = '';

		if(isset($fileImgSlide['name'][$id]) && !empty($fileImgSlide['name'][$id])){

			$infoImg = array( 'name' => $fileImgSlide['name'][$id]
							, 'type' => $fileImgSlide['type'][$id]
							, 'tmp_name' => $fileImgSlide['tmp_name'][$id]
							, 'error' =>  $fileImgSlide['error'][$id]
							, 'size' =>$fileImgSlide['size'][$id]);	
			$newSizeW = 1366;
			$newSizeH = 620;
			$msgArch = $oFun->guardarArchivos($folderSlider, $infoImg, $newSizeW, $newSizeH );

			if($msgArch == "OK"){ 
				$nomImgSlide  = $oFun->getnameArch();}
			else{
				$error = "Hubo un problema con la imagen";
			} 
		}

		if(empty($error)){
			$nomImagen = (!empty($nomImgSlide) ? $nomImgSlide : '');
			if( empty($idSlide )){
				$id = $oMod->fnInsertaSlide( $numSlide, $titulo, $subTitulo, $nomImagen);
			}else{
				$id = $oMod->fnActualizaSlide( $idSlide, $numSlide, $titulo, $subTitulo, $nomImagen);
			}	
		}
		return $error;
	}


	if(isset($_POST['guardar_slider'])){
		$idSlide   = $_POST['idSlide'];
		$msgErr    = '';
		$mostrarMsgSlider = '';		
		
		foreach( $idSlide as $key => $info){
			$msgErr .= fnGuardarSlide( $key, $idSlide[ $key ]
								, $_POST['titulo'][ $key ]
								, $_POST['subtitulo'][ $key ]
								, $_POST['num_slider'][ $key ]
								, $folderSlider
								, $_FILES['imagenSlider'] );
		}
		if(empty($msgErr))
			$mostrarMsgSlider = 'Se ha guardado la información';		
	}
	if(empty($mostrarMsgSlider)) $mostrarMsgSlider = 'OK';	
	
	echo json_encode( array("success"=>$mostrarMsgSlider));
	
?>
