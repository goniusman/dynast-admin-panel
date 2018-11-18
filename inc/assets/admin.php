<?php
/**
 * Admin Options for admin panel
 * @package Dynast
 */
function add_dap_admin_page(){
	$picture = esc_attr(get_option( 'profile_picture' ) );
	$picture_class = "";
	if ( empty($picture) ) {
        $picture = 'dashicons-admin-generic';
        $picture_class = 'menu-icon-generic ';
    } else {
        $picture = set_url_scheme( $picture );
        $picture_class = 'admin-icon-picture';
    }

	add_menu_page("admin page", "Admin Page", "manage_options", "admin_page_option", "admin_page_callback_function", $picture , 101 );
	add_submenu_page("admin_page_option", "Admin Panel", "Admin panel", "manage_options", "admin_page_option", "admin_page_callback_function");
	add_submenu_page("admin_page_option", "Theme Support", "Add Support", "manage_options", "theme_support_option", "theme_support_callback_function");
	add_submenu_page("admin_page_option", "Contact Form", "Contact Form", "manage_options", "contact_form_select_page", "contact_form_callback_function");
	add_submenu_page("admin_page_option", "Css Editor", "Css Editor", "manage_options", "admin_css_editor", "admin_csseditor_callback_function");
}
add_action("admin_menu", "add_dap_admin_page");


function add_dap_theme_support_settings(){
	
	///admin panel settings sections
	register_setting('admin-panel-register', 'profile_picture');
	register_setting('admin-panel-register', 'fname');
	register_setting('admin-panel-register', 'lname');
	register_setting('admin-panel-register', 'description');
	register_setting('admin-panel-register', 'contact');
	register_setting('admin-panel-register', 'address');
	register_setting('admin-panel-register', 'facebook','sanitize_facebook');
	register_setting('admin-panel-register', 'twitter','sanitize_twitter');
	register_setting('admin-panel-register', 'linkedin','sanitize_linkedin');
	register_setting('admin-panel-register', 'youtube','sanitize_youtube');
	
	add_settings_section('admin-panel-section', '', 'admin_panel_section_callfuntion', 'admin_page_option');
	
	add_settings_field('adm-picture', 'Admin Picture', 'admin_picture_field_callback_function', 'admin_page_option','admin-panel-section');
	add_settings_field('f-name', 'First Name', 'admin_fname_field_callback_function', 'admin_page_option','admin-panel-section');
	add_settings_field('l-name', 'Last Name', 'admin_lname_field_callback_function', 'admin_page_option','admin-panel-section');
	add_settings_field('description', 'Description', 'admin_description_field_callback_function', 'admin_page_option','admin-panel-section');
	add_settings_field('contact', 'Phone Number', 'admin_Phone_field_callback_function', 'admin_page_option','admin-panel-section');
	add_settings_field('address', 'Admin Address', 'admin_address_field_callback_function', 'admin_page_option','admin-panel-section');
	add_settings_field('facebook', 'Facebook Link', 'admin_facebook_field_callback_function', 'admin_page_option','admin-panel-section');
	add_settings_field('twitter', 'Twitter Link', 'admin_twitter_field_callback_function', 'admin_page_option','admin-panel-section');
	add_settings_field('linkedin', 'Linkedin Link', 'admin_linkedin_field_callback_function', 'admin_page_option','admin-panel-section');
	add_settings_field('youtube', 'Youtube Link', 'admin_youtube_field_callback_function', 'admin_page_option','admin-panel-section');
	
	
	/// theme support setting section
	register_setting('theme-support-register', 'post-formats');
	register_setting('theme-support-register', 'custom-header');
	register_setting('theme-support-register', 'custom-background');
	register_setting('theme-support-register', 'post-thumbnails');
	register_setting('theme-support-register', 'html5-support');
	register_setting('theme-support-register', 'title-tag');
	register_setting('theme-support-register', 'woocommerce-support');
	register_setting('theme-support-register', 'custom-logo');
	register_setting('theme-support-register', 'automatic-feed-links');
	register_setting('theme-support-register', 'customize-selective-refresh-widgets');
	
	add_settings_section('add-support-setting-section', ' ', 'add_support_callback_functiong', 'theme_support_option');
	
	add_settings_field('add-support', 'Post Formats', 'add_setting_field_callback_function', 'theme_support_option', 'add-support-setting-section');
	add_settings_field('custom-header', 'Header Customized', 'header_customized_callback_function', 'theme_support_option', 'add-support-setting-section');
	add_settings_field('custom-background', 'Background Customized', 'background_customized_callback_function', 'theme_support_option', 'add-support-setting-section');
	add_settings_field('custom-thumbnails', 'Post Thumbnails', 'thumbnails_customized_callback_function', 'theme_support_option', 'add-support-setting-section');
	add_settings_field('html5-support', 'Hmtl5 Support', 'html5_customized_callback_function', 'theme_support_option', 'add-support-setting-section');
	add_settings_field('title-tag', 'Title Tag ', 'title_tag_callback_function', 'theme_support_option', 'add-support-setting-section');
	add_settings_field('woocommerc', 'Woocommerce Support', 'woocommerce_support_callback_function', 'theme_support_option', 'add-support-setting-section');
	add_settings_field('logo', 'Custom Logo', 'logo_support_callback_function', 'theme_support_option', 'add-support-setting-section');
	add_settings_field('feedLinks', 'automatic feed links', 'fedd_links_support_callback_function', 'theme_support_option', 'add-support-setting-section');
	add_settings_field('WidgetRefresh', 'Customize Selective Refresh Widgets', 'widget_refresh_support_callback_function', 'theme_support_option', 'add-support-setting-section');
	
	/// contact form section
	register_setting('contact-form-setting', 'contact-form');
	add_settings_section('add-contact-setting-section', ' ', 'contact_section_callback_function', 'contact_form_select_page');
	add_settings_field('contact', '<h2>Contact Form</h2>', 'contact_form_field_callback', 'contact_form_select_page', 'add-contact-setting-section');
	
	/// css editor settings section
	register_setting('css-editor', 'css_editor', 'sanitize_custom_css');
	add_settings_section('css-editor-section', '', 'css_section_call_back_function', 'admin_css_editor');
	add_settings_field('css', 'Ace Editor', 'css_field_call_back_function','admin_css_editor', 'css-editor-section');
}
add_action("admin_init", "add_dap_theme_support_settings");


