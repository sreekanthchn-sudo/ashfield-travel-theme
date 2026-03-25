<?php
/**
 * Custom Post Type: Tour
 * Taxonomy:        tour_destination, tour_type
 * Meta fields registered for the block editor (register_meta).
 *
 * @package Ashfield_Travel
 */

defined( 'ABSPATH' ) || exit;

/* ──────────────────────────────────────────────
 * 1. POST TYPE
 * ────────────────────────────────────────────── */
add_action( 'init', 'ashfield_register_tour_cpt' );
function ashfield_register_tour_cpt() {
	$labels = [
		'name'               => __( 'Tours',              'ashfield-travel' ),
		'singular_name'      => __( 'Tour',               'ashfield-travel' ),
		'add_new_item'       => __( 'Add New Tour',        'ashfield-travel' ),
		'edit_item'          => __( 'Edit Tour',           'ashfield-travel' ),
		'new_item'           => __( 'New Tour',            'ashfield-travel' ),
		'view_item'          => __( 'View Tour',           'ashfield-travel' ),
		'search_items'       => __( 'Search Tours',        'ashfield-travel' ),
		'not_found'          => __( 'No tours found',      'ashfield-travel' ),
		'not_found_in_trash' => __( 'No tours in trash',   'ashfield-travel' ),
		'menu_name'          => __( 'Tours',               'ashfield-travel' ),
	];

	register_post_type( 'tour', [
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => true,           // → /tours/
		'rewrite'            => [ 'slug' => 'tours', 'with_front' => false ],
		'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ],
		'menu_icon'          => 'dashicons-airplane',
		'menu_position'      => 5,
		'show_in_rest'       => true,           // Gutenberg support
		'capability_type'    => 'post',
	] );
}

/* ──────────────────────────────────────────────
 * 2. TAXONOMY — Destination  (India, Dubai …)
 * ────────────────────────────────────────────── */
add_action( 'init', 'ashfield_register_tour_destination_tax' );
function ashfield_register_tour_destination_tax() {
	register_taxonomy( 'tour_destination', 'tour', [
		'labels'       => [
			'name'          => __( 'Destinations',     'ashfield-travel' ),
			'singular_name' => __( 'Destination',      'ashfield-travel' ),
			'add_new_item'  => __( 'Add Destination',  'ashfield-travel' ),
			'edit_item'     => __( 'Edit Destination', 'ashfield-travel' ),
		],
		'hierarchical'      => true,
		'public'            => true,
		'show_in_rest'      => true,
		'rewrite'           => [ 'slug' => 'destinations' ],
		'show_admin_column' => true,
	] );
}

/* ──────────────────────────────────────────────
 * 3. TAXONOMY — Tour Type  (Group, Private …)
 * ────────────────────────────────────────────── */
add_action( 'init', 'ashfield_register_tour_type_tax' );
function ashfield_register_tour_type_tax() {
	register_taxonomy( 'tour_type', 'tour', [
		'labels'       => [
			'name'          => __( 'Tour Types',     'ashfield-travel' ),
			'singular_name' => __( 'Tour Type',      'ashfield-travel' ),
			'add_new_item'  => __( 'Add Tour Type',  'ashfield-travel' ),
			'edit_item'     => __( 'Edit Tour Type', 'ashfield-travel' ),
		],
		'hierarchical'      => false,
		'public'            => true,
		'show_in_rest'      => true,
		'rewrite'           => [ 'slug' => 'tour-types' ],
		'show_admin_column' => true,
	] );
}

/* ──────────────────────────────────────────────
 * 4. META FIELDS (REST-exposed for Gutenberg sidebar)
 * ────────────────────────────────────────────── */
add_action( 'init', 'ashfield_register_tour_meta' );
function ashfield_register_tour_meta() {
	$fields = [
		'_at_price'          => [ 'desc' => 'Price from (e.g. £1,295)',  'type' => 'string' ],
		'_at_dates'          => [ 'desc' => 'Departure dates range',     'type' => 'string' ],
		'_at_duration'       => [ 'desc' => 'Duration (e.g. 14 days)',   'type' => 'string' ],
		'_at_location'       => [ 'desc' => 'Location label (e.g. India)', 'type' => 'string' ],
		'_at_save_banner'    => [ 'desc' => 'Saving callout (e.g. Save up to £200pp)', 'type' => 'string' ],
		'_at_featured'       => [ 'desc' => '1 = show on homepage',      'type' => 'string' ],
		'_at_group_size'     => [ 'desc' => 'Max group size',            'type' => 'string' ],
		'_at_meals'          => [ 'desc' => 'Meals included',            'type' => 'string' ],
		'_at_accommodation'  => [ 'desc' => 'Accommodation standard',    'type' => 'string' ],
		'_at_flight_info'    => [ 'desc' => 'Flight details',            'type' => 'string' ],
		'_at_atol'           => [ 'desc' => '1 = ATOL protected',        'type' => 'string' ],
		'_at_badge_1'        => [ 'desc' => 'First icon badge emoji',    'type' => 'string' ],
		'_at_badge_2'        => [ 'desc' => 'Second icon badge emoji',   'type' => 'string' ],
	];

	foreach ( $fields as $key => $args ) {
		register_post_meta( 'tour', $key, [
			'type'         => $args['type'],
			'description'  => $args['desc'],
			'single'       => true,
			'show_in_rest' => true,
		] );
	}
}

/* ──────────────────────────────────────────────
 * 5. FLUSH REWRITE RULES on activation
 *    Run once by visiting Settings → Permalinks
 *    after activating the theme, or programmatically:
 * ────────────────────────────────────────────── */
add_action( 'after_switch_theme', 'ashfield_flush_rewrites' );
function ashfield_flush_rewrites() {
	ashfield_register_tour_cpt();
	ashfield_register_tour_destination_tax();
	ashfield_register_tour_type_tax();
	flush_rewrite_rules();
}
