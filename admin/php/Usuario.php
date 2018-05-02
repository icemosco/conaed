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
  
  /*
  * @var string Nivel de accesos Usuario
  * privilegios que tendra el usuario
  * editar,eliminar,crear
  */
  private $accessUsr;

  /*
  * @var string  Escuela a la que pertenece
  *  el usuario.
  */
  private $schoolUsr;
  
  /*
  * @var string  si el usuario es
  *  web o movil
  */
  public $tipoUsr;
  
  
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
    	
  // =========================================	
  // Inserta un usuario
  // =========================================
  function insertarUsuario($data){
	  
	  (!empty($data['contrasena'])) ? $data['contrasena'] = password_hash($data['contrasena'], PASSWORD_DEFAULT) : $data['contrasena'] = null;
		($data['tipoUsuario'] == 2) ? $acceso = "movil" : $acceso = "web";
		$data['idPais'] = (!empty($data['idPaisA'])) ? $data['idPaisA'] : $data['idPaisE'];
		
	  $fechaHoy = date("Y-m-d H:i:s");
	  if(empty($data['telefono'])) $data['telefono'] = "";
	  
	  /*
		  1 Activo 
		  0 Inactivo 
		*/  
	  
	  if(empty($data['idAyudante']))
	  {
		  $sql = "INSERT INTO usuario(
		  							  id_tipousuario
		  							, usuario
		  							, nombre
		  							, apellidos
		  							, password
		  							, tipo_acceso
		  							, telefono
		  							, pais
		  							, activo
		  							, fecha_registro
		  					)
		  					VALUES(
			  					{$data['tipoUsuario']}
			  					,'{$data['usuario']}'
			  					,'".addslashes($data['nombre'])."'
			  					,'".addslashes($data['apellido'])."'
	                ,'".$data['contrasena']."'
			  					,'{$acceso}'
			  					,'{$data['telefono']}'
			  					,'".strtolower($data['idPais'])."'
			  					, 0  -- Todos se registran como inactivos
			  					,'{$fechaHoy}'
		  					)";
		  				//	echo $sql;
		  	$res  = $this->query($sql) or 
		   			die("Error en query insertar usuario ". $this->errno());
		   	
		   	$idUsr = $this->insert_id();
		   	
		   	$this->insertamosOpcionesMenu($idUsr, $data['tipoUsuario']);
    }
    else{
	    $con = "";
	    if(!empty($data['contrasena'])) $con = ", password  ='".$data['contrasena']."'";
	     $sql = "UPDATE usuario SET
	     									  nombre    = '".addslashes($data['nombre'])."'
	     									, apellidos = '".addslashes($data['apellido'])."'
	     									{$con}
	     					WHERE id =". $data['idAyudante'];
	      $res  = $this->query($sql) or 
		   			die("Error en query insertar usuario ". $this->errno());
		   								
	     $idUsr = $data['idAyudante'];
    }	   			
	   	$msg = array('status' => 'OK', 'idUsr' => $idUsr);
	   	
	   	return $msg;
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
	      $error = "El usuario no existe";
          return  $error;
       }

	   //Si el usuario existe validamos otras cosas..  
	   $fila = $res->fetch_array(MYSQLI_ASSOC);

       if($fila["activo"] != 1)
       {
          $error = "El usuario no está activo";
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
	  if(empty($inf['img_perfil'])) $inf['img_perfil'] = "usuario_default.png";
	  
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

			$mAsunto = utf8_decode("Reenvío de contraseña, sistema Canifel");
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

  
  /*
	 * Edita la información de usuario desde el Perfil
	 */ 
  function guardarUsuario($idUsr, $info, $img = ""){
	  
	  
	  $elPassAnt = $this->obtenPassword($info['usuario']);
	  
		if(!password_verify($info['oldPass'], $elPassAnt['password']))
		{ 
		   $info['contrasena'] = '';
		   if(!empty($elPassAnt['password']) && !empty($info['oldPass'])) return "Hubo un problema con el cambio de contraseña";
	  }

	  $info['password'] = (!empty($info['contrasena'])) ?  ",password = MD5('".$info['contrasena']."')" : '';
	  
	  $imgPerfil = "";
	  if(!empty($img)) $imgPerfil = " ,img_perfil='{$img}'";
	  
	  $extra = "";			
		if(!empty($info['rol'])){
			foreach($info['rol'] as $key => $value){
		  	$extra .= "{$value}|";	
			}
		}								

	  $sql = "UPDATE usuario SET nombre = '{$info['nombre']}'
	  													 , apellidos='{$info['apellidos']}'
	  													   {$imgPerfil}
	  													 , telefono = '{$info['telefono']}'
	  													 ".$info['password']."
	  													 , cedula = '{$info['cedula']}'
	  													 , roles='{$extra}'
									WHERE id = {$idUsr}";
		$this->query($sql) or 
	   			die("Error en query info perfiles ". $this->errno());
	   			
	   						
	  
	  return "OK";
  }
  
  function activarCuentaUsuario($usr)
  {
	  $sql = "UPDATE usuario SET activo = 1 WHERE usuario = '{$usr}'";
	  $this->query($sql) or 
	   			die("Error en query info perfiles ". $this->errno());
    return "OK";
  }
  

}	
	
?>