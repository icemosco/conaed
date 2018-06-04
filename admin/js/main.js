//var paginaPrincipal = "http://localhost/conaed_last_250518/admin/views/home.php";
var paginaPrincipal = "http://www.conaed.org.mx/admin/views/home.php";
$(document).ready(function(){
	//MENU

	
//Para cuando cambien el combo
 $('.fslect_cat').change(function(e){

  var id    = e.target.id;
  var filt_sel  = $("#"+id+" option:selected").text();
  var gfval_sel = $("#"+id ).val();
  var fake_select = e.target.nextElementSibling.className;
  $("."+fake_select).html(filt_sel);
 });
 //Para cuando cargue la pagina
 $('.fslect_cat').each(function() {
        var id    = this.id;
  var filt_sel  = $("#"+id+" option:selected").text();
  var gfval_sel = $("#"+id ).val();
  var fake_select = this.nextElementSibling.className;
  $("."+fake_select).html(filt_sel);
    });
	
$(document).on('click','.add_item',function (e) {	
		var rel_plus=$(this).attr('rel');
		switch (rel_plus) {
		case "programas_plus":
				$('.add_programa').slideDown('500');
				//$('.new_programa').slideUp('300');
		    
		    break;
		case "evaluadores_plus":
				$('.add_evaluador').slideDown('500');
				//$('.add_evaluador').slideUp('300');
		    
		    break;
		case "usuarios_plus":
				$('.add_usuario').slideDown('500');
				//$('.add_usuario').slideUp('300');
		    
		    break;
		case "asociados_plus":
				$('.add_asociado').slideDown('500');
				//$('.add_usuario').slideUp('300');
		    
		    break;
		case "temas_plus":
				$('.add_tema').slideDown('500');
				//$('.add_usuario').slideUp('300');
		    
		    break;



		    

		   // add_evaluador
		}

    });



	$(document).on('change','.file_upload',function (e) {
		var fupload=$(this).val();
		var tmppath = URL.createObjectURL(e.target.files[0]);
		$(this).parent().parent().find('.path').html(fupload);
		$(this).parent().parent().find('.img_loaded').html('<img src="'+tmppath+'"/>');
	});
	
	$(document).on('change','.file_upload_1',function (e) {
		var fupload=$(this).val();
		var tmppath = URL.createObjectURL(e.target.files[0]);
		$(this).parent().parent().find('#path_asociados').html(fupload);
		$(this).parent().parent().find('#img_loaded_asociados').html('<img src="'+tmppath+'" width="100%" height="100%"/>');
	});

	$(document).on('change','.file_upload_2',function (e) {
		var letra = $(this).attr('id').substr(-1);
		var fupload=$(this).val();
		var tmppath = URL.createObjectURL(e.target.files[0]);
		$(this).parent().parent().find('#ruta_archivo_'+letra).html(fupload);
		$(this).parent().parent().find('#img_noticia_'+letra).html('<img src="'+tmppath+'" width="100%" height="100%"/>');
	});
	
	 
	
	
	
	
	$(document).on('click','.add_n_slider',function (e) {
		var nom_slide  = 1;
		$('.order_box_s').each(function(i, elem){
			nom_slide++;	
		});
		
		if(nom_slide >= 6){
			alert('Solo puedes agregar 5 sliders, si deseas cambiar o eliminar alguno, por favor solo cambia la imagen y remplaza por los nuevos textos.');
			return false;
		}
	
		$('#guardar_slider').before('<div class="slider_fill">'
									+'<span class="title_sl">Slider '+nom_slide+'</span>'
									+'<div class="left mr">'
										+'<span class="indications">Imágen .jpg ó .png</span>'
										+'<input type="text" class="order_box_s requeridoSlider" name="num_slider[]" value="'+nom_slide+'" size="2" style="width: 5%"/>'
										+'<div class="img_loaded"><img src="../img/pic.png"></div>'
										+'<div class="path">ruta del archivo</div>'
										+'<div class="cont_r">'
											+'<input type="hidden" name="nombreSlideImg[]" value=""/>'
											+'<input type="file" name="imagenSlider[]" class="file_upload requeridoSlider" name="file" />'
											+'<a href="javascript:void(0)" class="btn_cargar">Cargar</a>'
										+'</div>'
									+'</div><!--left-->'
									+'<div class="right">'
										+'<div class="sub_text_cont">'
											+'<span class="">Titulo (200 caracteres máx) *</span>'
											+'<span class="conteo_char">0 caracteres</span>'
											+'<textarea name="titulo[]" class="infoSlide requeridoSlider" maxlength="200"></textarea>'
										+'</div>'
										+'<div class="sub_text_cont">'
											+'<span class="">Subtitulo (500 caracteres máx) *</span>'
											+'<span class="conteo_char">0 caracteres</span>'
											+'<textarea name="subtitulo[]" class="infoSlide requeridoSlider"  maxlength="500" ></textarea>'
										+'</div>'
									+'</div>'
									+'<input type="hidden" name="idSlide[]"   value=""/>'
								+'</div><!--slider_fill-->');
	});

	
	//Coloca el numero de caracteres de los textarea de la seccion de slide
	$(document).on('keyup','.infoSlide',function (e) {	
		var contador  = e.currentTarget.parentElement.children[1];
		var numCarac  = $(this).val().length;
		$(contador).html( numCarac + " caracteres");

    });

    //Limitamos a que sean solo numeros 
   	$(document).on('keypress','.order_box_s, .asociados_orden, .anioAcre',function (e) {	
		var key = window.event ? e.which : e.keyCode;
  		if (key < 48 || key > 57) {
    		e.preventDefault();
  		}  		
    }); 

    //Validamos que el numero solo sea de 1-5
	$(document).on('keyup','.order_box_s',function (e) {		
  		if(e.currentTarget.value > 5 || e.currentTarget.value < 1){
  			console.log(e.currentTarget.value);
  			e.currentTarget.value = '';
  		}
    });

	/*$('.edit_evaluador').click(function(){
		$(".new_evaluador").css("display", "none");
		$(this).parent().next().find( ".new_evaluador" ).slideDown(500);
	});*/
	$(document).on('click','.edit_evaluador',function (elem) {	
		$(".new_evaluador").css("display", "none");
		$(this).parent().next().find( ".new_evaluador" ).slideDown(500);
	});
	$(document).on('click','.edit_user',function (elem) {	
		$(".new_user").css("display", "none");
		$(this).parent().next().find( ".new_user" ).slideDown(500);
	});
/*
	$('.edit_user').click(function(){
		$(".new_user").css("display", "none");
		$(this).parent().next().find( ".new_user" ).slideDown(500);
	});
*/
	//===================================================
   	// EDICION ACREDITADOS
	$(document).on('click','.edit_acreditado',function (elem) {	
	$(".new_programa").css("display", "none");
		$(this).parent().next().find( ".new_programa" ).slideDown(500);
	});
	$(document).on('click','.edit_tema',function (elem) {	
	$(".new_tema").css("display", "none");
		$(this).parent().next().find( ".new_tema" ).slideDown(500);
	});
	
	
	
	
	
	$(document).on('click','.delete_acreditado',function (elem) {	
		var idAcreditado = this.previousElementSibling.value;
		$.ajax({
	        type: "POST",
	        url: "../ajax/ajaxAcreditados.php",
	        data: {
		        accion  : "eliminar",
		        id      : idAcreditado
		    },
	        success: function(data)
	        { 
		        info = JSON.parse(data);

		        if(info.success === 'OK'){
			     	showMessages('<span>Se ha eliminado la universidad.</span>');
					setTimeout(function(){ location.href=paginaPrincipal+"?npa=1"}, 2000 );
		        }
			
	        }
		});
		
	});
	
	
	// ELIMINANDO REGISTRO



	// ELIMINANDO REGISTRO
	$(document).on('click','.delete_evaluador',function (e) {
		var idEvaluador = this.previousElementSibling.value;
		$.ajax({
	        type: "POST",
	        url: "../ajax/ajaxEvaluadores.php",
	        data: {
		        accion  : "eliminar",
		        id      : idEvaluador
		    },
	        success: function(data)
	        { 
		        info = JSON.parse(data);

		        if(info.success === 'OK'){
			     	showMessages('<span>Se ha eliminado el evaluador.</span>');
					setTimeout(function(){ location.href=paginaPrincipal+"?npe=1"}, 2000 );
		        }
	        }
		});
		
	});
	/*$('.delete_evaluador').click(function( elem ){
		
	});*/


    //VALIDAMOS LA DISFICULTAD DE LA CONTRASEÑA
    var strength = {
		  0: "Necesitas Mejorar",
		  1: "Muy débil",
		  2: "Débil",
		  3: "Buena",
		  4: "Perfecta"
	};
	
	//validamos la complejidad de la contraseña
	$(document).on('input','.pass_complexity',function (e) {
		var pibote = $(this).attr('id').substring($(this).attr('id').length -1);
		var meter  = $('#password-strength-meter_'+pibote);
        var text   = $('#password-strength-text_'+pibote);
        
        var val    = $(this).val();
  		var result = zxcvbn(val);
  		meter.val(result.score);
  		
  		if (val !== "") {
    		text.html("Strength: " + strength[result.score]); 
  		} else {
    		text.html("");
  		}
    });


    // ELIMINANDO REGISTRO USUARIO
	$(document).on('click','.delete_usuario',function( elem ){
		var idUsuario = this.previousElementSibling.value;
		$.ajax({
	        type: "POST",
	        url: "../ajax/ajaxUsuarios.php",
	        data: {
		        accion  : "eliminar",
		        id      : idUsuario
		    },
	        success: function(data)
	        { 
		        info = JSON.parse(data);

		        if(info.success === 'OK'){
			     	showMessages('<span>Se ha eliminado el usuario.</span>');
					setTimeout(function(){ location.href=paginaPrincipal+"?npu=1"}, 2000 );
		        }
	        }
		});
		/*$.get("../ajax/rfsh_usuarios.php", function(text){
			$('.usuarios').html(text);
		});*/
	});
	/*$('.delete_usuario').click(function( elem ){
		
	});
*/

// ELIMINANDO ELIMINANDO NOTICIA/TEMA
	$(document).on('input','.delete_tema',function( elem ){
		var idNoticia = this.previousElementSibling.value;
		$.ajax({
	        type: "POST",
	        url: "../ajax/ajaxNoticias.php",
	        data: {
		        accion  : "eliminar",
		        id      : idNoticia
		    },
	        success: function(data)
	        { 
		        info = JSON.parse(data);

		        if(info.success === 'OK'){
			     	showMessages('<span>Se ha eliminado el registro.</span>');
					setTimeout(function(){ location.href=paginaPrincipal+"?npn=1"}, 2000 );
		        }
	        }
		});
	});



	$(".validarEmail").blur(function(e){ 
		$(this).css({'border':'1px solid #737373'}); // Rregresamos el estilo
    	if(this.value != ''){
	    	var expr = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;;
	    	if ( !expr.test(this.value) ){
	        	console.log ( "Error" ,  'La dirección de correo " ' + this.value + ' " es incorrecta' ,  "error" );
	        	//$("#"+this.id).focus();
	        	$(this).css({'border':'1px solid red'});
	      	}  
    	}               
	});
	
	
	//Inicializamos imagen de perfil
	Demo.init(); 

});
//=============
//READY
//=============
//funcionalidad del menu
 function menu( obj ){
  
  $('.btns_menu').removeClass('selected');
  $('.icon').removeClass('selected');
 
  if(!$.isEmptyObject($(obj).attr('rel')))
  {
   var btn = $(obj).attr('rel');
   $(obj).addClass('selected');
   $(obj).find('.icon').addClass('selected');
   
  }else{
   var btn  = obj;
   var obj2 = '';
   $('.btns_menu').each(function(i, elem){
    if( obj == $(this).attr('rel')){
     obj2 = this;
    }
   });
   $(obj2).addClass('selected');
   $(obj2).find('.icon').addClass('selected');
  }
  
  $('.forms_cont').hide();
  $('.msg').hide();
  
  switch (btn) {
      case "sliders":
           $('.'+btn).show();
           $('.header_int > h2').html('Slider Home Page');
           $('.header_int > .search').html('<a href="javascript:void(0)" class="add_item add_n_slider" title="Agregar un nuevo slider">Nuevo</a>')

          break;
      case "programas":
           $('.'+btn).show();
           $('.header_int > h2').html('Programas Acreditados');
           $('.header_int > .search').html('<a href="javascript:void(0)" rel="programas_plus" class="add_item" title="Agregar una nueva universidad">Nuevo</a>');
          break;
      case "evaluadores":
           $('.'+btn).show();
           $('.header_int > h2').html('Padrón de Evaluadores');
           $('.header_int > .search').html('<a href="javascript:void(0)" rel="evaluadores_plus" class="add_item" title="Agregar un nuevo evaluador">Nuevo</a>')
          break;
      case "asociados":
           $('.'+btn).show();
           $('.header_int > h2').html('Referencias y Asociados');
           $('.header_int > .search').html('<a href="javascript:void(0)" rel="asociados_plus" class="add_item" title="Agregar un nuevo Asociado">Nuevo</a>');
          break;
      case "temasynoticias":
           $('.'+btn).show();
           $('.header_int > h2').html('Temas y Noticias');
           $('.header_int > .search').html('<a href="javascript:void(0)" rel="temas_plus" class="add_item" title="Agregar un nuevo Tema">Nuevo</a>');
           break;
          
      case "usuarios":
           $('.'+btn).show();
           $('.header_int > h2').html('Gestor de Usuarios');
           $('.header_int > .search').html('<a href="javascript:void(0)" rel="usuarios_plus" class="add_item" title="Agregar un nuevo Usuario">Nuevo</a>');
          break;
     
  }
 }

