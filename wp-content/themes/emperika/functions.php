<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}
add_filter('woocommerce_cart_needs_payment', '__return_false');


function add_option_field_to_general_admin_page(){
    $option_name = 'my_option';

    // регистрируем опцию
    register_setting( 'general', $option_name );

    // добавляем поле
    add_settings_field(
        'myprefix_setting-id',
        'My custom options',
        'myprefix_setting_callback_function',
        'general',
        'default',
        array(
            'id' => 'myprefix_setting-id',
            'option_name' => 'my_option'
        )
    );
}
add_action('admin_menu', 'add_option_field_to_general_admin_page');

function myprefix_setting_callback_function( $val ){
    $id = $val['id'];
    $option_name = $val['option_name'];

    echo '<input type="text" name="' . $option_name .'" id="' . $id . '" value="' . esc_attr( get_option($option_name) ) . '" />';
}

function my_more_options(){
    register_setting('general','my_phone_options');



    add_settings_field('phone','Номер телефона','display_phone','general');




};
add_action('admin_init', 'my_more_options');


function display_phone(){
    echo "<input type='text' name='my_phone_options' class='regular-text' value='". esc_attr(get_option('my_phone_options')) . "'>";
};

function front_phone(){
    $val = get_option('my_phone_options');
    echo trim($val);
}

register_nav_menus( array(
    'menu-1' => esc_html__( 'Primary', 'emperika' ),
) );



function get_product_category_by_slug($cat_slug)
{
    $category = get_term_by('slug', $cat_slug, 'product_cat', 'ARRAY_A');
    return $category['name'];
}



function getProductCat($catName){
		echo ' <a class="menu-main__catTitle" href="'.esc_url( get_term_link( $catName, 'product_cat' ) ) .'">'.get_product_category_by_slug($catName).'</a>';
}

function getProductName($catName){
	$args = array(
		'post_type' => 'product',
		'product_cat' => $catName
	);
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) {
		while ( $loop->have_posts() ) : $loop->the_post();
			do_action( 'woocommerce_before_shop_loop_item' );
			do_action( 'woocommerce_shop_loop_item_title' );
		endwhile;
	} else {
		echo __( 'В данной категории нет продуктов' );
	}
	wp_reset_postdata();
}

add_filter( 'woocommerce_currencies', 'add_my_currency' );

function add_my_currency( $currencies ) {

	$currencies['UAH'] = __( 'Українська гривня', 'woocommerce' );

	return $currencies;

}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {

	switch( $currency ) {

		case 'UAH': $currency_symbol = 'грн'; break;

	}

	return $currency_symbol;

}




function Product($loop){
	$term_list = wp_get_post_terms(get_the_ID(),'product_cat',array('fields'=>'ids'));
	$cat_id = (int)$term_list[0];


	$product_img = get_the_post_thumbnail_url();
	$product_link = get_permalink( $loop->post->ID );
	$product_title = get_the_title();
	$product_content = get_the_content();
	$product_price = number_format(get_post_meta( get_the_ID(), "_regular_price", true),"0", "  "," ");
	$product_oldPrice = get_post_meta(get_the_ID(),"_sale_price",true );
	$product_oldPrice = $product_oldPrice > 0 ? number_format(get_post_meta( get_the_ID(), "_sale_price", true),"0", "  "," ") : false;
	$product__currency = '<span class="product__currency">&nbsp;грн</span>';
	$product__oldCurrency =  $product_oldPrice > 0 ? $product__currency : false;;

	$product_catName = get_term_field ('name',$cat_id, 'product_cat');
	$product_catLink = get_term_link ($cat_id, 'product_cat');






	echo '
		  	<a href="'.$product_link.'" class="product__image">
		 	 	<img src="'.$product_img.'" alt="product">
			 </a> <br>
			 <a href="'.$product_catLink.'" class="product__cat">
			    '.$product_title.'
			 </a>
			 <br>
			 <a href="'.$product_link.'" class="product__name">
			 	<span>'. $product_content .'</span>
			 	
			</a>
			<div class="product__priceWrapper flex flex--a-center flex--j-center">
			<div>
				<span class="product__oldPrice flex flex--j-center flex--a-bottom">'.$product_oldPrice .  $product__oldCurrency  .'</span>
					<span class="product__price flex flex--j-center flex--a-bottom">'.$product_price. $product__currency .'</span>
			</div>
			</div>
	';
}



function Emperika_filter_plugin_updates($value) {
	unset($value->response['advanced-custom-fields-pro/acf.php']);

	return $value;
}
add_filter('site_transient_update_plugins', 'Emperika_filter_plugin_updates');