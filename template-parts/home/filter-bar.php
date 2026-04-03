<?php
/**
 * Template part: Filter / category navigation bar
 * Sticky pill nav just below hero. JS in custom.js handles active state.
 *
 * @package Ashfield_Travel
 */

$tour_archive = get_post_type_archive_link( 'tour' ) ? get_post_type_archive_link( 'tour' ) : home_url( '/tours/' );
$filter_items = [
	[ 'label' => __( 'All Tours', 'ashfield-travel' ), 'url' => $tour_archive, 'active' => true ],
	[ 'label' => __( 'India Tours', 'ashfield-travel' ), 'url' => add_query_arg( 'destination', 'india', $tour_archive ), 'active' => false ],
	[ 'label' => __( 'Dubai', 'ashfield-travel' ), 'url' => add_query_arg( 'destination', 'dubai', $tour_archive ), 'active' => false ],
	[ 'label' => __( 'Group Tours', 'ashfield-travel' ), 'url' => add_query_arg( 'tour_type', 'group', $tour_archive ), 'active' => false ],
	[ 'label' => __( 'Private Tours', 'ashfield-travel' ), 'url' => add_query_arg( 'tour_type', 'private', $tour_archive ), 'active' => false ],
	[ 'label' => __( 'Family Packages', 'ashfield-travel' ), 'url' => add_query_arg( 'tour_type', 'family', $tour_archive ), 'active' => false ],
	[ 'label' => __( 'Destination Guides', 'ashfield-travel' ), 'url' => ashfield_page_link_or_fallback( 'blog', home_url( '/blog/' ) ), 'active' => false ],
	[ 'label' => __( 'Brochures', 'ashfield-travel' ), 'url' => ashfield_page_link_or_fallback( 'brochures', home_url( '/brochures/' ) ), 'active' => false ],
];
?>

<nav class="at-filter-bar" aria-label="<?php esc_attr_e( 'Browse by category', 'ashfield-travel' ); ?>">
  <div class="grid-container">

    <span class="at-filter-label" aria-hidden="true">
      <?php esc_html_e( 'Navigate to:', 'ashfield-travel' ); ?>
    </span>

    <?php foreach ( $filter_items as $item ) : ?>
      <a href="<?php echo esc_url( $item['url'] ); ?>"
         class="at-filter-pill<?php echo $item['active'] ? ' active' : ''; ?>">
        <?php echo esc_html( $item['label'] ); ?>
      </a>
    <?php endforeach; ?>

  </div>
</nav>
