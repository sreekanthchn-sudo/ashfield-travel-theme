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
	?>

</main><!-- #primary -->

<!-- ════════════ STICKY BROCHURE BUTTON ════════════ -->
<a href="<?php echo esc_url( home_url('/brochures/') ); ?>" class="at-sticky-brochure" aria-label="<?php esc_attr_e( 'Request a brochure', 'ashfield-travel' ); ?>">
  <?php esc_html_e( 'Request a brochure', 'ashfield-travel' ); ?>
  <span class="arrow-circle" aria-hidden="true"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span>
</a>

<!-- ════════════ MOBILE CTA BAR ════════════ -->
<div class="at-mobile-cta">
  <div class="at-mobile-cta-inner">
    <a href="tel:+447587671758" aria-label="<?php esc_attr_e( 'Call us', 'ashfield-travel' ); ?>">
      <button class="at-btn-mobile call"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block; vertical-align:middle; margin-right:4px;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> <?php esc_html_e( 'Call Us', 'ashfield-travel' ); ?></button>
    </a>
    <button class="at-btn-mobile enquire"><?php esc_html_e( 'Enquire Now', 'ashfield-travel' ); ?> <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" style="display:inline-block; vertical-align:middle; margin-left:4px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></button>
  </div>
</div>

<?php
get_footer('home');
