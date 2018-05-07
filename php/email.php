<?php

//$motivo = strip_tags($_POST['motivo']);
$nombre = strip_tags($_POST['nombre']);
$email = strip_tags($_POST['email']);
$telefono = strip_tags($_POST['telefono_fijo']);
$telefono_m = strip_tags($_POST['telefono_movil']);
$empresa = strip_tags($_POST['empresa']);
$asunto_int = strip_tags($_POST['asunto']);

$email_destino="conaed@gmail.com";
if(isset($_POST['g-recaptcha-response'])){
        $captcha=$_POST['g-recaptcha-response'];
        
    }if(!$captcha){
          echo '<a href="javascript:void(0)" onClick="close_()" class="close_contacto">Cerrar</a>';
          echo '<div class="answer">Por favor selecciona "i\'m not a robot"</div>';
          exit;
        }
        $secretKey = "6LcU61YUAAAAAFAxqct1AMVJiuxQgXxu0wBADlif";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        } else{

//ini_set("SMTP","mail.google.com");
//ini_set("smtp_port",25);
ini_set("sendmail_from","conaed@gmail.com");
$asunto = "Correo enviado desde sito web CONAED";
$para = $email_destino; 
   //Cuerpo
   $contenido = "<html><center><body>";
   $contenido .="<div style='width:70%; margin:0 auto;text-align:center; font-size:1em; color:#000;display:block;height:auto; padding:3% 0;background-color:#CCC;overflow:hidden;'>
            <span style='width:100%;float:left;padding:3px 0;'>Haz recibido un nuevo registro desde la pagina web</span>
            <span style='width:100%;float:left;font-weight:bold'>Nombre: ".$nombre."</span>
            <span style='width:100%;float:left;font-weight:bold'>Correo: ".$email."</span>
            <span style='width:100%;float:left;font-weight:bold'>Télefono fijo: ".$telefono."</span>
            <span style='width:100%;float:left;font-weight:bold'>Télefono móvil: ".$telefono_m."</span>
            <span style='width:100%;float:left;font-weight:bold'>Empresa / Universidad: ".$empresa."</span>
            <span style='width:100%;float:left;font-weight:bold'>Asunto: ".$asunto_int."</span>
            </body></center>
          </html>";
   //Cabecera
   $cabecera = "From: $nombre <conaed@gmail.com>\r\n"; //Remitente
    // $cabecera .= "Bcc: contacto@gmail.com\r\n"; //Copia oculta
   $cabecera .= "Content-type: text/html; charset=UTF-8\r\n";
                 
   // Enviar mail
  $resultado= mail($para, $asunto, $contenido, $cabecera);
  if($resultado){
                echo '<a href="javascript:void(0)" class="close_contacto">Cerrar</a>';
                echo '<div class="answer">El mail ha sido enviado correctamente</div>';
    
  }else{
    echo '<a href="javascript:void(0)" onClick="close_()" class="close_contacto">Cerrar</a>';
    echo '<div class="answer">Ocurrió un problema al enviar el mail, intenta mas tarde por favor</div>';
  }
}
?>


