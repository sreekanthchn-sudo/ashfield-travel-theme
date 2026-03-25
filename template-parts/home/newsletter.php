<?php
/**
 * Template part: Newsletter / Brochure CTA
 * Navy gradient section with email input and brochure send button.
 * Hook up to WPForms Lite or MailPoet for live form handling.
 *
 * @package Ashfield_Travel
 */
?>

<section class="at-newsletter" id="brochure">
  <div class="grid-container">

    <div class="at-newsletter-content">
      <h2 class="at-newsletter-title"><?php esc_html_e( 'Get Our Free Brochure', 'ashfield-travel' ); ?></h2>
      <p class="at-newsletter-text">
        <?php esc_html_e( 'Receive our latest brochure packed with tour details, pricing, and exclusive early-bird offers delivered to your inbox.', 'ashfield-travel' ); ?>
      </p>
    </div>

    <?php
    /*
     * WPForms shortcode takes precedence if the plugin is active.
     * Replace [wpforms id="YOUR_FORM_ID"] with your actual form ID after creating
     * a brochure request form in WPForms.
     */
    if ( function_exists( 'wpforms' ) ) :
      echo do_shortcode( '[wpforms id="100"]' );
    else : ?>
      <form class="at-newsletter-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
        <?php wp_nonce_field( 'at_brochure_request', 'at_brochure_nonce' ); ?>
        <input type="hidden" name="action" value="at_brochure_request">
        <label for="at-brochure-email" class="screen-reader-text">
          <?php esc_html_e( 'Your email address', 'ashfield-travel' ); ?>
        </label>
        <input type="email"
               id="at-brochure-email"
               name="at_email"
               class="at-newsletter-input"
               placeholder="<?php esc_attr_e( 'Enter your email address', 'ashfield-travel' ); ?>"
               required
               autocomplete="email">
        <button type="submit" class="at-btn-brochure">
          <?php esc_html_e( 'Send Brochure', 'ashfield-travel' ); ?>
        </button>
      </form>
    <?php endif; ?>

  </div>
</section>
