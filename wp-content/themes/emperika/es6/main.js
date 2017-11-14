jQuery(document).ready(function($) {

    const search = $('#serch');
    search.click(function () {

        $('header input[type="submit"]').click();
    });

    $('.mainSlider').owlCarousel({
        items: 1
    });
});