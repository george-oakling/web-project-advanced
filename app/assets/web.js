WebFont.load({
	google: {
		//families: ['Open Sans', 'Droid Serif']
	}
});

$(function () {

	//$('.flash').delay(3000).fadeOut();
	
	
	// JS menu
	$(document).on('click','.navbar-collapse.in', function(e) {
		if( $(e.target).is('a') ) {
			$(this).collapse('hide');
		}
	});

});
