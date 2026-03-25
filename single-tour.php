<?php
/**
 * Single Tour page  →  /tours/tour-slug/
 *
 * Layout:
 *  - Hero image with price overlay
 *  - Two-column body: itinerary/details left, booking sidebar right
 *  - Highlights, USP badges, gallery placeholder
 *  - Related tours strip
 *
 * @package Ashfield_Travel
 */

defined( 'ABSPATH' ) || exit;

get_header();

if ( ! have_posts() ) {
	get_footer();
	return;
}

the_post();

/* ── Meta fields ──────────────────────────────────────────────────────────── */
$price         = get_post_meta( get_the_ID(), '_at_price',        true );
$dates         = get_post_meta( get_the_ID(), '_at_dates',        true );
$duration      = get_post_meta( get_the_ID(), '_at_duration',     true );
$location      = get_post_meta( get_the_ID(), '_at_location',     true );
$save          = get_post_meta( get_the_ID(), '_at_save_banner',  true );
$group_size    = get_post_meta( get_the_ID(), '_at_group_size',   true );
$meals         = get_post_meta( get_the_ID(), '_at_meals',        true );
$accommodation = get_post_meta( get_the_ID(), '_at_accommodation',true );
$flight_info   = get_post_meta( get_the_ID(), '_at_flight_info',  true );
$atol          = get_post_meta( get_the_ID(), '_at_atol',         true );

/* ── Taxonomies ───────────────────────────────────────────────────────────── */
$dest_terms = get_the_terms( get_the_ID(), 'tour_destination' );
$type_terms = get_the_terms( get_the_ID(), 'tour_type' );

/* ── Hero image ───────────────────────────────────────────────────────────── */
$hero_img = has_post_thumbnail()
    ? get_the_post_thumbnail_url( get_the_ID(), 'full' )
    : 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=1920&q=85';
?>

<!-- ════ TOUR HERO ════ -->
<section class="at-tour-hero" aria-label="<?php the_title_attribute(); ?>">
  <div class="at-tour-hero-bg"
       style="background-image:url('<?php echo esc_url( $hero_img ); ?>')"
       role="img"
       aria-label="<?php the_title_attribute(); ?>">
  </div>
  <div class="at-tour-hero-overlay" aria-hidden="true"></div>

  <div class="at-tour-hero-content grid-container">

    <!-- Breadcrumb -->
    <nav class="at-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'ashfield-travel' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'ashfield-travel' ); ?></a>
      <span aria-hidden="true"> / </span>
      <a href="<?php echo esc_url( get_post_type_archive_link( 'tour' ) ); ?>"><?php esc_html_e( 'Tours', 'ashfield-travel' ); ?></a>
      <?php if ( $dest_terms && ! is_wp_error( $dest_terms ) ) : ?>
        <span aria-hidden="true"> / </span>
        <a href="<?php echo esc_url( get_term_link( $dest_terms[0] ) ); ?>"><?php echo esc_html( $dest_terms[0]->name ); ?></a>
      <?php endif; ?>
      <span aria-hidden="true"> / </span>
      <span aria-current="page"><?php the_title(); ?></span>
    </nav>

    <!-- Title block -->
    <div class="at-tour-hero-text">
      <?php if ( $type_terms && ! is_wp_error( $type_terms ) ) : ?>
        <div class="at-hero-badge">
          <?php echo esc_html( $type_terms[0]->name ); ?>
        </div>
      <?php endif; ?>

      <h1 class="at-tour-hero-title"><?php the_title(); ?></h1>

      <?php if ( $location ) : ?>
        <div class="at-tour-hero-location">&#128205; <?php echo esc_html( $location ); ?></div>
      <?php endif; ?>
    </div>

    <!-- Quick-stats bar -->
    <div class="at-tour-hero-stats">
      <?php if ( $duration ) : ?>
        <div class="at-hero-stat">
          <span class="icon" aria-hidden="true">&#9201;</span>
          <span class="label"><?php esc_html_e( 'Duration', 'ashfield-travel' ); ?></span>
          <span class="value"><?php echo esc_html( $duration ); ?></span>
        </div>
      <?php endif; ?>
      <?php if ( $dates ) : ?>
        <div class="at-hero-stat">
          <span class="icon" aria-hidden="true">&#128197;</span>
          <span class="label"><?php esc_html_e( 'Departures', 'ashfield-travel' ); ?></span>
          <span class="value"><?php echo esc_html( $dates ); ?></span>
        </div>
      <?php endif; ?>
      <?php if ( $group_size ) : ?>
        <div class="at-hero-stat">
          <span class="icon" aria-hidden="true">&#128101;</span>
          <span class="label"><?php esc_html_e( 'Group size', 'ashfield-travel' ); ?></span>
          <span class="value"><?php echo esc_html( $group_size ); ?></span>
        </div>
      <?php endif; ?>
      <?php if ( $price ) : ?>
        <div class="at-hero-stat at-hero-stat--price">
          <span class="label"><?php esc_html_e( 'From', 'ashfield-travel' ); ?></span>
          <span class="value at-price-hero"><?php echo esc_html( $price ); ?></span>
          <span class="per"><?php esc_html_e( 'per person', 'ashfield-travel' ); ?></span>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>

