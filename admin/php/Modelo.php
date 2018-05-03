<?php
	
class Modelo extends DbConnect 
{
	public function __construct()
	{	 
    	parent::__construct();  
  	}
  	
	function fnGuardarSlide( $numSlide, $titulo, $subTitulo, $nomImagen, $idSlide = "" )
	{
		if( empty($idSlide )){
			$sql  = "INSERT INTO slider(titulo, subtitulo, orden, img)
					VALUES('".$titulo."','".$subTitulo."',".$numSlide.",'".$nomImagen."')";	
			$res  = $this->query($sql) or 
		   			die("Error en query insertar slider ". $this->errno());
		   	
		   	$id   = $this->insert_id();		
		}
		
	}
}	
?>	
