
(function($) {
	$(document).ready(function() {
		if (localStorage.getItem('porcausa_donate_close')==1)
			$('.donate-box').hide();

		$('.donate-box .close-btn').on('click', function(event) {
			event.preventDefault();
			$('.donate-box').hide();
			localStorage.setItem('porcausa_donate_close', 1);
		});
		if ($(window).width()>768) {
			$('.home-blocks-container').isotope({
				itemSelector: '.home-block-wrap',
				masonry: {
					columnWidth: '.col-md-4'
				}
			});
			$('.archive-blocks-container').isotope({
				itemSelector: '.home-block-wrap',
				masonry: {
					columnWidth: '.col-md-6'
				}
			});
		}

		if ($('.page-template-donar-particular').length>0) {
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
			responsive:{
		        0:{
		            items:2,
		            nav:false
		        },
		        450:{
		            items:4,
		            nav:false
		        },
		        769:{
		            items:6,
		            nav:true,
		        }
		    },
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
			responsive:{
		        0:{
		            items:3,
		        },
		        450:{
		            items:6,
		        },
		        769:{
		            items:8,
		        }
		    },
			center: true,
			loop: true,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
		});
	});
	$(window).load(function() {
		if ($(window).width()>768) {
			$(".home-blocks-container").isotope('layout');
			$(".archive-blocks-container").isotope('layout');
		}
	});
	$(window).on("resize orientationchange",function(){
		if ($(window).width()>768) {
			setTimeout(function(){
				$(".home-blocks-container").isotope('layout');
				$(".archive-blocks-container").isotope('layout');
			},1500);
		}
	});
})(jQuery);