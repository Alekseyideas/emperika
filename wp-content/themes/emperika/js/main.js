'use strict';

jQuery(document).ready(function ($) {

    var search = $('#serch');
    search.click(function () {

        $('header input[type="submit"]').click();
    });

    $('.mainSlider').owlCarousel({
        items: 1
    });
});