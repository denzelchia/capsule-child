<?php
function capsule_child_scripts() {
	wp_enqueue_style( 'capsule_child-fonts', capsule_child_fonts_url(), array(), null );
	wp_enqueue_style( 'capsule-child-custom', get_stylesheet_uri(),array('capsule_styles','chosen'));
}
add_action( 'wp_enqueue_scripts', 'capsule_child_scripts' );

if ( ! function_exists( 'capsule_child_fonts_url' ) ) :
function capsule_child_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'capsule_child' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'capsule_child' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;