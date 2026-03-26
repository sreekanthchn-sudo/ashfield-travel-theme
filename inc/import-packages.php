<?php
/**
 * One-Time Package Importer
 *
 * Creates WordPress 'tour' posts from the HTML brochure files in /Packages/.
 *
 * HOW TO USE:
 *   1. Make sure you are logged in to WordPress as an administrator.
 *   2. Visit:  https://yoursite.com/?run_package_import=1
 *   3. The script will create the tour posts and output a log.
 *   4. Once all 16 tours are created, you can optionally remove the
 *      require_once line from functions.php to disable this script.
 *
 * Safe to run multiple times — it skips any package reference that already
 * exists as a tour post.
 *
 * @package Ashfield_Travel
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'ashfield_run_package_import' );
function ashfield_run_package_import() {

	// Only trigger when the query string is present.
	if ( ! isset( $_GET['run_package_import'] ) ) {
		return;
	}
	
	// Check for admin permission OR a secret key for remote automation.
	$secret = 'ashfield_remote_trigger_99';
	if ( ! current_user_can( 'manage_options' ) && ( ! isset( $_GET['secret'] ) || $_GET['secret'] !== $secret ) ) {
		wp_die( 'Unauthorised. Access denied.' );
	}

	// Path to the Packages folder — copied into the theme so wp-env Docker can access it.
	$packages_dir = get_stylesheet_directory() . '/packages-import';

	if ( ! is_dir( $packages_dir ) ) {
		wp_die( 'Packages directory not found at: ' . esc_html( $packages_dir ) );
	}

	// ── Package data map ─────────────────────────────────────────────────────
	// Keyed by reference number. Values: title, subtitle, destination(s),
	// type(s), location label, hero image URL.
	$packages = [
		'101' => [
			'title'       => 'Essential Kerala — Couples Escape',
			'subtitle'    => 'Private Couples Tour',
			'duration'    => '8 Days / 7 Nights',
			'season'      => 'October to March',
			'location'    => 'Kerala, India',
			'destinations'=> [ 'India', 'Kerala' ],
			'types'       => [ 'Couples' ],
			'hero'        => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=1920&q=85',
			'file'        => '101_Essential_Kerala_Couples_Escape.html',
		],
		'102' => [
			'title'       => 'Essential Kerala — Family',
			'subtitle'    => 'Family Holiday',
			'duration'    => '9 Days / 8 Nights',
			'season'      => 'October to March',
			'location'    => 'Kerala, India',
			'destinations'=> [ 'India', 'Kerala' ],
			'types'       => [ 'Family' ],
			'hero'        => 'https://images.unsplash.com/photo-1593693411515-c20261bcad6e?w=1920&q=85',
			'file'        => '102_Essential_Kerala_Family.html',
		],
		'103' => [
			'title'       => 'Kerala Discovery — Group Tour',
			'subtitle'    => 'Small Group Tour',
			'duration'    => '9 Days / 8 Nights',
			'season'      => 'October to March',
			'location'    => 'Kerala, India',
			'destinations'=> [ 'India', 'Kerala' ],
			'types'       => [ 'Group' ],
			'hero'        => 'https://images.unsplash.com/photo-1625046561030-05046aa23532?w=1920&q=85',
			'file'        => '103_Kerala_Discovery_Group_Tour.html',
		],
		'104' => [
			'title'       => 'Wonders of Kerala — Group Tour',
			'subtitle'    => 'Small Group Tour',
			'duration'    => '11 Days / 10 Nights',
			'season'      => 'October to March',
			'location'    => 'Kerala, India',
			'destinations'=> [ 'India', 'Kerala' ],
			'types'       => [ 'Group' ],
			'hero'        => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=1920&q=85',
			'file'        => '104_Wonders_of_Kerala_Group_Tour.html',
		],
		'105' => [
			'title'       => 'Essential Golden Triangle — Couples',
			'subtitle'    => 'Private Couples Tour',
			'duration'    => '8 Days / 7 Nights',
			'season'      => 'October to March',
			'location'    => 'India',
			'destinations'=> [ 'India', 'Golden Triangle' ],
			'types'       => [ 'Couples' ],
			'hero'        => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=1920&q=85',
			'file'        => '105_Essential_Golden_Triangle_Couples.html',
		],
		'106' => [
			'title'       => 'Essential Golden Triangle — Family',
			'subtitle'    => 'Family Holiday',
			'duration'    => '9 Days / 8 Nights',
			'season'      => 'October to March',
			'location'    => 'India',
			'destinations'=> [ 'India', 'Golden Triangle' ],
			'types'       => [ 'Family' ],
			'hero'        => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?w=1920&q=85',
			'file'        => '106_Essential_Golden_Triangle_Family.html',
		],
		'107' => [
			'title'       => 'Golden Triangle — Group Tour',
			'subtitle'    => 'Small Group Tour',
			'duration'    => '8 Days / 7 Nights',
			'season'      => 'October to March',
			'location'    => 'India',
			'destinations'=> [ 'India', 'Golden Triangle' ],
			'types'       => [ 'Group' ],
			'hero'        => 'https://images.unsplash.com/photo-1557590312-00b1e07a72d4?w=1920&q=85',
			'file'        => '107_Golden_Triangle_Group_Tour.html',
		],
		'108' => [
			'title'       => 'The Very Best of India — Group Tour',
			'subtitle'    => 'Small Group Tour',
			'duration'    => '14 Days / 13 Nights',
			'season'      => 'October to March',
			'location'    => 'India',
			'destinations'=> [ 'India' ],
			'types'       => [ 'Group' ],
			'hero'        => 'https://images.unsplash.com/photo-1477587458883-47145ed94245?w=1920&q=85',
			'file'        => '108_The_Very_Best_of_India_Group_Tour.html',
		],
		'109' => [
			'title'       => 'Grand India Explorer — Couples',
			'subtitle'    => 'Private Couples Tour',
			'duration'    => '15 Days / 14 Nights',
			'season'      => 'October to March',
			'location'    => 'India',
			'destinations'=> [ 'India' ],
			'types'       => [ 'Couples' ],
			'hero'        => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=1920&q=85',
			'file'        => '109_Grand_India_Explorer_Couples.html',
		],
		'110' => [
			'title'       => 'Grand India Explorer — Family',
			'subtitle'    => 'Family Holiday',
			'duration'    => '15 Days / 14 Nights',
			'season'      => 'October to March',
			'location'    => 'India',
			'destinations'=> [ 'India' ],
			'types'       => [ 'Family' ],
			'hero'        => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?w=1920&q=85',
			'file'        => '110_Grand_India_Explorer_Family.html',
		],
		'111' => [
			'title'       => 'Essential Kashmir',
			'subtitle'    => 'Kashmir Discovery',
			'duration'    => '8 Days / 7 Nights',
			'season'      => 'April to October',
			'location'    => 'Kashmir, India',
			'destinations'=> [ 'India', 'Kashmir' ],
			'types'       => [ 'Couples', 'Family' ],
			'hero'        => 'https://images.unsplash.com/photo-1566837945700-30057527ade0?w=1920&q=85',
			'file'        => '111_Essential_Kashmir.html',
		],
		'112' => [
			'title'       => 'Essential Goa',
			'subtitle'    => 'Beach & Heritage Explorer',
			'duration'    => '8 Days / 7 Nights',
			'season'      => 'October to March',
			'location'    => 'Goa, India',
			'destinations'=> [ 'India', 'Goa' ],
			'types'       => [ 'Couples', 'Family' ],
			'hero'        => 'https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?w=1920&q=85',
			'file'        => '112_Essential_Goa.html',
		],
		'113' => [
			'title'       => 'Treasures of Rajasthan',
			'subtitle'    => 'Royal Rajasthan Explorer',
			'duration'    => '10 Days / 9 Nights',
			'season'      => 'October to March',
			'location'    => 'Rajasthan, India',
			'destinations'=> [ 'India', 'Rajasthan' ],
			'types'       => [ 'Group', 'Couples', 'Family' ],
			'hero'        => 'https://images.unsplash.com/photo-1548013146-72479768bada?w=1920&q=85',
			'file'        => '113_Treasures_of_Rajasthan.html',
		],
		'114' => [
			'title'       => 'Essential Sikkim',
			'subtitle'    => 'Himalayan Discovery',
			'duration'    => '8 Days / 7 Nights',
			'season'      => 'March to May & September to November',
			'location'    => 'Sikkim, India',
			'destinations'=> [ 'India', 'Sikkim' ],
			'types'       => [ 'Couples', 'Family' ],
			'hero'        => 'https://images.unsplash.com/photo-1626621341517-bbf3d9990a23?w=1920&q=85',
			'file'        => '114_Essential_Sikkim.html',
		],
		'115' => [
			'title'       => 'Kerala Ayurveda & Yoga Retreat',
			'subtitle'    => 'Wellness & Rejuvenation',
			'duration'    => '9 Days / 8 Nights',
			'season'      => 'October to March',
			'location'    => 'Kerala, India',
			'destinations'=> [ 'India', 'Kerala' ],
			'types'       => [ 'Wellness' ],
			'hero'        => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=1920&q=85',
			'file'        => '115_Kerala_Ayurveda_Yoga_Retreat.html',
		],
		'116' => [
			'title'       => 'India Wellness & Health Checkup',
			'subtitle'    => 'Medical & Wellness Tour',
			'duration'    => '10 Days / 9 Nights',
			'season'      => 'Year Round',
			'location'    => 'India',
			'destinations'=> [ 'India' ],
			'types'       => [ 'Wellness' ],
			'hero'        => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=1920&q=85',
			'file'        => '116_India_Wellness_Health_Checkup.html',
		],
	];

	// ── Run the import ────────────────────────────────────────────────────────
	$log     = [];
	$created = 0;
	$skipped = 0;

	foreach ( $packages as $ref => $pkg ) {
		$file_path = $packages_dir . '/' . $pkg['file'];

		if ( ! file_exists( $file_path ) ) {
			$log[] = "⚠️  MISSING FILE — Ref {$ref}: {$pkg['file']}";
			$skipped++;
			continue;
		}

		// Skip if a tour with this ref already exists.
		$existing = get_posts( [
			'post_type'      => 'tour',
			'meta_key'       => '_at_ref',
			'meta_value'     => $ref,
			'posts_per_page' => 1,
			'fields'         => 'ids',
		] );

		if ( ! empty( $existing ) ) {
			$log[] = "⏭  SKIPPED (already exists) — Ref {$ref}: {$pkg['title']}";
			$skipped++;
			continue;
		}

		// Read and parse the HTML file.
		$html = file_get_contents( $file_path );

		// Extract overview (first two <p> tags inside #overview section).
		$overview_content = ashfield_extract_between(
			$html,
			'<div class="overview-content">',
			'</div>'
		);

		// Extract itinerary block (everything inside #itinerary section).
		$itinerary_html = ashfield_extract_section( $html, 'itinerary' );

		// Extract accommodation table.
		$accommodation_html = ashfield_extract_section( $html, 'hotels' );

		// Extract price from hero-price div.
		$raw_price = ashfield_extract_between( $html, '<div class="hero-price">', '</div>' );
		$price     = trim( strip_tags( $raw_price ) );

		// Extract luxury price from hero-price-note (e.g. "Luxury 5-star from £766").
		$price_note   = ashfield_extract_between( $html, '<div class="hero-price-note">', '</div>' );
		$luxury_price = '';
		if ( preg_match( '/£[\d,]+/', $price_note, $m ) ) {
			$luxury_price = $m[0];
		}

		// Build the post content from the overview.
		$post_content = $overview_content ? wp_kses_post( $overview_content ) : '';

		// Create the post.
		$post_id = wp_insert_post( [
			'post_type'    => 'tour',
			'post_title'   => $pkg['title'],
			'post_status'  => 'publish',
			'post_content' => $post_content,
			'post_excerpt' => "Discover {$pkg['title']} — {$pkg['subtitle']}. {$pkg['duration']} | Season: {$pkg['season']}.",
		] );

		if ( is_wp_error( $post_id ) ) {
			$log[] = "❌  ERROR — Ref {$ref}: " . $post_id->get_error_message();
			continue;
		}

		// ── Meta fields ───────────────────────────────────────────────────
		update_post_meta( $post_id, '_at_ref',               $ref );
		update_post_meta( $post_id, '_at_subtitle',          $pkg['subtitle'] );
		update_post_meta( $post_id, '_at_duration',          $pkg['duration'] );
		update_post_meta( $post_id, '_at_season',            $pkg['season'] );
		update_post_meta( $post_id, '_at_location',          $pkg['location'] );
		update_post_meta( $post_id, '_at_accommodation',     '4-Star Hotels & Resorts' );
		update_post_meta( $post_id, '_at_meals',             'Breakfast daily' );
		update_post_meta( $post_id, '_at_atol',              '1' );

		// Price: strip "From " and " per person" wording if present.
		$clean_price = preg_replace( '/From\s+/i', '', $price );
		$clean_price = preg_replace( '/\s+per\s+person/i', '', $clean_price );
		$clean_price = trim( $clean_price );

		if ( $clean_price && stripos( $clean_price, 'Contact' ) === false ) {
			update_post_meta( $post_id, '_at_price', 'From ' . $clean_price );
		} else {
			update_post_meta( $post_id, '_at_price', 'Contact Us' );
		}

		if ( $luxury_price ) {
			update_post_meta( $post_id, '_at_price_luxury', 'From ' . $luxury_price );
		}

		// Itinerary HTML (strip the wrapping <section> tags).
		if ( $itinerary_html ) {
			update_post_meta( $post_id, '_at_itinerary_html', wp_kses_post( $itinerary_html ) );
		}

		// Accommodation HTML (strip the wrapping <section> tags).
		if ( $accommodation_html ) {
			update_post_meta( $post_id, '_at_accommodation_html', wp_kses_post( $accommodation_html ) );
		}

		// ── Taxonomy terms ────────────────────────────────────────────────
		// Destinations.
		if ( ! empty( $pkg['destinations'] ) ) {
			$dest_term_ids = [];
			foreach ( $pkg['destinations'] as $dest_name ) {
				$term = term_exists( $dest_name, 'tour_destination' );
				if ( ! $term ) {
					$term = wp_insert_term( $dest_name, 'tour_destination' );
				}
				if ( ! is_wp_error( $term ) ) {
					$dest_term_ids[] = (int) ( is_array( $term ) ? $term['term_id'] : $term );
				}
			}
			if ( $dest_term_ids ) {
				wp_set_post_terms( $post_id, $dest_term_ids, 'tour_destination' );
			}
		}

		// Tour types.
		if ( ! empty( $pkg['types'] ) ) {
			$type_term_ids = [];
			foreach ( $pkg['types'] as $type_name ) {
				$term = term_exists( $type_name, 'tour_type' );
				if ( ! $term ) {
					$term = wp_insert_term( $type_name, 'tour_type' );
				}
				if ( ! is_wp_error( $term ) ) {
					$type_term_ids[] = (int) ( is_array( $term ) ? $term['term_id'] : $term );
				}
			}
			if ( $type_term_ids ) {
				wp_set_post_terms( $post_id, $type_term_ids, 'tour_type' );
			}
		}

		$log[] = "✅  CREATED (ID #{$post_id}) — Ref {$ref}: {$pkg['title']}";
		$created++;
	}

	// ── Output the log ────────────────────────────────────────────────────────
	$total = count( $packages );
	echo '<!DOCTYPE html><html><head>';
	echo '<title>Ashfield Travel — Package Importer</title>';
	echo '<style>body{font-family:sans-serif;max-width:800px;margin:40px auto;padding:20px;line-height:1.8;}';
	echo 'h1{color:#1B3A5C;}pre{background:#f4f4f4;padding:20px;border-radius:6px;white-space:pre-wrap;}';
	echo '.summary{background:#1B3A5C;color:#fff;padding:20px;border-radius:6px;margin-bottom:20px;}';
	echo 'a{color:#C8963E;font-weight:bold;}</style></head><body>';
	echo '<h1>Ashfield Travel — Package Importer</h1>';
	echo '<div class="summary">';
	echo "<strong>Total packages in map:</strong> {$total}<br>";
	echo "<strong>Created:</strong> {$created}<br>";
	echo "<strong>Skipped / Errors:</strong> {$skipped}";
	echo '</div>';
	echo '<pre>' . implode( "\n", array_map( 'esc_html', $log ) ) . '</pre>';
	echo '<p><a href="' . esc_url( get_post_type_archive_link( 'tour' ) ) . '">→ View Tours Archive</a></p>';
	echo '<p><a href="' . esc_url( admin_url( 'edit.php?post_type=tour' ) ) . '">→ Manage Tours in Admin</a></p>';
	echo '</body></html>';
	exit;
}

/**
 * Extract the inner HTML of a section identified by id="$id".
 *
 * @param string $html Full HTML string.
 * @param string $id   Section id attribute (e.g. "itinerary").
 * @return string Inner HTML content, or empty string if not found.
 */
function ashfield_extract_section( $html, $id ) {
	// Match <section id="$id"> ... </section> (non-greedy, with any attributes).
	$pattern = '/<section[^>]*id=["\']' . preg_quote( $id, '/' ) . '["\'][^>]*>(.*?)<\/section>/si';
	if ( preg_match( $pattern, $html, $m ) ) {
		// Remove the heading (h2) from the top — the theme template adds its own.
		$inner = preg_replace( '/<h2[^>]*>.*?<\/h2>/si', '', $m[1], 1 );
		return trim( $inner );
	}
	return '';
}

/**
 * Extract the content between a start and end string (first occurrence).
 *
 * @param string $html  Full HTML string.
 * @param string $start Start marker.
 * @param string $end   End marker.
 * @return string Content between the markers, or empty string if not found.
 */
function ashfield_extract_between( $html, $start, $end ) {
	$pos_start = strpos( $html, $start );
	if ( $pos_start === false ) {
		return '';
	}
	$pos_start += strlen( $start );
	$pos_end = strpos( $html, $end, $pos_start );
	if ( $pos_end === false ) {
		return '';
	}
	return substr( $html, $pos_start, $pos_end - $pos_start );
}
