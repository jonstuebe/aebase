<?php
/**
 * AE Base functions and definitions
 *
 * @package AE Base
 * @since AE Base 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since AE Base 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

add_action( 'init', function() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%year%/%monthnum%/%postname%/' );
} );

if ( ! function_exists( 'aebase_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since AE Base 1.0
 */
function aebase_setup() {

	/**
	 * Custom helpers for this theme.
	 */
	require( get_template_directory() . '/inc/helpers.php' );

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on AE Base, use a find and replace
	 * to change 'aebase' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'aebase', get_template_directory() . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'aebase' ),
	) );
}
endif; // aebase_setup
add_action( 'after_setup_theme', 'aebase_setup' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );

function add_local_scripts($scripts)
{
	foreach ($scripts as $title => $file_name)
	{
		add_local_script($title, $file_name);
	}
}