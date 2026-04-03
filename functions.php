<?php
/**
 * Ashfield Travel — GeneratePress Child Theme Functions
 *
 * @package Ashfield_Travel
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

define( 'ASHFIELD_VERSION', '1.0.6' );

/* Disable WordPress emoji — prevents giant emoji images in top bar */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/* ──────────────────────────────────────────────
 * INCLUDES
 * ────────────────────────────────────────────── */
require_once get_stylesheet_directory() . '/inc/cpt-tours.php';
require_once get_stylesheet_directory() . '/inc/url-custom-rewrites.php';
require_once get_stylesheet_directory() . '/inc/url-structure-helpers.php';

/*
 * Import script removed from production.
 * To run a one-time import, temporarily uncomment the line below,
 * log in as admin, visit ?run_package_import=1, then re-comment it.
 *
 * require_once get_stylesheet_directory() . '/inc/import-packages.php';
 */

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

	/* Tour Package CSS — for the new professional single tour layout */
	if ( is_singular( 'tour' ) ) {
		wp_enqueue_style(
			'ashfield-tour-package',
			get_stylesheet_directory_uri() . '/assets/css/tour-package.css',
			array( 'ashfield-custom' ),
			ASHFIELD_VERSION
		);
	}

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

	/* Layout — no sidebar globally so content is full width */
	$defaults['layout']               = 'no-sidebar';

	return $defaults;
}

/* ──────────────────────────────────────────────
 * 3b. FORCE NO SIDEBAR + FULL-WIDTH ON FRONT PAGE
 * ────────────────────────────────────────────── */
add_filter( 'generate_sidebar_layout', 'ashfield_no_sidebar_homepage' );
function ashfield_no_sidebar_homepage( $layout ) {
	if ( is_front_page() ) {
		return 'no-sidebar';
	}
	return $layout;
}

/* Remove GP's entry wrappers on front page so our sections are truly full-width */
add_action( 'template_redirect', 'ashfield_homepage_canvas' );
function ashfield_homepage_canvas() {
	if ( ! is_front_page() ) return;
	// Remove default GP article padding/entry structure filters
	add_filter( 'generate_show_entry_header', '__return_false' );
	add_filter( 'generate_show_entry_footer', '__return_false' );
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
 * 4c. NAV MENUS — editable links from WP admin
 * ────────────────────────────────────────────── */
add_action( 'after_setup_theme', 'ashfield_register_nav_menus' );
function ashfield_register_nav_menus() {
	register_nav_menus(
		[
			'ashfield-header-links'      => __( 'Header Links', 'ashfield-travel' ),
			'ashfield-footer-destinations' => __( 'Footer Destinations', 'ashfield-travel' ),
			'ashfield-footer-tour-types' => __( 'Footer Tour Types', 'ashfield-travel' ),
			'ashfield-footer-company'    => __( 'Footer Company', 'ashfield-travel' ),
		]
	);
}

/**
 * Minimal walker for header links preserving existing CSS hooks.
 */
class Ashfield_Header_Menu_Walker extends Walker_Nav_Menu {
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes = empty( $item->classes ) ? [] : (array) $item->classes;
		$class   = 'at-nav-item';
		if ( in_array( 'current-menu-item', $classes, true ) || in_array( 'current_page_item', $classes, true ) ) {
			$class .= ' current-menu-item';
		}
		$output .= '<div class="' . esc_attr( $class ) . '">';
		$output .= '<a href="' . esc_url( $item->url ) . '">' . esc_html( $item->title ) . '</a>';
		$output .= '</div>';
	}
}

/**
 * Minimal walker for footer columns (anchor-only output).
 */
class Ashfield_Footer_Menu_Walker extends Walker_Nav_Menu {
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$output .= '<a href="' . esc_url( $item->url ) . '">' . esc_html( $item->title ) . '</a>';
	}
}

/* ──────────────────────────────────────────────
 * 4b. LINK HELPERS — avoid hardcoded slug drift
 * ────────────────────────────────────────────── */
function ashfield_tax_link_or_archive( $taxonomy, $slug, $fallback_archive = '' ) {
	$term = get_term_by( 'slug', $slug, $taxonomy );
	if ( $term && ! is_wp_error( $term ) ) {
		$link = get_term_link( $term );
		if ( ! is_wp_error( $link ) ) {
			return $link;
		}
	}
	return $fallback_archive ? $fallback_archive : home_url( '/' );
}

function ashfield_page_link_or_fallback( $path, $fallback = '' ) {
	$page = get_page_by_path( ltrim( (string) $path, '/' ) );
	if ( $page ) {
		return get_permalink( $page );
	}
	return $fallback ? $fallback : home_url( '/' );
}

