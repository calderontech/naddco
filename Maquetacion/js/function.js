var $ = jQuery.noConflict();
$(document).ready(function () {

	//FLIP CARD
	//setInterval(function(){ 
		var wi = $( window ).width();
		if(wi > 720){
			console.log('web');
			$( ".cardflip" )
			.mouseenter(function() { $(this).toggleClass('flipped'); })
			.mouseleave(function() { $(this).toggleClass('flipped'); });
		} else{
			$('.cardflip').click(function(){
				$(this).toggleClass('flipped');
			});
		}
	//}, 50);
	

	//PLAY AND STOP AUDIO
	$('.audio').click(function(){
		$(this).find('.pause').toggleClass('mostrar');
	});

	//MENU MOVIL
	$( ".buttonMovil" ).click(function() {
		$( ".contentmenu" ).animate({
			height: [ "toggle", "swing" ]
		}, 500 );
	});

	//BUSCADOR
	$( ".searchMenu" )
	.focusin(function() {
  		$('.searchButton').toggleClass('white');
	}).focusout(function() {
  		$('.searchButton').toggleClass('white');
	});

	//BACK TO TOP
	$( ".btt" ).click(function() {
		$('html,body').animate({
            scrollTop: 0
        }, 700);
	});

});
