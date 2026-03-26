<?php
/**
 * Template part: Final Conversion Boost section
 * High-impact CTA before the footer.
 *
 * @package Ashfield_Travel
 */
?>

<section class="at-section at-conversion-boost">
  <div class="grid-container">
    <div class="at-cb-content">
      <h2 class="at-cb-title"><?php esc_html_e( 'Ready to Plan Your Next Trip?', 'ashfield-travel' ); ?></h2>
      <p class="at-cb-sub">
        <?php esc_html_e( 'Get a personalised travel plan within 24 hours. Our experts are ready to help you create lasting memories.', 'ashfield-travel' ); ?>
      </p>
      <div class="at-cb-buttons">
        <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="at-btn at-btn-primary">
          <?php esc_html_e( 'Get Free Quote', 'ashfield-travel' ); ?>
          <span class="at-btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span>
        </a>
        <a href="tel:+447587671758" class="at-btn at-btn-outline" style="border-color: var(--at-white); color: var(--at-white);">
          <?php esc_html_e( 'Call Now', 'ashfield-travel' ); ?>
        </a>
      </div>
    </div>
  </div>
</section>

<style>
.at-conversion-boost {
  background: linear-gradient(rgba(27,45,79,0.9), rgba(27,45,79,0.95)), url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=1600&q=80') center/cover no-repeat;
  color: var(--at-white);
  text-align: center;
  padding: 120px 0;
}
.at-cb-content {
  max-width: 800px;
  margin: 0 auto;
}
.at-cb-title {
  color: var(--at-white) !important;
  font-size: 48px;
  margin-bottom: 24px;
}
.at-cb-sub {
  font-size: 20px;
  color: rgba(255,255,255,0.9);
  margin-bottom: 40px;
}
.at-cb-buttons {
  display: flex;
  gap: 20px;
  justify-content: center;
  flex-wrap: wrap;
}
@media (max-width: 768px) {
  .at-cb-title { font-size: 32px; }
  .at-cb-sub { font-size: 16px; }
  .at-conversion-boost { padding: 80px 0; }
}
</style>
