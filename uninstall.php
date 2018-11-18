<?php
/**
 * @package Dynasty
 */


if (!defined('wp_uninstall_plugin')) {
	die();
}

// DELETE THE DATABASE FROM TABLE
// $janina_post = get_posts( 'post_type' => 'Janina', 'numberposts' => -1 );

// foreach ( $janina_post as $post ) {
// 	wp_delete_post($post->ID, true);
// }


// ACCESS THE DATABASE VIA SQL
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'janina'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT in( SELECT id FROM wp_posts )" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE post_id NOT in( SELECT id FROM wp_posts )" );


