// css editon call back funtion
function css_field_call_back_function(){
	$css = get_option('css_editor');
	$css = ( empty($css) ? '/*This is a awesome css*/' : $css );
	echo '<div id="customCSS">'.$css.'</div><textarea id="css_editor" name="css_editor" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}

// contact form setting fileds call back funtion
function contact_form_field_callback(){
	$option  = get_option('contact-form');
	$checked = (@$option == 1 ? 'checked' : '');
	$output  = '<label class="switch post-format"><input type="checkbox" name="contact-form" id="contact-form" value="1" '.$checked.'/> <span class="slider"></span></label>';
	echo $output;
}
// theme support setting field call back funtion
function add_setting_field_callback_function(){
	$options = get_option('post-formats');
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'standard', 'video', 'audio', 'chat' );
	$output  = "";
	foreach($formats as $format){
		$checked = (@$options[$format] == 1 ? 'checked' : '');
		$output .= '<label class="switch post-format"> <input type="checkbox" id="'.$format.'" name="post-formats['.$format.']" value="1" '.$checked.'/><span class="slider"></span><span class="format-name">'.$format.'</span> </label><br>' ;
	}
	echo $output;
}
function header_customized_callback_function(){
	$option  = get_option('custom-header');
	$checked = (@$option == 1 ? 'checked' : '');
	$output  = '<label class="switch"><input type="checkbox" name="custom-header" id="custom-header" value="1" '.$checked.'/> <span class="slider"></span></label>';
	echo $output;
}
function background_customized_callback_function(){
	$option  = get_option('custom-background');
	$checked = (@$option == 1 ? 'checked' : '');
	$output  = '<label class="switch"><input type="checkbox" name="custom-background" id="custom-background" value="1" '.$checked.'> <span class="slider"></span></label>';
	echo $output;
}
function thumbnails_customized_callback_function(){
	$option  = get_option('post-thumbnails');
	$checked = (@$option == 1 ? 'checked' : '');
	$output  = '<label class="switch"><input type="checkbox" name="post-thumbnails" id="post-thumbnails" value="1" '.$checked.'> <span class="slider"></span></label>';
	echo $output;
}
function html5_customized_callback_function(){
	$option  = get_option('html5-support');
	$checked = (@$option == 1 ? 'checked' : '');
	$output  = '<label class="switch"><input type="checkbox" name="html5-support" id="html5-support" value="1" '.$checked.'> <span class="slider"></span></label>';
	echo $output;
}
function title_tag_callback_function(){
	$option  = get_option('title-tag');
	$checked = (@$option == 1 ? 'checked' : '');
	$output  = '<label class="switch"><input type="checkbox" name="title-tag" id="title-tag" value="1" '.$checked.'> <span class="slider"></span></label>';
	echo $output;
}
function woocommerce_support_callback_function(){
	$option  = get_option('woocommerce-support');
	$checked = (@$option == 1 ? 'checked' : '');
	$output  = '<label class="switch"><input type="checkbox" name="woocommerce-support" id="woocommerce-support" value="1" '.$checked.'> <span class="slider"></span></label>';
	echo $output;
}
function logo_support_callback_function(){
	$option  = get_option('custom-logo');
	$checked = (@$option == 1 ? 'checked' : '');
	$output  = '<label class="switch"><input type="checkbox" name="custom-logo" id="custom-logo" value="1" '.$checked.'> <span class="slider"></span></label>';
	echo $output;
}
function fedd_links_support_callback_function(){
	$option  = get_option('automatic-feed-links');
	$checked = (@$option == 1 ? 'checked' : '');
	$output  = '<label class="switch"><input type="checkbox" name="automatic-feed-links" id="automatic-feed-links" value="1" '.$checked.'> <span class="slider"></span></label>';
	echo $output;
}
function widget_refresh_support_callback_function(){
	$option  = get_option('customize-selective-refresh-widgets');
	$checked = (@$option == 1 ? 'checked' : '');
	$output  = '<label class="switch"><input type="checkbox" name="customize-selective-refresh-widgets" id="customize-selective-refresh-widgets" value="1" '.$checked.'> <span class="slider"></span></label>';
	echo $output;
}



