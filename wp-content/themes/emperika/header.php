<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */
get_template_part( 'components/component', 'product' );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri()?>/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri()?>/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri()?>/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri()?>/images/favicons/manifest.json">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri()?>/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri()?>/images/favicons/favicon.ico">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri()?>/images/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'storefront_before_site' ); ?>
<div id="page" class="hfeed site">
    <?php do_action( 'storefront_before_header' ); ?>
    <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">

        <div class="mobile">
            <div class="site-header__mobile">
                <div class="flex flex--a-center flex--j-between">
                    <div class="flex flex--a-center">
                        <button class="site-header__mobileSearchBtn">
                            <img src="<?php echo get_template_directory_uri()?>/images/main/m-search.svg" alt="search">
                        </button>
                        <div class="cartMain cart-contents"></div>
                    </div>
                    <a href="/" class="site-header__mobileLogo">
                        <img src="<?php echo get_template_directory_uri()?>/images/main/logo.svg" alt="logo-mobile">
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="disc" viewbox="0 0 30 22">
                            <path fill-rule="evenodd"  fill="#007eff"
                                  d="M-0.000,1.000 L-0.000,-0.000 L25.000,-0.000 L25.000,1.000 L-0.000,1.000 Z"/>
                            <path fill-rule="evenodd"  fill="#007eff"
                                  d="M-0.000,8.000 L-0.000,7.000 L25.000,7.000 L25.000,8.000 L-0.000,8.000 Z"/>
                            <path fill-rule="evenodd"  fill="#007eff"
                                  d="M-0.000,15.000 L-0.000,14.000 L25.000,14.000 L25.000,15.000 L-0.000,15.000 Z"/>
                            <path fill-rule="evenodd"  fill="#007eff"
                                  d="M-0.000,22.000 L-0.000,21.000 L25.000,21.000 L25.000,22.000 L-0.000,22.000 Z"/>
                        </symbol>
                    </svg>

                    <button class="toggleBtnM">

                       <svg>
                           <use xlink:href="#disc">
                       </svg>

                    </button>
                </div>

            </div>

        </div>


        <div class="hidden-xs">
            <div class="site-header__first hidden-sm hidden-xs">
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
						        <?php front_phone()?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="site-header__second">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                            <a href="/" class="main-logo"><img src="<?php echo get_template_directory_uri()?>/images/main/logo.svg" alt="logo"></a>
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-4 col-xs-4" style="position: inherit">

                            <div class="hidden-md hidden-lg text-center"><a href="<?php front_phone()?>" class="m-phone"> <i class="fa fa-phone" aria-hidden="true"></i> <?php front_phone()?></a></div>
                            <div class="menu-main hidden-sm hidden-xs">
                                <div class="flex">
                                    <div class="menu-main__item">
                                        <a href="<?php echo get_page_link(23)?>">Товары</a>
                                        <div class="menu-main__cats">
                                            <div class="container">
                                                <div class="col-md-3">
											        <?php
											        $catName = 'nagrevatelnyj-kabel';

											        getProductCat($catName)

											        ?>

                                                    <div class="menu-main__productNames">
												        <?php getProductName($catName);?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
											        <?php
											        $catName = 'nagrevatelnyj-mat';

											        getProductCat($catName)

											        ?>

                                                    <div class="menu-main__productNames">
												        <?php getProductName($catName);?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
											        <?php
											        $catName = 'regulyatory';

											        getProductCat($catName)

											        ?>

                                                    <div class="menu-main__productNames">
												        <?php getProductName($catName);?>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
											        <?php
											        $catName = '	sistemy-snegotayaniya';

											        getProductCat($catName)

											        ?>

                                                    <div class="menu-main__productNames">
												        <?php getProductName($catName);?>
                                                    </div>
											        <?php
											        $catName = 'konditsionery';

											        getProductCat($catName)

											        ?>

                                                    <div class="menu-main__productNames">
												        <?php getProductName($catName);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menu-main__item">
                                        <a href="<?php echo get_page_link(32)?>">Услуги</a>
                                        <div class="menu-main__cats">
                                            <div class="container">
                                                <div class="col-md-3">
				                                    <?php
				                                    $catName = 'nagrevatelnyj-kabel';

				                                    getProductCat($catName)

				                                    ?>

                                                    <div class="menu-main__productNames">
					                                    <?php getProductName($catName);?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
				                                    <?php
				                                    $catName = 'nagrevatelnyj-mat';

				                                    getProductCat($catName)

				                                    ?>

                                                    <div class="menu-main__productNames">
					                                    <?php getProductName($catName);?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
				                                    <?php
				                                    $catName = 'regulyatory';

				                                    getProductCat($catName)

				                                    ?>

                                                    <div class="menu-main__productNames">
					                                    <?php getProductName($catName);?>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
				                                    <?php
				                                    $catName = '	sistemy-snegotayaniya';

				                                    getProductCat($catName)

				                                    ?>

                                                    <div class="menu-main__productNames">
					                                    <?php getProductName($catName);?>
                                                    </div>
				                                    <?php
				                                    $catName = 'konditsionery';

				                                    getProductCat($catName)

				                                    ?>

                                                    <div class="menu-main__productNames">
					                                    <?php getProductName($catName);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menu-main__item">
                                        <a href="<?php echo get_page_link(25)?>">Вопросы</a>
                                    </div>
                                    <div class="menu-main__item">
                                        <a href="<?php echo get_page_link(27)?>">Контакты</a>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
                            <div class="flex flex--j-right">
                                <div class="cartMain cart-contents"></div>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="hidden-lg hidden-md">

        </div>

    </header><!-- #masthead -->

    <?php
    /**
     * Functions hooked in to storefront_before_content
     *
     * @hooked storefront_header_widget_region - 10
     */
    do_action( 'storefront_before_content' ); ?>



