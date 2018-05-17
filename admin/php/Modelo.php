<?php
session_start();	
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
	
	function fnListAcreditados( $empezarDesde = '', $cantidadReg = ''){
		
		$limit = (!empty($cantidadReg) ? "LIMIT {$empezarDesde}, {$cantidadReg} " : '');
		
		$sql   = "SELECT * FROM programas_1 ORDER BY nombre_uni $limit";
		$res   = $this->query($sql) or die( "Error en la Acreditados ". $oCnx->errno() );
		$regs  = $res->num_rows;
	    if( $regs != 0 ){
		   while( $info = $res->fetch_array( MYSQLI_ASSOC ) ){	
		   		$infoAcreditados[] =  $info;
		   }
		}
		
		return $infoAcreditados;
	}
	
	
	function fnInsertaAcreditados( $nombreUni, $paginaWeb, $fechaIni, $fechaFin ){
		$sql  = "INSERT INTO programas_1(nombre_uni, website, vigencia_ini, vigencia_fin)
					VALUES('".$nombreUni."','".$paginaWeb."',STR_TO_DATE('".$fechaIni."', '%d-%m-%Y'),STR_TO_DATE('".$fechaFin."', '%d-%m-%Y'))";	
		$res  = $this->query($sql) or 
		   			die("Error en query insertar acreditados ". $this->errno());
		   	
		 $id   = $this->insert_id();	
		 return $id;
	}
	
	function fnActualizaAcreditados( $idAcreditado, $nombreUni, $paginaWeb, $fechaIni, $fechaFin)
	{
		$sql = "UPDATE programas_1 SET nombre_uni    = '{$nombreUni}'
									, website        = '{$paginaWeb}'
									, vigencia_ini   = STR_TO_DATE('".$fechaIni."', '%d-%m-%Y')
									, vigencia_fin   = STR_TO_DATE('".$fechaFin."', '%d-%m-%Y')
						WHERE id_universidad = {$idAcreditado}";				
		$res  = $this->query($sql);		
		return $idAcreditado;	
	}
	
	function fnEliminarAcreditados( $idAcreditado ){
		$sql = "DELETE FROM programas_1 WHERE id_universidad = {$idAcreditado}";
		$this->query($sql);		
		
		return "OK";		
	}
	
	function fnListEvaluadores( $empezarDesde = '', $cantidadReg = '' ){
		$limit = (!empty($cantidadReg) ? "LIMIT {$empezarDesde}, {$cantidadReg} " : '');
		
		$sql   = "SELECT * FROM evaluadores ORDER BY a_paterno ".$limit;
		$res   = $this->query($sql) or die( "Error en evaluadores ". $oCnx->errno() );
		$regs  = $res->num_rows;
	    if( $regs != 0 ){
		   while( $info = $res->fetch_array( MYSQLI_ASSOC ) ){	
		   		$infoEvaluadores[] =  $info;
		   }
		}
		
		return $infoEvaluadores;
	}

	function fnInsertaEvaluadores( $nombre, $paterno, $materno ){
		global $_SESSION;
		$sql  = "INSERT INTO evaluadores(nombre, a_paterno, a_materno, last_update, by_user)
					VALUES('".$nombre."','".$paterno."','".$materno."',NOW(),'".$_SESSION['usrName']."')";	
		$res  = $this->query($sql) or 
		   			die("Error en query insertar acreditados ". $this->errno());
		   	
		 $id   = $this->insert_id();	
		 return $id;
	}
	
	function fnActualizaEvaluadores( $idEvaluador, $nombre, $paterno, $materno )
	{
		$sql = "UPDATE evaluadores SET nombre         = '{$nombre}'
									  , a_paterno       = '{$paterno}'
									  , a_materno       = '{$materno}'
									  , last_update   = NOW()
									  , by_user       = '".$_SESSION['usrName']."'
						WHERE id_evaluador = {$idEvaluador}";				
		$res  = $this->query($sql);		
		return $idAcreditado;	
	}
	
	function fnEliminarEvaluadores( $idEvaluador ){
		$sql = "DELETE FROM evaluadores WHERE id_evaluador = {$idEvaluador}";
		$this->query($sql);		
		
		return "OK";		
	}
}	
?>	