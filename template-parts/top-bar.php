<?php
/**
 * Template part: Top bar — phone, email, trust badges
 * Include via: get_template_part( 'template-parts/top-bar' )
 * Hook into GP: add_action( 'generate_before_header', ... )
 *
 * @package Ashfield_Travel
 */
?>
<div class="at-top-bar" role="banner" aria-label="<?php esc_attr_e( 'Contact information', 'ashfield-travel' ); ?>">
  <div class="grid-container">

    <div class="at-top-bar-left">
      <span>
        <span aria-hidden="true">&#9742;</span>
        <a href="tel:+448001234567">0800 123 4567</a>
        &nbsp;|&nbsp;
        <?php esc_html_e( 'Mon–Fri 9am–6pm, Sat 10am–4pm', 'ashfield-travel' ); ?>
      </span>
    </div>

    <div class="at-top-bar-right">
      <span>
        <span aria-hidden="true">&#9993;</span>
        <a href="mailto:info@ashfieldtravel.co.uk">info@ashfieldtravel.co.uk</a>
      </span>
      <span class="separator" aria-hidden="true"></span>
      <span><?php esc_html_e( 'TTA Member · ATOL Protected', 'ashfield-travel' ); ?></span>
    </div>

  </div>
</div>
