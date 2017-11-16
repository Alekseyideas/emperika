<?php
global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price = get_post_meta( get_the_ID(), '_regular_price', true);
$sale = get_post_meta( get_the_ID(), '_sale_price', true);
?>

<section class="bestsellers">
    <div class="container">
        <h1 class="section__title">Топ 8 товаров</h1>
       <!-- --><?php /*echo do_shortcode('[products limit="2" columns="4" orderby="popularity" class="quick-sale" best_selling="true"]')*/?>

    <div class="row">
        <div class="mobile">
	        <?php
	        GetLoopProduct (8,'total_sales');
	        // Setup your custom query
	        ?>

        </div>
        <div class="tablet"></div>
        <div class="desktop"></div>
    </div>


    </div>
</section>