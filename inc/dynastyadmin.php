<?php


/**
 * handeld main file
 */
class dynastyAdminPanel
{
	public $plugin; 
	
	function __construct(){
		$this->plugin = plugin_basename(__FILE__);
	}
	function active()
	{
		add_action('admin_enqueue_scripts', array($this, 'enqueue_file'));
		add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_file'));	
		add_filter('plugin_action_links_'.$this->plugin, array($this, 'add_settings_link' ));
	}

	function enqueue_file()
	{
		wp_enqueue_style('admin-css', plugins_url('../assets/css/admin.css', __FILE__ ));
		wp_enqueue_style('font-icon-css', plugins_url('../assets/css/font-awesome.min.css', __FILE__ ));

		wp_enqueue_script('jquery');
		wp_enqueue_media();
		wp_enqueue_script('admin-js', plugins_url( '../assets/js/admin.js', __FILE__ ) , array('jquery'), 'v1.1', true);
		wp_enqueue_script('ace-js', plugins_url('../assets/js/ace/ace.js', __FILE__ ) , array(), 'v1.0', true);
		wp_enqueue_script('cutom-ace', plugins_url('../assets/js/custom_ace.js', __FILE__ ), array('jquery'), '1.0.0', true );

	}
	function enqueue_frontend_file()
	{
		wp_enqueue_style('front-admin', plugins_url('../assets/css/front-admin.css', __FILE__ ) );
		wp_enqueue_script('front-js', plugins_url('../assets/js/admin_contact.js', __FILE__ ), array('jquery'), 'v1.0', true);
	}

	function include_other_file()
	{
		require_once plugin_dir_path( __FILE__ ).'/assets/admin.php';
		require_once plugin_dir_path( __FILE__ ).'/assets/support.php';
		require_once plugin_dir_path( __FILE__ ).'/assets/contact-form.php';
		require_once plugin_dir_path( __FILE__ ).'/assets/ajax.php';
		require_once plugin_dir_path( __FILE__ ).'/assets/dynast-widget.php';
	}

	function add_settings_link($links) { 
	  $settings_link = '<a href="admin.php?page=admin_page_option">Settings</a>'; 
	  array_unshift($links, $settings_link); 
	  return $links; 
	}
	
}




