<?php
	include_once("../php/Funciones.php");
	include_once("../php/Modelo.php");

	$oMod = new Modelo();
	$oFun = new Funciones();
	
	function fnTemplateAsociados(  ){
		global $oMod;


		$infoSociados = $oMod->fnListAsociados( );
		if(!empty( $infoSociados )){
			$cont  = 0;
			foreach($infoSociados as $key =>$info){

				$template .= '
					<li>
					  	<span class="img_asoc"><img src="../../img/asociados/'.$info['img'].'" /></span>
			  			<span class="cont_ord">
			  				<input type="text" id="'.$info['id'].'" name="order_asoc[]" class="asoc asociados_orden" maxlength="2" value="'.$info['orden'].'" />
						
			  			</span>	
						<span class="fakecheck"></span>
						<a href="javascript:void(0)" class="del_asociado">Eliminar</a>
					</li>';
				$cont++;	
			}
		}
		
		return $template;				

	}

	 function fnTemplateNuevoAsociado(){
	 		$template = '<div class="asociado_fill">
				<div class="left mr"><br>
					<span class="indications">Imágen .jpg ó .png</span>
					<div class="img_loaded" style="margin-top:0;" id="img_loaded_asociados"><img src="" /></div>
					<div class="path" id="path_asociados">ruta del archivo</div>
					<div class="cont_r">
						<input type="hidden" name="" value=""/>
						<input type="file" name="imagenAsociado" id="imagenAsociado" class="file_upload_1 " />
						<a href="javascript:void(0)" class="btn_cargar">Cargar</a>
					</div>
					<button type="button" class="save_btn" id="guardar_asociados_n" onclick="guardarAsociados( this );">Guardar</button>
				</div>
				
			</div>';

		return $template;	
	 }
?>	