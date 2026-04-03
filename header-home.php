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
<?php
$tour_archive = get_post_type_archive_link( 'tour' ) ? get_post_type_archive_link( 'tour' ) : home_url( '/tours/' );
$dest_kerala  = ashfield_tax_link_or_archive( 'tour_destination', 'kerala', $tour_archive );
$dest_golden  = ashfield_tax_link_or_archive( 'tour_destination', 'golden-triangle', $tour_archive );
$dest_rajasthan = ashfield_tax_link_or_archive( 'tour_destination', 'rajasthan', $tour_archive );
$type_group   = ashfield_tax_link_or_archive( 'tour_type', 'group', $tour_archive );
$type_private = ashfield_tax_link_or_archive( 'tour_type', 'private', $tour_archive );
$type_family  = ashfield_tax_link_or_archive( 'tour_type', 'family', $tour_archive );
$destination_groups = ashfield_get_destination_menu_groups();
$tour_type_items    = ashfield_get_tour_type_menu_items();
?>

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

    <button class="at-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <nav class="at-nav" role="navigation" aria-label="Main navigation">
      <div class="at-nav-item has-dropdown">
        <a href="<?php echo esc_url( home_url('/destinations/') ); ?>" aria-haspopup="true">Destinations <span class="arrow" aria-hidden="true"><svg viewBox="0 0 24 24" width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" style="display:inline-block; vertical-align:middle; margin-left:4px;"><polyline points="6 9 12 15 18 9"></polyline></svg></span></a>
        <div class="mega-menu" role="menu">
          <?php if ( ! empty( $destination_groups ) ) : ?>
            <?php foreach ( $destination_groups as $group ) : ?>
              <div class="mega-col">
                <h4><?php echo esc_html( $group['title'] ); ?></h4>
                <?php foreach ( $group['items'] as $item ) : ?>
                  <a href="<?php echo esc_url( $item['url'] ); ?>" role="menuitem"><?php echo esc_html( $item['label'] ); ?></a>
                <?php endforeach; ?>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <div class="mega-col">
              <h4>Destinations</h4>
              <a href="<?php echo esc_url( $dest_kerala ); ?>" role="menuitem">Kerala</a>
              <a href="<?php echo esc_url( $dest_golden ); ?>" role="menuitem">Golden Triangle</a>
              <a href="<?php echo esc_url( $dest_rajasthan ); ?>" role="menuitem">Rajasthan</a>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="at-nav-item has-dropdown">
        <a href="<?php echo esc_url( home_url('/our-tours/') ); ?>" aria-haspopup="true">Our Tours <span class="arrow" aria-hidden="true"><svg viewBox="0 0 24 24" width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" style="display:inline-block; vertical-align:middle; margin-left:4px;"><polyline points="6 9 12 15 18 9"></polyline></svg></span></a>
        <div class="mega-menu" style="min-width: 400px;" role="menu">
          <div class="mega-col">
            <h4>How You Travel</h4>
            <?php if ( ! empty( $tour_type_items ) ) : ?>
              <?php foreach ( $tour_type_items as $item ) : ?>
                <a href="<?php echo esc_url( $item['url'] ); ?>" role="menuitem"><?php echo esc_html( $item['label'] ); ?></a>
              <?php endforeach; ?>
            <?php else : ?>
              <a href="<?php echo esc_url( $type_group ); ?>" role="menuitem">Group Tours</a>
              <a href="<?php echo esc_url( $type_private ); ?>" role="menuitem">Private Tours</a>
              <a href="<?php echo esc_url( $type_family ); ?>" role="menuitem">Family Holidays</a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="at-nav-item"><a href="<?php echo esc_url( home_url('/why-choose-us/') ); ?>">Why Choose Us</a></div>
      <div class="at-nav-item"><a href="<?php echo esc_url( home_url('/offers/') ); ?>">Offers</a></div>
      <div class="at-nav-item"><a href="<?php echo esc_url( home_url('/brochures/') ); ?>">Brochures</a></div>
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
