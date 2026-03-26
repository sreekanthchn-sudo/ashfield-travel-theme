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
        <span class="star"><svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor"><path d="M12 1.7L14.5 9H22L15.9 13.4L18.4 20.7L12 16.3L5.6 20.7L8.1 13.4L2 9H9.5L12 1.7Z"/></svg></span>
      </div>
      <div class="at-logo-text">
        <span class="brand">ASHFIELD</span>
        <span class="sub">TRAVEL</span>
      </div>
    </a>

    <nav class="at-nav" role="navigation" aria-label="Main navigation">
      <div class="at-nav-item has-dropdown">
        <a href="<?php echo esc_url( home_url('/destinations/') ); ?>" aria-haspopup="true">Destinations <span class="arrow" aria-hidden="true"><svg viewBox="0 0 24 24" width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" style="display:inline-block; vertical-align:middle; margin-left:4px;"><polyline points="6 9 12 15 18 9"></polyline></svg></span></a>
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
        <a href="<?php echo esc_url( home_url('/tours/') ); ?>" aria-haspopup="true">Tour Types <span class="arrow" aria-hidden="true"><svg viewBox="0 0 24 24" width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" style="display:inline-block; vertical-align:middle; margin-left:4px;"><polyline points="6 9 12 15 18 9"></polyline></svg></span></a>
        <div class="mega-menu" style="min-width: 400px;" role="menu">
          <div class="mega-col">
            <h4>How You Travel</h4>
            <a href="<?php echo esc_url( home_url('/tour-types/group-tours/') ); ?>" role="menuitem">Group Tours</a>
            <a href="<?php echo esc_url( home_url('/tour-types/private-tours/') ); ?>" role="menuitem">Private Tours</a>
            <a href="<?php echo esc_url( home_url('/tour-types/tailor-made/') ); ?>" role="menuitem">Tailor-Made Holidays</a>
            <a href="<?php echo esc_url( home_url('/tour-types/family-packages/') ); ?>" role="menuitem">Family Packages</a>
            <a href="<?php echo esc_url( home_url('/tour-types/honeymoons/') ); ?>" role="menuitem">Honeymoon Escapes</a>
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
      <a href="<?php echo esc_url( home_url('/brochures/') ); ?>" class="at-btn at-btn-primary">
        Request a brochure <span class="at-btn-icon"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span>
      </a>
    </div>
  </div>
</header>
