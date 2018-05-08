<?php
include_once("./admin/php/config.php");
include_once("./admin/php/DbConnect.php");

	
$oCnx      = new DbConnect();
	
	$sql  	   = "SELECT * FROM programas_1 ORDER BY id_universidad LIMIT 10";
	$res       = $oCnx->query($sql) or die( "Error en la universidad ". $oCnx->errno() );
	$regs      = $res->num_rows;
	$rowsTable = '';
    if( $regs != 0 )
    {
	   while( $info = $res->fetch_array( MYSQLI_ASSOC ) )
	   {
		 	$rowsTable .= '<li>
								<span class="num">'.$info['id_universidad'].'</span>

								<span>'.$info['nombre_uni'].'</span>
								<a href="'.$info['website'].'" target="_blank">'.$info['website'].'</a>
								<span>'.$info['vigencia_ini'].' - '.$info['vigencia_fin'].'</span>								
							</li>';					
	   }

	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>.:: CONAED ::.</title>
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

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118766206-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118766206-1');
</script>

</head>
<body>

<header>
	<div class="cont_header">
	  <ul class="contact_icons">
		<li><a href="javascript:void(0)" class="phone_icon" style="margin:0 10px 0 25px;"><img src="img/phone.png" /></a></li>
		<li class="nmt"><a href="tel:5514.1700" class="phone1">(55) 5514.1700 /&nbsp;</a></li>
		<li class="nmt"><a href="tel:5538880671" class="phone2">55.3888.0671</a></li>
		<li><a href="javascript:void(0)" class="email_icon" style="margin:0 0px 0 25px;"><img src="img/email.png" /></a></li>
		<li><a href="mailto:conaed@gmail.com" class="email">conaed@gmail.com</a></li>
	  </ul>
	  <a href="javascript:void(0)" class="btn_menu closed">Menú</a>

	 </div><!--cont_header-->
	  <span>Consejo para la Acreditación de la Enseñanza del Derecho A.C.</span>

<nav class="menu_p">
		<ul>
			
			<li><a href="javascript:void(0)" title="quienes_somos" class="btns_menu">Quienes somos</a></li>
			<li><a href="javascript:void(0)" title="proceso_de_acreditación" class="btns_menu">Proceso de acreditación<br />de los programas</a></li>
			<li><a href="javascript:void(0)" title="programas_acreditados" class="btns_menu">Programas acreditados</a></li>
			<li><a href="javascript:void(0)" title="padron_evaluadores" class="btns_menu">Padrón de evaluadores<br />copaes / conaed</a></li>
			<li><a href="javascript:void(0)" title="temas" class="btns_menu">Temas y noticias</a></li>
			<li><a href="javascript:void(0)" title="consejo" class="btns_menu">Consejo conaed</a></li>
			
			<li><a href="javascript:void(0)" title="referencias" class="btns_menu">Nuestras referencias<br />y Asociados</a></li>
			
			
			<li><a href="javascript:void(0)" title="contacto" class="btns_menu">Contacto</a></li>
		</ul>
	</nav>
	<ul class="btns_call_mobile">
		<li><a href="tel:5514.1700" class="ph1">5514.1700</a>
		<li><a href="tel:5538880671" class="ph2">5538880671</a>
	</ul>
</header>
<section id="slider" class="">
	
		<div class="logo_flot"><img src="img/logo_conaed_bco.png" /></div>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<div class="screen_slider"></div>
				<div class="txt1">La carrera de Derecho de la Facultad de la UNAM cumple totalmente con lineamientos de calidad avalados por la CONAED.</div>
				<div class="txt2">Felipe Ibáñez, presidente de la Conaed, resaltó que hay en el territorio nacional mil 770 instituciones educativas que imparten esa carrera y sólo 200 están acreditadas. “Y no creo que más de 600 puedan ser susceptibles a ese proceso”. 
Enfatizó el papel de la Universidad Nacional como institución formadora de abogados de excelencia.</div>
				<img src="img/slider/img_1.png"></div>
			<div class="swiper-slide"><div class="screen_slider"></div>
				<div class="txt1">Slider 1</div>
				<div class="txt2">Cont slider 1</div>
				<img src="img/slider/img_2.png"></div>
			<div class="swiper-slide"><img src="img/slider/img_3.png"></div>
			<div class="swiper-slide"><img src="img/slider/img_4.png"></div>
		</div>
  	</div>
</section>
<section id="quienes_somos" class="">
	<article>
		<h2 class="oxygenlight">Quiénes Somos</h2>
		<p class="">El <strong>CONAED</strong> es una organización civil sin fines de lucro que se constituyó en febrero de 2003, a instancias de la Barra Mexicana Colegio de Abogados A.C. con el propósito de contribuir al desarrollo de la enseñanza del Derecho en México. En abril de 2006, el COPAES lo reconoció como <strong>organismo acreditador</strong>.</p> 

		<p>Dicho Consejo es la instancia capacitada y reconocida por el Gobierno Federal, a través de la Secretaría de Educación Pública (SEP), para conferir reconocimiento formal a organizaciones que busquen acreditar programas académicos de educación superior ofrecidos por instituciones públicas y particulares. </p>

		

		<div class="blocks_cont">
				<div class="block">
					<span class="icon ico1"></span>
					<h3 class="oxygenlight">Nuestra Misión</h3>
					<p>La calidad de los servicios de un profesional del Derecho depende en gran medida de la calidad académica de las instituciones educativas que lo han formado.  Sólo instituciones de excelencia podrán dotarlo de las herramientas esenciales, llámese conocimientos, habilidades, aptitudes para la resolución de problemas y ética, que le podrán facilitar las oportunidades para lograr y satisfacer su potencial personal y vocacional además de permitirle fungir como un profesional de la sociedad.</p>
					<p>El <strong>CONAED</strong> busca contribuir a establecer los criterios básicos de calidad que requiere la educación y profesión jurídica en México a través de la verificación de los esquemas que se utilizan para la educación en el campo del Derecho, mismos que habrán de ser acordes con los avances de la ciencia y la técnica jurídica, tanto a nivel nacional como internacional, así como con las exigencias sociales, productivas y de servicio.</p>	
				</div><!--blocks-->
				<div class="block">
					<span class="icon ico2"></span>
					<h3 class="oxygenlight">Nuestra Visión</h3>
					<p>Consolidarse como el referente de calidad de la educación jurídica en México, con estándares internacionales, así como el principal promotor de mejores esquemas de enseñanza y procesos de mejora continua, con la capacidad de unir esfuerzos para asegurar la calidad académica de las instituciones educativas que impartan el Programa en Derecho a nivel nacional.</p>
				</div>
			</div><!--blocks_cont-->
		
		</article>
</section>
<section id="numeros" class="bg1">
	<article>
		<h2 class="oxygenlight">Nuestros Números</h2>
		<ul class="nums">
			<li>
				<span class="img n_ico1"></span>
				<span id="n1" class="numbers oxygenbold">0</span>
				<span class="titles oxygenlight">Programas Acreditados</span>
			</li>
			<li>
				<span class="img n_ico2 "></span>
				<span id="n2" class="numbers oxygenbold">0</span>
				<span class="titles oxygenlight">Evaluadores Especialistas</span>
			</li>
			<li>
				<span class="img n_ico3"></span>
				<span id="n3" class="numbers oxygenbold">0</span>
				<span class="titles oxygenlight">Años de Experiencia</span>
			</li>
		</ul>
	</article>
</section>
<section id="proceso_de_acreditación" class="">
	<article>
		<h2 class="oxygenlight">Proceso de Acreditación de los Programas</h2>
		<div class="blocks_cont nomtop">
			<div class="block">
				
				<p>El CONAED, como organismo acreditador, busca mejorar los niveles en la educación profesional de las instituciones educativas que imparten la Licenciatura en Derecho, EN Criminología y en Criminalística propiciando su idoneidad y solidez.  Es a través de la medición de indicadores acordes a las necesidades del mercado y a la optimización de recursos en las propias instituciones y sus programas, que el CONAED busca fomentar que éstas cumplan con su misión y objetivos y que además realicen cambios significativos de acuerdo a las necesidades sociales presentes y futuras.</p>
				<p>El proceso de acreditación se caracteriza por ser voluntario; integral; objetivo, justo y transparente; externo; producto del trabajo colegiado de personas de reconocida competencia en la materia; ético y responsable; temporal, ya que tendrá validez por un período determinado, y confiable, porque se centra en altos niveles de calidad.</p>	
			</div><!--blocks-->
			<div class="block">
				<p>La acreditación se otorga previa valoración de la capacidad organizativa, técnica y operativa de los Departamentos, Escuelas y Facultades, así como de la administración de sus procedimientos. </p>
				<p>La acreditación no busca la inspección o vigilancia ni tiene un carácter punitivo, busca principalmente el mejoramiento de la calidad educativa. 
</p>
				</div>
			</div><!--blocks_cont-->

			<h3 class="oxygenlight">Diagrama de flujo</h3>
			<div class="img_diagrama"><img src="img/d_flujo.png" alt="" /></div>
			
</article>
</section><!--proceso de acreditacion-->
<section id="descarga" class="bg2 np1">
	<article>
		<p class="txt-c oxygenlight">Sí desea iniciar con su proceso de Acreditación, lo invitamos a descargar nuestro formato de autoevaluación, siga los pasos según se muestra en el diagrama de flujo.</p>
		<a href="files/instrumento_de autoevaluacion_2018.docx" class="descargas" title="Descargar archivo">DESCARGAR FORMATO</a>
	</article>
</section><!--descargas-->
<section id="programas_acreditados" class="">
	<article>
		<h2 class="oxygenlight">Programas Acreditados</h2>
		
		<div class="row_titulo">
			<span class="col1">Institución Educativa</span>
			<span class="col2">Página Web</span>
			<span class="col3">Vigencia</span>
		</div>
		<ul class="programas">
			<?php echo $rowsTable ?>

		</ul>
		<a href="programas-acreditados.php" class="lista_c">ver lista completa</a>
	</article>
</section><!--ntec-->
	<section id="padron_evaluadores">
		<style>
			
		</style>
			<article>
					<h2 class="oxygenlight">Padrón de Evaluadores COPAES / CONAED</h2>
					<div class="cont_names">
						<span class="title_top">Nombre</span>
						<ul class="padron">
							<li><span>Abadie Aguilar Javier</span></li>
							<li><span>Abaroa García Alfredo</span></li>
							<li><span>Aguilar Altamirano Jesús</span></li>
							<li><span>Alemán Campos, Eloisa Rosa</span></li>
							<li><span>Anguiano Barbosa Laura</span></li>
							<li><span>Argente Villarreal ,Arturo David</span></li>
							<li><span>Ascencio Ascencio,Silvia</span></li>
							<li><span>Castellanos Jiménez Bertha Yanira</span></li>
							<li><span>Castillo González Enrique</span></li>
							<li><span>Castrejón Díaz Ana Beatriz</span></li>
						</ul>
					</div>
					<div class="cont_names">
						<span class="title_top">Nombre</span>	
						<ul class="padron">
							<li><span>Cervantes Cabrera Sergio</span></li>
							<li><span>Colín Cano Cipactli</span></li>
							<li><span>Díaz Reyes, Irene</span></li>
							<li><span>Duque Alanís, José Francisco</span></li>
							<li><span>Escobar Menaldo Rolando</span></li>
							<li><span>Espinoza Monroy, Elizabeth</span></li>
							<li><span>Estrada Bernal Benito</span></li>
							<li><span>Gallardo Martínez Yurixhi</span></li>
							<li><span>Galvan del Castillo Perla</span></li>
							<li><span>González Medina Ana María</span></li>

						</ul>
					</div>

					<div class="cont_names">
						<span class="title_top">Nombre</span>	
						<ul class="padron">
							<li><span>Gradilla Esparza, Gabriela</span></li>
							<li><span>Gutiérrez Parada, Oscar</span></li>
							<li><span>Hernández Manzano María del Socorro</span></li>
							<li><span>Hernández Haro Patricia</span></li>
							<li><span>Iannacone de la Flor Marco Luigi</span></li>
							<li><span>Lara Olivares, Alicia</span></li>
							<li><span>López Ávila,Eduardo</span></li>
							<li><span>Miranda De la Lama Beatriz</span></li>
							<li><span>Mireles Rangel Aida</span></li>
							<li><span>Peniche Giordani Luis Fernando</span></li>

						</ul>
					</div>
					<a href="padron-evaluadores.html" class="lista_c">ver lista completa</a>
			</article>
	</section><!--hogar-->
<section id="temas">
			<article>
					<h2 class="oxygenlight">Temas y Noticias</h2>
					<div class="blocks_cont">
						<div class="block_t">
							<h3>Hacia una educación jurídica de excelencia</h3>
							<span class="sub_">15 May 2018 / Lic. Fernando Peniche</span>
							<div class="img_t"><img src="img/temas/img1.png" alt="" /></div>
							<p>Sin determinar si es o no justa, es indudable que el mundo de hoy vive en una Economía Globalizada, que el Neo liberalismo tiene sus bases en la Economía de mercado y que esta,  mientras mas global sea, será mejor para el funcionamiento de éste sistema.</p>
							<p>En éste sentido, la Organización de Comercio y Desarrollo Económico OCDE, privilegia la importancia del conocimiento como motor de la producción y se empezó a mencionar el término de  la “Economía del Conocimiento”.</p>

 

							<a href="" class="leer_mas" id="">LEER MÁS</a>
							<div class="redes_m">
								<a href="" class=""></span>
								<a href="" class=""></span>
								<a href="" class=""></span>
							</div>
							<div class="redes"></div>
					</div>
					<div class="block_t block_t_r brleft">
							<h4>Últimas noticias</h4>
							<ul class="news">
								<li>
									<a href="">
										<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
									</a>
									<span class="autor"><strong>03 May 2018 / Lic. Fernando Peniche</strong>
									</span>
								</li>
								<li>
									<a href="">
										<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
									</a>
									<span class="autor"><strong>03 May 2018 / Lic. Fernando Peniche</strong>
									</span>
								</li>
								<li>
									<a href="">
										<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
									</a>
									<span class="autor"><strong>03 May 2018 / Lic. Fernando Peniche</strong>
									</span>
								</li>
							</ul>
						</div>
			</article>
</section><!--pymes-->
<section id="consejo">
	<article>
		<h2 class="oxygenlight">Consejo CONAED</h2>
		<div class="blocks_cont">
			<ul class="btns_consejo">
				<li>
					<a href="javascript:void(0)" class="active_consejo" alt="">Lic. Felipe ibañez Mariel</a>
					<div class="profile_mobile">
						<div class="img_c">
								<img src="img/consejo/felipe_ibanez.png" alt="" />
						</div><!--img_c-->

						<div class="resena">
							<p>Egresado de la Escuela Libre de Derecho en 1978. Cursó Estudios de Postgrado con Especialidad en Derecho  Económico y Corporativo, así como Amparo y Derecho Penal en la Universidad Panamericana.</p>
							<p>Miembro de la Barra Mexicana, Colegio de Abogados, A.C desde 1986.</p>
							<p>Presidente del Consejo para la Acreditación de la Enseñanza del Derecho, A.C.</p>
							<p>Socio Fundador del Bufete Zamora Pierce, donde colaboró como Socio y Administrador, durante 32 años, litigando en las Materias Penal, Civil, Mercantil, Familiar, Administrativo y Amparo.</p>
			    		</div>

					</div><!--profile_mobile-->
			    </li>
				<li><a href="javascript:void(0)" alt="">Lic. Werner vega trapero</a></li>
				<li><a href="javascript:void(0)" alt="">Lic. Luis Felipe Peniche giordani</a></li>
			</ul>
			<div class="profile">
				<div class="img_c"><img src="img/consejo/felipe_ibanez.png" alt="" /></div>

				<div class="resena">
					<span class="oxygenbold fts1">FELIPE IBAÑEZ MARIEL</span>
					<span class="clr_rose">PRESIDENTE</span>

					<p>Egresado de la Escuela Libre de Derecho en 1978. Cursó Estudios de Postgrado con Especialidad en Derecho  Económico y Corporativo, así como Amparo y Derecho Penal en la Universidad Panamericana.</p>
							<p>Miembro de la Barra Mexicana, Colegio de Abogados, A.C desde 1986.</p>
							<p>Presidente del Consejo para la Acreditación de la Enseñanza del Derecho, A.C.</p>
							<p>Socio Fundador del Bufete Zamora Pierce, donde colaboró como Socio y Administrador, durante 32 años, litigando en las Materias Penal, Civil, Mercantil, Familiar, Administrativo y Amparo.</p>
			    </div>
			</div><!--profile-->
		</div><!--blocks_cont-->
	</article>
</section><!--Consejo-->
<section id="referencias">
	<article>
		<h2 class="oxygenlight">Nuestras Referencias y Asociados</h2>
		<!--<div id="slider_2" class="swiper-container-2">
			<div class="swiper-wrapper">
				<div class="swiper-slide logos"><img src="img/logo_1.png"></div>
				<div class="swiper-slide logos"><img src="img/logo_2.png"></div>
				<div class="swiper-slide logos"><img src="img/logo_3.png"></div>
				<div class="swiper-slide logos"><img src="img/logo_4.png"></div>
			</div>
  		</div>-->
  		<style>
  		
  	</style>
  		<ul class="logos_reel">
  			<li><img src="img/barra.jpg"></li>
  			<li><img src="img/colegio-abogados.jpg"></li>
  			<li><img src="img/copaes.jpg"></li>
  			<li><img src="img/escuela.jpg"></li>
  		</ul>

	</article>
</section><!--consejo-->
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
	<!--<ul class="redes_bottom">
		<li><a href="javascript:void(0)" alt="" class="fb" ></a></li>
		<li><a href="" alt="" class="tw" ></a></li>
		<li><a href="" alt="" class="in" ></a></li>
	</ul>-->
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
			
			<li><a href="javascript:void(0)" title="quienes_somos" class="btns_menu_footer">Quienes Somos</a></li>
			<li><a href="javascript:void(0)" title="proceso_de_acreditación" class="btns_menu_footer">Proceso de Acreditación de los Programas</a></li>
			<li><a href="javascript:void(0)" title="programas_acreditados" class="btns_menu_footer">Programas Acreditados</a></li>
			<li><a href="javascript:void(0)" title="padron_evaluadores" class="btns_menu_footer">Padrón de Evaluadores COPAES / CONAED</a></li>
			<li><a href="javascript:void(0)" title="temas" class="btns_menu_footer">Temas y Noticias</a></li>
			<li><a href="javascript:void(0)" title="consejo" class="v">Consejo CONAED</a></li>
			
			<li><a href="javascript:void(0)" title="referencias" class="btns_menu_footer">Nuestras Referencias y Asociados</a></li>
			<li><a href="javascript:void(0)" title="contacto" class="btns_menu_footer">Contacto</a></li>
		</ul>
		</div>
		<div class="rights">CONAED, 2018. Todos los Derechos Reservados</div>

	</footer>
</div><!--main_wrapper-->
</div><!--bg_on-->
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/animate_numbers.js"></script>
<script src="js/main.js"></script>
<script src="js/swiper.min.js"></script>
<!--<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBS1xV-Sum8FnUGvI4YVjcupvxiZHRPJAg" async defer type="text/javascript"></script>-->


<!--<script src="js/map.js"></script>-->
<script src='https://www.google.com/recaptcha/api.js'></script>

<script>
	
/*window.onload = function () {
$("#pre-load-web").fadeOut(1000,function() { 
 $(this).remove();
 $("body").css({"overflow-y":"auto"}); }); 
};

/*
$(document).ready(function(){
  $("body").css({"overflow-y":"hidden"});
    var alto=$(window).height();
    $('body').append('<div id="pre-load-web"><div id="imagen-load"><img src="/img/logo_sasec.png" /><span>Cargando...</span><span><img src="/img/loading_spinner.gif" style="width:50px; height:50px;" alt="" /></span></div></div>');
    $('#pre-load-web').css({height:alto+"px"}); 
       
    $("#imagen-load").css({"margin-top":(alto/2)-30+"px"}); 
});     

*/


	var swiper = new Swiper('.swiper-container',{
    speed: 300,
    autoplay: false,
    loop:4,
    lazyLoading: true

});
	var swiper2 = new Swiper('.swiper-container-2',{
    speed: 200,
    autoplay: true,
    loop:true,
    slidesPerView: 3,
    lazyLoading: true


});
</script>

</html>