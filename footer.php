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
          <a href="https://www.facebook.com/ashfieldtravel" target="_blank" rel="noopener noreferrer" title="Facebook" aria-label="Facebook"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a>
          <a href="https://www.instagram.com/ashfieldtravel" target="_blank" rel="noopener noreferrer" title="Instagram" aria-label="Instagram"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg></a>
          <a href="https://wa.me/447587671758" target="_blank" rel="noopener noreferrer" title="WhatsApp" aria-label="WhatsApp"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg></a>
          <a href="https://www.youtube.com/@ashfieldtravel" target="_blank" rel="noopener noreferrer" title="YouTube" aria-label="YouTube"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg></a>
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