function showMessages( msg ){
		$(".msg").html(msg); 
	    $('.msg').fadeIn(200).animate({"bottom":"0px"}, "slow");
		setTimeout(function() {
			$(".msg").fadeOut(1500).animate({"bottom":"-50px"}, "slow");
		},3000);
}



	function guardarSlider(){
		var error = 0;
		//Validamos campos obligatorios
		$('#sliders').find('.requeridoSlider').each(function(i, elem){
			var imgSlider = '';			
			$(elem).css({'border':'1px solid #737373'}); // Rregresamos el estilo
			if($(elem).val() == ''){
				if($(elem).attr('name') == 'imagenSlider[]'){		
					if(this.previousElementSibling.value == ''){
						$(elem).css({'border':'1px solid red'});
						error++;
					}
				}else{
					$(elem).css({'border':'1px solid red'});
					error++;	
				}
			}
		});
		if(error > 0){
			showMessages('<span>Debe llenar los campos requeridos.</span>');
			return false;
		}

		var form = new FormData($('#sliders')[0]);
		$.ajax({
	        type: "POST",
	        url: "../ajax/ajaxSliders.php",
	        data: form,
	        contentType: false, 
            processData: false,
	        success: function(data)
	        { 
		        info = JSON.parse(data);

		        if(info.success == 'OK'){
			     	showMessages( "<span> La información se ha guardado.</span>" );
		        }else{
		        	showMessages( "<span> Hubo un error al guardar la información.</span>" );
		        }
	        }
		});	
	}

