<?php
get_header();

function GetService($termNum){
	$term = get_term( $termNum, 'setvices_cat','','' );
	echo ' <h1 class="section__title section__title--30px">'.$term -> name.'</h1>';




	$args = array(
		'post_type' => 'services',
		'tax_query' => array(
			array(
				'taxonomy' => 'setvices_cat',
				'field' => 'term_id',
				'terms' => $termNum,
			)
		)
	);
	$loop = new WP_Query( $args );

	while ( $loop->have_posts() ) : $loop->the_post();
		$img = has_post_thumbnail() ? get_the_post_thumbnail_url( ): get_template_directory_uri() . '/images/no-img.jpg';
    echo '
        <div class="col-md-3">
            <a href="'.get_permalink().'" class="services__wrapper">
            <span class="services__img" style="background: url('.$img.') no-repeat center / cover">
                       
            </span>
                 <span class="services__title">
                    '.get_the_title().'
                 </span>
            </a>
        </div>
    ';

	endwhile;

}


?>
<?php get_template_part( 'components/component', 'crumbs' ); ?>



    <section class="services">
        <div class="container">
            <h1 class="section__title">Услуги</h1>

        <div class="row">
            <?GetService(24);?>
            <?GetService(25);?>
            <?GetService(26);?>
           <!-- --><?/*GetService(27);*/?>
        </div>


        </div>
    </section>

<?php get_template_part( 'components/home/component', 'home-news' ); ?>

<?php
get_footer();