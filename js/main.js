(function($) {

	"use strict";

	let count = 0;

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
	  if(count === 0){
		$('.logo').text('Laundry');
		count += 1;
	  } else {
		$('.logo').text('L.');
		count -= 1;
	  }
  	});

})(jQuery);
