<?php
/**
 * Template part: Tour types — 5-tile grid (Find Your Perfect Holiday)
 *
 * @package Ashfield_Travel
 */

$types = [
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
		'name'  => __( 'Group Tours',     'ashfield-travel' ),
		'count' => __( '8 tours available',   'ashfield-travel' ),
		'url'   => home_url( '/tour-types/group/' ),
	],
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',
		'name'  => __( 'Private Tours',   'ashfield-travel' ),
		'count' => __( '12 tours available',  'ashfield-travel' ),
		'url'   => home_url( '/tour-types/private/' ),
	],
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
		'name'  => __( 'Family Packages', 'ashfield-travel' ),
		'count' => __( '6 packages available', 'ashfield-travel' ),
		'url'   => home_url( '/tour-types/family/' ),
	],
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="2" fill="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>',
		'name'  => __( 'Honeymoons',      'ashfield-travel' ),
		'count' => __( '4 tours available',   'ashfield-travel' ),
		'url'   => home_url( '/tour-types/honeymoon/' ),
	],
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>',
		'name'  => __( 'Tailor-Made',     'ashfield-travel' ),
		'count' => __( 'Fully bespoke',       'ashfield-travel' ),
		'url'   => home_url( '/tour-types/tailor-made/' ),
	],
];
?>

<section class="at-section at-section--white" id="tour-types">
  <div class="grid-container">

    <header class="at-section-header">
      <h2 class="at-section-title"><?php esc_html_e( 'Find Your Perfect Holiday', 'ashfield-travel' ); ?></h2>
      <p class="at-section-subtitle">
        <?php esc_html_e( 'Whether you prefer travelling in a group or want a bespoke private itinerary, we have a style for you.', 'ashfield-travel' ); ?>
      </p>
      <div class="at-section-divider" aria-hidden="true"></div>
    </header>

    <div class="at-types-grid">
      <?php foreach ( $types as $type ) : ?>
        <a href="<?php echo esc_url( $type['url'] ); ?>" class="at-type-tile">
          <div class="at-type-icon" aria-hidden="true"><?php echo $type['icon']; // phpcs:ignore -- emoji ?></div>
          <div class="at-type-name"><?php echo esc_html( $type['name'] ); ?></div>
          <div class="at-type-count"><?php echo esc_html( $type['count'] ); ?></div>
        </a>
      <?php endforeach; ?>
    </div>

  </div>
</section>
