<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>.:: CMS-CONAED ::.</title>
<link href="../css/main_admin.css" rel="stylesheet" title="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, user-scalable=no">
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="Alejandro Espino, Angélica Pérez Serrano" />
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">
<meta name="language" content="ES">
<meta name="distribution" content="Local">
<meta name="country" content="MX">
<style>

</style>
</head>
<body>
	<header>
			<div class="logo"><img src="../img/logo_conaed.png" /></div>
			<span>Consejo para la Acreditación de la Enseñanza de Derecho, A.C.</span>
			<a href="" class="close_s">Cerrar Sesión</a>
	</header>
<div class="main_wrapper">
	<div class="menu_cont">
		<div class="cont_img">
			<span class="image">
					<img src="../img/users/anon.png" alt="">
			</span>
			<a href="javascript:void(0)" class="edit">
					<img src="../img/edit.png" alt="">
			</a>
			<span class="n_usuario">Marco Picil</span>
		</div>
		<ul class="menu">
			<li>
				<a href="javascript:void(0)" class="btns_menu" rel="slider">
					<span class="icon ico1"></span>
					<span>Slider Home Page</span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)" class="btns_menu" rel="programas">
					<span class="icon ico2"></span>
					<span>Programas Acreditados</span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)" class="btns_menu" rel="padron">
					<span class="icon ico3"></span>
					<span>Padrón de Evaluadores</span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)" class="btns_menu" rel="referencias">
					<span class="icon ico4"></span>
					<span>Referencias y Asociados</span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)" class="btns_menu selected" rel="temas">
					<span class="icon ico5"></span>
					<span>Temas y Noticias</span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)" class="btns_menu" rel="usuarios">
					<span class="icon ico5"></span>
					<span>Gestor de Usuarios</span>
				</a>
			</li>
		</ul>
	</div><!--cont_menu-->
	<div class="wrapper_right">
			<div class="header_int">
				<h2>Slider Home Page</h2>
				<div class="search">
					<span class="">Número de slider:</span>
					<ul>
						<li>
							<div class="fake_select"></div>
							<select class="w1 fslect" name="num_slider">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</li>
					</ul>
					<a href="javascript:void(0)" class="add_n_slider" title="Agregar un nuevo slider"><img src="img/plus.png" alt="" /></a>
				</div>
			</div>
			<div class="forms_cont slider">
				<form class="" name="sliders" id="" action="../php/x.php" method="post">
				<div class="slider_fill">
					<span class="title_sl">Slider 1</span>
					<div class="left mr">
						<span class="indications">Imágen .jpg ó .png</span>
						<ul>
							<li>
								
							</li>
						</ul>
						<div class="img_loaded"><img src="../../img/slider/img_1.png" /></div>
						<div class="path">ruta del archivo</div>
						<div class="cont_r">
							<input type="file" class="file_upload" name="file" />

						<a href="javascript:void(0)" class="btn_cargar">Cargar</a>
					</div><!--cont_r-->
					</div><!--left-->
					<div class="right">
						<div class="sub_text_cont">
							<span class="">Titulo (100 caracteres máx)</span>
							<span class="conteo_char">0 caracteres</span>
						</div>
						<textarea name="" class="" required ></textarea>
						<div class="sub_text_cont">
							<span class="">Subtitulo (225 caracteres máx)</span>
							<span class="conteo_char">0 caracteres</span>
						</div>
						<textarea name="" class="" required ></textarea>
					</div>
				</div><!--slider_fill-->
				
				</form>
			</div><!--forms_cont-->
	</div><!--wrapper_right-->

</div><!--main_wrapper-->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/main.js"></script>
<script>


</script>
</body>

</html>