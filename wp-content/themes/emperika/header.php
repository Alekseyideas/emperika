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
                    <?php wp_nav_menu(array(
                        theme_location => 'menu-1',
                        menu_class => 'flex list-none'
                    ))?>
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
