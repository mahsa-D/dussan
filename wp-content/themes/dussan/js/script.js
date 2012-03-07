/* Author: 8manos

*/

jQuery(document).ready(function($) {
	$('#viewport').serialScroll({
		axis: 'y',
		cycle: false,
		items:'.slide'
	});

	// mousewheel
	$(window).mousewheel(function(event,delta)
	{
		event.preventDefault();
		if(delta < 0){
			$('#viewport').trigger( 'next' );
			console.log(delta);
		}else{
			$('#viewport').trigger( 'prev' );
			console.log(delta);
		}
	});

	// keyboard
	$(document).bind("keydown", function (event) {
		var p = event.keyCode;
		if(p == 40 || p == 38)
		{
			event.preventDefault();
		}
	});
	$(document).bind("keyup", function (event) {
		// left = 37
		// right = 39
		// up = 38
		// down = 40
		var p = event.keyCode;
		if(p == 40 || p == 38 || p == 37 || p == 39)
		{
			event.preventDefault();
			switch(p)
			{
				case 40:
					// down
					$('#viewport').trigger( 'next' );
					break;
				case 38:
					//up
					$('#viewport').trigger( 'prev' );
					break;
				case 37:
					// left
					$('#viewport').trigger( 'prev' );
					break;
				case 39:
					// right
					$('#viewport').trigger( 'next' );
					break;
			}
		}
	});
});
