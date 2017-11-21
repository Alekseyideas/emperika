<?

function getmTitle($termNum){
	$term = get_term( $termNum, 'product_cat','','' );
	echo $term -> name ;
}

function mMenuLi($catName){


	$args = array(
		'post_type' => 'product',
		'product_cat' => $catName
	);
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) {
		while ( $loop->have_posts() ) : $loop->the_post();
			do_action( 'woocommerce_before_shop_loop_item' );
			do_action( 'woocommerce_shop_loop_item_title' );
		endwhile;
	}
	wp_reset_postdata();
}


?>

<section class="mobile-menu">
	<div class="container">
		<div>
			<?mMenuLi('nagrevatelnyj-kabel')?>
		</div>
		<div class="m-menuItem">
			<?getmTitle(16)?>
		</div>

		<!--<ul>
			<li><a href="#">Товары</a>
				<div class="mobileSubMenu">
					<div> <a href="<?php /*echo get_page_link(23)*/?>">Все товары</a></div>
					<div> <span class="cat"><?php /*$catName = 'nagrevatelnyj-kabel'; getmTitle(16);*/?></span></div>
					<?/*mMenuLi($catName);*/?>
					<div> <span class="cat"><?php /*$catName = 'nagrevatelnyj-mat'; getmTitle(15);*/?></span></div>
					<?php /*mMenuLi($catName);*/?>
					<div> <span class="cat"><?php /*$catName = 'regulyatory'; getmTitle(20);*/?></span></div>
					<?php /*mMenuLi($catName);*/?>
					<div> <span class="cat"><?php /*$catName = 'sistemy-snegotayaniya'; getmTitle(19);*/?></span></div>
					<?php /*mMenuLi($catName);*/?>
					<div> <span class="cat"><?php /*$catName = 'konditsionery';  getmTitle(21);*/?></span></div>
					<?php /*mMenuLi($catName);*/?>
				</div>
			</li>
			<li><a href="#">Услуги</a></li>
			<li><a href="#">Вопросы</a></li>
			<li><a href="#">Контакты</a></li>
		</ul>-->
	</div>
</section>