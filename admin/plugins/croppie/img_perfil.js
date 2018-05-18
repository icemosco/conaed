var Demo = (function() {

	function uploadImagenPerfil( result ){  
		
		var html;
		if (result.html) {
			html = result.html;
		}
		if (result.src) {
			html = '<img src="' + result.src + '" />';
			
		var file_data = html;
        var form_data = new FormData(); 
                        
        form_data.append('file', file_data);
        form_data.append("accion", 'imagen_perfil');
                    
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
		               	console.log(info.imagenResize);
	                    var texto = "<img  id='perfil_usuario' src='../img/users/" + info.imagenResize + "' width='100%' height='100%'>";
	                    $(".upload-demo-wrap").html('').hide();
	                    $(".upload-result").hide();
	                    $(".upload-msg").html(texto).show();
	                    
	                 }
	        });
			
			
			
		}
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
				width: 165,
				height: 165,
				type: 'circle'
			},
			boundary: { width: 170, height: 170 },
			showZoomer: false,
			enableExif: true
		});
		}

		$('#img_usr').on('change', function () { readFile(this); });
		$('.upload-result').on('click', function (ev) {

			console.log('aqui');

			$uploadCrop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function (resp) {
				uploadImagenPerfil({
					src: resp
				});
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
