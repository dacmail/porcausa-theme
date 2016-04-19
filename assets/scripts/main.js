(function($) {
	$(document).ready(function() {
		$('.home-blocks-container').isotope({
		  itemSelector: '.home-block-wrap',
		  layoutMode: 'fitRows',
		  masonry: {
		    columnWidth: '.home-block-wrap'
		  }
		});
	});
	$(window).load(function() {
		//JS
	});
})(jQuery);