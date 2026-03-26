<?php
/**
 * Template part: Hero section
 * Cinematic full-height hero with overlay, tagline, and CTA buttons.
 * Set a featured image on the front page to override the fallback photo.
 *
 * @package Ashfield_Travel
 */

// Allow a featured image on the front page to replace the fallback.
$hero_img = '';
if ( is_front_page() && has_post_thumbnail() ) {
	$hero_img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
}
$fallback  = 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=1920&q=85';
$hero_bg   = $hero_img ? $hero_img : $fallback;
?>

<section class="at-hero" aria-label="<?php esc_attr_e( 'Homepage hero', 'ashfield-travel' ); ?>">

  <!-- Background image -->
  <div class="at-hero-bg" style="background-image:url('<?php echo esc_url( $hero_bg ); ?>');" role="img" aria-label="<?php esc_attr_e( 'Kerala backwaters at dusk', 'ashfield-travel' ); ?>"></div>
  <div class="at-hero-overlay" aria-hidden="true"></div>

  <!-- Content -->
  <div class="at-hero-content grid-container">

    <div class="at-hero-badge">
      <span aria-hidden="true">&#10038;</span>
      <?php esc_html_e( 'Curated for British-Indian Families', 'ashfield-travel' ); ?>
    </div>

    <h1 class="at-hero-tagline">
      <?php esc_html_e( 'Journeys That Feel', 'ashfield-travel' ); ?><br>
      <?php esc_html_e( 'Like Coming Home', 'ashfield-travel' ); ?>
    </h1>

    <p class="at-hero-sub">
      <?php esc_html_e( 'Expertly crafted holidays to India, Dubai and beyond. Small groups, private tours, and tailor-made itineraries designed around your family.', 'ashfield-travel' ); ?>
    </p>

    <div class="at-hero-buttons">
      <a href="<?php echo esc_url( home_url( '/tours/' ) ); ?>" class="at-btn-primary at-btn-hero">
        <?php esc_html_e( 'Explore Our Tours', 'ashfield-travel' ); ?>
        <span aria-hidden="true">&#10132;</span>
      </a>
      <a href="<?php echo esc_url( home_url( '/brochures/' ) ); ?>" class="at-btn-secondary at-btn-hero">
        <?php esc_html_e( 'Request a Brochure', 'ashfield-travel' ); ?>
      </a>
    </div>

  </div>

</section>
