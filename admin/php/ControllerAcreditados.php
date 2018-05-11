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
				
				$template .= '<li '.$clase.'>
							<span class="num_id">'.$cont.'</span>
							<span class="nom_uni">'.$info["nombre_uni"].'</span>
							<a href="javascript:void(0)" class="disable funct">disable</a>
							<a href="javascript:void(0)" class="camb funct">editar</a>
						</li>
						<li>
							<div class="new_programa">
								<ul>
									<li>
										<label>Universidad o Institucion Educativa:</label>
										<input type="text" name="nombre_uni[]" max-lenght="500" value="'.$info["nombre_uni"].'" class="" required="required" placeholder="">
									</li>
									<li>
										<label>Página Web:</label>
										<input type="text" name="pagina_web[]" max-lenght="500" value="'.$info["website"].'" class="" required="required" placeholder="http:// ó https://">
									</li>
								</ul>
								<ul>
									<li>
										<label>Vigencia desde:</label>
										<input type="text" name="vigencia_ini[]" max-lenght="100" value="'.$info["vigencia_ini"].'" id="datepickerini" required="required" placeholder="">
									</li>
									<li>
										<label>Vigencia hasta:</label>
										<input type="text" name="vigencia_fin[]" max-lenght="100"  value="'.$info["vigencia_fin"].'" id="datepickerfin" required="required" placeholder="">
										<input type="hidden" name="idAcreditado[]" value="'.$info["id_universidad"].'"/> 
									</li>
								</ul>
							</div>
						</li>';
				$cont++;		
			}
		}				
		return $template;
	}	
	
?>	