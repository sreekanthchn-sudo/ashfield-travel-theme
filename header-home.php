<?php
/**
 * Custom Home Header
 * Bypasses GeneratePress defaults to allow a fully bespoke navigation and layout,
 * while still firing wp_head() for plugin compatibility.
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

<!-- ASHFIELD_CACHE_BUST_987654321 -->
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

    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <nav class="at-nav" role="navigation" aria-label="Main navigation">
      <div class="at-nav-item"><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a></div>
      <div class="at-nav-item has-dropdown">
        <a href="<?php echo esc_url( home_url('/tours/') ); ?>" aria-haspopup="true">Packages <span class="arrow" aria-hidden="true"><svg viewBox="0 0 24 24" width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" style="display:inline-block; vertical-align:middle; margin-left:4px;"><polyline points="6 9 12 15 18 9"></polyline></svg></span></a>
        <div class="mega-menu" style="min-width: 400px;" role="menu">
          <div class="mega-col">
            <h4>India Holidays</h4>
            <a href="<?php echo esc_url( home_url('/destinations/kerala/') ); ?>" role="menuitem">Kerala Escape</a>
            <a href="<?php echo esc_url( home_url('/destinations/golden-triangle/') ); ?>" role="menuitem">Golden Triangle</a>
            <a href="<?php echo esc_url( home_url('/destinations/rajasthan/') ); ?>" role="menuitem">Royal Rajasthan</a>
          </div>
          <div class="mega-col">
            <h4>Tour Types</h4>
            <a href="<?php echo esc_url( home_url('/tour-types/group-tours/') ); ?>" role="menuitem">Group Tours</a>
            <a href="<?php echo esc_url( home_url('/tour-types/private-tours/') ); ?>" role="menuitem">Private Tours</a>
            <a href="<?php echo esc_url( home_url('/tour-types/family-packages/') ); ?>" role="menuitem">Family Holidays</a>
          </div>
        </div>
      </div>
      <div class="at-nav-item"><a href="<?php echo esc_url( home_url('/about-us/') ); ?>">About Us</a></div>
      <div class="at-nav-item"><a href="<?php echo esc_url( home_url('/contact-us/') ); ?>">Contact Us</a></div>
    </nav>

    <div class="header-right">
      <div class="header-phone">
        <span class="number">+44 7587 671758</span>
        <span class="hours">Mon-Fri 9am-6pm</span>
      </div>
      <a href="<?php echo esc_url( home_url('/contact-us/') ); ?>" class="at-btn at-btn-primary">
        Get Free Quote <span class="at-btn-icon"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span>
      </a>
    </div>
  </div>
</header>
