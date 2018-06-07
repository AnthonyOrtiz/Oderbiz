$(document).ready(function(){
	
	
	
	window.onload=identificarBTNdisponibilidad();
	function identificarBTNdisponibilidad(){
		$(".btn3").css({'opacity':'0.5'});

	}


			/*var cedula = $("#cedula").val();
			var nombres = $("#nombres").val();
			var apellidos = $("#apellidos").val();
			var telefono = $("#telefono").val();
			var correo = $("#correo").val();
			var departamento = $("#departamento").val();
			var direccion = $("#direccion").val();
			var contrasenia = $("#contrasenia").val();

			if (cedula != '' && nombres != '' && apellidos != '' && telefono != '' 
				&& correo != '' && departamento != '' && direccion != '' && contrasenia != '') {
				swal({
				  title: 'Custom width, padding, background.',
				  width: 600,
				  padding: '3em',
				  background: '#fff url(/images/trees.png)',
				  backdrop: `
				    rgba(0,0,123,0.4)
				    url("/images/nyan-cat.gif")
				    center left
				    no-repeat
				  `
				})
			}*/
});