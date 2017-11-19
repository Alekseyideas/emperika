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

    $('.home-video__btn').click(function () {
        $(".home-video__bg").css("z-index", "-1");
        var symbol = $("#home-video")[0].src.indexOf("?") > -1 ? "&" : "?";
        $("#home-video")[0].src += symbol + "autoplay=1";
    });

    var btnUpdate = $('.btnCaRtUpdate');
    btnUpdate.prop("disabled", false);

    function AjaxCart() {
        $('.product-quantity .less').click(function () {
            var quantity = $(this).parents('.product-quantity ').find('input').val();
            quantity = quantity > 1 ? quantity - 1 : 1;
            $(this).parents('.product-quantity ').find('input').val(quantity);

            $('.btnCaRtUpdate').trigger("click");
        });
        $('.product-quantity .more').click(function () {
            var quantity = $(this).parents('.product-quantity ').find('input').val();
            quantity = +quantity + 1;
            $(this).parents('.product-quantity ').find('input').val(quantity);

            $('.btnCaRtUpdate').trigger("click");
        });
    }
    AjaxCart();
    $(document.body).on('updated_cart_totals', function () {
        $('.btnCaRtUpdate').prop("disabled", false);
        AjaxCart();
    });
});