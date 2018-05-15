$(document).ready(function(){
	//MENU

	$('.btns_menu').click(function(){
		var btn=$(this).attr('rel');
		$('.btns_menu').removeClass('selected');
		$('.icon').removeClass('selected');
		$(this).addClass('selected');
		$(this).find('.icon').addClass('selected');
		$('.forms_cont').hide();
		
		switch (btn) {
		    case "sliders":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Slider Home Page');
		        	$('.header_int > .search').html('<a href="javascript:void(0)" class="add_n_slider" title="Agregar un nuevo slider"><img src="../img/plus.png" alt="" /></a>')

		        break;
		    case "programas":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Programas Acreditados');
		        	$('.header_int > .search').html('<a href="javascript:void(0)" rel="programas_plus" class="add_item" title="Agregar una nueva universidad"><img src="../img/plus.png" alt="" /></a>');
		        break;
		    case "evaluadores":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Padrón de Evaluadores');
		        	$('.header_int > .search').html('<a href="javascript:void(0)" rel="evaluadores_plus" class="add_item" title="Agregar un nuevo evaluador"><img src="../img/plus.png" alt="" /></a>')
		        break;
		    case "asociados":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Referencias y Asociados');
		        	$('.header_int > .search').html('<a href="javascript:void(0)" rel="asociados_plus" class="add_item" title="Agregar un nuevo Asociado"><img src="../img/plus.png" alt="" /></a>');
		        break;
		    case "temasynoticias":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Temas y Noticias');
		        
		    case "usuarios":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Gestor de Usuarios');
		        	$('.header_int > .search').html('<a href="javascript:void(0)" rel="usuarios_plus" class="add_item" title="Agregar un nuevo Usuario"><img src="../img/plus.png" alt="" /></a>');
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

	
$('.muestra_msg').click(function(){
	//alert('hey');
	$('.msg').fadeIn(100).animate({"bottom":"0px"}, "slow");
	 setTimeout(function() {
        $(".msg").fadeOut(1500).animate({"bottom":"-120px"}, "slow");
    },3000);


})
	
	$(document).on('change','.file_upload',function (e) {
		var fupload=$(this).val();
		var tmppath = URL.createObjectURL(event.target.files[0]);
		$(this).parent().parent().find('.path').html(fupload);
		$(this).parent().parent().find('.img_loaded').html('<img src="'+tmppath+'" />');
	});
	
	
	var nom_slide  = 1;
	$(document).on('click','.add_n_slider',function (e) {
		
		$('.order_box_s').each(function(i, elem){
			nom_slide = (i+1);
		});

		nom_slide = nom_slide+1;

		if(nom_slide > 5){
			return false;
		}
	
		$('#guardar_slider').before('<div class="slider_fill">'
									+'<span class="title_sl">Slider '+nom_slide+'</span>'
									+'<div class="left mr">'
										+'<span class="indications">Imágen .jpg ó .png</span>'
										+'<input type="text" class="order_box_s requerido" name="num_slider[]" id="num_slider"  value="'+nom_slide+'" size="2" style="width: 5%"/>'
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
						console.log("error de aqui2");
					}
					
					console.log("error de aqui3= "+$(elem).attr('name'));
				}else{
					
					console.log("error de aqui1= "+$(elem).attr('name'));
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
   	
   	$( '#datepickerinit_I' ).datepicker({dateFormat: 'dd-mm-yy'});
   	$( '#datepickerfinit_F' ).datepicker({dateFormat: 'dd-mm-yy'});
   	
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
	
	// HABILITANDO DESHABILITANDO ACREDITADOS
	$('.disable_acreditado').click(function( elem ){

		var elem 	     = this;
		var idAcreditado = this.nextElementSibling.value;
		var idStatus     = this.nextElementSibling.nextElementSibling.value;
		
		$.ajax({
	        type: "POST",
	        url: "../ajax/ajaxAcreditados.php",
	        //dataType: "json",
	        data: {
		        accion  : "desactivar",
		        id      : idAcreditado,
		        estatus : idStatus
		    },
	        success: function(data)
	        { 
		        info = JSON.parse(data);

		        if(info.success == 'OK'){
			     	if(idStatus == '1'){
				     	$(elem).text('enable'); //Cambiamos el label
			     	}
			     	if(idStatus == '0'){
				     	$(elem).text('disable');
			     	}
		        }
	        }
		});
	});	
	
	
});//ready


//ENVIAMOS LOS VALORES PARA GUARDAR O EDITAR
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


