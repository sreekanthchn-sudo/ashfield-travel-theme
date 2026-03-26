<?php
/**
 * Global Site Footer (all non-homepage pages)
 * Applies the bespoke Ashfield Travel footer to all page types.
 *
 * @package Ashfield_Travel
 */
?>
<footer class="at-footer">
  <div class="grid-container">
    <div class="at-footer-grid">
      <div class="at-footer-brand">
        <div class="brand-name">Ashfield Travel</div>
        <p class="brand-desc">Curated holidays designed for British-Indian families. Based in the UK, with expert ground teams across India and Dubai.</p>
        <div class="at-footer-social">
          <a href="https://www.facebook.com/ashfieldtravel" target="_blank" rel="noopener noreferrer" title="Facebook" aria-label="Facebook">f</a>
          <a href="https://www.instagram.com/ashfieldtravel" target="_blank" rel="noopener noreferrer" title="Instagram" aria-label="Instagram">&#9679;</a>
          <a href="https://wa.me/447587671758" target="_blank" rel="noopener noreferrer" title="WhatsApp" aria-label="WhatsApp">W</a>
          <a href="https://www.youtube.com/@ashfieldtravel" target="_blank" rel="noopener noreferrer" title="YouTube" aria-label="YouTube">&#9654;</a>
        </div>
      </div>
      <div class="at-footer-col">
        <h4>Destinations</h4>
        <a href="<?php echo esc_url( home_url('/destinations/kerala/') ); ?>">Kerala</a>
        <a href="<?php echo esc_url( home_url('/destinations/golden-triangle/') ); ?>">Golden Triangle</a>
        <a href="<?php echo esc_url( home_url('/destinations/kashmir/') ); ?>">Kashmir</a>
        <a href="<?php echo esc_url( home_url('/destinations/rajasthan/') ); ?>">Rajasthan</a>
        <a href="<?php echo esc_url( home_url('/destinations/dubai/') ); ?>">Dubai</a>
        <a href="<?php echo esc_url( home_url('/destinations/goa/') ); ?>">Goa</a>
      </div>
      <div class="at-footer-col">
        <h4>Tour Types</h4>
        <a href="<?php echo esc_url( home_url('/tours/group-tours/') ); ?>">Group Tours</a>
        <a href="<?php echo esc_url( home_url('/tours/private-tours/') ); ?>">Private Tours</a>
        <a href="<?php echo esc_url( home_url('/tours/tailor-made/') ); ?>">Tailor-Made</a>
        <a href="<?php echo esc_url( home_url('/tours/family-packages/') ); ?>">Family Packages</a>
        <a href="<?php echo esc_url( home_url('/tours/honeymoon-escapes/') ); ?>">Honeymoons</a>
      </div>
      <div class="at-footer-col">
        <h4>Company</h4>
        <a href="<?php echo esc_url( home_url('/about-us/') ); ?>">About Us</a>
        <a href="<?php echo esc_url( home_url('/contact-us/') ); ?>">Contact Us</a>
        <a href="<?php echo esc_url( home_url('/brochures/') ); ?>">Brochures</a>
        <a href="<?php echo esc_url( home_url('/blog/') ); ?>">Blog</a>
        <a href="<?php echo esc_url( home_url('/terms-and-conditions/') ); ?>">Terms &amp; Conditions</a>
        <a href="<?php echo esc_url( home_url('/privacy-policy/') ); ?>">Privacy Policy</a>
      </div>
    </div>
    <div class="at-footer-bottom">
      <span>&copy; <?php echo date('Y'); ?> Ashfield Travel Ltd. All rights reserved.</span>
      <div class="at-footer-badges">
        <span class="at-footer-badge">ATOL Protected</span>
        <span class="at-footer-badge">TTA Member</span>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
