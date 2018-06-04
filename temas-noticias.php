<?php
include_once("./admin/php/config.php");
include_once("./admin/php/DbConnect.php");
include_once("./php/functions.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>.:: CONAED - Temas y Noticias ::.</title>
<link href="css/main.css" rel="stylesheet" title="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/swiper.min.css">
<meta name="viewport" content="width=device-width, user-scalable=no">
<meta name="keywords" content="" />
<meta name="description" content="El CONAEDes una organización civil sin fines de lucro que se constituyó en febrero de 2003, a instancias de la Barra Mexicana Colegio de Abogados A.C. con el propósito de contribuir al desarrollo de la enseñanza del Derecho en México. En abril de 2006, el COPAES lo reconoció como organismo acreditador." />
<meta name="author" content="Alejandro Espino-2018" />
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="5 days">
<meta name="language" content="ES">
<meta name="distribution" content="Local">
<meta name="country" content="MX">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<style>
section{text-align:center;}
	header_title oxygenlight{width:50%; font-size:1em; left:0; right:0; margin:0 auto; display:block;}
</style>
</head>
<body>
<header>
	<div class="cont_header">
		<div class="logo_int"><img src="img/logo_conaed_bco.png" /></div>
	  <ul class="contact_icons" style="width:auto;">
		<li><a href="javascript:void(0)" class="phone_icon" style="margin:0 10px 0 25px;"><img src="img/phone.png" /></a></li>
		<li class="nmt"><a href="tel:5514.1700" class="phone1">(55) 5514.1700 /&nbsp;</a></li>
		<li class="nmt"><a href="tel:5538880671" class="phone2">55.3888.0671</a></li>
		<li><a href="javascript:void(0)" class="email_icon" style="margin:0 0px 0 25px;"><img src="img/email.png" /></a></li>
		<li><a href="mailto:conaed@gmail.com" class="email">conaed@gmail.com</a></li>
	  </ul>
	  <a href="javascript:void(0)" class="btn_menu closed">Menú</a>

	 </div><!--cont_header-->
	  <span>Consejo para la Acreditación de la Enseñanza del Derecho A.C</span>
<nav class="menu_p">
		<ul>
		  <li><a href="http://www.conaed.org.mx#quienes_somos" title="quienes_somos" class="btns_menu">Quiénes somos</a></li>
		  <li><a href="http://www.conaed.org.mx#proceso_de_acreditacion" title="proceso_de_acreditación" class="btns_menu">Proceso de acreditación <br />de los programas</a></li>
			<li><a href="http://www.conaed.org.mx#programas_acreditados" title="programas_acreditados" class="btns_menu">Programas acreditados</a></li>
			<li><a href="http://www.conaed.org.mx#padron_evaluadores" title="padron_evaluadores" class="btns_menu">Padrón de evaluadores copaes / conaed</a></li>
			<li><a href="http://www.conaed.org.mx#temas" title="temas" class="btns_menu">Temas y noticias</a></li>
			<li><a href="http://www.conaed.org.mx#consejo" title="consejo" class="btns_menu">Consejo conaed</a></li>
			
			<li><a href="http://www.conaed.org.mx#referencias" title="referencias" class="btns_menu">Nuestras referencias <br />y Asociados</a></li>
			<li><a href="http://www.conaed.org.mx#contacto" title="contacto" class="btns_menu">Contactanos</a></li>
		</ul>
	</nav>
	<ul class="btns_call_mobile">
		<li><a href="tel:5514.1700" class="ph1">5514.1700</a>
		<li><a href="tel:5538880671" class="ph2">5538880671</a>
	</ul>
</header>

<section class="">
	<div class="img_cont_head">
		<div class="screen_slider"></div>
		<img src="img/back_temas.png" />
	</div>
	<span class="header_title oxygenlight">Temas Y Noticias</span>
</section>
<section id="temas" class="nopadding1">
	<div class="menu_int_cont">
			<a href="http://www.conaed.org.mx#padron_evaluadores" class="clr_rose back">Regresar</a>
			</div>
			<article>
					
					<div class="blocks_cont topnone nw100">
						<div class="cont_art">
							
						<div class="block_t_int">
							<? echo mostrarnota_int() ?>
						</div><!--block_t_int-->
					</div><!--cont_arrt-->
				
					


					<div class="block_t block_t_r brleft">
							<h4>Últimas noticias</h4>
							<ul class="news">
								<!--<li>
									<a href="javascript:void(0)">
										<span>La carrera de Derecho de la UPC es la única en recibir acreditación del CONAED.</span>
									</a>
									<span class="autor"><strong>03 May 2018 / Lic. Fernando Peniche</strong>
									</span>
								</li>
								<li>
									<a href="">
										<span>CONAED acredita a la Facultad de Derecho de la UNITEC de Campus Sur.</span>
									</a>
									<span class="autor"><strong>03 May 2018 / Lic. Fernando Peniche</strong>
									</span>
								</li>
								<li>
									<a href="">
										<span>La apuesta de la UP para crecer profesionalmente.</span>
									</a>
									<span class="autor"><strong>03 May 2018 / Lic. Fernando Peniche</strong>
									</span>
								</li>
								<li>
									<a href="">
										<span>La carrera de Derecho de la Facultad de la UNAM cumple totalmente con lineamientos de calidad avalados por la CONAED.</span>
									</a>
									<span class="autor"><strong>03 May 2018 / Lic. Fernando Peniche</strong>
									</span>
								</li>
							</ul>-->
							<? echo mostrartitulos_slider_int();?>
							
						</div>
			</article>
</section><!--pymes-->


<h2 class="oxygenlight" style="width:100%; height:auto; background:#FFF;text-align: center;font-size:2.5em;color:#49519b">Contacto</h2>
<div class="bg_on">

<section id="contacto" class="nopadding1">
	<div class="pant_1"></div>
		<div class="email_response">

		</div>
			<article>
			<p class="oxygenlight">Si desea recibir información acerca de los servicios del CONAED, compártanos los siguientes datos y en breve nos comunicarémos con usted para atender su 
solicitud.</p>
					
					
					<div class="form_cont">

						
						<form  id="contact_form" class="" action="php/email.php" method="post">
						
							<ul class="">
								<li>
									<!--<label>Nombre:</label>-->
									<input type="text" class="br1" name="nombre" required placeholder="Nombre completo *">
								</li>
								<li>
									<!--<label>E-mail:</label>-->
									<input type="email" class="br1" name="email" required placeholder="Correo electrónico *" >
								</li>
								<li class="nwlist">
									<!--<label>Teléfono:</label>-->
									<input type="text" class="br1" name="telefono_fijo" placeholder="Teléfono fijo" maxlength="10">
								</li>
								<li class="nwlist">
									
									<input type="text" class="br1" name="telefono_movil" required placeholder="Teléfono celular*" maxlength="10">
									
								</li>
								<li>*Campos obligatorios</li>
							</ul>
							<ul>

								<li>
									<!--<label>E-mail:</label>-->
									<input type="text" class="br1" name="empresa"  placeholder="Empresa / Universidad">
								</li>
								<li>
										<input type="text" class="br1" name="asunto" required placeholder="Asunto*" maxlength="200">
								</li>
								
								<li class="">
									<input type="hidden" name="mensaje" value="0" />
							<div class="g-recaptcha" style="margin:3% 0;" data-sitekey="6LcU61YUAAAAAEGmBx43bOsX1NAI3dUR7kpXr5yy" required></div>
								</li>
								
								<li> <input type="submit" value="ENVIAR" class="btn_enviar_m" id="btn_envio" ></li>
							</ul>
							
							
							
						</form>
					</div><!--form_cont-->

			</article>
	</section><!--productos-->
	
	<style>
		
	</style>
	<footer class="nopadding1">
		<div class="pant_2"></div>
		<div class="left_f">
			<div class="logo_bco"><img src="img/logo_conaed_bco.png" /></div>
			<div class="adress">
				<span class="ico"><img src="img/building.png" /></span>
				<span class="text oxygenlight">Durango 208 - 101, Col. Roma, Ciudad de México, C.P. 06700</span>
			</div>
			<style>
			

		</style>
			<div class="adress mtop_adr">
				<span class="ico"><img src="img/phone.png" /></span>
				<a href="tel:5514.1700" class="phone_f oxygenlight">(55) 5514.1700 /&nbsp; </a>
				
				<a href="tel:5538880671" class="phone_f oxygenlight">55.3888.0671 </a>
				
			</div>
			<div class="adress mtop_adr">
				<span class="ico" style="height:15px"><img src="img/email.png" /></span>
				<a href="mailto:conaed@gmail.com" class="phone_f oxygenlight">conaed@gmail.com</a>
			</div>
		</div>
		<div class="right_f">
			<ul>
			
			<li><a href="http://www.conaed.org.mx#quienes_somos" title="quienes_somos" class="btns_menu_footer">Quienes Somos</a></li>
			<li><a href="http://www.conaed.org.mx#proceso_de_acreditacion" title="proceso_de_acreditación" class="btns_menu_footer">Proceso de Acreditación de los Programas</a></li>
			<li><a href="http://www.conaed.org.mx#programas_acreditados" title="programas_acreditados" class="btns_menu_footer">Programas Acreditados</a></li>
			<li><a href="http://www.conaed.org.mx#padron_evaluadores" title="padron_evaluadores" class="btns_menu_footer">Padrón de Evaluadores COPAES / CONAED</a></li>
			<li><a href="http://www.conaed.org.mx#temas" title="temas" class="btns_menu_footer">Temas y Noticias</a></li>
			<li><a href="http://www.conaed.org.mx#consejo" title="consejo" class="v">Consejo CONAED</a></li>
			
			<li><a href="http://www.conaed.org.mx#referencias" title="referencias" class="btns_menu_footer">Nuestras Referencias y Asociados</a></li>
			<li><a href="http://www.conaed.org.mx#contacto" title="contacto" class="btns_menu_footer">Contacto</a></li>
		</ul>
		</div>
		<div class="rights">CONAED, 2018. Todos los Derechos Reservados</div>

	</footer>
</div><!--main_wrapper-->
</div><!--bg_on-->
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>

<script src='https://www.google.com/recaptcha/api.js'></script>


</html>

?>