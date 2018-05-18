$(document).ready(function(){
	//MENU

	$('.btns_menu').click(function(){

		var btn=$(this).attr('rel');
		$('.btns_menu').removeClass('selected');
		$('.icon').removeClass('selected');
		$(this).addClass('selected');
		$(this).find('.icon').addClass('selected');
		$('.forms_cont').hide();
		$('.msg').hide();
		
		switch (btn) {
		    case "sliders":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Slider Home Page');
		        	$('.header_int > .search').html('<a href="javascript:void(0)" class="add_n_slider" title="Agregar un nuevo slider">Nuevo</a>');

		        break;
		    case "programas":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Programas Acreditados');
		        	$('.header_int > .search').html('<a href="javascript:void(0)" rel="programas_plus" class="add_item" title="Agregar una nueva universidad">Nuevo</a>');
		        break;
		    case "evaluadores":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Padrón de Evaluadores');
		        	$('.header_int > .search').html('<a href="javascript:void(0)" rel="evaluadores_plus" class="add_item" title="Agregar un nuevo evaluador">Nuevo</a>');
		        break;
		    case "asociados":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Referencias y Asociados');
		        	$('.header_int > .search').html('<a href="javascript:void(0)" rel="asociados_plus" class="add_item" title="Agregar un nuevo Asociado">Nuevo</a>');
		        break;
		    case "temasynoticias":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Temas y Noticias');
		        	$('.header_int > .search').html('<a href="javascript:void(0)" rel="usuarios_plus" class="add_item" title="Agregar un nuevo Usuario">Nuevo</a>');
		        
		    case "usuarios":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Gestor de Usuarios');
		        	$('.header_int > .search').html('<a href="javascript:void(0)" rel="usuarios_plus" class="add_item" title="Agregar un nuevo Usuario">Nuevo</a>');
		        break;
		   
		}
	});
	
	$('.fslect').change(function(){
	     var slider_s=$(this).val();
	     $(this).parent().find('.fake_select').html(slider_s);
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
	
	 
	
	
	
	
	$(document).on('click','.add_n_slider',function (e) {
		var nom_slide  = 0;
		$('.order_box_s').each(function(i, elem){
			nom_slide++;	
		});
		
		if(nom_slide > 5){
			return false;
		}
	
		$('#guardar_slider').before('<div class="slider_fill">'
									+'<span class="title_sl">Slider '+nom_slide+'</span>'
									+'<div class="left mr">'
										+'<span class="indications">Imágen .jpg ó .png</span>'
										+'<input type="text" class="order_box_s requerido" name="num_slider[]" value="'+nom_slide+'" size="2" style="width: 5%"/>'
										+'<div class="img_loaded"><img src="../img/pic.png"></div>'
										+'<div class="path">ruta del archivo</div>'
										+'<div class="cont_r">'
											+'<input type="hidden" name="nombreSlideImg[]" value=""/>'
											+'<input type="file" name="imagenSlider[]" class="file_upload requerido" name="file" />'
											+'<a href="javascript:void(0)" class="btn_cargar">Cargar</a>'
										+'</div>'
									+'</div><!--left-->'
									+'<div class="right">'
										+'<div class="sub_text_cont">'
											+'<span class="">Titulo (100 caracteres máx) *</span>'
											+'<span class="conteo_char">0 caracteres</span>'
											+'<textarea name="titulo[]" class="infoSlide requerido" maxlength="100"></textarea>'
										+'</div>'
										+'<div class="sub_text_cont">'
											+'<span class="">Subtitulo (225 caracteres máx) *</span>'
											+'<span class="conteo_char">0 caracteres</span>'
											+'<textarea name="subtitulo[]" class="infoSlide requerido"  maxlength="225" ></textarea>'
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
   	$(document).on('keypress','#num_slider',function (e) {	
		var key = window.event ? e.which : e.keyCode;
  		if (key < 48 || key > 57) {
    		e.preventDefault();
  		}  		
    }); 

    //Validamos que el numero solo sea de 1-5
	$(document).on('keyup','#num_slider',function (e) {		
  		if(e.currentTarget.value > 5 || e.currentTarget.value < 1){
  			console.log(e.currentTarget.value);
  			e.currentTarget.value = '';
  		}
    });
    
    //===================================================
   	//Validamos los inputs de SLIDERS
   	$(document).on('submit','#sliders',function(event){
		var error     = 0;
		$('.requeridoSlider').each(function(i, elem){
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
			event.preventDefault();
			console.log('Debe rellenar los campos requeridos');
				$('.msg').html('<span>Debe rellenar los campos requeridos </span>');
			//error = 0;	
		}
	});
	//FIN Validamos los inputs de SLIDERS
	//===================================================
	
	
	//===================================================
   	//DATAPICKER DE PROGRAMAS ACREDITADOS
   	
   	$( '#datepickerinit_n' ).datepicker({dateFormat: 'dd-mm-yy'});
   	$( '#datepickerfinit_n' ).datepicker({dateFormat: 'dd-mm-yy'});
   	
   	$('.datepickerinit').each(function(i, elem){
		$( '#datepickerinit_'+i ).datepicker({
		    dateFormat: 'dd-mm-yy'
	    });
	});
	
	$('.datepickerfinit').each(function(i, elem){
		$( '#datepickerfinit_'+i ).datepicker({
		    dateFormat: 'dd-mm-yy'
	    });
	});
	$('.edit_evaluador').click(function(){
		$(".new_evaluador").css("display", "none");
		$(this).parent().next().find( ".new_evaluador" ).slideDown(500);
	});
	

	$('.edit_user').click(function(){
		$(".new_user").css("display", "none");
		$(this).parent().next().find( ".new_user" ).slideDown(500);
	});

	//===================================================
   	// EDICION ACREDITADOS
	$('.edit_acreditado').click(function(){
		$(".new_programa").css("display", "none");
		$(this).parent().next().find( ".new_programa" ).slideDown(500);
	});
	
	// ELIMINANDO REGISTRO
	$('.delete_acreditado').click(function( elem ){
		var idAcreditado = this.nextElementSibling.value;
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

		        if(info.success == 'OK'){
			     	console.log('SE HA ELIMIANDO EL PROGRAMA');
		        }
	        }
		});
	});	


	// ELIMINANDO REGISTRO
	$('.delete_evaluador').click(function( elem ){
		var idEvaluador = this.nextElementSibling.value;
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

		        if(info.success == 'OK'){
			     	console.log('SE HA ELIMIANDO EL PROGRAMA');
		        }
	        }
		});
	});


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
	$('.delete_usuario').click(function( elem ){
		var idUsuario = this.nextElementSibling.value;
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

		        if(info.success == 'OK'){
			     	console.log('SE HA ELIMIANDO EL USUARIO');
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

	function showMessages2( msg ){
		$(".msg").html(msg); 
	    $('.msg').fadeIn(200).animate({"bottom":"0px"}, "slow");
		setTimeout(function() {
			$(".msg").fadeOut(1500).animate({"bottom":"-50px"}, "slow");
		},3000);
	 }


//ENVIAMOS LOS VALORES PARA GUARDAR O EDITAR ACREDITADOS
	function guardarAcreditados( elem, consec ){

		var error  = 0;
		//validamos los campos 
		var nombre = $("#nombre_uni_"+consec);
		var pagina = $("#pagina_web_"+consec);
		var dateI  = $("#datepickerinit_"+consec);
		var dateF  = $("#datepickerfinit_"+consec);
		var idAcreditado = $("#idAcreditado_"+consec);

		if( nombre.val() == ''){
			$(nombre).css({'border':'1px solid red'});
			error++;	
		}
		if( pagina.val() == ''){
			$(pagina).css({'border':'1px solid red'});
			error++;	
		}
		if( dateI.val() == ''){
			$(dateI).css({'border':'1px solid red'});
			error++;	
		}
		if( dateF.val() == ''){
			$(dateF).css({'border':'1px solid red'});
			error++;	
		}
		if(error > 0){
			return false;
		}
		
		//Validar que la fecha final sea mayor a la inicial
		
		
		//Realizamos el guardado y edicion de la informacion
		$.ajax({
	        type: "POST",
	        url: "../ajax/ajaxAcreditados.php",
	        //dataType: "json",
	        data: {
		        "accion"  : "guardar",
		        "id"      : idAcreditado.val(),
		        "nombre"  : nombre.val(),
		        "pagina"  : pagina.val(),
		        "fechaI"  : dateI.val(),
		        "fechaF"  : dateF.val()
		    },
	        success: function(data)
	        { 
		        info = JSON.parse(data);

		        if(info.success == 'OK'){
			     	console.log("SE HA GUARDADO");	
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
			     	console.log("SE HA GUARDADO");	
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
    		console.log('NO HAY CHECKS SELECCIONADOS');
    		error++;
    	}
    	//validamos password que sea el mismo en la confirmacion
    	if( $('#contrasena_usu_'+consec).val() != '' && 
    				$('#contrasena_usu_'+consec).val() != $('#conf_contrasena_'+consec).val())
    	{
    		//Validamos siempre y cuando sea nuevo usuario, si es edicion solo si tiene algun dato
    		console.log('las contraseñas no son iguales');
    		$('#conf_contrasena_'+consec).css({'border':'1px solid red'});
			error++;	
    	}
    	//Si la contraseña es debil mandamos error
    	if($('#password-strength-meter_'+consec).val() <=1 ){
    		if(idUs == ''){
    			$('#contrasena_usu_'+consec).css({'border':'1px solid red'});
				error++;		
			}	
    	}
    	//validamos email que sean los mismos
    	if($('#email_usario_'+consec).val() != $('#conf_email_usuario_'+consec).val() && idUs == ''){
    		console.log('los correos no son iguales');
    		$('#conf_email_usuario__'+consec).css({'border':'1px solid red'});
			error++;	
    	}

		if(error > 0){
			console.log('Falta rellenar campos');
			$('.msg').html('<span>Debe rellenar los campos requeridos </span>');
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
			     	console.log("SE HA GUARDADO");	
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
		               	if(info.imagenResize == 'OK')
		               		showMessages2( "<span> La información se ha guardado</span>" );
	                    
	                 }
	        });
	}
	