$(document).ready(function(){
	$('body').on('click', '#test', function(){// on sirve para variables dinamicas que no se estaban en el documento original, sino que se crearon en algun momento del script
		swal({
			  title: 'Custom animation with Animate.css',
			  animation: false,
			  customClass: 'animated tada'
			})
	});


});
