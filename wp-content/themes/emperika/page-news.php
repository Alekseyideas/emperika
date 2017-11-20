<?php
get_header(); ?>
<?php get_template_part( 'components/component', 'crumbs' ); ?>

<?php

function MyPosts($from){
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

    <section class="news">
        <div class="container">
            <h1 class="section__title">Новости</h1>
            <div class="row">
             <?
             $args = array(
	             'post_type' => 'news',
	             'posts_per_page' => 40,
	             'order' => 'DESC',
	             'offset' => $from
             );

             $loop = new WP_Query( $args );

             while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                 <div class="col-md-3">

                     <a href="<? echo the_permalink()?>" class="news__wrapper">
	                    <span class="news__image" style=" background: url('<? echo has_post_thumbnail() ? the_post_thumbnail_url() : get_template_directory_uri().'/images/no-img.jpg'?>') no-repeat center / cover;">

                        </span>
                         <span class="news__title"><?the_title()?></span>
                     </a>

                 </div>

                 <?
             endwhile;
             ?>

            </div>


        </div>
    </section>



<?php
get_footer();