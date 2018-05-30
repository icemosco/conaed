<?php
	date_default_timezone_set('America/Mexico_City');
	
class Usuario extends DbConnect 
{
	/*
  * @var string Usuario
  */
  private $usr;
  
  /*
  * @var string password Usuario
  */
  private $pwd;
  
  /*
  * @var string Nombre usuario
  */
  private $nomUsr;
  
  /*
  * @var string Status usuario
  */
  private $usrStatus;
  
  public function getUsuario() 
  {
     return $this->user;
  }
  
  public function setUsuario($usr)
  {
     $this->user = $usr;
  }
  
  public function getPassword()
  {
     return $this->pwdUsr;
  }
  
  public function setPassword($password)
  {
     $this->pwdUsr = $password;
  }
  
  public function getEstatus()
  { 
     return $this->stUser;
  }
    
  public function setEstatus($estatus)
  {
     $this->stUser = $estatus;        
  }

  public function __construct()
  { 
    parent::__construct();  
  }


   function fnListadoUsuarios( $empezarDesde = '', $cantidadReg = '' ){
		$limit = (!empty($cantidadReg) ? " LIMIT {$empezarDesde}, {$cantidadReg} " : '');
		$sql   = "SELECT * FROM usuario WHERE activo = 1 ORDER BY apellido_pat ".$limit;
		$res   = $this->query($sql) or die( "Error en Usuarios ". $oCnx->errno() );
		$regs  = $res->num_rows;
	    if( $regs != 0 ){
		   while( $info = $res->fetch_array( MYSQLI_ASSOC ) ){	
		   		$infoUsuarios[] =  $info;
		   }
		}
		
		return $infoUsuarios;
	}
	

    	
  // =========================================	
  // Inserta un usuario
  // =========================================
  function fnInsertaUsuarios( $usrReg, $nombre, $paterno, $materno, $usuario, $email, $password, $permisos ){

	   $password =  (!empty($password)) ? md5($password) : '';

		  $sql = "INSERT INTO usuario(
		  							  usuario
		  							, id_tipousuario  
		  							, nombre
		  							, apellido_pat
		  							, apellido_mat
		  							, password
		  							, activo
		  							, email
		  							, permisos_menu
		  							, by_user
		  					)
		  					VALUES( '".addslashes(trim($usuario))."'
		  						, 2
			  					,'".addslashes( $nombre  )."'
			  					,'".addslashes( $paterno )."'
			  					,'".addslashes( $materno )."'
	               			    ,'".$password."'
	               			    , 1
			  					,'".$email."'
			  					,'".$permisos."'
			  					,'".$usrReg."'
		  					)";
		  	$res  = $this->query($sql) or 
		   			die("Error en query insertar usuario ". $this->errno());
		   	
