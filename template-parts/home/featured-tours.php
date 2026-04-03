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
	'posts_per_page' => 16,
	'meta_query'     => [ [ 'key' => '_at_featured', 'value' => '1' ] ],
	'no_found_rows'  => true,
] );

// ── Static fallback data ───────────────────────────────────────────────────────
$static_tours = [
	[
		'title'      => __( 'Essential Kerala — Couples Escape', 'ashfield-travel' ),
		'location'   => __( 'India',                  'ashfield-travel' ),
		'favourite'  => __( 'Customer Favourite',     'ashfield-travel' ),
		'highlights' => [
			__( 'Cruise the enchanting backwaters by houseboat', 'ashfield-travel' ),
			__( 'Explore the spice plantations of Munnar',       'ashfield-travel' ),
			__( 'Relax on Kovalam\'s golden beaches',            'ashfield-travel' ),
		],
		'save'       => __( 'Save up to £200 per person',  'ashfield-travel' ),
		'dates'      => __( 'Sep 2026 – Mar 2027',         'ashfield-travel' ),
		'duration'   => __( '8 days',                      'ashfield-travel' ),
		'price'      => '£1,295',
		'url'        => home_url( '/tours/essential-kerala/' ),
		'img'        => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=500&q=80',
		'img_alt'    => __( 'Kerala backwaters houseboat', 'ashfield-travel' ),
		'badges'     => [ 
			'<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>', 
			'<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>' 
		],
	],
	[
		'title'      => __( 'Essential Golden Triangle — Couples', 'ashfield-travel' ),
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
		'url'        => home_url( '/tours/essential-golden-triangle-couples/' ),
		'img'        => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?w=500&q=80',
		'img_alt'    => __( 'Taj Mahal at sunrise', 'ashfield-travel' ),
		'badges'     => [ 
			'<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>', 
			'<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18"></path><path d="M3 7l9-4 9 4"></path><path d="M5 21V7"></path><path d="M19 21V7"></path><path d="M9 21V11"></path><path d="M15 21V11"></path></svg>'
		],
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
		'url'        => home_url( '/tours/?destination=dubai' ),
		'img'        => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=500&q=80',
		'img_alt'    => __( 'Dubai skyline from the water', 'ashfield-travel' ),
		'badges'     => [ 
			'<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>', 
			'<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>'
		],
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
		'url'        => home_url( '/tours/essential-kashmir/' ),
		'img'        => 'https://images.unsplash.com/photo-1597074866923-dc0589150a37?w=500&q=80',
		'img_alt'    => __( 'Dal Lake at sunset, Srinagar', 'ashfield-travel' ),
		'badges'     => [ 
			'<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>', 
			'<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 3H5a2 2 0 0 0-2 2v3"></path><path d="M21 8V5a2 2 0 0 0-2-2h-3"></path><path d="M3 16v3a2 2 0 0 0 2 2h3"></path><path d="M16 21h3a2 2 0 0 0 2-2v-3"></path></svg>'
		],
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
        $ref      = get_post_meta( get_the_ID(), '_at_ref',      true );
        $price    = get_post_meta( get_the_ID(), '_at_price',    true );
        $dates    = get_post_meta( get_the_ID(), '_at_dates',    true );
        $duration = get_post_meta( get_the_ID(), '_at_duration', true );
        $save     = get_post_meta( get_the_ID(), '_at_save_banner', true );
        $location = get_post_meta( get_the_ID(), '_at_location', true );
        ?>
        <article class="at-tour-card">
          <div class="at-tour-card-img">
            <?php
              $featured_img = get_post_meta( get_the_ID(), '_at_featured_image', true )
                           ?: get_post_meta( get_the_ID(), '_at_hero', true );
              if ( has_post_thumbnail() ) :
                the_post_thumbnail( 'medium', [ 'loading' => 'lazy' ] );
              elseif ( $featured_img ) :
                ?>
                <img src="<?php echo esc_url( $featured_img ); ?>"
                     alt="<?php the_title_attribute(); ?>"
                     loading="lazy"
                     width="500"
                     height="280"
                     style="object-fit: cover; width: 100%; height: 100%;">
                <?php
              endif;
            ?>
          </div>
          <div class="at-tour-card-body">
            <div class="at-tour-card-meta">
              <?php if ( $ref ) : ?>
                <span class="at-tour-ref" style="color:var(--at-gold); font-weight:700; font-size:0.75rem; text-transform:uppercase; letter-spacing:1px; margin-right:0.5rem;">Ref: <?php echo esc_html( $ref ); ?></span>
              <?php endif; ?>
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
                  <div class="icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></div>
                  <div class="label"><?php esc_html_e( 'Dates', 'ashfield-travel' ); ?></div>
                  <div class="value"><?php echo esc_html( $dates ); ?></div>
                </div>
              <?php endif; ?>
              <?php if ( $duration ) : ?>
                <div class="at-tour-info-item">
                  <div class="icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></div>
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
              <span class="at-tour-location"><span style="color:var(--at-gold); font-weight:700;">&#8226;</span> <?php echo esc_html( $tour['location'] ); ?></span>
              <?php if ( $tour['favourite'] ) : ?>
                <span class="at-tour-favourite">
                  <svg viewBox="0 0 24 24" width="12" height="12" fill="var(--at-gold)" style="margin-right:4px;"><path d="M12 1.7L14.5 9H22L15.9 13.4L18.4 20.7L12 16.3L5.6 20.7L8.1 13.4L2 9H9.5L12 1.7Z"/></svg>
                  <?php echo esc_html( $tour['favourite'] ); ?>
                </span>
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
                <div class="icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></div>
                <div class="label"><?php esc_html_e( 'Dates', 'ashfield-travel' ); ?></div>
                <div class="value"><?php echo esc_html( $tour['dates'] ); ?></div>
              </div>
              <div class="at-tour-info-item">
                <div class="icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></div>
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
