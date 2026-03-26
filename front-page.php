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
<button class="at-sticky-brochure">
  <?php esc_html_e( 'Request a brochure', 'ashfield-travel' ); ?>
  <span class="arrow-circle" aria-hidden="true">&#10132;</span>
</button>

<!-- ════════════ MOBILE CTA BAR ════════════ -->
<div class="at-mobile-cta">
  <div class="at-mobile-cta-inner">
    <a href="tel:+447587671758" aria-label="<?php esc_attr_e( 'Call us', 'ashfield-travel' ); ?>">
      <button class="at-btn-mobile call">&#9742; <?php esc_html_e( 'Call Us', 'ashfield-travel' ); ?></button>
    </a>
    <button class="at-btn-mobile enquire"><?php esc_html_e( 'Enquire Now', 'ashfield-travel' ); ?> &#10132;</button>
  </div>
</div>

<?php
get_footer('home');
