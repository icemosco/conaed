<?php
include_once("../php/Funciones.php");
include_once("../php/Modelo.php");

	$oMod = new Modelo();


	function fnTemplateNoticias(){
		global $oMod;
		$noticias   = '';
		$imgNoticia = '../../img/noticias/pic.png';
		$template   = '<div class="temas_fill">
				<div class="left mr">
					<span class="indications">Imágen .jpg ó .png</span>
					<div class="img_loaded" style="margin-top:0;" >
						<img src="../../img/noticias/[IMGNOTICIA]"/>
					</div>
					<div class="path">ruta del archivo</div>
					<div class="cont_r">
						<input type="hidden" name="nombreNoticiaImg[]" value="[NOMIMGNOTICIA]"/>
						<input type="file" name="imagenNoticia[]" class="file_upload_2 requeridoNoticia" name="file" />
						<a href="javascript:void(0)" class="btn_cargar">Cargar</a>
					</div><!--cont_r-->
				</div><!--left-->
				
				<div class="right">
					<div class="sub_text_cont">
						<textarea name="titulo_tema[]" class="infoNoticia requeridoNoticia"  maxlength="200" placeholder="Titulo del Tema" >[TITULONOTICIA]</textarea>
					</div>
					
					<div class="sub_text_cont">
						<textarea name="contenido_tema" class="infoNoticia requeridoNoticia" maxlength="" placeholder="Nota completa del Tema">[CONTENIDONOTICIA]</textarea>
					</div>
					
					
				</div><!--right-->
				<input type="hidden" name="idNotica[]" class="idNoticiasCont" value="[IDNOTICIA]"/> 
			</div><!--tema_fill-->';

		$infoNoticia = $oMod->fnBuscaNoticias();	
		if(!empty( $infoNoticia )){
			foreach($infoNoticia as $key =>$info){
				if(empty($info['img'])) $info['img'] = $imgNoticia;
				$tmpl = str_replace("[IMGNOTICIA]", $info['img'], $template);	
				$tmpl = str_replace("[NOMIMGNOTICIA]", $info['img'], $tmpl);	
				$tmpl = str_replace("[TITULONOTICIA]", $info['titulo'], $tmpl);	
				$tmpl = str_replace("[CONTENIDONOTICIA]", $info['contenido'], $tmpl);
				$tmpl = str_replace("[IDNOTICIA]", $info['id'], $tmpl);	

				$noticias .=  $tmpl;
			}
		}else{
			$tmpl = str_replace("[IMGNOTICIA]", $imgNoticia, $template);	
			$tmpl = str_replace("[NOMIMGNOTICIA]", '', $tmpl);	
			$tmpl = str_replace("[TITULONOTICIA]", '', $tmpl);	
			$tmpl = str_replace("[CONTENIDONOTICIA]",'' , $tmpl);
			$tmpl = str_replace("[IDNOTICIA]", '', $tmpl);	
			$noticias  =  $tmpl;
		}

		
		return $noticias;
	}
?>	
