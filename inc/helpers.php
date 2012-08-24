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
 * Register javascript file and add to the footer by default
 *
 * @since AE Base 1.0
 */
function add_local_script($title, $file_name, $dependency = array('jquery'), $version = '1.0', $footer = true)
{
	wp_register_script($title, get_template_directory().'/assets/js/'.$file_name, $dependency, $version, $footer);
	wp_enqueue_script($title);
}