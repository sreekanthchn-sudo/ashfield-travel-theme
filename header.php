<?php
/**
 * Global Site Header (all non-homepage pages)
 * Uses the same bespoke Ashfield Travel branding as header-home.php
 * but applies to all page types — inner pages, 404, search results, etc.
 *
 * @package Ashfield_Travel
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php get_template_part('template-parts/top-bar'); ?>

<header class="site-header">
  <div class="inside-header grid-container">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="at-logo">
      <div class="at-logo-mark">
        <span class="a-letter">A</span>
        <span class="star">&#10038;</span>
      </div>
      <div class="at-logo-text">
        <span class="brand">ASHFIELD</span>
        <span class="sub">TRAVEL</span>
      </div>
    </a>

    <nav class="at-nav" role="navigation" aria-label="Main navigation">
      <div class="at-nav-item has-dropdown">
        <a href="<?php echo esc_url( home_url('/destinations/') ); ?>" aria-haspopup="true">Destinations <span class="arrow" aria-hidden="true">&#9660;</span></a>
        <div class="mega-menu" role="menu">
          <div class="mega-col">
            <h4>India</h4>
            <a href="<?php echo esc_url( home_url('/destinations/kerala/') ); ?>" role="menuitem">Kerala</a>
            <a href="<?php echo esc_url( home_url('/destinations/golden-triangle/') ); ?>" role="menuitem">Golden Triangle</a>
            <a href="<?php echo esc_url( home_url('/destinations/kashmir/') ); ?>" role="menuitem">Kashmir</a>
            <a href="<?php echo esc_url( home_url('/destinations/rajasthan/') ); ?>" role="menuitem">Rajasthan</a>
            <a href="<?php echo esc_url( home_url('/destinations/goa/') ); ?>" role="menuitem">Goa</a>
          </div>
          <div class="mega-col">
            <h4>Middle East</h4>
            <a href="<?php echo esc_url( home_url('/destinations/dubai/') ); ?>" role="menuitem">Dubai</a>
          </div>
          <div class="mega-col">
            <h4>Coming Soon</h4>
            <a href="#" class="coming" role="menuitem">Turkey</a>
            <a href="#" class="coming" role="menuitem">Albania</a>
          </div>
        </div>
      </div>
      <div class="at-nav-item has-dropdown">
        <a href="<?php echo esc_url( home_url('/tours/') ); ?>" aria-haspopup="true">Tour Types <span class="arrow" aria-hidden="true">&#9660;</span></a>
        <div class="mega-menu" style="min-width: 400px;" role="menu">
          <div class="mega-col">
            <h4>How You Travel</h4>
            <a href="<?php echo esc_url( home_url('/tours/group-tours/') ); ?>" role="menuitem">Group Tours</a>
            <a href="<?php echo esc_url( home_url('/tours/private-tours/') ); ?>" role="menuitem">Private Tours</a>
            <a href="<?php echo esc_url( home_url('/tours/tailor-made/') ); ?>" role="menuitem">Tailor-Made Holidays</a>
            <a href="<?php echo esc_url( home_url('/tours/family-packages/') ); ?>" role="menuitem">Family Packages</a>
            <a href="<?php echo esc_url( home_url('/tours/honeymoon-escapes/') ); ?>" role="menuitem">Honeymoon Escapes</a>
          </div>
        </div>
      </div>
      <div class="at-nav-item"><a href="<?php echo esc_url( home_url('/about-us/') ); ?>">About Us</a></div>
      <div class="at-nav-item"><a href="<?php echo esc_url( home_url('/offers/') ); ?>">Offers</a></div>
      <div class="at-nav-item"><a href="<?php echo esc_url( home_url('/brochures/') ); ?>">Brochures</a></div>
      <div class="at-nav-item"><a href="<?php echo esc_url( home_url('/contact-us/') ); ?>">Contact Us</a></div>
    </nav>

    <div class="header-right">
      <div class="header-phone">
        <span class="number">+44 7587 671758</span>
        <span class="hours">Mon-Fri 9am-6pm</span>
      </div>
      <a href="<?php echo esc_url( home_url('/brochures/') ); ?>" class="at-btn-primary">
        Request a brochure <span class="icon">&#10132;</span>
      </a>
    </div>
  </div>
</header>
