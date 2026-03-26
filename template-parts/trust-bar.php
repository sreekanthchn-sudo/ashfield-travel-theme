<?php
/**
 * Template part: Trust bar — ratings, ATOL, TTA, UK experts
 *
 * @package Ashfield_Travel
 */
?>
<div class="at-trust-bar">
  <div class="grid-container">

    <div class="at-trust-item">
      <span class="at-trust-stars" aria-label="<?php esc_attr_e( '5 stars', 'ashfield-travel' ); ?>" style="color: #FFB800;">
        <?php for ($i=0; $i<5; $i++): ?>
          <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" style="display:inline-block; vertical-align:middle; margin-right:2px;"><path d="M12 1.7L14.5 9H22L15.9 13.4L18.4 20.7L12 16.3L5.6 20.7L8.1 13.4L2 9H9.5L12 1.7Z"/></svg>
        <?php endfor; ?>
      </span>
      <span><?php esc_html_e( '4.9/5 Customer Rating', 'ashfield-travel' ); ?></span>
    </div>

    <div class="at-trust-item">
      <span><?php esc_html_e( 'ATOL Protected', 'ashfield-travel' ); ?></span>
    </div>

    <div class="at-trust-item">
      <span><?php esc_html_e( 'TTA Member', 'ashfield-travel' ); ?></span>
    </div>

    <div class="at-trust-item">
      <span><?php esc_html_e( 'UK-Based Experts', 'ashfield-travel' ); ?></span>
    </div>

    <div class="at-trust-item">
      <span><?php esc_html_e( 'Translator Support Available', 'ashfield-travel' ); ?></span>
    </div>

  </div>
</div>
