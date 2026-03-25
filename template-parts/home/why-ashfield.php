<?php
/**
 * Template part: Why Ashfield — USP grid (navy background)
 *
 * @package Ashfield_Travel
 */

$usps = [
	[
		'icon'  => '&#127759;',
		'title' => __( 'Built for British-Indian Families', 'ashfield-travel' ),
		'desc'  => __( 'We understand the nuances of travelling as a British-Indian family. Dietary needs, cultural considerations, and multi-generational comfort are built into every itinerary.', 'ashfield-travel' ),
	],
	[
		'icon'  => '&#128172;',
		'title' => __( 'Translator Support', 'ashfield-travel' ),
		'desc'  => __( 'Need help communicating with elderly parents or relatives who prefer Hindi, Gujarati, or Malayalam? Our guides and support team speak your language.', 'ashfield-travel' ),
	],
	[
		'icon'  => '&#128274;',
		'title' => __( 'Fully Protected', 'ashfield-travel' ),
		'desc'  => __( 'ATOL protected and TTA members. Your money is safe, your holiday is guaranteed, and you have a UK-based team to call any time.', 'ashfield-travel' ),
	],
	[
		'icon'  => '&#127869;',
		'title' => __( 'Vegetarian & Jain Friendly', 'ashfield-travel' ),
		'desc'  => __( 'From pure veg restaurants to Jain dietary requirements, we ensure every meal on your holiday meets your family\'s needs without compromise.', 'ashfield-travel' ),
	],
	[
		'icon'  => '&#128142;',
		'title' => __( 'Handpicked Hotels', 'ashfield-travel' ),
		'desc'  => __( 'Every hotel is personally vetted. We choose properties that combine comfort, character, and excellent service so your family can truly relax.', 'ashfield-travel' ),
	],
	[
		'icon'  => '&#9993;',
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
