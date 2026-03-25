<?php
/**
 * Template part: Tour types — 5-tile grid (Find Your Perfect Holiday)
 *
 * @package Ashfield_Travel
 */

$types = [
	[
		'icon'  => '&#128101;',
		'name'  => __( 'Group Tours',     'ashfield-travel' ),
		'count' => __( '8 tours available',   'ashfield-travel' ),
		'url'   => home_url( '/tour-types/group/' ),
	],
	[
		'icon'  => '&#128100;',
		'name'  => __( 'Private Tours',   'ashfield-travel' ),
		'count' => __( '12 tours available',  'ashfield-travel' ),
		'url'   => home_url( '/tour-types/private/' ),
	],
	[
		'icon'  => '&#127968;',
		'name'  => __( 'Family Packages', 'ashfield-travel' ),
		'count' => __( '6 packages available', 'ashfield-travel' ),
		'url'   => home_url( '/tour-types/family/' ),
	],
	[
		'icon'  => '&#10084;',
		'name'  => __( 'Honeymoons',      'ashfield-travel' ),
		'count' => __( '4 tours available',   'ashfield-travel' ),
		'url'   => home_url( '/tour-types/honeymoon/' ),
	],
	[
		'icon'  => '&#9878;',
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
