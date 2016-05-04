(function($) {
	$(document).ready(function() {
		$('.home-blocks-container').isotope({
			itemSelector: '.home-block-wrap',
			masonry: {
				columnWidth: '.col-md-4'
			}
		});

		if ($('.page-template-donar-particular').length>0) {
			console.log(fundraising);
			fundraising.init({
				tenantId: "1",
				merchantId: "porcausa",
				paymentSecret: "7s12mV3mRe",
				postDonationSuccessPage : "https://porcausa.org/gracias",
			});
		}
		

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

        $('.change-lights').on('click', function(event) {
        	event.preventDefault();
        	$('body').toggleClass('lights-off');
        });

        $('.show-thumbs').on('click', function(event) {
        	event.preventDefault();
        	$('.owl-thumbs').toggleClass('hide');
        });

		$('.team-carousel').owlCarousel({
			items: 6,
			loop: true,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
		});
		$('.post-gallery').owlCarousel({
			items: 1,
			loop: true,
			dots: false,
			nav: true,
   	 		autoHeight:false,
			navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
		});
		$('.owl-thumbs').owlCarousel({
			items: 2,
			center: true,
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