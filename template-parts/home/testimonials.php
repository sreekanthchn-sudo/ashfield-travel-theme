<?php
/**
 * Template part: Testimonials section
 * Minimalist, high-impact social proof.
 *
 * @package Ashfield_Travel
 */

$testimonials = [
	[
		'quote'  => __( 'Amazing service, smooth trip planning. Highly recommended for family holidays!', 'ashfield-travel' ),
		'author' => 'S. Patel, London',
	],
	[
		'quote'  => __( 'The best travel experience from the UK to Kerala. Every detail was perfectly handled.', 'ashfield-travel' ),
		'author' => 'R. Sharma, Birmingham',
	],
];
?>

<section class="at-section at-testimonials" id="testimonials">
  <div class="grid-container">
    <div class="at-testimonials-slider">
      <?php foreach ( $testimonials as $index => $item ) : ?>
        <div class="at-testimonial-card <?php echo $index === 0 ? 'active' : ''; ?>">
          <div class="at-quote-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" width="48" height="48" fill="var(--at-gold)" opacity="0.2"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C20.1216 16 21.017 16.8954 21.017 18V21C21.017 22.1046 20.1216 23 19.017 23H16.017C14.9124 23 14.017 22.1046 14.017 21ZM14.017 13V10C14.017 8.89543 14.9124 8 16.017 8H19.017C20.1216 8 21.017 8.89543 21.017 10V13C21.017 14.1046 20.1216 15 19.017 15H16.017C14.9124 15 14.017 14.1046 14.017 13ZM2.017 21L2.017 18C2.017 16.8954 2.91243 16 4.017 16H7.017C8.12157 16 9.017 16.8954 9.017 18V21C9.017 22.1046 8.12157 23 7.017 23H4.017C2.91243 23 2.017 22.1046 2.017 21ZM2.017 13V10C2.017 8.89543 2.91243 8 4.017 8H7.017C8.12157 8 9.017 8.89543 9.017 10V13C9.017 14.1046 8.12157 15 7.017 15H4.017C2.91243 15 2.017 14.1046 2.017 13Z"/></svg>
          </div>
          <blockquote class="at-testimonial-quote">
            <p>"<?php echo esc_html( $item['quote'] ); ?>"</p>
          </blockquote>
          <cite class="at-testimonial-author">— <?php echo esc_html( $item['author'] ); ?></cite>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<style>
.at-testimonials {
  background: var(--at-cream);
  text-align: center;
}
.at-testimonials-slider {
  max-width: 800px;
  margin: 0 auto;
}
.at-testimonial-quote {
  font-family: var(--at-font-heading);
  font-size: 32px;
  font-weight: 700;
  color: var(--at-navy);
  line-height: 1.3;
  margin-bottom: 24px;
}
.at-testimonial-author {
  font-family: var(--at-font-body);
  font-size: 16px;
  font-weight: 600;
  color: var(--at-gold);
  text-transform: uppercase;
  letter-spacing: 1px;
  font-style: normal;
}
.at-quote-icon {
  margin-bottom: 20px;
  display: flex;
  justify-content: center;
}
@media (max-width: 768px) {
  .at-testimonial-quote { font-size: 24px; }
}
</style>
