<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package OffKey
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function offkey_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'offkey_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function offkey_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'offkey_pingback_header' );

/**
 * Custom About Page background image
 */

function my_styles_method() {
		if(!is_page_template('about.php')) {
			return;
		}
	$url=CFS()->get('about_background_image');
	
	$custom_css="
				.about-hero{
					background-image: linear-gradient( to bottom, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0.5) 100% ),url({$url});
					}";
			wp_add_inline_style( 'offkey-style', $custom_css);
}
add_action('wp_enqueue_scripts' , 'my_styles_method');

