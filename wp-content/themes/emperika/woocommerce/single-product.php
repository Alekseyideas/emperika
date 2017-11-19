<?php get_header();
$product_price = number_format(get_post_meta( get_the_ID(), "_regular_price", true),"0", "  "," ");
$product_newPrice = get_post_meta(get_the_ID(),"_sale_price",true );
$product_newPrice = $product_newPrice > 0 ? number_format(get_post_meta( get_the_ID(), "_sale_price", true),"0", "  "," ") : false;

$product__currency = '<span class="product__currency">&nbsp;грн</span>';
$product__newCurrency =  $product_newPrice > 0 ? $product__currency : false;
$upsells = $product->get_upsells();
?>


<?php get_template_part( 'components/component', 'crumbs' ); ?>



<section class="single-product">
	<div class="container">
		<h1 class="single-product__title"><? the_title() ?></h1>
		<div class="row">
			<div class="col-md-3">
                <div class="single-product__img">
					<?php echo get_the_post_thumbnail()?>
                </div>
                <div>

                    <div class="<? echo $product_newPrice > 0 ? 'single-product__old-price' : 'single-product__price'?>"><? echo $product_price . $product__currency ?></div>

					<?
					if($product_newPrice > 0 )
						echo '<div class="single-product__price">'.$product_newPrice . $product__currency .'</div>';
					?>
                </div>

                <div>
					<?php woocommerce_template_loop_add_to_cart(); ?>
                </div>
                <div class="text-center">
					<?php
					global $product;
					echo !$product->managing_stock() && ! $product->is_in_stock() ? do_shortcode('[viewBuyButton]') : do_shortcode('[viewBuyButton]')?>
                </div>
            </div>
            <div class="col-md-9">
                <div class="single-product__content">
	                <?php the_content() ?>
                </div>

            </div>
		</div>
	</div>
</section>

<section class="recommended">
    <div class="container">
      <?php echo sizeof( $upsells ) != 0 ? '<h1 class="section__title">Дополнительно рекомендуем</h1>' : false;?>

        <div class="row">
	        <?php
	        sizeof( $upsells ) != 0 ? GetLoopProduct('4','',$upsells) : false;

	        ?>
        </div>
    </div>
</section>

    <?php get_template_part( 'components/home/component', 'home-news' ); ?>





<?php
get_footer();