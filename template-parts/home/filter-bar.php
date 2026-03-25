<?php
/**
 * Template part: Filter / category navigation bar
 * Sticky pill nav just below hero. JS in custom.js handles active state.
 *
 * @package Ashfield_Travel
 */

$filter_items = [
	[ 'label' => __( 'All Tours',          'ashfield-travel' ), 'url' => home_url( '/tours/' ),              'active' => true  ],
	[ 'label' => __( 'India Tours',         'ashfield-travel' ), 'url' => home_url( '/destinations/india/' ), 'active' => false ],
	[ 'label' => __( 'Dubai',               'ashfield-travel' ), 'url' => home_url( '/destinations/dubai/' ), 'active' => false ],
	[ 'label' => __( 'Group Tours',         'ashfield-travel' ), 'url' => home_url( '/tour-types/group/' ),   'active' => false ],
	[ 'label' => __( 'Private Tours',       'ashfield-travel' ), 'url' => home_url( '/tour-types/private/' ), 'active' => false ],
	[ 'label' => __( 'Family Packages',     'ashfield-travel' ), 'url' => home_url( '/tour-types/family/' ),  'active' => false ],
	[ 'label' => __( 'Destination Guides',  'ashfield-travel' ), 'url' => home_url( '/blog/' ),               'active' => false ],
	[ 'label' => __( 'Brochures',           'ashfield-travel' ), 'url' => home_url( '/brochures/' ),          'active' => false ],
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
