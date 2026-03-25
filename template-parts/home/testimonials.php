<?php
/**
 * Template part: Testimonials — 3-column card grid
 * Static for launch; swap to a Testimonials CPT or plugin later.
 *
 * @package Ashfield_Travel
 */

$testimonials = [
	[
		'text'    => __( 'Ashfield understood exactly what our family needed. My parents were comfortable with the vegetarian food and translator support, while the kids loved the houseboat experience.', 'ashfield-travel' ),
		'name'    => __( 'Ravi & Priya Patel', 'ashfield-travel' ),
		'trip'    => __( 'Kerala Backwaters · Oct 2025', 'ashfield-travel' ),
		'initials'=> 'RP',
	],
	[
		'text'    => __( 'The Golden Triangle tour was perfectly paced. Sreekanth personally called us before the trip to understand our requirements. That level of care is rare in this industry.', 'ashfield-travel' ),
		'name'    => __( 'Anita Shah', 'ashfield-travel' ),
		'trip'    => __( 'Golden Triangle · Dec 2025', 'ashfield-travel' ),
		'initials'=> 'AS',
	],
	[
		'text'    => __( 'We booked the Kerala-Dubai combo and it was the best holiday we have ever had. Everything was seamless, from the flights to the transfers. Absolutely will book again.', 'ashfield-travel' ),
		'name'    => __( 'Jay & Nisha Mehta', 'ashfield-travel' ),
		'trip'    => __( 'Kerala + Dubai · Feb 2026', 'ashfield-travel' ),
		'initials'=> 'JN',
	],
];
?>

<section class="at-section at-section--cream" id="testimonials">
  <div class="grid-container">

    <header class="at-section-header">
      <h2 class="at-section-title"><?php esc_html_e( 'What Our Travellers Say', 'ashfield-travel' ); ?></h2>
      <p class="at-section-subtitle">
        <?php esc_html_e( 'Real stories from families who trusted us with their holiday.', 'ashfield-travel' ); ?>
      </p>
      <div class="at-section-divider" aria-hidden="true"></div>
    </header>

    <div class="at-testimonial-grid">
      <?php foreach ( $testimonials as $t ) : ?>
        <blockquote class="at-testimonial-card">
          <div class="at-testimonial-quote-mark" aria-hidden="true">&ldquo;</div>
          <div class="at-testimonial-stars" aria-label="<?php esc_attr_e( '5 out of 5 stars', 'ashfield-travel' ); ?>">
            &#9733;&#9733;&#9733;&#9733;&#9733;
          </div>
          <p class="at-testimonial-text"><?php echo esc_html( $t['text'] ); ?></p>
          <footer class="at-testimonial-author">
            <div class="at-testimonial-avatar" aria-hidden="true"><?php echo esc_html( $t['initials'] ); ?></div>
            <div>
              <cite class="at-testimonial-name"><?php echo esc_html( $t['name'] ); ?></cite>
              <div class="at-testimonial-trip"><?php echo esc_html( $t['trip'] ); ?></div>
            </div>
          </footer>
        </blockquote>
      <?php endforeach; ?>
    </div>

  </div>
</section>
