/* =================================
------------------------------------
	Cryptocurrency - Landing Page Template
	Version: 1.0
 ------------------------------------ 
 ====================================*/


'use strict';


$(window).on('load', function() {
	/*------------------
		Preloder
	--------------------*/
	$(".loader").fadeOut();
	$("#preloder").delay(400).fadeOut("slow");

});

(function($) {

    /**
     * only integers allow in input
     */
    $('.numeric-only').ForceNumericOnly();

    /**
     * call to server for exchange rates
     */
    $('body').on('click', '#btn-convert-currency', function() {
        var currencyTotal     = $('#base-currency-total').val();
        var currencyToConvert = $('#currency-to-convert option:selected').val();

        if (!currencyTotal) {
            alert('Please, fill input');
            return false;
        }

        $.ajax({
            url: '/app/actions/convert.php',
            type: 'post',
            async: true,
            data: {
                convert: true,
                currencyTotal: currencyTotal,
                currencyToConvert: currencyToConvert

            },
            beforeSend: function() {
                $(".loader").fadeIn("slow");
                $("#preloder").fadeIn("slow");
            },
            success: function() {
            },
            complete: function() {
                $(".loader").fadeOut();
                $("#preloder").delay(400).fadeOut("slow");
            }
        })
    })

	/*------------------
		Navigation
	--------------------*/
	$('.responsive-bar').on('click', function(event) {
		$('.main-menu').slideToggle(400);
		event.preventDefault();
	});


	/*------------------
		Background set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});

	
	/*------------------
		Review
	--------------------*/
	var review_meta = $(".review-meta-slider");
    var review_text = $(".review-text-slider");


    review_text.on('changed.owl.carousel', function(event) {
		review_meta.trigger('next.owl.carousel');
	});

	review_meta.owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		items: 3,
		center: true,
		margin: 20,
		autoplay: true,
		mouseDrag: false,
	});


	review_text.owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		items: 1,
		margin: 20,
		autoplay: true,
		navText: ['<i class="ti-angle-left"><i>', '<i class="ti-angle-right"><i>'],
		animateOut: 'fadeOutDown',
    	animateIn: 'fadeInDown',
	});



	 /*------------------
		Contact Form
	--------------------*/
    $(".check-form").focus(function () {
        $(this).next("span").addClass("active");
    });
    $(".check-form").blur(function () {
        if ($(this).val() === "") {
            $(this).next("span").removeClass("active");
        }
    });


})(jQuery);

