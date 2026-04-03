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
		'has_archive'        => false,           // Managed by custom routing
		'rewrite'            => false,
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
		'rewrite'           => [ 'slug' => 'our-tours' ],
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
		'_at_price_raw'      => [ 'desc' => 'Numeric price for sorting (e.g. 1295)', 'type' => 'number' ],
		'_at_subtitle'       => [ 'desc' => 'Tour subtitle (e.g. Couples Escape)', 'type' => 'string' ],
		'_at_ref'            => [ 'desc' => 'Package Reference (e.g. 101)', 'type' => 'string' ],
		'_at_season'         => [ 'desc' => 'Best Season (e.g. Oct to Mar)', 'type' => 'string' ],
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
		'_at_itinerary_html' => [ 'desc' => 'Custom Itinerary HTML',      'type' => 'string' ],
		'_at_accommodation_html' => [ 'desc' => 'Custom Accom HTML',      'type' => 'string' ],
		'_at_highlights_html' => [ 'desc' => 'Custom Highlights HTML',    'type' => 'string' ],
		'_at_visa_html'      => [ 'desc' => 'Custom Visa HTML',           'type' => 'string' ],
		'_at_faqs_html'      => [ 'desc' => 'Custom FAQs HTML',           'type' => 'string' ],
		'_at_testimonial_text'   => [ 'desc' => 'Testimonial quote text', 'type' => 'string' ],
		'_at_testimonial_author' => [ 'desc' => 'Testimonial author',     'type' => 'string' ],
		'_at_price_luxury'   => [ 'desc' => 'Luxury Tier Price',          'type' => 'string' ],
		'_at_featured_image' => [ 'desc' => 'Featured Image URL',         'type' => 'string' ],
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

/**
 * Convert a formatted price string (e.g. "From £1,295") to integer 1295.
 *
 * @param string $price_text Price text.
 * @return int Numeric value or 0 if not parseable.
 */
function ashfield_extract_numeric_price( $price_text ) {
	if ( ! is_string( $price_text ) || '' === trim( $price_text ) ) {
		return 0;
	}
	if ( preg_match( '/(\d[\d,]*)/', $price_text, $matches ) ) {
		return (int) str_replace( ',', '', $matches[1] );
	}
	return 0;
}

/**
 * Keep _at_price_raw synced so archive sorting by price works.
 *
 * @param int $post_id Tour post ID.
 */
function ashfield_sync_tour_price_raw( $post_id ) {
	$price_text = (string) get_post_meta( $post_id, '_at_price', true );
	$price_raw  = ashfield_extract_numeric_price( $price_text );
	if ( $price_raw > 0 ) {
		update_post_meta( $post_id, '_at_price_raw', $price_raw );
	} else {
		delete_post_meta( $post_id, '_at_price_raw' );
	}
}

add_action( 'save_post_tour', 'ashfield_sync_tour_price_raw_on_save', 20 );
function ashfield_sync_tour_price_raw_on_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	ashfield_sync_tour_price_raw( $post_id );
}

/**
 * One-time backfill for existing tours missing _at_price_raw.
 */
add_action( 'admin_init', 'ashfield_backfill_tour_price_raw_meta' );
function ashfield_backfill_tour_price_raw_meta() {
	if ( get_option( 'ashfield_price_raw_backfilled' ) ) {
		return;
	}

	$tour_ids = get_posts( [
		'post_type'      => 'tour',
		'post_status'    => 'any',
		'posts_per_page' => -1,
		'fields'         => 'ids',
	] );

	foreach ( $tour_ids as $tour_id ) {
		ashfield_sync_tour_price_raw( (int) $tour_id );
	}

	update_option( 'ashfield_price_raw_backfilled', 1, false );
}

/* ──────────────────────────────────────────────
 * 5. CUSTOM META BOX — Featured Image
 * ────────────────────────────────────────────── */
add_action( 'add_meta_boxes', 'ashfield_tour_meta_boxes' );
function ashfield_tour_meta_boxes() {
	add_meta_box(
		'ashfield_tour_featured_image',
		'Featured Image URL',
		'ashfield_tour_featured_image_callback',
		'tour',
		'normal',
		'high'
	);
}

function ashfield_tour_featured_image_callback( $post ) {
	$image_url = get_post_meta( $post->ID, '_at_featured_image', true );
	wp_nonce_field( 'ashfield_tour_featured_image_nonce', 'ashfield_tour_nonce' );
	?>
	<p style="margin-bottom: 10px;">
		<label for="_at_featured_image" style="display: block; margin-bottom: 8px; font-weight: 600;">Image URL (Unsplash, CDN, or server):</label>
		<input
			type="url"
			id="_at_featured_image"
			name="_at_featured_image"
			value="<?php echo esc_url( $image_url ); ?>"
			style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; font-family: monospace; font-size: 13px;"
			placeholder="https://images.unsplash.com/..."
		/>
	</p>
	<?php if ( $image_url ) : ?>
		<div style="margin-top: 15px; padding: 10px; background: #f5f5f5; border: 1px solid #ddd; border-radius: 4px;">
			<p style="margin: 0 0 10px 0; font-size: 13px; color: #666;">Preview:</p>
			<img src="<?php echo esc_url( $image_url ); ?>" alt="Featured image preview" style="max-width: 100%; height: auto; max-height: 300px; border-radius: 4px;">
		</div>
	<?php endif; ?>
	<?php
}

add_action( 'save_post_tour', 'ashfield_tour_save_featured_image' );
function ashfield_tour_save_featured_image( $post_id ) {
	if ( ! isset( $_POST['ashfield_tour_nonce'] ) || ! wp_verify_nonce( $_POST['ashfield_tour_nonce'], 'ashfield_tour_featured_image_nonce' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( isset( $_POST['_at_featured_image'] ) ) {
		update_post_meta( $post_id, '_at_featured_image', esc_url_raw( $_POST['_at_featured_image'] ) );
	}
}

/* ──────────────────────────────────────────────
 * 6. FLUSH REWRITE RULES on activation
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