//ENVIAMOS LOS VALORES PARA GUARDAR O EDITAR ACREDITADOS
	function guardarAcreditados( elem, consec ){

		var error  = 0;
		//validamos los campos 
		var nombre       = $("#nombre_uni_"+consec);
		var pagina       = $("#pagina_web_"+consec);
		var anio         = $("#anioAcreditado_"+consec);
		var categoria    = $("#categoriaAcreditado_"+consec);
		var idAcreditado = $("#idAcreditado_"+consec);

		if( nombre.val() == ''){
			$(nombre).css({'border':'1px solid red'});
			error++;	
		}
		if( pagina.val() == ''){
			$(pagina).css({'border':'1px solid red'});
			error++;	
		}
		if( anio.val() == ''){
			$(anio).css({'border':'1px solid red'});
			error++;	
		}
		if( categoria.val() == ''){
			$(anio).css({'border':'1px solid red'});
			error++;	
		}
		if(error > 0){
			showMessages('<span>Debe llenar los campos requeridos.</span>');
			return false;
		}
		
		//Realizamos el guardado y edicion de la informacion
		$.ajax({
	        type: "POST",
	        url: "../ajax/ajaxAcreditados.php",
	        //dataType: "json",
	        data: {
		        "accion"    : "guardar",
		        "id"        : idAcreditado.val(),
		        "nombre"    : nombre.val(),
		        "pagina"    : pagina.val(),
		        "anio"      : anio.val(),
		        "categoria" : categoria.val()
		    },
	        success: function(data)
	        { 
		        info = JSON.parse(data);

		        if(info.success == 'OK'){
			     	showMessages( "<span> La información se ha guardado</span>" );
					setTimeout(function(){ location.href=paginaPrincipal+"?npa=1"}, 2000 );
		        }
	        }
		});	
		
		
	}



