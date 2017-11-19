<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php


global $wp_query;
$category_name = $wp_query->query_vars['product_cat'];




?>
<?php get_template_part( 'components/component', 'crumbs' ); ?>

<section>
    <div class="container">
        <div class="text-center">
	        <?php getProductCatTitle($category_name)?>
        </div>

        <div class="row">
            <?GetLoopProduct (60,'','',$category_name);?>
        </div>
    </div>
</section>
<?php get_template_part( 'components/home/component', 'home-news' ); ?>
<?php
get_footer();
