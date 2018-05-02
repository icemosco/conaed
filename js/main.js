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




$('.phone_icon').click(function(){
	var sizew=$(window).width();
	if(sizew <= 768){
		$('.btns_call_mobile').animate({"top":"60px",'z-index':'1'}, "slow");
	}

});

$('.ph1, .ph2').click(function(){
	$('.btns_call_mobile').animate({"top":"0px",'z-index':'-1'}, "slow");
	
});

	
});//ready

