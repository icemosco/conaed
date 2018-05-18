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

	function emailValido($email)
	{ 
	    if (!ereg("^([a-zA-Z0-9._]+)@([a-zA-Z0-9.-]+).([a-zA-Z]{2,4})$",$email)){ 
	       return false; 
	    } else { 
	        return true; 
	    } 
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
  	
  	
  	function redimensionar_imagen($nombreimg, $extension, $rutaimg, $xmax, $ymax){  
      
      	$extension = strtolower($extension);
      
        if($extension == "jpg" || $extension == "jpeg")  
            $imagen = imagecreatefromjpeg($rutaimg);  
        elseif($extension == "png")  
            $imagen = imagecreatefrompng($rutaimg);  
        elseif($extension == "gif")  
            $imagen = imagecreatefromgif($rutaimg);  
        
        $x = imagesx($imagen);  
	    $y = imagesy($imagen);  
        
         //redimensionamos con el ancho y largo proporcionado
	    $img2 = imagecreatetruecolor($xmax, $ymax);
	    imagecopyresized($img2, $imagen, 0, 0, 0, 0, $xmax, $ymax, $x, $y);   
        
        imagejpeg($img2, $rutaimg);

        return $img2;   
    }
  	
	
	
	//guarda los archivos en la carpeta indicada
	function guardarArchivos( $carpeta, $infoFile, $newSizeW = "", $newSizeH = "" )
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
		$date 	  = date_create();
	    $archivo  = date_timestamp_get($date).rand(1,3000).".".$ext;
			
		$this->setnameArch($archivo);
	    $movido = move_uploaded_file($tmp_name, $carpeta.$archivo);
	
	    if(!$movido) return "error";
	    
	    if(!empty($newSizeW) && !empty($newSizeH)){
	       $this->redimensionar_imagen($archivo, $ext, $carpeta.$archivo, $newSizeW, $newSizeH);
	    }   	
			
	 	  return "OK";
	}
	
	//Paginador
	function Paginador($numPagina, $totalPaginas, $var ){
		$paginador = "";
		
		if(($numPagina-1) >= 1) 
			$paginador = '<li class="radius-left"><a href="./home.php?'.$var.'='.($numPagina-1).'">Anterior</a></li>';
		for($i = 1; $totalPaginas >= $i; $i++){
			$stylePag = ""; 
			if( $numPagina == $i) $stylePag = "style='color:red'";
					
			$paginador .= '<li><a href="./home.php?'.$var.'='.$i.'" class="number_link" '.$stylePag.'>'.$i .'</a></li>';
		}
		if(($numPagina+1) <= $totalPaginas) 
			$paginador .=  '<li class="radius-right"><a href="./home.php?'.$var.'='.($numPagina+1).'">Siguiente</a></li>';
		
		return $paginador;	
		
	}
	
}	
?>		
