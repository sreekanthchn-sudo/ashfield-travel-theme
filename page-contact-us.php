<?php
/**
 * Template Name: Contact Us
 * Custom Contact Us page for Ashfield Travel
 */
get_header();
?>

<main id="primary" class="site-main">

  <!-- Hero -->
  <section style="background: linear-gradient(135deg, #1B3A5C 0%, #2a5280 100%); padding: 80px 0 60px; text-align: center;">
    <div class="grid-container">
      <h1 style="font-family: var(--at-font-heading); font-size: 48px; color: #fff; margin: 0 0 14px;">Contact Us</h1>
      <p style="font-size: 19px; color: rgba(255,255,255,0.85);">We'd love to help you plan your perfect holiday. Get in touch today.</p>
    </div>
  </section>

  <!-- Contact Content -->
  <section style="padding: 80px 0; background: #f7f8f9;">
    <div class="grid-container">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: start;">

        <!-- Contact Info -->
        <div>
          <h2 style="font-family: var(--at-font-heading); font-size: 32px; color: var(--at-navy); margin-bottom: 30px;">Get In Touch</h2>

          <div style="display: flex; flex-direction: column; gap: 28px;">

            <div style="display: flex; gap: 16px; align-items: flex-start;">
              <span style="font-size: 28px;">📞</span>
              <div>
                <h3 style="font-family: var(--at-font-heading); font-size: 18px; color: var(--at-navy); margin-bottom: 4px;">Phone</h3>
                <a href="tel:+447587671758" style="font-size: 22px; font-weight: 700; color: var(--at-terracotta); text-decoration: none;">+44 7587 671758</a>
                <p style="color: #777; margin-top: 4px;">Mon–Fri, 9am–6pm</p>
              </div>
            </div>

            <div style="display: flex; gap: 16px; align-items: flex-start;">
              <span style="font-size: 28px;">💬</span>
              <div>
                <h3 style="font-family: var(--at-font-heading); font-size: 18px; color: var(--at-navy); margin-bottom: 4px;">WhatsApp</h3>
                <a href="https://wa.me/447587671758" target="_blank" rel="noopener" style="font-size: 18px; color: var(--at-terracotta); text-decoration: none; font-weight: 600;">Message us on WhatsApp →</a>
                <p style="color: #777; margin-top: 4px;">Quickest way to reach us</p>
              </div>
            </div>

            <div style="display: flex; gap: 16px; align-items: flex-start;">
              <span style="font-size: 28px;">✉️</span>
              <div>
                <h3 style="font-family: var(--at-font-heading); font-size: 18px; color: var(--at-navy); margin-bottom: 4px;">Email</h3>
                <a href="mailto:info@ashfieldtravel.co.uk" style="font-size: 18px; color: var(--at-terracotta); text-decoration: none; font-weight: 600;">info@ashfieldtravel.co.uk</a>
              </div>
            </div>

            <div style="display: flex; gap: 16px; align-items: flex-start;">
              <span style="font-size: 28px;">📍</span>
              <div>
                <h3 style="font-family: var(--at-font-heading); font-size: 18px; color: var(--at-navy); margin-bottom: 4px;">Based In</h3>
                <p style="color: #555; font-size: 16px; line-height: 1.6;">United Kingdom<br>Serving the British-Indian community nationwide</p>
              </div>
            </div>

          </div>

          <div style="margin-top: 40px; padding: 28px; background: #E8F0E8; border-radius: 12px; border-left: 4px solid #4a7c4a;">
            <p style="color: #2d5a2d; font-size: 15px; line-height: 1.6; margin: 0;">💚 <strong>Free no-obligation consultation:</strong> Not sure where to go? Call us and we'll help you choose the perfect destination and package for your family.</p>
          </div>
        </div>

        <!-- Enquiry Form -->
        <div style="background: #fff; border-radius: 20px; padding: 40px; box-shadow: 0 8px 40px rgba(0,0,0,0.08);">
          <h2 style="font-family: var(--at-font-heading); font-size: 28px; color: var(--at-navy); margin-bottom: 8px;">Send Us An Enquiry</h2>
          <p style="color: #777; margin-bottom: 28px;">We'll respond within one business day.</p>

          <?php
          // Check if Contact Form 7 is active and use it
          if (function_exists('wpcf7_enqueue_scripts')) {
            echo do_shortcode('[contact-form-7 id="contact-form" title="Contact form 1"]');
          } else {
            // Fallback: HTML form that uses WordPress's mail function
            if (isset($_POST['at_contact_submit'])) {
              $name    = sanitize_text_field($_POST['at_name'] ?? '');
              $email   = sanitize_email($_POST['at_email'] ?? '');
              $phone   = sanitize_text_field($_POST['at_phone'] ?? '');
              $dest    = sanitize_text_field($_POST['at_destination'] ?? '');
              $message = sanitize_textarea_field($_POST['at_message'] ?? '');
              $to      = 'info@ashfieldtravel.co.uk';
              $subject = "New Enquiry from $name — Ashfield Travel";
              $body    = "Name: $name\nEmail: $email\nPhone: $phone\nDestination: $dest\n\nMessage:\n$message";
              $headers = ["Reply-To: $email", "From: Ashfield Travel Website <noreply@ashfieldtravel.co.uk>"];
              wp_mail($to, $subject, $body, $headers);
              echo '<div style="background:#e8f5e9;padding:20px;border-radius:10px;color:#2e7d32;font-weight:600;margin-bottom:20px;">✅ Thank you! We\'ll be in touch shortly.</div>';
            }
            ?>
            <form method="post" style="display: flex; flex-direction: column; gap: 18px;">
              <?php wp_nonce_field('at_contact_nonce', 'at_nonce'); ?>
              <div>
                <label style="display:block;font-weight:600;color:#333;margin-bottom:6px;">Full Name *</label>
                <input type="text" name="at_name" required style="width:100%;padding:12px 16px;border:2px solid #e0e0e0;border-radius:10px;font-size:16px;outline:none;box-sizing:border-box;" placeholder="Your name">
              </div>
              <div>
                <label style="display:block;font-weight:600;color:#333;margin-bottom:6px;">Email *</label>
                <input type="email" name="at_email" required style="width:100%;padding:12px 16px;border:2px solid #e0e0e0;border-radius:10px;font-size:16px;outline:none;box-sizing:border-box;" placeholder="your@email.com">
              </div>
              <div>
                <label style="display:block;font-weight:600;color:#333;margin-bottom:6px;">Phone</label>
                <input type="tel" name="at_phone" style="width:100%;padding:12px 16px;border:2px solid #e0e0e0;border-radius:10px;font-size:16px;outline:none;box-sizing:border-box;" placeholder="+44...">
              </div>
              <div>
                <label style="display:block;font-weight:600;color:#333;margin-bottom:6px;">Destination of Interest</label>
                <select name="at_destination" style="width:100%;padding:12px 16px;border:2px solid #e0e0e0;border-radius:10px;font-size:16px;background:#fff;box-sizing:border-box;">
                  <option value="">-- Choose a destination --</option>
                  <option>Kerala</option>
                  <option>Rajasthan</option>
                  <option>Kashmir</option>
                  <option>Golden Triangle</option>
                  <option>Goa</option>
                  <option>Sikkim</option>
                  <option>Dubai</option>
                  <option>Not sure yet</option>
                </select>
              </div>
              <div>
                <label style="display:block;font-weight:600;color:#333;margin-bottom:6px;">Message *</label>
                <textarea name="at_message" required rows="4" style="width:100%;padding:12px 16px;border:2px solid #e0e0e0;border-radius:10px;font-size:16px;resize:vertical;box-sizing:border-box;" placeholder="Tell us about your travel plans, dates, group size..."></textarea>
              </div>
              <button type="submit" name="at_contact_submit" class="at-btn at-btn-primary" style="font-size:17px;padding:14px 24px;border:none;cursor:pointer;width:100%;">
                Send Enquiry →
              </button>
            </form>
            <?php
          }
          ?>
        </div>

      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
