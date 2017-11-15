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
	    <?php

	    // Setup your custom query
	    $args = array(
		    'post_type' => 'product',
		    'posts_per_page' => 8,
		    'meta_key' => 'total_sales',
		    'orderby' => 'meta_value_num' );
	    $loop = new WP_Query( $args );

	    while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <div class="col-md-3">
                <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
		            <?php the_title(); ?>
                    <br>
                    <?php echo number_format(get_post_meta( get_the_ID(), '_regular_price', true),'0', '  ',' ')?> грн

                    <br>
	                <?php woocommerce_template_loop_add_to_cart(); //ouptput the woocommerce loop add to cart button ?>

                    <?php echo do_shortcode('[viewBuyButton]')?>
                </a>
            </div>


	    <?php endwhile; wp_reset_query(); // Remember to reset ?>

    </div>


    </div>
</section>