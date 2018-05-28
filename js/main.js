$(document).ready(function(){
	$('.btn_menu').click(function(){
		if($(this).hasClass('closed')){
				$(this).removeClass('closed').addClass('opened').html('CERRAR').show();
				$('.menu_p').animate({"right":"0px"}, "slow");
			}
			else{
				$(this).removeClass('opened').addClass('closed').html('MENU').show();
				$('.menu_p').animate({"right":"-400px"}, "slow");
			}
});
	


$('.btns_menu').click(function() {
	$('.btns_menu').removeClass('selected_c');
	$(this).addClass('selected_c');
	var id=$(this).attr('title');
	$('html, body').animate({scrollTop: $("#"+id).offset().top}, 1000);
	$('.btn_menu').removeClass('opened').addClass('closed').html('MENU').show();
	$('.menu_p').animate({"right":"-400px"}, "slow");
	
});

$('.btns_menu_footer').click(function() {
	var id_2=$(this).attr('title');
	$('html, body').animate({scrollTop: $("#"+id_2).offset().top}, 1000);
	
});




$('.phone_icon').click(function(){
	var sizew=$(window).width();
	if(sizew <= 768){
		$('.btns_call_mobile').animate({"top":"60px",'z-index':'1'}, "slow");
	}

});

$('.ph1, .ph2').click(function(){
	$('.btns_call_mobile').animate({"top":"0px",'z-index':'-1'}, "slow");
	
});



$("#contact_form").bind("submit",function(){
      var btn_envio = $("#btn_envio");
       $.ajax({
            type:$(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),

            beforeSend: function(){
                btn_envio.val("Enviando"); // Para input de tipo button
                btn_envio.attr("disabled","disabled");
},
            complete:function(data){
                //Se ejecuta al termino de la petición
                btn_envio.val("Enviar");
                btn_envio.removeAttr("disabled");
            },
            success: function(data){
                //Se ejecuta cuando termina la petición y esta ha sido correcta
				$('.email_response').show();
                $('.email_response').html(data);
},
            error: function(data){
                // Se ejecuta si la peticón ha sido erronea
                
                alert("Problemas al tratar de enviar el formulario");
            }
        });

        // Nos permite cancelar el envio del formulario
        return false;
    
    });
$(document).on('click','.close_contacto',function (e) {
	$('.email_response').html('').hide();
	$('.br1').val('');
});

$('#cmb_filter_asociados').change(function( e ){

 var filt_sel=$("#cmb_filter_asociados option:selected").text();
 var gfval_sel=$("#cmb_filter_asociados").val();
 $('.fake_select').html(filt_sel);

 var id     = e.target.id;
 var optionSelect = $("#"+id ).val();

  $.ajax({
         type: "POST",
         url: "./php/ajaxAcreditados.php",
         data: {
          numPagina    : $('#valPaginador').val(),
          idCategoria  : optionSelect
      },
         success: function(data)
         { 
          info = JSON.parse(data);
          console.log(info.template);
          $(".programas").empty();
          $('.programas').append(info.template);
          if($('#tipoPagina').val() === 'acreditados'){
            $(".paginator").empty();
            $('.paginator').append(info.paginador);

            $(".numreg_total").empty();
            $('.numreg_total').append(info.totalRegistros + ' resultados');

          }
          
         }
  });
});

	
});//ready

function paginadorAcreditados( numPagina ){

 var optionSelect = $('#cmb_filter_asociados').val();

 $.ajax({
         type: "POST",
         url: "./php/ajaxAcreditados.php",
         data: {
          numPagina    : numPagina,
          idCategoria  : optionSelect
      },
         success: function(data)
         { 
          info = JSON.parse(data);
          console.log(info.template);
          $(".programas").empty();
          $('.programas').append(info.template);

           $(".paginator").empty();
           $('.paginator').append(info.paginador);

           $(".numreg_total").empty();
           $('.numreg_total').append(info.totalRegistros + ' resultados');
         }
  });

}

