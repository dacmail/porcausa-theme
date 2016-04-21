(function($) {
	$(document).ready(function() {
		$('.home-blocks-container').isotope({
			itemSelector: '.home-block-wrap',
			masonry: {
				columnWidth: '.col-md-4'
			}
		});
        $(window).bind("scroll", function(){ //when the user is scrolling...
        	if ($(window).scrollTop() >= 100) { //header hide by scroll
                $('#header').addClass('overflow');
            } else {
                $('#header').removeClass('overflow');
            }
            if ($(window).scrollTop() >= $(window).height()/2) { 
                $('#header').addClass('fixed');
            } else {
                $('#header').removeClass('fixed');
            }
        });

        $('#tabs a').on('click', function(e) {
	        e.preventDefault();
	        $(this).tab('show');
	    });

		$('.team-carousel').owlCarousel({
			items: 6,
			loop: true,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
		});
	});
	$(window).load(function() {
		$(".home-blocks-container").isotope('layout');
	});
	$(window).on("resize orientationchange",function(){
		setTimeout(function(){
			$(".home-blocks-container").isotope('layout')
		},1500);
	});
})(jQuery);