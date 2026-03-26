<?php
/**
 * Template Name: Front Page
 *
 * @package Ashfield_Travel
 */

defined('ABSPATH') || exit;

get_header('home'); ?>

<main id="primary" class="site-main">

	<?php
	get_template_part( 'template-parts/home/hero' );
	get_template_part( 'template-parts/home/filter-bar' );
	get_template_part( 'template-parts/home/destinations' );
	get_template_part( 'template-parts/home/featured-tours' );
	get_template_part( 'template-parts/home/tour-types' );
	get_template_part( 'template-parts/home/why-ashfield' );
	get_template_part( 'template-parts/home/testimonials' );
	get_template_part( 'template-parts/home/blog' );
	get_template_part( 'template-parts/home/newsletter' );
	get_template_part( 'template-parts/home/conversion-boost' );
	?>

</main><!-- #primary -->

<!-- ════════════ STICKY BROCHURE BUTTON ════════════ -->
<a href="<?php echo esc_url( home_url('/brochures/') ); ?>" class="at-sticky-brochure" aria-label="<?php esc_attr_e( 'Request a brochure', 'ashfield-travel' ); ?>">
  <?php esc_html_e( 'Request a brochure', 'ashfield-travel' ); ?>
  <span class="arrow-circle" aria-hidden="true"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span>
</a>

<!-- ════════════ MOBILE STICKY CONTACT BAR ════════════ -->
<div class="at-mobile-contact-bar">
  <a href="tel:+447587671758" class="at-mobile-btn at-mobile-btn--call" aria-label="<?php esc_attr_e( 'Call us', 'ashfield-travel' ); ?>">
    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.8A2 2 0 0 1 22 16.92z"></path></svg>
    <?php esc_html_e( 'Call Now', 'ashfield-travel' ); ?>
  </a>
  <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="at-mobile-btn at-mobile-btn--quote" aria-label="<?php esc_attr_e( 'Get Quote', 'ashfield-travel' ); ?>">
    <?php esc_html_e( 'Get Free Quote', 'ashfield-travel' ); ?>
  </a>
</div>

<?php
get_footer('home');
