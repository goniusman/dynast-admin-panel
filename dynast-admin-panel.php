<?php
/**
 * @package Dynast
 */
/**
 * Plugin Name: Dynast Admin Panel
 * Plugin URI: https://github.com/goniusman/dynast_admin_panel
 * Description: This plugin help you to set-up basic instructions on your website and you will get contact form, Css editor, admin display on frontend.
 * Version: 0.2
 * Author: goniusman
 * Author URI: https://firmwaree.com
 * License: GPLv2 or later
 * Text Domain: dynast
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die("you are not allowed"); // Exit if accessed directly.
}


require_once plugin_dir_path( __FILE__ ).'inc/dynastyadmin.php';



if (class_exists('dynastyAdminPanel')) {
	$dynast = new dynastyAdminPanel();
	$dynast->active();
	$dynast->include_other_file();
}


