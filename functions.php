<?php
/**
 * Ashfield Travel — GeneratePress Child Theme Functions
 *
 * @package Ashfield_Travel
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

define( 'ASHFIELD_VERSION', '1.0.0' );

/* ──────────────────────────────────────────────
 * INCLUDES
 * ────────────────────────────────────────────── */
require_once get_stylesheet_directory() . '/inc/cpt-tours.php';

/* ──────────────────────────────────────────────
 * 1. ENQUEUE PARENT + CHILD STYLES & GOOGLE FONTS
 * ────────────────────────────────────────────── */
add_action( 'wp_enqueue_scripts', 'ashfield_enqueue_assets' );
function ashfield_enqueue_assets() {

	/* Google Fonts — Cormorant Garamond + Inter */
	wp_enqueue_style(
		'ashfield-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,700&family=Inter:wght@300;400;500;600;700&display=swap',
		array(),
		null // no version — external resource
	);

	/* GeneratePress parent stylesheet */
	wp_enqueue_style(
		'generatepress-parent',
		get_template_directory_uri() . '/style.css',
		array( 'ashfield-google-fonts' ),
		wp_get_theme( 'generatepress' )->get( 'Version' )
	);

	/* Child theme style.css (variables + declaration) */
	wp_enqueue_style(
		'ashfield-theme',
		get_stylesheet_uri(),
		array( 'generatepress-parent' ),
		ASHFIELD_VERSION
	);

	/* Custom CSS — all component & layout styles */
	wp_enqueue_style(
		'ashfield-custom',
		get_stylesheet_directory_uri() . '/assets/css/custom.css',
		array( 'ashfield-theme' ),
		ASHFIELD_VERSION
	);

	/* Front-end JS (filter pills, mobile menu, scroll effects) */
	wp_enqueue_script(
		'ashfield-scripts',
		get_stylesheet_directory_uri() . '/assets/js/custom.js',
		array(),
		ASHFIELD_VERSION,
		true // load in footer
	);
}

/* ──────────────────────────────────────────────
 * 2. FONT PRECONNECT — Speed up Google Fonts loading
 * ────────────────────────────────────────────── */
add_filter( 'wp_resource_hints', 'ashfield_resource_hints', 10, 2 );
function ashfield_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.googleapis.com',
			'crossorigin' => '',
		);
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}

/* ──────────────────────────────────────────────
 * 3. GENERATEPRESS CUSTOMISER DEFAULTS
 *    Override GP's defaults to match Ashfield brand
 * ────────────────────────────────────────────── */
add_filter( 'generate_option_defaults', 'ashfield_gp_defaults' );
function ashfield_gp_defaults( $defaults ) {

	/* Body typography */
	$defaults['font_body']            = 'Inter';
	$defaults['body_font_weight']     = '400';
	$defaults['body_font_size']       = '16';
	$defaults['body_line_height']     = '1.7';

	/* Headings */
	$defaults['font_heading_1']       = 'Cormorant Garamond';
	$defaults['font_heading_2']       = 'Cormorant Garamond';
	$defaults['font_heading_3']       = 'Cormorant Garamond';

	/* Colours */
	$defaults['background_color']     = '#FFFFFF';
	$defaults['text_color']           = '#4A4A4A';
	$defaults['link_color']           = '#C4572A';
	$defaults['link_color_hover']     = '#A84520';

	/* Container width */
	$defaults['container_width']      = '1280';

	return $defaults;
}

/* ──────────────────────────────────────────────
 * 4. ADD CUSTOM BODY CLASSES
 * ────────────────────────────────────────────── */
add_filter( 'body_class', 'ashfield_body_classes' );
function ashfield_body_classes( $classes ) {
	$classes[] = 'ashfield-travel';
	if ( is_front_page() ) {
		$classes[] = 'ashfield-homepage';
	}
	return $classes;
}

/* ──────────────────────────────────────────────
 * 5. REGISTER WIDGET AREAS (Footer columns, etc.)
 * ────────────────────────────────────────────── */
add_action( 'widgets_init', 'ashfield_widgets' );
function ashfield_widgets() {
	register_sidebar( array(
		'name'          => __( 'Footer Column 1 — Brand', 'ashfield-travel' ),
		'id'            => 'ashfield-footer-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Column 2 — Destinations', 'ashfield-travel' ),
		'id'            => 'ashfield-footer-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Column 3 — Company', 'ashfield-travel' ),
		'id'            => 'ashfield-footer-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Column 4 — Contact', 'ashfield-travel' ),
		'id'            => 'ashfield-footer-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}

/* ──────────────────────────────────────────────
 * 6. CUSTOM IMAGE SIZES FOR TOUR CARDS
 * ────────────────────────────────────────────── */
add_action( 'after_setup_theme', 'ashfield_image_sizes' );
function ashfield_image_sizes() {
	add_image_size( 'ashfield-destination', 600, 450, true );  // 4:3 dest cards
	add_image_size( 'ashfield-tour-card',   500, 333, true );  // 3:2 tour cards
	add_image_size( 'ashfield-blog-thumb',  600, 400, true );  // blog grid
	add_image_size( 'ashfield-hero',       1920, 800, true );  // hero banner
}

/* ──────────────────────────────────────────────
 * 7. EXCERPT LENGTH & MORE LINK
 * ────────────────────────────────────────────── */
add_filter( 'excerpt_length', function() { return 22; } );
add_filter( 'excerpt_more',   function() { return '&hellip;'; } );

/* ──────────────────────────────────────────────
 * 8. GENERATEPRESS HOOKS — Top bar & trust bar
 * ────────────────────────────────────────────── */
add_action( 'generate_before_header', 'ashfield_top_bar' );
function ashfield_top_bar() {
	get_template_part( 'template-parts/top-bar' );
}

add_action( 'generate_after_header', 'ashfield_trust_bar' );
function ashfield_trust_bar() {
	get_template_part( 'template-parts/trust-bar' );
}

/* ──────────────────────────────────────────────
 * 9. SCHEMA.ORG — TravelAgency structured data
 * ────────────────────────────────────────────── */
add_action( 'wp_head', 'ashfield_schema_org' );
function ashfield_schema_org() {
	if ( ! is_front_page() ) {
		return;
	}
	$schema = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'TravelAgency',
		'name'        => 'Ashfield Travel',
		'url'         => home_url( '/' ),
		'telephone'   => '+44-800-123-4567',
		'email'       => 'info@ashfieldtravel.co.uk',
		'description' => 'Curated holidays to India and Dubai designed for British-Indian families in the UK.',
		'address'     => array(
			'@type'          => 'PostalAddress',
			'addressCountry' => 'GB',
		),
		'areaServed'  => 'GB',
		'sameAs'      => array(
			'https://www.facebook.com/ashfieldtravel',
			'https://www.instagram.com/ashfieldtravel',
		),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
}
