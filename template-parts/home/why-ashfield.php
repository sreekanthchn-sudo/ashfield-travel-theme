<?php
/**
 * Template part: Why Ashfield — USP grid (navy background)
 *
 * @package Ashfield_Travel
 */

$usps = [
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>',
		'title' => __( 'Built for British-Indian Families', 'ashfield-travel' ),
		'desc'  => __( 'We understand the nuances of travelling as a British-Indian family. Dietary needs, cultural considerations, and multi-generational comfort are built into every itinerary.', 'ashfield-travel' ),
	],
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>',
		'title' => __( 'Translator Support', 'ashfield-travel' ),
		'desc'  => __( 'Need help communicating with elderly parents or relatives who prefer Hindi, Gujarati, or Malayalam? Our guides and support team speak your language.', 'ashfield-travel' ),
	],
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>',
		'title' => __( 'Fully Protected', 'ashfield-travel' ),
		'desc'  => __( 'ATOL protected and TTA members. Your money is safe, your holiday is guaranteed, and you have a UK-based team to call any time.', 'ashfield-travel' ),
	],
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg>',
		'title' => __( 'Vegetarian & Jain Friendly', 'ashfield-travel' ),
		'desc'  => __( 'From pure veg restaurants to Jain dietary requirements, we ensure every meal on your holiday meets your family\'s needs without compromise.', 'ashfield-travel' ),
	],
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
		'title' => __( 'Handpicked Hotels', 'ashfield-travel' ),
		'desc'  => __( 'Every hotel is personally vetted. We choose properties that combine comfort, character, and excellent service so your family can truly relax.', 'ashfield-travel' ),
	],
	[
		'icon'  => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
		'title' => __( 'Small Groups, Big Experiences', 'ashfield-travel' ),
		'desc'  => __( 'Maximum 26 guests per tour means more personal attention, better experiences, and the flexibility to make each journey special.', 'ashfield-travel' ),
	],
];
?>

<section class="at-section at-section--navy" id="why-ashfield">
  <div class="grid-container">

    <header class="at-section-header">
      <h2 class="at-section-title"><?php esc_html_e( 'Why Travel With Ashfield', 'ashfield-travel' ); ?></h2>
      <p class="at-section-subtitle">
        <?php esc_html_e( 'We are more than a travel company. We are a team that understands your culture, your family, and your expectations.', 'ashfield-travel' ); ?>
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
