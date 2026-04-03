<?php
/**
 * Breadcrumb and URL Structure Helpers
 *
 * @package Ashfield_Travel
 */

defined( 'ABSPATH' ) || exit;

/**
 * Generate Breadcrumbs dynamically depending on the current post or taxonomy.
 *
 * @return string HTML breadcrumb markup.
 */
function ashfield_generate_breadcrumbs() {
	if ( is_front_page() || is_home() ) {
		return '';
	}

	$separator = ' &gt; ';
	$home_link = '<a href="' . esc_url( home_url( '/' ) ) . '">Home</a>';
	$breadcrumbs = array( $home_link );

	if ( is_singular( 'tour' ) ) {
		global $post;
		
		// Determine base path visually based on referrer or primary taxonomy
		// If we are dealing with Wellness/Medical:
		$tour_types = wp_get_post_terms( $post->ID, 'tour_type' );
		$is_wellness_medical = false;
		$type_term = null;
		
		if ( ! is_wp_error( $tour_types ) && ! empty( $tour_types ) ) {
			foreach ( $tour_types as $type ) {
				if ( in_array( $type->slug, [ 'wellness', 'medical' ], true ) ) {
					$is_wellness_medical = true;
					$type_term = $type;
					break;
				}
			}
		}

		if ( $is_wellness_medical ) {
			$breadcrumbs[] = '<a href="' . esc_url( home_url( '/our-tours/' ) ) . '">Our Tours</a>';
			$breadcrumbs[] = '<a href="' . esc_url( get_term_link( $type_term ) ) . '">' . esc_html( $type_term->name ) . '</a>';
		} else {
			// It's a standard destination tour
			$breadcrumbs[] = '<a href="' . esc_url( home_url( '/destinations/' ) ) . '">Destinations</a>';
			
			$destinations = wp_get_post_terms( $post->ID, 'tour_destination' );
			if ( ! is_wp_error( $destinations ) && ! empty( $destinations ) ) {
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
					$path_terms = array();
					$current = $deepest_term;
					while ( $current && ! is_wp_error( $current ) ) {
						array_unshift( $path_terms, $current );
						if ( $current->parent > 0 ) {
							$current = get_term( $current->parent, 'tour_destination' );
						} else {
							$current = false;
						}
					}
					foreach ( $path_terms as $term ) {
						$breadcrumbs[] = '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a>';
					}
				}
			}
		}
		
		$breadcrumbs[] = '<span class="current">' . esc_html( get_the_title() ) . '</span>';

	} elseif ( is_tax( 'tour_destination' ) ) {
		$term = get_queried_object();
		$breadcrumbs[] = '<a href="' . esc_url( home_url( '/destinations/' ) ) . '">Destinations</a>';
		
		$path_terms = array();
		$current = $term;
		while ( $current && ! is_wp_error( $current ) ) {
			if ( $current->term_id !== $term->term_id ) {
				array_unshift( $path_terms, $current );
			}
			if ( $current->parent > 0 ) {
				$current = get_term( $current->parent, 'tour_destination' );
			} else {
				$current = false;
			}
		}
		
		foreach ( $path_terms as $p_term ) {
			$breadcrumbs[] = '<a href="' . esc_url( get_term_link( $p_term ) ) . '">' . esc_html( $p_term->name ) . '</a>';
		}
		$breadcrumbs[] = '<span class="current">' . esc_html( $term->name ) . '</span>';

	} elseif ( is_tax( 'tour_type' ) ) {
		$term = get_queried_object();
		$breadcrumbs[] = '<a href="' . esc_url( home_url( '/our-tours/' ) ) . '">Our Tours</a>';
		$breadcrumbs[] = '<span class="current">' . esc_html( $term->name ) . '</span>';
		
	} elseif ( is_post_type_archive( 'tour' ) ) {
		// Depending on URL, we might want to override this, but standard fallback:
		$breadcrumbs[] = '<span class="current">Tours</span>';
	} elseif ( is_page() ) {
		global $post;
		if ( $post->post_parent ) {
			$parents = get_post_ancestors( $post->ID );
			$parents = array_reverse( $parents );
			foreach ( $parents as $parent_id ) {
				$breadcrumbs[] = '<a href="' . esc_url( get_permalink( $parent_id ) ) . '">' . esc_html( get_the_title( $parent_id ) ) . '</a>';
			}
		}
		$breadcrumbs[] = '<span class="current">' . esc_html( get_the_title() ) . '</span>';
	} else {
		$breadcrumbs[] = '<span class="current">' . esc_html( wp_title( '', false ) ) . '</span>';
	}

	return '<div class="at-breadcrumbs">' . implode( $separator, $breadcrumbs ) . '</div>';
}
