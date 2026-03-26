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

    <nav class="at-nav">
      <div class="at-nav-item">
        Destinations <span class="arrow">&#9660;</span>
        <div class="mega-menu">
          <div class="mega-col">
            <h4>India</h4>
            <a href="#">Kerala</a>
            <a href="#">Golden Triangle</a>
            <a href="#">Kashmir</a>
            <a href="#">Rajasthan</a>
            <a href="#">Goa</a>
          </div>
          <div class="mega-col">
            <h4>Middle East</h4>
            <a href="#">Dubai</a>
          </div>
          <div class="mega-col">
            <h4>Coming Soon</h4>
            <a href="#" class="coming">Turkey</a>
            <a href="#" class="coming">Albania</a>
          </div>
        </div>
      </div>
      <div class="at-nav-item">
        Tour Types <span class="arrow">&#9660;</span>
        <div class="mega-menu" style="min-width: 400px;">
          <div class="mega-col">
            <h4>How You Travel</h4>
            <a href="#">Group Tours</a>
            <a href="#">Private Tours</a>
            <a href="#">Tailor-Made Holidays</a>
            <a href="#">Family Packages</a>
            <a href="#">Honeymoon Escapes</a>
          </div>
        </div>
      </div>
      <div class="at-nav-item">About Us <span class="arrow">&#9660;</span></div>
      <div class="at-nav-item">Offers</div>
      <div class="at-nav-item">Brochures</div>
      <div class="at-nav-item">Contact Us</div>
    </nav>

    <div class="header-right">
      <div class="header-phone">
        <span class="number">+44 7587 671758</span>
        <span class="hours">Mon-Fri 9am-6pm</span>
      </div>
      <button class="at-btn-primary">
        Request a brochure <span class="icon">&#10132;</span>
      </button>
    </div>
  </div>
</header>
