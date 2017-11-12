<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'storefront_before_site' ); ?>
<div id="page" class="hfeed site">
    <?php do_action( 'storefront_before_header' ); ?>
    <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">

        <div class="site-header__first">
            <div class="container">
                <div class="pull-right">
                    <div class="flex flex--a-center site-header__wrapper">
                        <div class="flex site-header__search">
                            <form role="search" method="get" class="main_search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
                                <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />

                                <button type="submit" class="btn btn__search"><i class="fa fa-search" aria-hidden="true"></i></button>
                                <input type="hidden" name="post_type" value="product" />
                            </form>
                        </div>
                        <div class="flex flex--a-center site-header__phone">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <?front_phone()?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="site-header__second">
            <div class="container">
                <div class="col-md-3">
                    <a href="/" class="main-logo"><img src="<?php echo get_template_directory_uri()?>/images/main/logo.png" alt="logo"></a>
                </div>
                <div class="col-md-7">

                    <div class="menu-main">
                            <div class="flex menu-main__item">
                                <a href="#">Товары</a>
                                <div class="menu-main__cats">
                                    <div class="container">
                                        <div class="col-md-3">
                                            <a href="<?php echo esc_url( get_term_link( 'nagrevatelnyj-mat', 'product_cat' ) ); ?>"><?php echo get_product_category_by_slug('nagrevatelnyj-mat'); ?> </a>



                                            <ul class="products">
                                                <?php
                                                $args = array(
                                                    'post_type' => 'product',
                                                    'product_cat' => 'nagrevatelnyj-mat'
                                                );
                                                $loop = new WP_Query( $args );
                                                if ( $loop->have_posts() ) {
                                                    while ( $loop->have_posts() ) : $loop->the_post();
                                                        do_action( 'woocommerce_before_shop_loop_item' );
                                                        do_action( 'woocommerce_shop_loop_item_title' );
                                                    endwhile;
                                                } else {
                                                    echo __( 'No products found' );
                                                }
                                                wp_reset_postdata();
                                                ?>
                                            </ul><!--/.products-->





                                          <!--  --><?php /*echo do_shortcode('[product_category category="nagrevatelnyj-mat" per_page="12"]')*/?>
                                        </div>
                                    </div>





                                </div>
                            </div>
                        
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </header><!-- #masthead -->

    <?php
    /**
     * Functions hooked in to storefront_before_content
     *
     * @hooked storefront_header_widget_region - 10
     */
    do_action( 'storefront_before_content' ); ?>

    <div id="content" class="site-content" tabindex="-1">
        <div class="col-full">

<?php
/**
 * Functions hooked in to storefront_content_top
 *
 * @hooked woocommerce_breadcrumb - 10
 */
do_action( 'storefront_content_top' );
