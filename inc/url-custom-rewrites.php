<?php
/**
 * Custom Rewrite Rules and Permalink Generation for Tours
 *
 * @package Ashfield_Travel
 */

defined( 'ABSPATH' ) || exit;

/* ──────────────────────────────────────────────
 * 1. CUSTOM REWRITE RULES
 * ────────────────────────────────────────────── */
add_action( 'init', 'ashfield_tour_custom_rewrites' );
function ashfield_tour_custom_rewrites() {
	// Our Tours URL matching
	// Matches: /our-tours/wellness/tour-slug/ or /our-tours/medical/tour-slug/
	add_rewrite_rule(
		'^our-tours/(wellness|medical)/([^/]+)/?$',
		'index.php?tour=$matches[2]',
		'top'
	);

	// Destinations URL matching
	// Matches: /destinations/india/kerala/tour-slug/ or /destinations/dubai/tour-slug/
	// (Any sub-structure under destinations ending in a tour slug)
	add_rewrite_rule(
		'^destinations/(?:[^/]+/)+([^/]+)/?$',
		'index.php?tour=$matches[1]',
		'top'
	);
}

/* ──────────────────────────────────────────────
 * 2. POST TYPE LINK (PERMALINK GENERATOR)
 * ────────────────────────────────────────────── */
add_filter( 'post_type_link', 'ashfield_custom_tour_permalink', 10, 2 );
function ashfield_custom_tour_permalink( $post_link, $post ) {
	if ( 'tour' !== $post->post_type ) {
		return $post_link;
	}

	// 1. Check if it's a Wellness or Medical tour
	$tour_types = wp_get_post_terms( $post->ID, 'tour_type' );
	$is_wellness_medical = false;
	$type_slug = '';

	if ( ! is_wp_error( $tour_types ) && ! empty( $tour_types ) ) {
		foreach ( $tour_types as $type ) {
			if ( in_array( $type->slug, [ 'wellness', 'medical' ], true ) ) {
				$is_wellness_medical = true;
				$type_slug = $type->slug;
				break;
			}
		}
	}

	if ( $is_wellness_medical ) {
		// Output: /our-tours/wellness/tour-slug/
		return home_url( '/our-tours/' . $type_slug . '/' . $post->post_name . '/' );
	}

	// 2. Otherwise, map via Destination Hierarchy
	$destinations = wp_get_post_terms( $post->ID, 'tour_destination' );
	if ( ! is_wp_error( $destinations ) && ! empty( $destinations ) ) {
		// Find the deepest term (e.g. Kerala -> India -> parent)
		$deepest_term = null;
		$max_depth    = -1;

		foreach ( $destinations as $dest ) {
			$depth   = 0;
			$current = $dest;
			while ( $current->parent > 0 ) {
				$depth++;
				$current = get_term( $current->parent, 'tour_destination' );
			}
			if ( $depth > $max_depth ) {
				$max_depth    = $depth;
				$deepest_term = $dest;
			}
		}

		if ( $deepest_term ) {
			// Build the path bottom-up
			$path    = '';
			$current = $deepest_term;
			while ( $current && ! is_wp_error( $current ) ) {
				$path = $current->slug . '/' . $path;
				if ( $current->parent > 0 ) {
					$current = get_term( $current->parent, 'tour_destination' );
				} else {
					$current = false;
				}
			}
			// Output: /destinations/india/kerala/tour-slug/
			return home_url( '/destinations/' . $path . $post->post_name . '/' );
		}
	}

	// Fallback if no taxonomies are assigned
	return home_url( '/tour/' . $post->post_name . '/' );
}