//ENVIAMOS LOS VALORES PARA GUARDAR O EDITAR EVALUADORES
	function guardarEvaluadores( elem, consec ){

		var error  = 0;
		//validamos los campos 
		var nombre      = $("#nombre_evaluador_"+consec);
		var paterno     = $("#paterno_evaluador_"+consec);
		var materno     = $("#materno_evaluador_"+consec);
		var idEvaluador = $("#idEvaluador_"+consec);

		if(error > 0){
			return false;
		}
		//Realizamos el guardado y edicion de la informacion
		$.ajax({
	        type: "POST",
	        url: "../ajax/ajaxEvaluadores.php",
	        //dataType: "json",
	        data: {
		        "accion"  : "guardar",
		        "id"      : idEvaluador.val(),
		        "nombre"  : nombre.val(),
		        "paterno"  : paterno.val(),
		        "materno"  : materno.val()
		    },
	        success: function(data)
	        { 
		        info = JSON.parse(data);

		        if(info.success == 'OK'){
			     	showMessages( "<span> La información se ha guardado</span>" );
					setTimeout(function(){ location.href=paginaPrincipal+"?npe=1"}, 2000 );
		        }
	        }
		});	
			}	

	//===================================================
	//				USUARIOS
	function guardarUsuarios( elem, consec ){

   	    var error     = 0;
   	    var idUs      = $( '#idUsuario_'+consec ).val();
   	    //VALIDAMOS CAMPOS REQUERIDOS
   		$('.requerido_usu').each(function( i, elem ) { 	
   			$(elem).css({'border':'1px solid #737373'}); // regresamos el estilo
			if($(elem).val() == ''){
				$(elem).css({'border':'1px solid #737373'}); // Rregresamos el estilo
				if($(elem).val() == ''){
					var pibote = $(elem).attr('id').substring($(elem).attr('id').length -1); 
					if(pibote == consec) //Validamos solo la seccion trabajada
					{
						if($(elem).attr('name') == 'contrasena_usu[]' && idUs != ''){} // validamos contraseña solo si tiene dato y es nuevo reg usuario
						else
						{
							$(elem).css({'border':'1px solid red'});
							error++;	
						}	
					}	
				}
			}	
		});

		//VALIDAMOS LOS CHECKS
        var layPermisosSelecc = [];
        $('.check_usu_permisos:checked').each(function( i , elem ) { //Buscamos los checkeados
        	var pibote = $(elem).attr('id').substring($(elem).attr('id').length -1); 
			if(pibote == consec) //Validamos solo la seccion trabajada
			{
        		layPermisosSelecc.push( $(this).val() );
        	}	
    	});	

    	if( 0 >= layPermisosSelecc.length){
    		showMessages( "<span>No hay permisos seleccionados.</span>" );
    		return false;
    	}
    	//validamos password que sea el mismo en la confirmacion
    	if( $('#contrasena_usu_'+consec).val() != '' && 
    				$('#contrasena_usu_'+consec).val() != $('#conf_contrasena_'+consec).val())
    	{
    		//Validamos siempre y cuando sea nuevo usuario, si es edicion solo si tiene algun dato
    		showMessages( "<span>Las contraseñas no son iguales.</span>" );
    		$('#conf_contrasena_'+consec).css({'border':'1px solid red'});
			return false;
    	}
    	//Si la contraseña es debil mandamos error
    	if($('#password-strength-meter_'+consec).val() <=1 ){
    		if(idUs == ''){
    			$('#contrasena_usu_'+consec).css({'border':'1px solid red'});
				return false;		
			}	
    	}
    	//validamos email que sean los mismos
    	if($('#email_usario_'+consec).val() != $('#conf_email_usuario_'+consec).val() && idUs == ''){
    		showMessages( "<span>Los correos no son iguales.</span>" );
    		$('#conf_email_usuario__'+consec).css({'border':'1px solid red'});
			return false;
    	}

		if(error > 0){
			showMessages('<span>Debe llenar los campos requeridos.</span>');
			return false;	
		}

		//Realizamos el guardado y edicion de la informacion
		$.ajax({
	        type: "POST",
	        url: "../ajax/ajaxUsuarios.php",
	        data: {
		        "accion"   : "guardar",
		        "id"       : $('#idUsuario_'+consec).val(),
		        "nombre"   : $('#nombre_usuario_'+consec).val(),
		        "paterno"  : $('#paterno_usuario_'+consec).val(),
		        "materno"  : $('#materno_usuario_'+consec).val(),
		        "usuario"  : $('#usuario_'+consec).val(),
		        "email"    : $('#email_usario_'+consec).val(),
		        "pass"     : $('#contrasena_usu_'+consec).val(),
		        "permisos" : layPermisosSelecc, 
		    },
	        success: function(data)
	        { 
		        info = JSON.parse(data);

		        if(info.success == 'OK'){
			     	showMessages( "<span> El usuario se ha guardado.</span>" );
					setTimeout(function(){ location.href=paginaPrincipal+"?npu=1"}, 2000 );
		        }
	        }
		});	
		
		
	}
	
	
	//ENVIAMOS LOS VALORES PARA GUARDAR O EDITAR ASOCIADOS
	function guardarAsociados( elem, consec ){


        var form_data = new FormData();                 
        form_data.append('file', $('#imagenAsociado').prop('files')[0]);
        form_data.append("accion", 'imagen_Asociado');
                    
	        $.ajax({
	            url: '../ajax/ajaxGuardaImagenes.php', 
	            dataType: 'text',  
	            cache: false,
	            contentType: false,
	            processData: false,
	            data: form_data,                         
	            type: 'post',
	               	success: function(img_reponse){        
		               	info = JSON.parse( img_reponse );
		               	if(info.imagenResize === 'OK')
		               		showMessages( "<span> La información se ha guardado.</span>" );
	                    
	                 }
	        });
		$.get("../ajax/rfsh_asociados.php", function(text){
			$('.asociados').html(text);
		});
	}

	function guardarOrdenAsociados(){ 
		var error = 0;
		var layIdAsociados    = [];
		var layOrdenAsociados = [];
		$('.asociados_orden').each(function(i, elem){

			layIdAsociados.push( $(this).prop('id') );
			layOrdenAsociados.push( $(this).val() );
			$(elem).css({'border':'1px solid #737373'}); // Rregresamos el estilo
			if($(elem).val() == ''){
				$(elem).css({'border':'1px solid red'});
				error++;	
			}
		});
		if(error > 0){
			showMessages('<span>Falta ingresar el orden de asociados</span>');
			return false;	
		}

		//Realizamos el guardado del orden de las imagenes
		$.ajax({
	        type: "POST",
	        url: "../ajax/ajaxAsociados.php",
	        data: {
		        "accion"         : "guardarOrden",
		        "idAsociados"    : layIdAsociados,
		        "ordenAsociados" : layOrdenAsociados, 
		    },
	        success: function(data)
	        { 
		        info = JSON.parse(data);

		        if(info.success == 'OK'){
		            showMessages( "<span> La información se ha guardado.</span>" );
					setTimeout(function(){ location.href=paginaPrincipal+"?npa=1"}, 2000 );
		        }
	        }
	     })   
		
	}


	function guardarNoticias( elem, consec ){
		var error = 0;

		//Validamos campos obligatorios nuevo
		if(consec == 'n'){
			var titulo      = $("#titulo_n");
			var contenido   = $("#contenido_n");
			var archivoImg  = $("#imagenNoticia_n");
			var rutaArchivo = $("#ruta_archivo_n");

			if( titulo.val() == ''){
				$(titulo).css({'border':'1px solid red'});
				error++;	
			}
			if( contenido.val() == ''){
				$(contenido).css({'border':'1px solid red'});
				error++;	
			}
			if( archivoImg.val() == ''){
				$(rutaArchivo).css({'border':'1px solid red'});
				error++;	
			}
			var form = new FormData($('#temasynoticias_n')[0]);
		}
		else
		{
			//Validamos campos obligatorios existentes
			$('#temasynoticias_'+consec).find('.requeridoNoticia').each(function(i, elem){
				console.log('Entrando');	
				$(elem).css({'border':'1px solid #737373'}); // Rregresamos el estilo
				if($(elem).val() == ''){
					if($(elem).attr('name') == 'imagenNoticia[]'){		
						console.log(this.previousElementSibling);
						console.log(this.previousElementSibling.value);
						if(this.previousElementSibling.value == ''){
							$(elem).css({'border':'1px solid red'});
							error++;
						}
					}else{
						$(elem).css({'border':'1px solid red'});
						error++;	
					}
				}
			});
			var form = new FormData($('#temasynoticias_1')[0]);
		}	
		console.log(error);
		if(error > 0){
			showMessages('<span>Debe llenar los campos requeridos.</span>');
			return false;
		}


		$.ajax({
	        type: "POST",
	        url: "../ajax/ajaxNoticias.php",
	        data: form,
	        contentType: false, 
            processData: false,
	        success: function(data)
	        { 
		        info = JSON.parse(data);

		        if(info.success == 'OK'){
			     	showMessages( "<span> La información se ha guardado.</span>" );
					$('.add_tema').slideUp(500);
					
				}
		        else{
		        	showMessages( "<span> Hubo un error al guardar la información.</span>" );
					setTimeout(function(){ location.href=paginaPrincipal+"?npn=1"}, 2000 );
		        }
	        }
		});	
		/*$.get("../ajax/rfsh_noticias.php", function(text){
			$('.temasynoticias').html(text);
		});*/
	
	}















