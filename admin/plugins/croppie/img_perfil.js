var Demo = (function() {

	function uploadImagenPerfil(img){  
        var file_data = img;
        var form_data = new FormData(); 
                        
        form_data.append('file', file_data);
        form_data.append("accion", 'imagen_perfil');
        form_data.append("id_usuario", "<?php echo $_SESSION['imgPerfil']?>");
                    
        $.ajax({
            url: '../ajax/ajaxGuardaImagenes.php', 
            dataType: 'text',  
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
               	success: function(php_script_response){        
                    var texto = "<img  id='perfil_usuario' src='" + php_script_response + " alt='Imagen de usuario' alt='Imagen de usuario' width='100%' height='100%'>";
                    $("#upload-msg").html('');
                    $("#upload-msg").html(texto);
                 }
         });
      } 




	function demoUpload() {
		var $uploadCrop;

		function readFile(input) {
 			if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            
	            reader.onload = function (e) {
					$('.upload-demo').addClass('ready');
	            	$uploadCrop.croppie('bind', {
	            		url: e.target.result
	            	}).then(function(){
	            		console.log('jQuery bind complete');
	            	});
	            	
	            }
	            
	            reader.readAsDataURL(input.files[0]);
	        }
	        /*else {
		        swal("Lo sentimos tu navegador no soporta ");
		    }*/
		}
		
		if(jQuery().croppie) {
		$uploadCrop = $('#upload-demo').croppie({
			viewport: {
				width: 170,
				height: 160/*,
				type: 'circle'*/
			},
			boundary: { width: 180, height: 170 },
			showZoomer: false			/*,
			enableExif: true*/
		});
		}

		$('#img_usr').on('change', function () { readFile(this); });
		$('.upload-result').on('click', function (ev) {

			console.log('aqui');

			$uploadCrop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function (result) {

				
				var html;
		if (result.html) {
			html = result.html;
		}
		if (result.src) {
			html = '<img src="' + result.src + '" />';
			uploadImagen(html); // Guardamos la imagen
		}

			});
		});
	}
	function init() {
		demoUpload();
	}

	return {
		init: init
	};
})();	

// Full version of `log` that:
//  * Prevents errors on console methods when no console present.
//  * Exposes a global 'log' function that preserves line numbering and formatting.
(function () {
  var method;
  var noop = function () { };
  var methods = [
      'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
      'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
      'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
      'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {});
 
  while (length--) {
    method = methods[length];
 
    // Only stub undefined methods.
    if (!console[method]) {
        console[method] = noop;
    }
  }
 
 
  if (Function.prototype.bind) {
    window.log = Function.prototype.bind.call(console.log, console);
  }
  else {
    window.log = function() { 
      Function.prototype.apply.call(console.log, console, arguments);
    };
  }
})();
