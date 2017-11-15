jQuery(document).ready(function($) {

    const search = $('#serch');
    search.click(function () {

        $('header input[type="submit"]').click();
    });

    const arrowLeft = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
    const arrowRight = '<i class="fa fa-angle-right" aria-hidden="true"></i>';

    $('.mainSlider').owlCarousel({
        items: 1,
        dots: true,
        navText: [arrowLeft,arrowRight],
        responsive:{
            993:{
                nav: true
            }
        }
    });
});