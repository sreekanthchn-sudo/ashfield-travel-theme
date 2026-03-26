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
      <?php esc_html_e( 'Trusted by UK Travellers', 'ashfield-travel' ); ?>
    </div>

    <h1 class="at-hero-tagline">
      <?php esc_html_e( 'Affordable & Custom Travel', 'ashfield-travel' ); ?><br>
      <?php esc_html_e( 'Packages from the UK', 'ashfield-travel' ); ?>
    </h1>

    <p class="at-hero-sub">
      <?php esc_html_e( 'Expertly crafted holidays to India, Dubai and beyond. Get a personalised travel plan within 24 hours.', 'ashfield-travel' ); ?>
    </p>

    <div class="at-hero-buttons">
      <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="at-btn at-btn-primary at-btn-hero">
        <?php esc_html_e( 'Get Free Quote', 'ashfield-travel' ); ?>
        <span class="at-btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span>
      </a>
      <a href="tel:+447587671758" class="at-btn at-btn-secondary at-btn-hero">
        <?php esc_html_e( 'Call Now', 'ashfield-travel' ); ?>
      </a>
    </div>

  </div>

</section>
