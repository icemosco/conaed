$(document).ready(function(){
	//MENU

	$('.btns_menu').click(function(){
		$('.btns_menu').removeClass('selected');
		$(this).addClass('selected');
		var btn=$(this).attr('rel');
	
	});
	$('.fslect').change(function(){
	     var slider_s=$(this).val();
	     $(this).parent().find('.fake_select').html(slider_s);
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
	$('.add_n_slider').click(function(){
		var num_slides=$('.slider_fill').length;
			nom_slide=num_slides+1;
			
			if(nom_slide > 5){
				return false;
			}
	
		$('.slider').append('<div class="slider_fill"><span class="title_sl">Slider '+nom_slide+'</span><div class="left mr"><span class="indications">Imágen .jpg ó .png</span><input type="text" name="num_slider[]" id="num_slider"  size="2" style="width: 5%"/><ul><li></li></ul><div class="img_loaded"></div><div class="path">ruta del archivo</div><div class="cont_r"><input type="file" name="imagenSlider[]" id="imagenSlider[]"class="file_upload" name="file" style="width: 125px;height: 35px;bottom: 28%;right: 0%;" /><a href="javascript:void(0)" class="btn_cargar">Cargar</a></div></div><!--left--><div class="right"><div <span class="">Titulo (100 caracteres máx)</span><span class="conteo_char">0 caracteres</span></div><textarea name="titulo[]" id="titulo" id="subtitulo" class="" required ></textarea><div class="sub_text_cont"><span class="">Subtitulo (225 caracteres máx)</span><span class="conteo_char">0 caracteres</span></div><textarea name="subtitulo[]" class="" required ></textarea></div><input type="hidden" name="idSlide[]" id="idSlide"  value=""/></div><!--slider_fill-->');
	
	});
	
	//Coloca el numero de caracteres de los textarea de la seccion de slide
	$('.infoSlide').keyup(function( e ){
		var contador  = e.currentTarget.parentElement.children[1];
		var numCarac  = $(this).val().length;
		$(contador).html( numCarac + " caracteres");

    });
     




});//ready


