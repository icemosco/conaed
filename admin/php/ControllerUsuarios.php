<?php
	include_once("../php/Funciones.php");
	include_once("../php/Modelo.php");

	$oMod = new Modelo();
	$oFun = new Funciones();
	
	function fnTemplateUsuarios(){
		global $oMod;
		
		$infoUsuarios = $Mod->fnListadoUsuarios();

		if(!empty( $infoUsuarios )){
			
			$cont  = 1;
			foreach($infoAcreditado as $key =>$info){
				$clase = "";	
				if(($cont%2)==0){ $clase ='class="clr2"'; }
				
				$template .= '';
				$cont++;		
			}
		}				
		return $template;
		
	}	
?>	
	