$(document).on('click','.close_edit_btn',function (e) {
	$(this).parent().parent().parent().slideUp(300);
	
});


/*$(window).load(function(){
	
	//var pag=window.location.href.indexOf("npa") > -1;
		if(window.location.href.indexOf("npa") > -1) {
			$('.forms_cont').hide();
			$('.programas').show();
			$('.header_int > h2').html('Programas Acreditados');
		}
		if(window.location.href.indexOf("npe") > -1) {
			$('.forms_cont').hide();
			$('.evaluadores').show();
			$('.header_int > h2').html('Padrón de Evaluadores');
		}
	
});*/

//new?comm

$(document).on('click','.del_asociado',function () {
 //obtiene el id del elemento a eliminar
 var elem       = this;
 var idAsociado = $(elem).attr('rel');
  
 $.ajax({
        type: "POST",
        url: "../ajax/ajaxAsociados.php",
        data: {
          "accion"         : "eliminar",
          "idAsociados"    : idAsociado
      },
         success: function(data)
         { 
          info = JSON.parse(data);

          if(info.success == 'OK'){
              showMessages( "<span> La información se ha eliminado.</span>" );
			  //setTimeout(function(){ location.href=paginaPrincipal+"?npa=1"}, 2000 );
             // $(elem).parent().hide();
          }
         }
     });   
	 $.get("../ajax/rfsh_asociados.php", function(text){
			$('.asociados').html(text);
		 
	 });

});

$(document).on('click','.fakecheck',function () {
 $(this).toggleClass('checked');
 $(this).parent().find('.del_asociado').toggleClass('show_del');
});



$('.rest_pwd').click(function(){
	$('.recover_pwd').slideDown(500);	
});

$('.recover').click(function(){
	var email=$(this).parent().find('.email_rec').val();
	if(email!=''){
	 $.post("../php/recover.php", {email: email}, function(mensaje) {
		 	$('.restablecer >.txt').hide();
		  $('.respuesta_res').html(mensaje);
	 });
	}else{
		$('.restablecer >.txt').hide();
		$('.respuesta_res').html('Debes introducir un correo.');
	}
	
});