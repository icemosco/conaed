<?php
include_once("../php/Funciones.php");
include_once("../php/Modelo.php");

	$oMod = new Modelo();
	$oFun = new Funciones();


	function fnTemplateSlide(){
		global $oMod;
		$slider    = '';
		$imgSlider = '../../img/slider/img_1.png';
		$template  = '<div class="slider_fill">
				<span class="title_sl oxygenlight">Slider [NUMSLIDE]</span>
				
				<div class="left mr">
					<span class="indications">Imágen .jpg ó .png</span>
					<input type="text" class="order_box_s requeridoSlider" name="num_slider[]"  size="2" maxlength="1" value="[NUMSLIDE]" style="width: 5%"/> 
					<div class="img_loaded" ><img src="../../img/slider/[IMAGENSLIDE]"/></div>
					<div class="path">ruta del archivo</div>
					<div class="cont_r">
						<input type="hidden" name="nombreSlideImg[]" value="[NOMIMGSLIDE]"/>
						<input type="file" name="imagenSlider[]" class="file_upload requeridoSlider" name="file" />
						<a href="javascript:void(0)" class="btn_cargar">Cargar</a>
					</div><!--cont_r-->
				</div><!--left-->
				
				<div class="right">
					<div class="sub_text_cont">
						<span class="">Titulo (100 caracteres máx) *</span>
						<span class="conteo_char">[CARCTITULO] caracteres</span>
						<textarea name="titulo[]" class="infoSlide requeridoSlider"  maxlength="100" >[TITULO]</textarea>
					</div>
					
					<div class="sub_text_cont">
						<span class="">Subtitulo (225 caracteres máx) *</span>
						<span class="conteo_char">[CARCSUBTITULO] caracteres</span>
						<textarea name="subtitulo[]" class="infoSlide requeridoSlider" maxlength="225">[SUBTITULO]</textarea>
					</div>
					
				</div>
				<input type="hidden" name="idSlide[]" value="[IDSLIDE]"/> 	
			</div><!--slider_fill-->';

		$infoSlide = $oMod->fnBuscaSlide();	
		if(!empty( $infoSlide )){
			foreach($infoSlide as $key =>$info){
				if(empty($info['img'])) $info['img'] = $imgSlider;

				$tmpl = str_replace("[NUMSLIDE]", $info['orden'], $template);	
				$tmpl = str_replace("[IMAGENSLIDE]", $info['img'], $tmpl);	
				$tmpl = str_replace("[NOMIMGSLIDE]", $info['img'], $tmpl);	
				$tmpl = str_replace("[TITULO]", $info['titulo'], $tmpl);
				$tmpl = str_replace("[CARCTITULO]", strlen ($info['titulo']), $tmpl);	
				$tmpl = str_replace("[SUBTITULO]", $info['subtitulo'], $tmpl);	
				$tmpl = str_replace("[CARCSUBTITULO]", strlen ($info['subtitulo']), $tmpl);	
				$tmpl = str_replace("[IDSLIDE]", $info['id'], $tmpl);	

				$slider .=  $tmpl;
			}
		}else{
			$tmpl = str_replace("[NUMSLIDE]", '1', $template);	
			$tmpl = str_replace("[IMAGENSLIDE]", $imgSlider, $tmpl);
			$tmpl = str_replace("[NOMIMGSLIDE]", '', $tmpl);	
			$tmpl = str_replace("[TITULO]", '', $tmpl);	
			$tmpl = str_replace("[CARCTITULO]", 0, $tmpl);	
			$tmpl = str_replace("[SUBTITULO]", '', $tmpl);	
			$tmpl = str_replace("[CARCSUBTITULO]", 0, $tmpl);	
			$tmpl = str_replace("[IDSLIDE]", '', $tmpl);	
			$slider   =  $tmpl;
		}


		return $slider;
	}


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
	
?>
