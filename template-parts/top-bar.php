<?php
/**
 * Template part: Top bar — phone, email, trust badges
 *
 * @package Ashfield_Travel
 */
?>
<div class="at-top-bar" role="banner" aria-label="<?php esc_attr_e( 'Contact information', 'ashfield-travel' ); ?>">
  <div class="grid-container">

    <div class="at-top-bar-left">
      <span>
        <a href="tel:+447587671758">+44 7587 671758</a>
        &nbsp;|&nbsp;
        <?php esc_html_e( 'Mon–Fri 9am–6pm, Sat 10am–4pm', 'ashfield-travel' ); ?>
      </span>
    </div>

    <div class="at-top-bar-right">
      <span>
        <a href="mailto:info@ashfieldtravel.co.uk">info@ashfieldtravel.co.uk</a>
      </span>
      <span class="separator" aria-hidden="true"></span>
      <span><?php esc_html_e( 'TTA Member · ATOL Protected', 'ashfield-travel' ); ?></span>
    </div>

  </div>
</div>
