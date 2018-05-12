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
		        break;
		    case "evaluadores":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Padrón de Evaluadores');
		        break;
		    case "asociados":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Referencias y Asociados');
		        break;
		    case "temasynoticias":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Temas y Noticias');
		        break;
		    case "usuarios":
		        	$('.'+btn).show();
		        	$('.header_int > h2').html('Gestor de Usuarios');
		        break;
		   
		}
		
		
	
	});
	$('.fslect').change(function(){
	     var slider_s=$(this).val();
	     $(this).parent().find('.fake_select').html(slider_s);
		});
	
$('.muestra_msg').click(function(){
	//alert('hey');
	$('.msg').fadeIn(100).animate({"bottom":"0px"}, "slow");
	 setTimeout(function() {
        $(".msg").fadeOut(1500).animate({"bottom":"-120px"}, "slow");
    },3000);


})

$('.edit').click(function(){
	$(".new_programa").css("display", "none");
	$(this).parent().next().find( ".new_programa" ).css( "display", "block" );
});
	 
	
	$(document).on('change','.file_upload',function (e) {
		var fupload=$(this).val();
		var tmppath = URL.createObjectURL(event.target.files[0]);
		$(this).parent().parent().find('.path').html(fupload);
		$(this).parent().parent().find('.img_loaded').html('<img src="'+tmppath+'" />');
	});
	
	var nom_slide  = 2;
	
	$(document).on('click','.add_n_slider',function (e) {
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
									+'<input type="hidden" name="nombreSlideImg[]" value=""/>'
									+'<input type="hidden" name="idSlide[]"   value=""/>'
								+'</div><!--slider_fill-->');
		
		nom_slide = nom_slide+1;
		
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
		var error = 0;
		
		$('.requerido').each(function(i, elem){
			$(elem).css({'border':'1px solid #737373'});
			if($(elem).val() == ''){
				$(elem).css({'border':'1px solid red'});
				error++;
			}
		});
		if(error > 0){
			event.preventDefault();
				$('.msg').html('<span>Debe rellenar los campos requeridos </span>');
			//error = 0;	
		}
	});
	//FIN Validamos los inputs de SLIDERS
	//===================================================
     

});//ready