// amdin page field call back funtion
function admin_picture_field_callback_function(){
		$picture = esc_attr(get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<button type="button" class="button button-secondary" id="upload-button" > Upload Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<button type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button">Replace Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <button type="button" class="button button-secondary" value="Remove" id="remove-picture">Remove</button>';
	}
}
function admin_fname_field_callback_function(){
	$fname = esc_attr(get_option('fname'));
	$output = '<input class="admin-inp" type="text" id="fname" name="fname" placeholder="Your first name" value="'.$fname.'" >';
	echo $output;
}
function admin_lname_field_callback_function(){
	$lname = esc_attr(get_option('lname'));
	$output = '<input class="admin-inp" type="text" id="lname" name="lname" placeholder="Your last name" value="'.$lname.'" >';
	echo $output;
}
function admin_description_field_callback_function(){
	$description = esc_attr(get_option('description'));
	$output = '<textarea id="description" name="description" col="25" row="10" class="widefat">'.$description.'</textarea>';
	echo $output;
}
function admin_Phone_field_callback_function(){
	$contact = esc_attr(get_option('contact'));
	$output = '<input class="admin-inp" type="text" id="contact" name="contact" placeholder="Contact number" value="'.$contact.'" >';
	echo $output;
}
function admin_address_field_callback_function(){
	$address = esc_attr(get_option('address'));
	$output = '<input class="admin-inp" type="text" id="address" name="address" placeholder="Address here" value="'.$address.'" >';
	echo $output;
}
function admin_facebook_field_callback_function(){
	$facebook = esc_attr(get_option('facebook'));
	$output = '<input class="admin-inp" type="text" id="facebook" name="facebook" placeholder="facebook link" value="'.$facebook.'" >';
	echo $output;
}
function admin_twitter_field_callback_function(){
	$twitter = esc_attr(get_option('twitter'));
	$output = '<input class="admin-inp" type="text" id="twitter" name="twitter" placeholder="twitter link" value="'.$twitter.'" >';
	echo $output;
}
function admin_linkedin_field_callback_function(){
	$linkedin = esc_attr(get_option('linkedin'));
	$output = '<input class="admin-inp" type="text" id="linkedin" name="linkedin" placeholder="linkedin link" value="'.$linkedin.'" >';
	echo $output;
}
function admin_youtube_field_callback_function(){
	$youtube = esc_attr(get_option('youtube'));
	$output = '<input class="admin-inp" type="text" id="youtube" name="youtube" placeholder="youtube link" value="'.$youtube.'" >';
	echo $output;
}


//// section secttion call back funtion
function add_support_callback_functiong(){
	echo '<h1>PLEASE CHECK, WHAT YOUR NEED.</h1>';
}
function admin_panel_section_callfuntion(){
	echo '<h1>PLEASE INPUT YOUR DETAILS.</h1>';
}
function contact_section_callback_function(){
	echo '<h1>PLEASE CHECK, TO ACTIVATE YOUR AWESOME CONTACT FORM.</h1>';
}
function css_section_call_back_function(){
	echo '<h1>STYLE YOUR THEME BY THIS EDITOR</h1>';
}


// all menu page call back function
function admin_page_callback_function(){
	require_once dirname( __FILE__ ) . '/admintemplate/admin.php';
}
function theme_support_callback_function(){
	require_once dirname( __FILE__ ) .  '/admintemplate/support.php';
}
function contact_form_callback_function(){
	require_once dirname( __FILE__ ) .  '/admintemplate/contactform.php';
}
function admin_csseditor_callback_function(){
	require_once dirname( __FILE__ ) .  '/admintemplate/css.php';
}

// sanitization input field 
function sanitize_facebook($input)
{
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

function sanitize_custom_css( $input ){
	$output = esc_textarea( $input );
	return $output;
}

