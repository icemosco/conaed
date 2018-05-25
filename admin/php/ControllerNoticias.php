<?php
include_once("../php/Funciones.php");
include_once("../php/Modelo.php");

	$oMod = new Modelo();


	function fnTemplateNoticias( $numPagina ){
		global $oMod, $oFun;
		
		$totalRegXpag    = 15; 

		//Obtenemos todos los registros
		$totalRegistros  = count($oMod->fnListNoticias());	
		$totalPaginas    = ceil( $totalRegistros / $totalRegXpag );
		$empezarDesde    = ($numPagina-1) * $totalRegXpag;
		$template        = '';
		$infoNoticias = $oMod->fnListNoticias( $empezarDesde, $totalRegXpag);
		if(!empty( $infoNoticias )){
			$cont  = ($empezarDesde+1);
			$i     = 0;
			foreach($infoNoticias as $key =>$info){
				$clase = "";	
				if(($cont%2)==0){ $clase ='class="clr2"'; }

				$template .= '<li '.$clase.'>
						<span class="num_id">'.$cont.'</span>
						<span class="nom_uni">'.$info["titulo"].'</span>
						<a href="javascript:void(0)" class="edit_tema edit_int funct">editar</a>
						<input type="hidden" name="idNoticia[]" id="idNoticia_'.$i.'" value="'.$info["id"].'"/> 
						<a href="javascript:void(0)" class="delete_tema del_int funct">Eliminar</a>

					</li>
					<li>
						<div class="new_tema">
							<ul>
								<li class="close_edit"><a class="close_edit_btn" href="javascript:void(0)">X</a></li>
								<div class="temas_fill">
									<div class="left mr">
										<span class="indications">Imágen .jpg ó .png</span>
										<div class="img_loaded" id="img_noticia_'.$i.'" style="margin-top:0;"><img src="../../img/temas/'.$info["img"].'"></div>
										<div class="path" id="ruta_archivo_'.$i.'">ruta del archivo</div>
										<div class="cont_r">
											<input type="hidden" name="nombreNoticiaImg[]" id="nombreNoticiaImg_'.$i.'" value="'.$info["img"].'"/>
											<input type="file" name="imagenNoticia[]" id="imagenNoticia_'.$i.'" class="file_upload_2 requeridoNoticia">
											<a href="javascript:void(0)" class="btn_cargar">Cargar</a>
										</div><!--cont_r-->
									</div><!--left-->
								<div class="right">
									<div class="sub_text_cont">
										<textarea name="titulo[]" id="titulo_'.$i.'" class="infoNoticia requeridoNoticia" maxlength="200" placeholder="Titulo del Tema">'.$info["titulo"].'</textarea>
									</div>
									<div class="sub_text_cont">
										<textarea name="contenido[]" id="contenido_'.$i.'" class="infoNoticia requeridoNoticia" maxlength="" placeholder="Nota completa del Tema">'.$info["contenido"].'</textarea>
									</div>
								</div><!--right-->
								<button type="button"  class="save_btn" name="guardar_noticia" id="guardar_noticia_'.$i.'" onclick="guardarNoticias(this, '.$i.');">Guardar</button>
							</ul>
						</div>
					</li>';
				$cont++;		
				$i++;	
			}
		}		

		$paginador = $oFun->Paginador($numPagina, $totalPaginas, 'npn');
		
		return array( 'template' => $template, 'paginador' => $paginador);
		
	}


	function fnTemplateNuevasNoticias(){
		$template = '
			<div class="temas_fill">
				<div class="left mr">
					<span class="indications">Imágen .jpg ó .png</span>
					<div class="img_loaded" id="img_noticia_n" style="margin-top:0;"><img src="../../img/temas/pic.png"></div>
					<div class="path" id="ruta_archivo_n">Ruta del archivo</div>
					<div class="cont_r">
					    <input type="hidden" name="nombreNoticiaImg[]" id="nombreNoticiaImg_n" value=""/>
						<input type="file" name="imagenNoticia[]" id="imagenNoticia_n" class="file_upload_2 requeridoNoticia">
						<a href="javascript:void(0)" class="btn_cargar">Cargar</a>
					</div><!--cont_r-->
				</div><!--left-->
				<div class="right">
					<div class="sub_text_cont">
						<textarea name="titulo[]" id="titulo_n" class="infoNoticia requeridoNoticia" maxlength="200" placeholder="Titulo del Tema"></textarea>
					</div>
					<div class="sub_text_cont">
						<textarea name="contenido[]" id="contenido_n" class="infoNoticia requeridoNoticia" maxlength="" placeholder="Nota completa del Tema"></textarea>
					</div>
				</div><!--right-->
				<input type="hidden" name="idNoticia[]" id="idNoticia_N" value=""/> 
				<button type="button"  class="save_btn" name="guardar_noticia" id="" id="guardar_noticia_n" onclick="guardarNoticias(this, \'n\');">Guardar</button>
					</ul>
			</div>';

		return $template;
	}

?>
