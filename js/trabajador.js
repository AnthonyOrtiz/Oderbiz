
$(document).ready(function(){
	function disableTxt() {
	    document.getElementById("entrada").disabled=true;
	    document.getElementById("entrada").style.opacity= 0.5;

	}

	$('body').on('click', '.entrada', function(){// on sirve para variables dinamicas que no se estaban en el documento original, sino que se crearon en algun momento del script
		var aux = $(this).attr('name');			//on solo sirve con clases no id

			$.ajax({
				url: 'http://127.0.0.1/oderbiz3/control/horaEntradaTra.php',
				type: 'GET', // para obtener un valor del php que se desea 
				data:{},
				success: function($resultado){//es la variable que retorna el archivo php al que se llame.
			    	swal("Entrada registrada", "presione OK para continuar", "success");
			    	$("#entrada").css({'opacity':'0.5'});
			    	$("#entrada").attr("disabled", true);
			    	$("#salida").css({'opacity':'1'});
			    	$("#salida").attr("disabled", false);
			    	$("#txt").css({'opacity':'1'});
			    	$("#txt").attr("disabled", false);
				},
				error: function(xhr, status){			
					swal("Error en registrar Entrada", "", "warning");
				}
			});

	});

	$('body').on('click', '.salida', function(){// on sirve para variables dinamicas que no se estaban en el documento original, sino que se crearon en algun momento del script
		var aux = $(this).attr('name');
		var parametro = $("#txt").val();
	
			$.ajax({
				url: 'http://127.0.0.1/oderbiz3/control/horaSalidaTra.php',
				type: 'POST', // para obtener un valor del php que se desea 
				data:{parametro},
				success: function($resultado){//es la variable que retorna el archivo php al que se llame.
					swal("Salida registrada", "presione OK para continuar", "success");
					$("#entrada").css({'opacity':'1'});
					$("#entrada").attr("disabled", false);
			    	$("#salida").css({'opacity':'0.5'});
			    	$("#salida").attr("disabled", true);
			    	$("#txt").css({'opacity':'0.5'});
			    	$("#txt").attr("disabled", true);
			    	$("#txt").val('');
				},
				error: function(xhr, status){			
					swal("Error en registrar Salida", "", "warning");
				}
			});

	});

	window.onload=identificarBTNdisponibilidad();
	function identificarBTNdisponibilidad(){
		startTime();
		
		var estado = $('#a').val();
		
		if (estado == 0) {
			
			document.getElementById("salida").disabled=true;
	    	document.getElementById("salida").style.opacity= 0.5;
	    	document.getElementById("txt").disabled=true;
	    	document.getElementById("txt").style.opacity= 0.5;
	 		document.getElementById("entrada").disabled=false;
	    	
		}else if(estado == 1){
	    	document.getElementById("salida").disabled=false;
	    	
	    	document.getElementById("txt").disabled=false;
	    	
			document.getElementById("entrada").disabled=true;
	    	document.getElementById("entrada").style.opacity= 0.5;
		}
		
	}

	function startTime() {
	    var today = new Date();
	    var hr = today.getHours();
	    var min = today.getMinutes();
	    var sec = today.getSeconds();
	    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
	    hr = (hr == 0) ? 12 : hr;
	    hr = (hr > 12) ? hr - 12 : hr;
	    //Add a zero in front of numbers<10
	    hr = checkTime(hr);
	    min = checkTime(min);
	    sec = checkTime(sec);
	    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
	    
	    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
	    var curWeekDay = days[today.getDay()];
	    var curDay = today.getDate();
	    var curMonth = months[today.getMonth()];
	    var curYear = today.getFullYear();
	    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
	    document.getElementById("date").innerHTML = date;
	    
	    var time = setTimeout(function(){ startTime() }, 500);
	}
	function checkTime(i) {
	    if (i < 10) {
	        i = "0" + i;
	    }
	    return i;
	}

});
