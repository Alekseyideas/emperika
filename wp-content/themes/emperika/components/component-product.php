<?php



function GetLoopProduct($count, $key){

// Setup your custom query
$args = array(
	'post_type' => 'product',
	'posts_per_page' => $count,
	'meta_key' => $key,
	'orderby' => 'meta_value_num' );
$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post(); ?>

	<div class="col-lg-3 col-sm-6">
		<div class="product__wrapper">
			<?php Product($loop);?>
			<div>
				<?php woocommerce_template_loop_add_to_cart(); ?>
			</div>
			<div>
				<?php echo do_shortcode('[viewBuyButton]')?>
			</div>
		</div>
	</div>

<?php endwhile; wp_reset_query(); // Remember to reset ?>

<?php }?>
