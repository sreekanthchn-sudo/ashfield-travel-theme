<?php
/**
 * Template part: Why Ashfield — USP grid (navy background)
 *
 * @package Ashfield_Travel
 */

$usps = [
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
		'title' => __( 'Trusted by UK Travellers', 'ashfield-travel' ),
		'desc'  => __( 'Join hundreds of British-Indian families who trust us for their most important journeys. We are UK-based and fully protected.', 'ashfield-travel' ),
	],
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>',
		'title' => __( 'Affordable Customised Packages', 'ashfield-travel' ),
		'desc'  => __( 'Luxury experiences at competitive prices. We customise every itinerary to fit your budget and family needs perfectly.', 'ashfield-travel' ),
	],
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.81 12.81 0 0 0 .8 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l2.18-2.18a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.8A2 2 0 0 1 22 16.92z"></path></svg>',
		'title' => __( '24/7 Personal Support', 'ashfield-travel' ),
		'desc'  => __( 'From the moment you enquire until you return home, our team and local guides speak your language and are always here for you.', 'ashfield-travel' ),
	],
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>',
		'title' => __( 'Experienced Travel Planners', 'ashfield-travel' ),
		'desc'  => __( 'Our team has decades of experience in India, Dubai, and beyond, ensuring every detail of your holiday is expertly managed.', 'ashfield-travel' ),
	],
];

?>

<section class="at-section at-section--navy" id="why-ashfield">
  <div class="grid-container">

    <header class="at-section-header">
      <h2 class="at-section-title"><?php esc_html_e( 'Why Choose Us', 'ashfield-travel' ); ?></h2>
      <p class="at-section-subtitle">
        <?php esc_html_e( 'Discover why hundreds of UK travellers choose Ashfield for their curated family holidays.', 'ashfield-travel' ); ?>
      </p>
      <div class="at-section-divider" aria-hidden="true"></div>
    </header>

    <div class="at-usp-grid">
      <?php foreach ( $usps as $usp ) : ?>
        <div class="at-usp-card">
          <div class="at-usp-icon" aria-hidden="true"><?php echo $usp['icon']; // phpcs:ignore -- emoji ?></div>
          <h3 class="at-usp-title"><?php echo esc_html( $usp['title'] ); ?></h3>
          <p class="at-usp-desc"><?php echo esc_html( $usp['desc'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
