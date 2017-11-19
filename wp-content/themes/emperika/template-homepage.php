<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */

get_header(); ?>

<section class="mainSlider owl-carousel">
    <?php get_template_part( 'components/home/component', 'slider' ); ?>
</section>
<?php get_template_part( 'components/home/component', 'why' ); ?>
<?php get_template_part( 'components/home/component', 'home-warm-floors' ); ?>
<?php get_template_part( 'components/component', 'bestsellers' ); ?>
<?php get_template_part( 'components/home/component', 'home-about-us' ); ?>
<?php get_template_part( 'components/home/component', 'home-services' ); ?>
<?php get_template_part( 'components/home/component', 'home-video' ); ?>
<?php get_template_part( 'components/home/component', 'home-news' ); ?>




<?php
get_footer();