		   	$idUsr = $this->insert_id();
     			
	   	
	   	return $idUsr;
  }

  public function fnActualizarUsuario( $usrReg, $nombre, $paterno, $materno, $email, $password, $permisos, $idUsuario ){
		$con =  (!empty($password)) ? ", password  ='".md5($password)."'" : '';

	     $sql = "UPDATE usuario SET
	     							  nombre        = '".addslashes( $nombre  )."'
		  							, apellido_pat  = '".addslashes( $paterno )."'
		  							, apellido_mat  = '".addslashes( $materno )."'
		  							, email         = '".$email."'
		  							, permisos_menu = '".$permisos."'
		  							, by_user       = '".$usrReg."'
	     							{$con}
	     					WHERE id =". $idUsuario;
	      $res  = $this->query($sql) or 
		   			die("Error en query insertar usuario ". $this->errno());
		   								
	     $idUsr = $data['idAyudante'];
  }

  function desactivarUsuario( $idUsr )
  {
	  $sql = "UPDATE usuario SET activo = 0 WHERE id=".$idUsr;
	  $this->query($sql) or 
	   			die("Error en query info perfiles ". $this->errno());
    return "OK";
  }


  function fnGuardarImgUsuario( $usuario, $imgUsuario  )
  {
	  $sql = "UPDATE usuario SET img_perfil = '".$imgUsuario."' WHERE usuario='".$usuario."'";
	  $this->query($sql) or 
	   			die("Error en query usuario imagen ". $this->errno());
    return "OK";
  }

  // ============================	
  // LOGIN DEL USUARIO	
  // ============================
    public function login()
	{ 
		$error  = '';
		
	   //Verificamos si el usuario existe
	   $sql = "SELECT u.*
	   			FROM usuario u
	   			WHERE u.usuario = '".$this->getUsuario()."'";
	   			
	   $res  = $this->query($sql) or 
	   			die("Error en query validacion usuario ". $this->errno());
	   			
	   $regs = $res->num_rows;
	   if($regs == 0)
       {
	      $error = '<div class="error">El usuario no existe</div>';
          return  $error;
       }

	   //Si el usuario existe validamos otras cosas..  
	   $fila = $res->fetch_array(MYSQLI_ASSOC);

       if($fila["activo"] != 1)
       {
          $error = '<div class="error">El usuario no está activo</div>';
          return  $error;
       }
       
	   //Si el password es correcto
	   if($this->getPassword() != $fila['password'])
	   {
		  $error = 'La contraseña es inválida';															
		  return $error;
	   }
		 
	   //Seteamos las variables de sesion			
	   $this->setSesion($fila);
    }
  
  // ==================================	
  // SETEANDO VARIABLES DE SESSION LOGIN
  // ==================================
  function setSesion($inf)
  {
	  
	  $nom = $inf['nombre']." ".$inf['apellido_pat']." ".$inf['apellido_mat'];
	  //Si la imagen de perfil no se ha dado de alta
	  //colocamos una por default
	  if(empty($inf['img_perfil'])) $inf['img_perfil'] = "pic.png";
	  
	  session_start();
	  
		$_SESSION['isLoggedIn']     = 'true';   // nos indica
		$_SESSION['idUsr']			= $inf['id'];
		$_SESSION['usrName'] 		= $inf['usuario'];
		$_SESSION['nombreCompleto'] = $nom;
		$_SESSION['tipoUsr'] 	    = $inf['id_tipousuario']; 
		$_SESSION['imgPerfil'] 	    = $inf['img_perfil'];
		$_SESSION['permisosMenu'] 	= $inf['permisos_menu'];
		
		header('location: ../views/home.php');
  }
  
  // ==================================	
  // Busca usuario por iduser
  // ==================================
  function buscaUsuario($idUsr)
  {
	  $sql = "SELECT *,p.descripcion as desc_pais 
	  				FROM usuario u
	  			  INNER JOIN cat_pais p ON u.pais = p.codigo
	  				WHERE u.id = {$idUsr}";
	  $res  = $this->query($sql) or 
	   			die("Error en query buscar usuario ". $this->errno());	
	  $data = $res->fetch_array(MYSQLI_ASSOC);
	  
	  return $data; 						
  }
  
  function obtenPassword($email){
	  $sql = "SELECT password FROM usuario 
	  				WHERE usuario = '{$email}'";
	  $res  = $this->query($sql) or 
	   			die("Error en query buscar usuario ". $this->errno());	
	  $data = $res->fetch_array(MYSQLI_ASSOC);
	  return $data; 	
  }
  
  // ==================================	
  // Usuario por email
  // ==================================
  function busca_usuario_x_email($email)
  {
	  $sql = "SELECT * FROM usuario 
	  				WHERE usuario = '{$email}'";
	  $res  = $this->query($sql) or 
	   			die("Error en query buscar usuario ". $this->errno());	
	  $data = $res->fetch_array(MYSQLI_ASSOC);
	  return $data; 						
  }
  
  // ==================================	
  // Cambiamos la contraseña login
  // ==================================
  function cambiar_contrasena_login($newPass,$email){
	  $sql = "UPDATE usuario SET password='{$newPass}' 
	  				WHERE usuario='{$email}'";
	  $res  = $this->query($sql) or 
	   			die("Error en query cambiar contraseña ". $this->errno());
	   				
	  return "OK";
	   				
  }
  
  /*
	* Funcion para reenviar contraseña  
  */
  function reenviar_contrasena($oCom, $varUrl, $mDe, $mPara, $newPwd = "")
  {
	  global  $rutaEmail;
	  //buscamos si existe el correo ingresado
	  $correoBusqueda = $this->busca_usuario_x_email($mPara);
	  $msg = array('error' => '','success' => '');
	  
	  //SI NO EXISTE EL CORREO ELECTRÓNICO ENVIAMOS MENSAJE DE ERROR
	  if(empty($correoBusqueda['usuario']) || $correoBusqueda['usuario'] != $mPara)
	  {
		  $msg['error'] = "<strong>Error!</strong> El correo electrónico no existe";
	  }
	  else
	  {
	  	//obtenemos el password random
			$newPwd      = $oCom->randomPassword();
			$newPwd_hash = password_hash($newPwd, PASSWORD_DEFAULT);
			
			//Setemamos variables para el envio de correo electrónico

			$mAsunto = utf8_decode("Reenvío de contraseña");
			$nameUsu = $correoBusqueda["nombre"]." ".$correoBusqueda["apellidos"];
			$machote = file_get_contents("../views/emailNuevoUsuario.php");
			$machote = str_replace("[VARURL]", $varUrl, $machote);
			$machote = str_replace("[NOMBREDEUSUARIO]", utf8_decode($nameUsu), $machote);
			$machote = str_replace("[USUARIO]", $correoBusqueda["usuario"], $machote);
			$machote = str_replace("[PASSWORD]", $newPwd, $machote);
			$mMensaje = $machote;
	  
			//enviamos el correo 
			$status = $oCom->EnviarCorreo($mPara, $mAsunto, $mMensaje, $rutaEmail);

			if($status){
		  	//cambiamos la contraseña
				$this->cambiar_contrasena_login($newPwd_hash, $mPara);
				$msg['success'] = "Se ha enviado un correo electrónico 
		  									con su nueva contraseña";
			}else{
				$msg['error'] = "Hubo un problema al enviar el correo <br>
												electrónico de confirmación";
			}
	  }
	  return json_encode($msg);
  }

}	
	
?>