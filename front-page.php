<?php
/**
 * Ashfield Travel — Homepage Template
 * Mirrors the homepage-mockup.html section-for-section.
 *
 * Sections (in order):
 *  1. Hero
 *  2. Filter bar
 *  3. Destinations grid
 *  4. Featured tours
 *  5. Tour types
 *  6. Why Ashfield (USPs)
 *  7. Testimonials
 *  8. Blog / Travel inspiration
 *  9. Newsletter / Brochure CTA
 *
 * Top bar + trust bar are injected automatically via GP hooks in functions.php.
 *
 * @package Ashfield_Travel
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<?php get_template_part( 'template-parts/home/hero' ); ?>
<?php get_template_part( 'template-parts/home/filter-bar' ); ?>
<?php get_template_part( 'template-parts/home/destinations' ); ?>
<?php get_template_part( 'template-parts/home/featured-tours' ); ?>
<?php get_template_part( 'template-parts/home/tour-types' ); ?>
<?php get_template_part( 'template-parts/home/why-ashfield' ); ?>
<?php get_template_part( 'template-parts/home/testimonials' ); ?>
<?php get_template_part( 'template-parts/home/blog' ); ?>
<?php get_template_part( 'template-parts/home/newsletter' ); ?>

<!-- Sticky Brochure Button (desktop) -->
<a href="<?php echo esc_url( home_url( '/brochures/' ) ); ?>" class="at-sticky-brochure" aria-label="<?php esc_attr_e( 'Request a free brochure', 'ashfield-travel' ); ?>">
  <?php esc_html_e( 'Request a brochure', 'ashfield-travel' ); ?>
  <span class="arrow-circle" aria-hidden="true">&#10132;</span>
</a>

<!-- Mobile CTA bar -->
<div class="at-mobile-cta" role="complementary" aria-label="<?php esc_attr_e( 'Quick contact', 'ashfield-travel' ); ?>">
  <div class="at-mobile-cta-inner">
    <a href="tel:+448001234567" class="at-btn-mobile at-btn-mobile--call">
      <span aria-hidden="true">&#9742;</span> <?php esc_html_e( 'Call Us', 'ashfield-travel' ); ?>
    </a>
    <a href="<?php echo esc_url( home_url( '/enquire/' ) ); ?>" class="at-btn-mobile at-btn-mobile--enquire">
      <?php esc_html_e( 'Enquire Now', 'ashfield-travel' ); ?> <span aria-hidden="true">&#10132;</span>
    </a>
  </div>
</div>

<?php get_footer(); ?>
