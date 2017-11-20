<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>
<?php get_template_part( 'components/component', 'crumbs' ); ?>
    <br>
	<section style="font-size: 18px">
		<div class="container site-main" role="main">

		<?php while ( have_posts() ) : the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'single' );

			do_action( 'storefront_single_post_after' );

		endwhile; // End of the loop. ?>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