<?php if ( $save ) : ?>
  <div class="at-tour-save-strip">
    <div class="grid-container">
      <span>&#127881; <?php echo esc_html( $save ); ?></span>
    </div>
  </div>
<?php endif; ?>

<!-- ════ BODY: ITINERARY + SIDEBAR ════ -->
<div class="at-tour-body">
  <div class="grid-container">
    <div class="at-tour-layout">

      <!-- ── MAIN CONTENT ──────────────────────────────── -->
      <main class="at-tour-main" id="main">

        <!-- Tour description / itinerary (full WP editor content) -->
        <div class="at-tour-content at-prose">
          <?php the_content(); ?>
        </div>

        <!-- What's included -->
        <div class="at-tour-included">
          <h2 class="at-section-title--small"><?php esc_html_e( "What's Included", 'ashfield-travel' ); ?></h2>
          <div class="at-included-grid">
            <?php
            $included = [
                $flight_info   ? [ '&#9992;', $flight_info ]                                                           : [ '&#9992;',  __( 'Return flights from the UK', 'ashfield-travel' ) ],
                $accommodation ? [ '&#127968;', $accommodation ]                                                        : [ '&#127968;', __( 'Hand-picked hotel accommodation', 'ashfield-travel' ) ],
                $meals         ? [ '&#127869;', $meals ]                                                                : [ '&#127869;', __( 'Breakfast daily, some evening meals', 'ashfield-travel' ) ],
                                 [ '&#128652;', __( 'All transfers & transport', 'ashfield-travel' ) ],
                                 [ '&#128101;', __( 'Expert local guides', 'ashfield-travel' ) ],
                $atol          ? [ '&#10003;',  __( 'ATOL financial protection', 'ashfield-travel' ) ]                 : null,
            ];
            foreach ( array_filter( $included ) as $item ) : ?>
              <div class="at-included-item">
                <span class="icon" aria-hidden="true"><?php echo $item[0]; // phpcs:ignore ?></span>
                <span><?php echo esc_html( $item[1] ); ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- USP badges row -->
        <div class="at-tour-usp-strip">
          <?php
          $usps = [
              [ '&#127869;', __( 'Vegetarian & Jain friendly', 'ashfield-travel' ) ],
              [ '&#128172;', __( 'Translator support available', 'ashfield-travel' ) ],
              [ '&#128142;', __( 'Handpicked hotels', 'ashfield-travel' ) ],
              [ '&#128274;', __( 'ATOL & TTA protected', 'ashfield-travel' ) ],
          ];
          foreach ( $usps as $usp ) : ?>
            <div class="at-tour-usp-badge">
              <span aria-hidden="true"><?php echo $usp[0]; // phpcs:ignore ?></span>
              <?php echo esc_html( $usp[1] ); ?>
            </div>
          <?php endforeach; ?>
        </div>

      </main>

      <!-- ── BOOKING SIDEBAR ───────────────────────────── -->
      <aside class="at-tour-sidebar" aria-label="<?php esc_attr_e( 'Book this tour', 'ashfield-travel' ); ?>">

        <div class="at-booking-card">

          <?php if ( $price ) : ?>
            <div class="at-booking-price">
              <span class="label"><?php esc_html_e( 'Prices from', 'ashfield-travel' ); ?></span>
              <span class="price"><?php echo esc_html( $price ); ?></span>
              <span class="per"><?php esc_html_e( 'per person', 'ashfield-travel' ); ?></span>
            </div>
          <?php endif; ?>

          <?php if ( $save ) : ?>
            <div class="at-booking-save"><?php echo esc_html( $save ); ?></div>
          <?php endif; ?>

          <a href="<?php echo esc_url( home_url( '/enquire/?tour=' . get_the_ID() ) ); ?>"
             class="at-btn-book">
            <?php esc_html_e( 'Enquire About This Tour', 'ashfield-travel' ); ?>
            <span aria-hidden="true">&#10132;</span>
          </a>

          <a href="<?php echo esc_url( home_url( '/brochures/' ) ); ?>"
             class="at-btn-brochure-outline">
            <?php esc_html_e( 'Request Free Brochure', 'ashfield-travel' ); ?>
          </a>

          <div class="at-booking-phone">
            <span aria-hidden="true">&#9742;</span>
            <div>
              <a href="tel:+447587671758"><strong>+44 7587 671758</strong></a>
              <span><?php esc_html_e( 'Mon–Fri 9am–6pm', 'ashfield-travel' ); ?></span>
            </div>
          </div>

          <!-- Tour quick-facts -->
          <ul class="at-booking-facts">
            <?php if ( $duration ) : ?>
              <li><span>&#9201;</span> <?php echo esc_html( $duration ); ?></li>
            <?php endif; ?>
            <?php if ( $dates ) : ?>
              <li><span>&#128197;</span> <?php echo esc_html( $dates ); ?></li>
            <?php endif; ?>
            <?php if ( $group_size ) : ?>
              <li><span>&#128101;</span> <?php printf( esc_html__( 'Max %s guests', 'ashfield-travel' ), esc_html( $group_size ) ); ?></li>
            <?php endif; ?>
            <?php if ( $atol ) : ?>
              <li><span>&#10003;</span> <?php esc_html_e( 'ATOL Protected', 'ashfield-travel' ); ?></li>
            <?php endif; ?>
            <li><span>&#9733;</span> <?php esc_html_e( '4.9/5 customer rating', 'ashfield-travel' ); ?></li>
          </ul>

        </div><!-- .at-booking-card -->

        <!-- Sticky re-appear on mobile scroll -->
        <div class="at-sidebar-trust at-sidebar-trust--tour">
          <p><?php esc_html_e( 'Questions? We\'re here to help.', 'ashfield-travel' ); ?></p>
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="at-link-underline">
            <?php esc_html_e( 'Chat with our experts', 'ashfield-travel' ); ?> &#10132;
          </a>
        </div>

      </aside>

    </div><!-- .at-tour-layout -->
  </div><!-- .grid-container -->
