var $ = jQuery.noConflict();
$(document).ready(function () {

	//Info de pelicula
	$('.omh').click(function(){
		var cod = $(this).attr('cod');
		var id = $(this).attr('id');
		$('.conte-'+cod).html(' ');
		$('.description').not('.conte-'+cod).slideUp();
		$('.conte-'+cod).slideDown();
		$.ajax({
			method: "POST",
			url: templateurl+"/inc/get_info.php",
			data: { id: id }
		})
		.done(function( data ) {
			$('.conte-'+cod).html( data );
		});
		var wi = $( window ).width();
		if(wi < 480){
			$('html,body').animate({
				scrollTop: $('.conte-'+cod).offset().top},
				'slow');
		}
	});
});