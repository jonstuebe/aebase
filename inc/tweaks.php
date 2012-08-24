<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package AE Base
 * @since AE Base 1.0
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since AE Base 1.0
 */
function aebase_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
//add_filter( 'wp_page_menu_args', 'aebase_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since AE Base 1.0
 */
function aebase_body_classes( $classes ) {

	$cur_page_id = $wp_query->post->ID;
	$cur_page = get_page($cur_page_id);

	if($cur_page->post_name != 'home')
	{
		$classes[] = $cur_page->post_name;
	}

	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'aebase_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 * @since AE Base 1.0
 */
function aebase_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
//add_filter( 'attachment_link', 'aebase_enhanced_image_navigation', 10, 2 );

/**
 * Hide ACF menu item from the admin menu
 *
 * @since AE Base 1.0
 */
 
function hide_admin_menu()
{
	global $current_user;
	get_currentuserinfo();
 
	if($current_user->user_login != 'tasteofink')
	{
		echo '<style type="text/css">#toplevel_page_edit-post_type-acf{display:none;}</style>';
	}
}
 
add_action('admin_head', 'hide_admin_menu');