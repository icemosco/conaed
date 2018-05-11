<?php
	
class Modelo extends DbConnect 
{
	public function __construct()
	{	 
    	parent::__construct();  
  	}


  	function fnBuscaSlide(){
  		$infoSlider = array();

  		$sql   = "SELECT * FROM slider ORDER BY orden";
  		$res   = $this->query($sql) or die( "Error en la universidad ". $oCnx->errno() );
		$regs  = $res->num_rows;
		
	    if( $regs != 0 ){
		   while( $info = $res->fetch_array( MYSQLI_ASSOC ) ){	
		   		$infoSlider[] =  $info;
		   }
		}
		return $infoSlider;
  	}
  	
	function fnInsertaSlide( $numSlide, $titulo, $subTitulo, $nomImagen)
	{
		$sql  = "INSERT INTO slider(titulo, subtitulo, orden, img)
					 VALUES('".$titulo."','".$subTitulo."',".$numSlide.",'".$nomImagen."')";	
		$res  = $this->query($sql) or 
		   			die("Error en query insertar slider ". $this->errno());
		   	
		 $id   = $this->insert_id();	
		 return $id;	
		
	}

	function fnActualizaSlide( $idSlide, $numSlide, $titulo, $subTitulo, $nomImagen)
	{
		$extra = '';
		if(!empty($nomImagen)) $extra = ", img = '".$nomImagen."'";

		$sql = "UPDATE slider SET titulo    = '{$titulo}'
									, subtitulo = '{$subTitulo}'
									, orden     = '{$numSlide}' 
									{$extra}
						WHERE id= {$idSlide}";
		$res  = $this->query($sql);		
		return $idSlide;	
	}
	
	function fnListAcreditados( ){
		
		$sql   = "SELECT * FROM programas_1";
		$res   = $this->query($sql) or die( "Error en la Acreditados ". $oCnx->errno() );
		$regs  = $res->num_rows;
	    if( $regs != 0 ){
		   while( $info = $res->fetch_array( MYSQLI_ASSOC ) ){	
		   		$infoAcreditados[] =  $info;
		   }
		}
		
		return $infoAcreditados;
		
	}
}	
?>	
