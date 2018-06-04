<?php
include_once("../php/config.php");
include_once("../php/DbConnect.php");
$email=$_POST['email'];
//echo $email;
$oCnx = new DbConnect();
	$sql  = $sql  = "SELECT * FROM usuario WHERE email='".$email."'";
	$regs = $oCnx->query($sql) or die( "Error en usuario ". $oCnx->errno() );
	//echo count($regs);
	$info = $regs->fetch_array( MYSQLI_ASSOC );
		//echo $sql;
if( count( $info ) > 0 ){
ini_set("sendmail_from","conaed@gmail.com");
$asunto = "Restablece tu contraseña";
$para = $email; 
   //Cuerpo
   $contenido = "<html><center><body>";
   $contenido .="<div style='width:90%; margin:0 auto;text-align:center; font-size:1em; color:#000;display:block;height:auto; padding:3% 0;background-color:#CCC;overflow:hidden;'>
            <span style='width:100%;float:left;padding:3px 0;'>Restablece tu contraseña</span>
			<span style='width:100%;float:left;padding:3px 0;margin-bottom:30px;'>Porfavor da Clic en el siguiente link para reestablecer tu contraseña</span>
            <span style='width:100%;float:left;font-weight:bold'>http://www.conaed.org.mx/admin/resetpwd.php?email=".$email."</span>
            </body></center>
          </html>";
   //Cabecera
   $cabecera = "From: Admin Conaed <conaed@gmail.com>\r\n"; //Rem1itente
    // $cabecera .= "Bcc: contacto@gmail.com\r\n"; //Copia oculta
   $cabecera .= "Content-type: text/html; charset=UTF-8\r\n";
                 
   // Enviar mail
  $resultado= mail($para, $asunto, $contenido, $cabecera);
if($resultado){
               
      echo 'Se ha enviado un correo a <strong>'.$email.'</strong>, sigue las instrucciones para reestablecer tu contraseña';
    
  }
}else{
  
    echo '<span style="color:#0F0;>El correo ingresado no existe en la base de datos</span> ';
  }
		

		
		
	
			 
		
	
 



?>


