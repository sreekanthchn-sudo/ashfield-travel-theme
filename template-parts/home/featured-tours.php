<?php
/**
 * Template part: Featured tours grid (4 columns, Distant Journeys style)
 *
 * Pulls up to 4 posts from the 'tour' CPT marked as featured.
 * Falls back to static data if the CPT is not yet set up.
 *
 * @package Ashfield_Travel
 */

// ── Dynamic: query 'tour' CPT with featured meta ──────────────────────────────
$tour_query = new WP_Query( [
	'post_type'      => 'tour',
	'posts_per_page' => 4,
	'meta_query'     => [ [ 'key' => '_at_featured', 'value' => '1' ] ],
	'no_found_rows'  => true,
] );

// ── Static fallback data ───────────────────────────────────────────────────────
$static_tours = [
	[
		'title'      => __( 'Splendours of Kerala',   'ashfield-travel' ),
		'location'   => __( 'India',                  'ashfield-travel' ),
		'favourite'  => __( 'Customer Favourite',     'ashfield-travel' ),
		'highlights' => [
			__( 'Cruise the enchanting backwaters by houseboat', 'ashfield-travel' ),
			__( 'Explore the spice plantations of Munnar',       'ashfield-travel' ),
			__( 'Relax on Kovalam\'s golden beaches',            'ashfield-travel' ),
		],
		'save'       => __( 'Save up to £200 per person',  'ashfield-travel' ),
		'dates'      => __( 'Sep 2026 – Mar 2027',         'ashfield-travel' ),
		'duration'   => __( '14 days',                     'ashfield-travel' ),
		'price'      => '£1,295',
		'url'        => home_url( '/tours/splendours-of-kerala/' ),
		'img'        => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=500&q=80',
		'img_alt'    => __( 'Kerala backwaters houseboat', 'ashfield-travel' ),
		'badges'     => [ '&#128101;', '&#127968;' ],
	],
	[
		'title'      => __( 'Golden Triangle Classic', 'ashfield-travel' ),
		'location'   => __( 'India',                   'ashfield-travel' ),
		'favourite'  => __( 'Customer Favourite',      'ashfield-travel' ),
		'highlights' => [
			__( 'Marvel at the Taj Mahal at sunrise',         'ashfield-travel' ),
			__( 'Explore the royal palaces of Jaipur',        'ashfield-travel' ),
			__( 'Walk through Old Delhi\'s vibrant streets',  'ashfield-travel' ),
		],
		'save'       => __( 'Save up to £150 per person', 'ashfield-travel' ),
		'dates'      => __( 'Oct 2026 – Mar 2027',        'ashfield-travel' ),
		'duration'   => __( '5 days',                     'ashfield-travel' ),
		'price'      => '£895',
		'url'        => home_url( '/tours/golden-triangle-classic/' ),
		'img'        => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?w=500&q=80',
		'img_alt'    => __( 'Taj Mahal at sunrise', 'ashfield-travel' ),
		'badges'     => [ '&#128101;', '&#127963;' ],
	],
	[
		'title'      => __( 'Dubai Family Discovery', 'ashfield-travel' ),
		'location'   => __( 'Dubai',                  'ashfield-travel' ),
		'favourite'  => __( 'New Tour',               'ashfield-travel' ),
		'highlights' => [
			__( 'Iconic Burj Khalifa & Dubai Marina',        'ashfield-travel' ),
			__( 'Desert safari with traditional BBQ dinner', 'ashfield-travel' ),
			__( 'Abu Dhabi day trip & Grand Mosque',         'ashfield-travel' ),
		],
		'save'       => __( 'Save up to £100 per person', 'ashfield-travel' ),
		'dates'      => __( 'Year round',                 'ashfield-travel' ),
		'duration'   => __( '7 days',                     'ashfield-travel' ),
		'price'      => '£1,095',
		'url'        => home_url( '/tours/dubai-family-discovery/' ),
		'img'        => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=500&q=80',
		'img_alt'    => __( 'Dubai skyline from the water', 'ashfield-travel' ),
		'badges'     => [ '&#127968;', '&#10024;' ],
	],
	[
		'title'      => __( 'Kashmir Paradise',   'ashfield-travel' ),
		'location'   => __( 'India',              'ashfield-travel' ),
		'favourite'  => '',
		'highlights' => [
			__( 'Stay on a traditional Dal Lake houseboat',    'ashfield-travel' ),
			__( 'Explore Mughal gardens in Srinagar',          'ashfield-travel' ),
			__( 'Journey through Pahalgam & Gulmarg',          'ashfield-travel' ),
		],
		'save'       => __( 'Early Bird — Save £250pp', 'ashfield-travel' ),
		'dates'      => __( 'Apr 2026 – Oct 2026',      'ashfield-travel' ),
		'duration'   => __( '10 days',                  'ashfield-travel' ),
		'price'      => '£1,495',
		'url'        => home_url( '/tours/kashmir-paradise/' ),
		'img'        => 'https://images.unsplash.com/photo-1597074866923-dc0589150a37?w=500&q=80',
		'img_alt'    => __( 'Dal Lake at sunset, Srinagar', 'ashfield-travel' ),
		'badges'     => [ '&#128100;', '&#127956;' ],
	],
];
?>

