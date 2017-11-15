'use strict';

jQuery(document).ready(function ($) {

    var search = $('#serch');
    search.click(function () {

        $('header input[type="submit"]').click();
    });

    var arrowLeft = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
    var arrowRight = '<i class="fa fa-angle-right" aria-hidden="true"></i>';

    $('.mainSlider').owlCarousel({
        items: 1,
        dots: true,
        navText: [arrowLeft, arrowRight],
        responsive: {
            993: {
                nav: true
            }
        }
    });
});