</div><!-- .at-tour-body -->

<!-- ════ RELATED TOURS ════ -->
<?php
$dest_slugs    = $dest_terms && ! is_wp_error( $dest_terms )
    ? wp_list_pluck( $dest_terms, 'slug' )
    : [];

$related_query = new WP_Query( [
	'post_type'      => 'tour',
	'posts_per_page' => 4,
	'post__not_in'   => [ get_the_ID() ],
	'no_found_rows'  => true,
	'tax_query'      => $dest_slugs ? [ [
		'taxonomy' => 'tour_destination',
		'field'    => 'slug',
		'terms'    => $dest_slugs,
	] ] : [],
] );

if ( $related_query->have_posts() ) : ?>
  <section class="at-section at-section--cream at-related-tours">
    <div class="grid-container">
      <header class="at-section-header">
        <h2 class="at-section-title"><?php esc_html_e( 'You Might Also Like', 'ashfield-travel' ); ?></h2>
        <div class="at-section-divider" aria-hidden="true"></div>
      </header>
      <div class="at-tour-grid">
        <?php while ( $related_query->have_posts() ) :
          $related_query->the_post();
          $r_price    = get_post_meta( get_the_ID(), '_at_price',    true );
          $r_duration = get_post_meta( get_the_ID(), '_at_duration', true );
          $r_location = get_post_meta( get_the_ID(), '_at_location', true );
          ?>
          <article class="at-tour-card">
            <div class="at-tour-card-img">
              <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                <?php the_post_thumbnail( 'medium_large', [ 'loading' => 'lazy' ] ); ?>
              </a>
            </div>
            <div class="at-tour-card-body">
              <div class="at-tour-card-meta">
                <?php if ( $r_location ) : ?>
                  <span class="at-tour-location">&#128205; <?php echo esc_html( $r_location ); ?></span>
                <?php endif; ?>
              </div>
              <h3 class="at-tour-card-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
              <div class="at-tour-info-row">
                <?php if ( $r_duration ) : ?>
                  <div class="at-tour-info-item">
                    <div class="icon" aria-hidden="true">&#9201;</div>
                    <div class="label"><?php esc_html_e( 'Duration', 'ashfield-travel' ); ?></div>
                    <div class="value"><?php echo esc_html( $r_duration ); ?></div>
                  </div>
                <?php endif; ?>
                <?php if ( $r_price ) : ?>
                  <div class="at-tour-info-item">
                    <div class="icon" aria-hidden="true">£</div>
                    <div class="label"><?php esc_html_e( 'From', 'ashfield-travel' ); ?></div>
                    <div class="value at-price-value"><?php echo esc_html( $r_price ); ?></div>
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
        wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php get_footer(); ?>
