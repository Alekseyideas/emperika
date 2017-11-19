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
    /*'menu-1' => esc_html__( 'Primary', 'emperika' ),*/
    'Company' => esc_html__( 'Company', 'emperika' ),
    'Service' => esc_html__( 'Service', 'emperika' ),
    'Orders' => esc_html__( 'Orders', 'emperika' ),
    'Legal' => esc_html__( 'Legal field', 'emperika' ),
) );



function get_product_category_by_slug($cat_slug)
{
    $category = get_term_by('slug', $cat_slug, 'product_cat', 'ARRAY_A');
    return $category['name'];
}



function getProductCat($catName){
		echo ' <a class="menu-main__catTitle" href="'.esc_url( get_term_link( $catName, 'product_cat' ) ) .'">'.get_product_category_by_slug($catName).'</a>';
}
function getProductCatTitle($catName){
	echo '<h1 class="catTitle">'.get_product_category_by_slug($catName).'</h1>';
}
function getProductCatLink($catName){
	echo esc_url( get_term_link( $catName, 'product_cat' ));
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



// Замена символа валюты
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



// Шаблон цыкла продукта
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
	$product__oldCurrency =  $product_oldPrice > 0 ? $product__currency : false;

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


// Отключение плагина
/*function Emperika_filter_plugin_updates($value) {
	unset($value->response['advanced-custom-fields-pro/acf.php']);

	return $value;
}
add_filter('site_transient_update_plugins', 'Emperika_filter_plugin_updates');*/



/*function filter_plugin_updates( $update ) {
	global $DISABLE_UPDATE; // указывается в wp-config.php
	if( !is_array($DISABLE_UPDATE) || count($DISABLE_UPDATE) == 0 ){  return $update;  }
	foreach( $update->response as $name => $val ){
		foreach( $DISABLE_UPDATE as $plugin ){
			if( stripos($name,$plugin) !== false ){
				unset( $update->response[ $name ] );
			}
		}
	}
	return $update;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

*/



// Наличие товара
function woocommerce_template_loop_stock() {
	global $product;
	if ( ! $product->managing_stock() && ! $product->is_in_stock() )
		echo '<div class="product__availability product__availability--not-available"><i class="fa fa-times-circle" aria-hidden="true"></i><span>Нет в наличии</span></div>';
	else
		echo '<div class="product__availability product__availability--available"><i class="fa fa-check-circle" aria-hidden="true"></i><span>В наличии</span></div>';
}




/*
 * "Хлебные крошки" для WordPress
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

	/* === ОПЦИИ === */
	$text['home'] = 'Главная'; // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
	$text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
	$text['author'] = 'Статьи автора %s'; // текст для страницы автора
	$text['404'] = 'Ошибка 404'; // текст для страницы 404
	$text['page'] = 'Страница %s'; // текст 'Страница N'
	$text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

	$wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
	$wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
	$sep = '/'; // разделитель между "крошками"
	$sep_before = '<span class="sep">'; // тег перед разделителем
	$sep_after = '</span>'; // тег после разделителя
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	$show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
	$before = '<span class="current">'; // тег перед текущей "крошкой"
	$after = '</span>'; // тег после текущей "крошки"
	/* === КОНЕЦ ОПЦИЙ === */

	global $post;
	$home_url = home_url('/');
	$link_before = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link_after = '</span>';
	$link_attr = ' itemprop="item"';
	$link_in_before = '<span itemprop="name">';
	$link_in_after = '</span>';
	$link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
	$frontpage_id = get_option('page_on_front');
	$parent_id = ($post) ? $post->post_parent : '';
	$sep = ' ' . $sep_before . $sep . $sep_after . ' ';
	$home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

	if (is_home() || is_front_page()) {

		if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

	} else {

		echo $wrap_before;
		if ($show_home_link) echo $home_link;

		if ( is_category() ) {
			$cat = get_category(get_query_var('cat'), false);
			if ($cat->parent != 0) {
				$cats = get_category_parents($cat->parent, TRUE, $sep);
				$cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				if ($show_home_link) echo $sep;
				echo $cats;
			}
			if ( get_query_var('paged') ) {
				$cat = $cat->cat_ID;
				echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
			}

		} elseif ( is_search() ) {
			if (have_posts()) {
				if ($show_home_link && $show_current) echo $sep;
				if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
			} else {
				if ($show_home_link) echo $sep;
				echo $before . sprintf($text['search'], get_search_query()) . $after;
			}

		} elseif ( is_day() ) {
			if ($show_home_link) echo $sep;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
			if ($show_current) echo $sep . $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			if ($show_home_link) echo $sep;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
			if ($show_current) echo $sep . $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			if ($show_home_link && $show_current) echo $sep;
			if ($show_current) echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ($show_home_link) echo $sep;
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current) echo $sep . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $sep);
				if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				echo $cats;
				if ( get_query_var('cpage') ) {
					echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
				} else {
					if ($show_current) echo $before . get_the_title() . $after;
				}
			}

			// custom post type
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if ( get_query_var('paged') ) {
				echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . $post_type->label . $after;
			}

		} elseif ( is_attachment() ) {
			if ($show_home_link) echo $sep;
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			if ($cat) {
				$cats = get_category_parents($cat, TRUE, $sep);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				echo $cats;
			}
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current) echo $sep . $before . get_the_title() . $after;

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current) echo $sep . $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($show_home_link) echo $sep;
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $sep;
				}
			}
			if ($show_current) echo $sep . $before . get_the_title() . $after;

		} elseif ( is_tag() ) {
			if ( get_query_var('paged') ) {
				$tag_id = get_queried_object_id();
				$tag = get_tag($tag_id);
				echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
			}

		} elseif ( is_author() ) {
			global $author;
			$author = get_userdata($author);
			if ( get_query_var('paged') ) {
				if ($show_home_link) echo $sep;
				echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_home_link && $show_current) echo $sep;
				if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
			}

		} elseif ( is_404() ) {
			if ($show_home_link && $show_current) echo $sep;
			if ($show_current) echo $before . $text['404'] . $after;

		} elseif ( has_post_format() && !is_singular() ) {
			if ($show_home_link) echo $sep;
			echo get_post_format_string( get_post_format() );
		}

		echo $wrap_after;

	}
}


/*add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {

	$fields['billing']['billing_first_name']['label'] = 'Фамилия Имя';



	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_city']);


	return $fields;
}
*/

