<?php
/**
 * Template part: Destinations grid
 * 3×2 image grid. Data is static for launch; swap to a Destination CPT later.
 *
 * @package Ashfield_Travel
 */

$destinations = [
	[
		'name'   => __( 'Kerala',           'ashfield-travel' ),
		'detail' => __( '6 tours from £1,295pp', 'ashfield-travel' ),
		'url'    => home_url( '/destinations/kerala/' ),
		'img'    => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=600&q=80',
		'alt'    => __( 'Backwaters of Kerala at golden hour', 'ashfield-travel' ),
		'badge'  => '',
	],
	[
		'name'   => __( 'Golden Triangle',  'ashfield-travel' ),
		'detail' => __( '4 tours from £895pp',   'ashfield-travel' ),
		'url'    => home_url( '/destinations/golden-triangle/' ),
		'img'    => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?w=600&q=80',
		'alt'    => __( 'Taj Mahal at sunrise, Agra', 'ashfield-travel' ),
		'badge'  => '',
	],
	[
		'name'   => __( 'Dubai',            'ashfield-travel' ),
		'detail' => __( '3 tours from £1,095pp', 'ashfield-travel' ),
		'url'    => home_url( '/destinations/dubai/' ),
		'img'    => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=600&q=80',
		'alt'    => __( 'Dubai skyline at night', 'ashfield-travel' ),
		'badge'  => '',
	],
	[
		'name'   => __( 'Kashmir',          'ashfield-travel' ),
		'detail' => __( '2 tours from £1,495pp', 'ashfield-travel' ),
		'url'    => home_url( '/destinations/kashmir/' ),
		'img'    => 'https://images.unsplash.com/photo-1597074866923-dc0589150a37?w=600&q=80',
		'alt'    => __( 'Dal Lake houseboat, Srinagar', 'ashfield-travel' ),
		'badge'  => '',
	],
	[
		'name'   => __( 'Rajasthan',        'ashfield-travel' ),
		'detail' => __( '3 tours from £1,195pp', 'ashfield-travel' ),
		'url'    => home_url( '/destinations/rajasthan/' ),
		'img'    => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=600&q=80',
		'alt'    => __( 'Amber Fort, Jaipur', 'ashfield-travel' ),
		'badge'  => '',
	],
	[
		'name'   => __( 'Turkey',           'ashfield-travel' ),
		'detail' => __( 'Register your interest', 'ashfield-travel' ),
		'url'    => home_url( '/destinations/turkey/' ),
		'img'    => 'https://images.unsplash.com/photo-1589308078059-be1415eab4c3?w=600&q=80',
		'alt'    => __( 'Cappadocia hot air balloons, Turkey', 'ashfield-travel' ),
		'badge'  => __( 'Coming Soon', 'ashfield-travel' ),
	],
];
?>

<section class="at-section at-section--white" id="destinations">
  <div class="grid-container">

    <header class="at-section-header">
      <h2 class="at-section-title"><?php esc_html_e( 'Explore Our Destinations', 'ashfield-travel' ); ?></h2>
      <p class="at-section-subtitle">
        <?php esc_html_e( 'From the backwaters of Kerala to the glittering skyline of Dubai, discover handpicked destinations perfect for your family.', 'ashfield-travel' ); ?>
      </p>
      <div class="at-section-divider" aria-hidden="true"></div>
    </header>

    <div class="at-dest-grid">
      <?php foreach ( $destinations as $dest ) : ?>
        <a href="<?php echo esc_url( $dest['url'] ); ?>" class="at-dest-card">
          <img src="<?php echo esc_url( $dest['img'] ); ?>"
               alt="<?php echo esc_attr( $dest['alt'] ); ?>"
               loading="lazy"
               width="600" height="450">
          <div class="at-dest-card-overlay">
            <div class="at-dest-card-name"><?php echo esc_html( $dest['name'] ); ?></div>
            <div class="at-dest-card-tours"><?php echo esc_html( $dest['detail'] ); ?></div>
          </div>
          <?php if ( $dest['badge'] ) : ?>
            <span class="at-coming-badge"><?php echo esc_html( $dest['badge'] ); ?></span>
          <?php endif; ?>
        </a>
      <?php endforeach; ?>
    </div>

  </div>
</section>
