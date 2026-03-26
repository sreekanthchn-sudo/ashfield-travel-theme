<?php
/**
 * Custom Home Footer
 * Bypasses GeneratePress defaults to allow a fully bespoke footer,
 * while still firing wp_footer() for plugin compatibility.
 */
?>
<footer class="at-footer">
  <div class="grid-container">
    <div class="at-footer-grid">
      <div class="at-footer-brand">
        <div class="brand-name">Ashfield Travel</div>
        <p class="brand-desc">Curated holidays designed for British-Indian families. Based in the UK, with expert ground teams across India and Dubai.</p>
        <div class="at-footer-social">
          <a href="#" title="Facebook">f</a>
          <a href="#" title="Instagram">&#9679;</a>
          <a href="#" title="WhatsApp">W</a>
          <a href="#" title="YouTube">&#9654;</a>
        </div>
      </div>
      <div class="at-footer-col">
        <h4>Destinations</h4>
        <a href="#">Kerala</a>
        <a href="#">Golden Triangle</a>
        <a href="#">Kashmir</a>
        <a href="#">Rajasthan</a>
        <a href="#">Dubai</a>
        <a href="#">Goa</a>
      </div>
      <div class="at-footer-col">
        <h4>Tour Types</h4>
        <a href="#">Group Tours</a>
        <a href="#">Private Tours</a>
        <a href="#">Tailor-Made</a>
        <a href="#">Family Packages</a>
        <a href="#">Honeymoons</a>
      </div>
      <div class="at-footer-col">
        <h4>Company</h4>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
        <a href="#">Brochures</a>
        <a href="#">Blog</a>
        <a href="#">Terms &amp; Conditions</a>
        <a href="#">Privacy Policy</a>
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