/**
 * Build destination groups for mega menu from tour_destination taxonomy.
 * Uses parent/child hierarchy when available and falls back safely.
 *
 * @return array<int,array<string,mixed>>
 */
function ashfield_get_destination_menu_groups() {
	$groups = [];
	$terms  = get_terms(
		[
			'taxonomy'   => 'tour_destination',
			'hide_empty' => true,
		]
	);

	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		return $groups;
	}

	$by_parent = [];
	foreach ( $terms as $term ) {
		$by_parent[ (int) $term->parent ][] = $term;
	}

	$top_level = isset( $by_parent[0] ) ? $by_parent[0] : [];
	usort(
		$top_level,
		static function ( $a, $b ) {
			return strcasecmp( $a->name, $b->name );
		}
	);

	foreach ( $top_level as $parent_term ) {
		$children = isset( $by_parent[ (int) $parent_term->term_id ] ) ? $by_parent[ (int) $parent_term->term_id ] : [];
		usort(
			$children,
			static function ( $a, $b ) {
				return strcasecmp( $a->name, $b->name );
			}
		);

		$items = [];
		if ( ! empty( $children ) ) {
			foreach ( $children as $child ) {
				$link = get_term_link( $child );
				if ( ! is_wp_error( $link ) ) {
					$items[] = [
						'label' => $child->name,
						'url'   => $link,
					];
				}
			}
		} else {
			$link = get_term_link( $parent_term );
			if ( ! is_wp_error( $link ) ) {
				$items[] = [
					'label' => $parent_term->name,
					'url'   => $link,
				];
			}
		}

		if ( ! empty( $items ) ) {
			$groups[] = [
				'title' => $parent_term->name,
				'items' => $items,
			];
		}
	}

	return $groups;
}

/**
 * Build tour type menu items from tour_type taxonomy.
 *
 * @return array<int,array<string,string>>
 */
function ashfield_get_tour_type_menu_items() {
	$items = [];
	$terms = get_terms(
		[
			'taxonomy'   => 'tour_type',
			'hide_empty' => true,
		]
	);

	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		return $items;
	}

	usort(
		$terms,
		static function ( $a, $b ) {
			return strcasecmp( $a->name, $b->name );
		}
	);

	foreach ( $terms as $term ) {
		$link = get_term_link( $term );
		if ( ! is_wp_error( $link ) ) {
			$items[] = [
				'label' => $term->name,
				'url'   => $link,
			];
		}
	}

	return $items;
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
 * 5b. BROCHURE FORM FALLBACK HANDLER
 *    Handles newsletter form when WPForms is not active
 * ────────────────────────────────────────────── */
add_action( 'admin_post_nopriv_at_brochure_request', 'ashfield_handle_brochure_request' );
add_action( 'admin_post_at_brochure_request', 'ashfield_handle_brochure_request' );
function ashfield_handle_brochure_request() {
	$redirect_url = wp_get_referer() ? wp_get_referer() : home_url( '/' );

	if (
		! isset( $_POST['at_brochure_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['at_brochure_nonce'] ) ), 'at_brochure_request' )
	) {
		wp_safe_redirect( add_query_arg( 'brochure_status', 'invalid_nonce', $redirect_url ) );
		exit;
	}

	$email = isset( $_POST['at_email'] ) ? sanitize_email( wp_unslash( $_POST['at_email'] ) ) : '';
	if ( ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'brochure_status', 'invalid_email', $redirect_url ) );
		exit;
	}

	$subject = __( 'New brochure request', 'ashfield-travel' );
	$message = sprintf(
		/* translators: %s: email address */
		__( "A brochure request was submitted.\n\nEmail: %s", 'ashfield-travel' ),
		$email
	);

	$sent = wp_mail(
		'info@ashfieldtravel.co.uk',
		$subject,
		$message,
		[ 'Reply-To: ' . $email ]
	);

	wp_safe_redirect( add_query_arg( 'brochure_status', $sent ? 'success' : 'error', $redirect_url ) );
	exit;
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
		'telephone'   => '+44-7587-671758',
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

/* ──────────────────────────────────────────────
 * 10. CUSTOM FOOTER COPYRIGHT
 * ────────────────────────────────────────────── */
add_filter( 'generate_copyright', 'ashfield_custom_footer' );
function ashfield_custom_footer() {
	return sprintf(
		'&copy; %s Ashfield Travel Ltd &middot; ATOL Protected &middot; TTA Member &middot; All rights reserved.',
		date( 'Y' )
	);
}
