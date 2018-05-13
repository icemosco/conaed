<?php
	include_once("../php/Funciones.php");
	include_once("../php/Modelo.php");

	$oMod = new Modelo();
	$oFun = new Funciones();
	
	function fnTemplateAcreditados(){
		global $oMod;
		
		$infoAcreditado = $oMod->fnListAcreditados();	

		
		if(!empty( $infoAcreditado )){
			$cont  = 1;
			foreach($infoAcreditado as $key =>$info){
				$clase = "";	
				if(($cont%2)==0){ $clase ='class="clr2"'; }
				
				if($info['activo'] == 1) $activo = 'disable';
				else
					$activo = 'enable';
					
				$fechaI = 	(!empty($info["vigencia_ini"]) ? date('d-m-Y', strtotime($info["vigencia_ini"])) : '');
				$fechaF = 	(!empty($info["vigencia_fin"]) ? date('d-m-Y', strtotime($info["vigencia_fin"])) : '');
				
				$template .= '<li '.$clase.'>
							<span class="num_id">'.$cont.'</span>
							<span class="nom_uni">'.$info["nombre_uni"].'</span>
							<a href="javascript:void(0)" class="disable_acreditado funct">'.$activo.'</a>
							<input type="hidden" name="idAcreditado[]" id="idAcreditado_'.$cont.'" value="'.$info["id_universidad"].'"/> 
							<input type="hidden" name="statusHabilitado[]" value="'.$info["activo"].'"/> 
							<a href="javascript:void(0)" class="edit_acreditado funct">editar</a>
						</li>
						<li>
							<div class="new_programa">
								<ul>
									<li>
										<label>Universidad o Institución Educativa:</label>
										<input type="text" name="nombre_uni[]" id="nombre_uni_'.$cont.'" max-lenght="500" value="'.$info["nombre_uni"].'" 
												class="requerido"  placeholder="">
									</li>
									<li>
										<label>Página Web:</label>
										<input type="text" name="pagina_web[]" id="pagina_web_'.$cont.'" max-lenght="500" value="'.$info["website"].'" 
												class="requerido" placeholder="http:// ó https://">
									</li>
								</ul>
								<ul>
									<li>
										<label>Vigencia desde:</label>
										<input type="text" name="datepickerinit[]" max-lenght="25"  readonly
										value="'.$fechaI.'" id="datepickerinit_'.$cont.'" class="datepickerinit" placeholder="">
									</li>
									<li>
										<label>Vigencia hasta:</label>
										<input type="text" name="datepickerfinit[]" max-lenght="25"  readonly
										value="'.$fechaF.'" id="datepickerfinit_'.$cont.'"  class="datepickerfinit" placeholder="">
									</li>
								</ul>
								<button type="button" class="save_btn" id="guardar_acreditados_'.$cont.'" onclick="guardarAcreditados(this, '.$cont.');">Guardar</button>
							</div>
						</li>';
				$cont++;		
			}
		}				
		return $template;
	}	
	
?>	