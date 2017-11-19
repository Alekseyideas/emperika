<?php

function homePosts($from){
	$args = array(
		'post_type' => 'news',
		'posts_per_page' => 6,
        'order' => 'DESC',
		'offset' => $from
	);
	$loop = new WP_Query( $args );

	while ( $loop->have_posts() ) : $loop->the_post();
		echo '<li> <a href="'.get_permalink().'"> '.get_the_title(). '</a></li>';

	endwhile;
}


?>

<section class="home-news">
	<div class="container">
		<h1 class="section__title section__title--blue">Новости</h1>
		<div class="row">
			<div class="col-md-6">
				<ul>
					<?php	homePosts(0); ?>
				</ul>

			</div>
			<div class="col-md-6">
				<ul>
					<?php	homePosts(6); ?>
				</ul>

			</div>
		</div>
        <div class="text-center">
            <a href="<?php echo get_page_link( '125' );?>" class="btn btn__border--blue showMore">Смотерть все новости</a>
        </div>

	</div>
</section>
<?/*echo do_shortcode('[subscribe2]'); */?>