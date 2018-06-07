$(document).ready(function(){


	$('body').on('click', '.btn1', function(){// on sirve para variables dinamicas que no se estaban en el documento original, sino que se crearon en algun momento del script
		var aux = $(this).attr('name');			//on solo sirve con clases no id

		$(".btn1").css({'opacity':'0.5'});

	});

});