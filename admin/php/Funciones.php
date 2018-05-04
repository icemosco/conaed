<?php
	
class Funciones
{
	
	/*
	 * @var string nombre del archivo
	 * que se ha subido al sistema
  	 */
    private $nameArch;
    
	
	function getnameArch() 
	{
		return $this->nameArch;
	}
	
	function setnameArch($val) 
	{
		 $this->nameArch = $val;
	}
	
	//Generamos un password aleatorio
	function randomPassword()
	{
		$longitud = 8;
		$carac = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$pwd = '';
		for ($i=0; $i<$longitud; ++$i){ 
			  $pwd .= substr($carac, (mt_rand() % strlen($carac)), 1);
		}	 
	    return trim($pwd);
	}
	
	
	function extensionArch($str)
    {
	    $pos = strripos($str,".");
	    if($pos === false){
		  $ext =  "error";
	    }else{
		  $ext   = substr($str,($pos+1));
	    }
	    $ext = strtolower($ext);
	    return $ext;
  	} 
	
	
	//guarda los archivos en la carpeta indicada
	function guardarArchivos($carpeta, $infoFile)
	{
		//verificamos si no hay error de tamaño en el archivo
		if($infoFile["error"] == 2)
		{
			return "error";
		}
		    
		//verificamos si no hay error de tamaño en el archivo
		if($infoFile["error"] == 4)
		{
			  return "error";
		}
				
		$ext = $this->extensionArch($infoFile["name"]);
	    $tmp_name = $infoFile["tmp_name"];
		//generamos un nombre nuevo
		$date = date_create();
	    $archivo  = date_timestamp_get($date).rand(1,3000).".".$ext;
			
		$this->setnameArch($archivo);
	    $movido = move_uploaded_file($tmp_name, "$carpeta/$archivo");
	
	    if(!$movido) return "error";
		   	
			
	 	  return "OK";
	}
	
}	
?>		
