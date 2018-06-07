$(document).ready(function(){

	window.onload=identificarBTNdisponibilidad();
	function identificarBTNdisponibilidad(){
		$(".btn3").css({'opacity':'0.5'});
	}

	$('body').on('click', '#a', function(){// on sirve para variables dinamicas que no se estaban en el documento original, sino que se crearon en algun momento del script
		var aux = $(this).attr('name');			//on solo sirve con clases no id
		var cedula = $('#cedula').val();
		var descripcion = $('#txt').val();
		var horaEntrada = $('#horaEntrada').val();
		var horaSalida = $('#horaSalida').val();
		var fecha = $('#fecha').val();

	    $.ajax({
				url: 'http://127.0.0.1/oderbiz3/control/horasExtras.php',
				type: 'POST', // para obtener un valor del php que se desea 
				data:{horaEntrada,horaSalida,fecha,cedula,descripcion},
				success: function(){//es la variable que retorna el archivo php al que se llame.
			    	swal("Horario registrado", "presione OK para continuar", "success");
				},
				error: function(xhr, status){			
					swal("Error en registrar el horario", "", "warning");
				}
		});

	});

});