<section class="at-section at-section--cream" id="featured-tours">
  <div class="grid-container">

    <header class="at-section-header">
      <h2 class="at-section-title"><?php esc_html_e( 'Our Most Popular Tours', 'ashfield-travel' ); ?></h2>
      <p class="at-section-subtitle">
        <?php esc_html_e( 'Handpicked by our travel experts and loved by families just like yours.', 'ashfield-travel' ); ?>
      </p>
      <div class="at-section-divider" aria-hidden="true"></div>
    </header>

    <div class="at-tour-grid">

    <?php if ( $tour_query->have_posts() ) :
      // ── Dynamic CPT output ────────────────────────────────────────────────
      while ( $tour_query->have_posts() ) :
        $tour_query->the_post();
        $price    = get_post_meta( get_the_ID(), '_at_price',    true );
        $dates    = get_post_meta( get_the_ID(), '_at_dates',    true );
        $duration = get_post_meta( get_the_ID(), '_at_duration', true );
        $save     = get_post_meta( get_the_ID(), '_at_save',     true );
        $location = get_post_meta( get_the_ID(), '_at_location', true );
        ?>
        <article class="at-tour-card">
          <div class="at-tour-card-img">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'medium', [ 'loading' => 'lazy' ] ); ?>
            <?php endif; ?>
          </div>
          <div class="at-tour-card-body">
            <div class="at-tour-card-meta">
              <?php if ( $location ) : ?>
                <span class="at-tour-location">&#128205; <?php echo esc_html( $location ); ?></span>
              <?php endif; ?>
            </div>
            <h3 class="at-tour-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php if ( $save ) : ?>
              <div class="at-tour-save-banner"><?php echo esc_html( $save ); ?></div>
            <?php endif; ?>
            <div class="at-tour-info-row">
              <?php if ( $dates ) : ?>
                <div class="at-tour-info-item">
                  <div class="icon" aria-hidden="true">&#128197;</div>
                  <div class="label"><?php esc_html_e( 'Dates', 'ashfield-travel' ); ?></div>
                  <div class="value"><?php echo esc_html( $dates ); ?></div>
                </div>
              <?php endif; ?>
              <?php if ( $duration ) : ?>
                <div class="at-tour-info-item">
                  <div class="icon" aria-hidden="true">&#9201;</div>
                  <div class="label"><?php esc_html_e( 'Duration', 'ashfield-travel' ); ?></div>
                  <div class="value"><?php echo esc_html( $duration ); ?></div>
                </div>
              <?php endif; ?>
              <?php if ( $price ) : ?>
                <div class="at-tour-info-item">
                  <div class="icon" aria-hidden="true">£</div>
                  <div class="label"><?php esc_html_e( 'Prices from', 'ashfield-travel' ); ?></div>
                  <div class="value at-price-value"><?php echo esc_html( $price ); ?></div>
                </div>
              <?php endif; ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="at-btn-find-more">
              <?php esc_html_e( 'Find out more', 'ashfield-travel' ); ?>
              <span class="arrow-circle" aria-hidden="true">&#10132;</span>
            </a>
          </div>
        </article>
      <?php endwhile;
      wp_reset_postdata();

    else :
      // ── Static fallback ───────────────────────────────────────────────────
      foreach ( $static_tours as $tour ) : ?>
        <article class="at-tour-card">
          <div class="at-tour-card-img">
            <img src="<?php echo esc_url( $tour['img'] ); ?>"
                 alt="<?php echo esc_attr( $tour['img_alt'] ); ?>"
                 loading="lazy" width="500" height="280">
            <div class="at-tour-card-badges" aria-hidden="true">
              <?php foreach ( $tour['badges'] as $badge ) : ?>
                <span class="at-tour-badge"><?php echo $badge; // phpcs:ignore WordPress.Security.EscapeOutput -- trusted emoji HTML ?></span>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="at-tour-card-body">
            <div class="at-tour-card-meta">
              <span class="at-tour-location">&#128205; <?php echo esc_html( $tour['location'] ); ?></span>
              <?php if ( $tour['favourite'] ) : ?>
                <span class="at-tour-favourite">&#9733; <?php echo esc_html( $tour['favourite'] ); ?></span>
              <?php endif; ?>
            </div>
            <h3 class="at-tour-card-title">
              <a href="<?php echo esc_url( $tour['url'] ); ?>"><?php echo esc_html( $tour['title'] ); ?></a>
            </h3>
            <ul class="at-tour-highlights">
              <?php foreach ( $tour['highlights'] as $hl ) : ?>
                <li><?php echo esc_html( $hl ); ?></li>
              <?php endforeach; ?>
            </ul>
            <?php if ( $tour['save'] ) : ?>
              <div class="at-tour-save-banner"><?php echo esc_html( $tour['save'] ); ?></div>
            <?php endif; ?>
            <div class="at-tour-info-row">
              <div class="at-tour-info-item">
                <div class="icon" aria-hidden="true">&#128197;</div>
                <div class="label"><?php esc_html_e( 'Dates', 'ashfield-travel' ); ?></div>
                <div class="value"><?php echo esc_html( $tour['dates'] ); ?></div>
              </div>
              <div class="at-tour-info-item">
                <div class="icon" aria-hidden="true">&#9201;</div>
                <div class="label"><?php esc_html_e( 'Duration', 'ashfield-travel' ); ?></div>
                <div class="value"><?php echo esc_html( $tour['duration'] ); ?></div>
              </div>
              <div class="at-tour-info-item">
                <div class="icon" aria-hidden="true">£</div>
                <div class="label"><?php esc_html_e( 'Prices from', 'ashfield-travel' ); ?></div>
                <div class="value at-price-value"><?php echo esc_html( $tour['price'] ); ?></div>
              </div>
            </div>
            <a href="<?php echo esc_url( $tour['url'] ); ?>" class="at-btn-find-more">
              <?php esc_html_e( 'Find out more', 'ashfield-travel' ); ?>
              <span class="arrow-circle" aria-hidden="true">&#10132;</span>
            </a>
          </div>
        </article>
      <?php endforeach;
    endif; ?>

    </div><!-- .at-tour-grid -->

    <div class="at-section-cta">
      <a href="<?php echo esc_url( home_url( '/tours/' ) ); ?>" class="at-btn-outline">
        <?php esc_html_e( 'View All Tours', 'ashfield-travel' ); ?> &#10132;
      </a>
    </div>

  </div>
</section>
