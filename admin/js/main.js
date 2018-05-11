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
		        	$('.search').html('<a href="javascript:void(0)" class="add_item" rel="slider" title="Agregar un nuevo slider"><img src="../img/plus.png" alt="" /></a>');
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


});
    
	/*$('.file_upload').change(function(){
	     var fupload=$(this).val();
	      $(this).parent().parent().find('.path').html(fupload);
	      $(this).parent().parent().find('.img_loaded').html('<img src="'+fupload+'" />');
	     
	 });*/
	
	$(document).on('change','.file_upload',function (e) {
		var fupload=$(this).val();
		var tmppath = URL.createObjectURL(event.target.files[0]);
		$(this).parent().parent().find('.path').html(fupload);
		$(this).parent().parent().find('.img_loaded').html('<img src="'+tmppath+'" />');
	});
	
	
	
	var nom_slide=1;
	$('.add_item').click(function(){
		var num_slides=$('.slider_fill').length;
			nom_slide=num_slides+1;
			
			if(nom_slide > 5){
				return false;
			}
	
		$('.save_btn').before('<div class="slider_fill"><span class="title_sl">Slider '+nom_slide+'</span><div class="left mr"><span class="indications">Imágen .jpg ó .png</span><input type="text" class="order_box_s" name="num_slider[]" id="num_slider"  value="'+nom_slide+'" size="2" style="width: 5%"/><div class="img_loaded"><img src="../img/pic.png"></div><div class="path">ruta del archivo</div><div class="cont_r"><input type="file" required="required" name="imagenSlider[]" id="imagenSlider[]"class="file_upload" name="file" style="width: 125px;height: 35px;bottom: 28%;right: 0%;" /><a href="javascript:void(0)" class="btn_cargar">Cargar</a></div></div><!--left--><div class="right"><div class="sub_text_cont"><span class="">Titulo (100 caracteres máx)</span><span class="conteo_char">0 caracteres</span><textarea required="required" name="titulo[]" id="titulo" id="titulo" class="infoSlide" maxlength="100" required ></textarea></div><div class="sub_text_cont"><span class="">Subtitulo (225 caracteres máx)</span><span class="conteo_char">0 caracteres</span><textarea required="required" name="subtitulo[]" id="subtitulo" class="infoSlide"  maxlength="225" required ></textarea></div><input type="hidden" name="idSlide[]" id="idSlide"  value=""/></div><!--slider_fill-->');
	
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
     

});//ready


