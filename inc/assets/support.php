<?php
/**
 * Theme support secion
 * @package Dynast
 */
$options = get_option('post-formats');
$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output  = array();
foreach ($formats as $format) {
    $output[] = (@$options[$format] == 1 ? $format : '');
}
if (!empty($options)) {
    add_theme_support('post-formats', $output);
}

$options = esc_attr(get_option('custom-header'));
if(!empty(@$options)){
	add_theme_support('custom-header');
}

$background = esc_attr(get_option('custom-background'));
if(@$background == 1){
	add_theme_support('custom-background');
}

$thumbnails = esc_attr(get_option('post-thumbnails'));
if(@$thumbnails == 1){
	add_theme_support('post-thumbnails');
	
add_image_size('home-image', 350, 190, true);
}

$html5Support = esc_attr(get_option('html5-support'));
if(@$html5Support == 1){
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
}

$titletage = esc_attr(get_option('title-tag'));
if(@$titletage == 1){
	add_theme_support('title-tag');
}
$woo = esc_attr(get_option('woocommerce-support'));
if(@$woo == 1){
	add_theme_support('woocommerce');
}
$cusLogo  = get_option('custom-logo');
if(@$cusLogo == 1){
	add_theme_support('custom-logo');
}
$feedLinks  = get_option('automatic-feed-links');
if(@$feedLinks == 1){
	add_theme_support( 'automatic-feed-links' );
}
$cusLogo  = get_option('customize-selective-refresh-widgets');
if(@$cusLogo == 1){
	add_theme_support( 'customize-selective-refresh-widgets' );
}



// Contact Form shortcode
function dap_admin_contact_form( $atts, $content = null ) {
	
	//get the attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'contact_form'
	);
	
	//return HTML
	ob_start();
	include_once dirname(__FILE__). '/form.php';
	return ob_get_clean();
}
add_shortcode( 'contact_form', 'dap_admin_contact_form' );

// Custom CSS code send to head
function custom_css(){
	$custom_css = esc_attr( get_option( 'css_editor' ) );
	if( !empty( $custom_css ) ):
		echo '<style> ' . $custom_css . ' </style> ';
	endif;
}
add_action('wp_head', 'custom_css');



