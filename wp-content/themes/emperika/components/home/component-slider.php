<?php
$args = array(
	'post_type' => 'slider',
	'posts_per_page' => 6,
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	?>
	<div class="mainSlider__item flex flex--a-center" style="background-image: url(<?php echo get_field('slideimg')?>)">
			<div class="container text-center">
				<h1 class="mainSlider__title"><?php the_title()?></h1>
				<h3 class="mainSlider__text"><?php the_content()?></h3>
                <?php
                    $link = get_field('slider_link');
                    $link_text = get_field('slider_btn');
               ?>
                <a class="btn mainSlider__btn" href="<?php echo $link; ?>"><?php echo $link_text; ?></a>
			</div>


	</div>
	<?
endwhile;
?>

