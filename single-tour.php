<?php
/**
 * Single Tour page  →  /tours/tour-slug/
 */

defined( 'ABSPATH' ) || exit;

get_header();

if ( ! have_posts() ) {
	get_footer();
	return;
}

the_post();

/* ── Meta fields ──────────────────────────────────────────────────────────── */
$price         = get_post_meta( get_the_ID(), '_at_price',        true );
$subtitle      = get_post_meta( get_the_ID(), '_at_subtitle',     true );
$ref           = get_post_meta( get_the_ID(), '_at_ref',          true );
$season        = get_post_meta( get_the_ID(), '_at_season',       true );
$dates         = get_post_meta( get_the_ID(), '_at_dates',        true );
$duration      = get_post_meta( get_the_ID(), '_at_duration',     true );
$location      = get_post_meta( get_the_ID(), '_at_location',     true );
$save          = get_post_meta( get_the_ID(), '_at_save_banner',  true );
$group_size    = get_post_meta( get_the_ID(), '_at_group_size',   true );
$meals         = get_post_meta( get_the_ID(), '_at_meals',        true );
$accommodation = get_post_meta( get_the_ID(), '_at_accommodation',true );
$flight_info   = get_post_meta( get_the_ID(), '_at_flight_info',  true );
$atol          = get_post_meta( get_the_ID(), '_at_atol',         true );

/* ── Taxonomies ───────────────────────────────────────────────────────────── */
$dest_terms = get_the_terms( get_the_ID(), 'tour_destination' );
$type_terms = get_the_terms( get_the_ID(), 'tour_type' );

$hero_img = has_post_thumbnail()
    ? get_the_post_thumbnail_url( get_the_ID(), 'full' )
    : 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=1920&q=85';
?>

<div class="at-tour-page">

<!-- TOUR OFFER BAR -->
<div class="at-tour-offer-bar">
  <div class="grid-container">
    <span>SPECIAL OFFER: Save £200 per couple on 2026 Kerala departures — Limited time only!</span>
  </div>
</div>

<!-- ════ TOUR HERO ════ -->
<section class="at-tour-hero">
  <div class="at-tour-hero-bg" style="background-image:url('<?php echo esc_url($hero_img); ?>')"></div>
  <div class="at-tour-hero-overlay" aria-hidden="true"></div>

  <div class="at-tour-hero-content grid-container">
    <div class="at-tour-hero-inner">
      <div class="hero-brand" style="font-weight:300; font-size:14px; letter-spacing:6px; text-transform:uppercase; color:var(--at-gold); margin-bottom:16px;">Ashfield Travel</div>
      <?php if ($ref) : ?><div class="hero-ref" style="font-size:12px; letter-spacing:2px; color:rgba(255,255,255,0.5); margin-bottom:24px;">Package Ref: <?php echo esc_html($ref); ?></div><?php endif; ?>
      
      <h1 class="at-tour-hero-title"><?php the_title(); ?></h1>
      <?php if ($subtitle) : ?><div class="at-tour-hero-subtitle"><?php echo esc_html($subtitle); ?></div><?php endif; ?>
      
      <div class="at-tour-hero-location" style="margin-bottom:20px;">
        <?php if ($duration) : ?><span style="color:var(--at-white); margin-right:15px;"><?php echo esc_html($duration); ?></span><?php endif; ?>
        <?php if ($location) : ?><span style="color:var(--at-gold); margin-right:5px; font-weight:700;">&#8226;</span> <?php echo esc_html($location); ?><?php endif; ?>
      </div>

      <?php if ($season) : ?>
        <div style="font-size:15px; color:rgba(255,255,255,0.7); margin-bottom:20px;">Season: <?php echo esc_html($season); ?></div>
      <?php endif; ?>

      <div class="at-tour-hero-stats">
        <?php if ($price) : ?>
          <div class="at-hero-stat at-hero-stat--price">
            <span class="label">From</span>
            <span class="value"><?php echo esc_html($price); ?></span>
            <span class="label">per person</span>
          </div>
        <?php endif; ?>
        <div class="at-hero-stat">
          <a href="#enquire" class="at-btn at-btn-primary">
            Enquire Now <span class="at-btn-icon">&#10132;</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- STICKY NAV -->
<nav class="sticky-nav">
  <div class="grid-container">
    <ul>
      <li><a href="#overview">Overview</a></li>
      <li><a href="#highlights">Highlights</a></li>
      <li><a href="#itinerary">Itinerary</a></li>
      <li><a href="#accommodation">Hotels</a></li>
      <li><a href="#pricing">Pricing</a></li>
      <li><a href="#includes">Included</a></li>
      <li><a href="#visa">Visa Info</a></li>
      <li><a href="#faqs">FAQs</a></li>
    </ul>
  </div>
</nav>

<div class="at-tour-body" style="padding: 60px 0;">
  <div class="grid-container">
    <div class="at-tour-layout">

      <!-- ── MAIN CONTENT ──────────────────────────────── -->
      <main class="at-tour-main" id="main">

        <section id="overview" style="margin-bottom: 60px;">
          <h2 class="section-title">Why <?php the_title(); ?>?</h2>
          <div class="at-tour-content at-prose" style="font-size: 18px; line-height: 1.8;">
            <?php the_content(); ?>
          </div>
        </section>

        <!-- Highlights Section -->
        <?php 
          $highlights_html = get_post_meta(get_the_ID(), '_at_highlights_html', true);
          if ($highlights_html) :
        ?>
        <section id="highlights" style="margin-bottom: 60px;">
          <h2 class="section-title">Tour Highlights</h2>
          <div class="highlights-grid">
            <?php echo $highlights_html; ?>
          </div>
        </section>
        <?php endif; ?>

        <!-- Itinerary -->
        <section id="itinerary" style="margin-bottom: 60px;">
          <h2 class="section-title">Your Day-by-Day Journey</h2>
          <div class="at-itinerary-container">
            <!-- This will be populated by the user in the editor using the .at-itinerary classes -->
            <?php 
              $itinerary_raw = get_post_meta(get_the_ID(), '_at_itinerary_html', true);
              if ($itinerary_raw) {
                echo $itinerary_raw;
              }
            ?>
          </div>
        </section>

        <?php if ($accommodation) : ?>
        <section id="accommodation" style="margin-bottom: 60px;">
          <h2 class="section-title">Your Handpicked Hotels</h2>
          <p style="text-align: center; margin-bottom: 2rem; color: #6B7280; font-size: 0.95rem;">All hotels listed are carefully selected properties offering comfort, authenticity, and excellent service.</p>
          <?php 
            $accom_html = get_post_meta(get_the_ID(), '_at_accommodation_html', true);
            if ($accom_html) {
              echo $accom_html;
            } else {
              echo '<p>' . esc_html($accommodation) . '</p>';
            }
          ?>
        </section>
        <?php endif; ?>

        <section id="pricing" style="margin-bottom: 60px;">
          <h2 class="section-title">Package Pricing</h2>
          <div class="at-pricing-grid">
            <div class="at-pricing-card">
              <h3>Premium Package</h3>
              <div class="tier-desc">4-Star Hotels & Resorts</div>
              <div class="price"><?php echo esc_html($price); ?></div>
              <div class="per">per person</div>
              <a href="#enquire" class="at-btn at-btn-outline" style="width:100%">
                Select Premium <span class="at-btn-icon">&#10132;</span>
              </a>
            </div>
            <div class="at-pricing-card at-pricing-card--popular">
              <h3>Luxury Package</h3>
              <div class="tier-desc">5-Star Hotels & Resorts</div>
              <div class="price"><?php 
                $price_lux = get_post_meta(get_the_ID(), '_at_price_luxury', true);
                echo $price_lux ? esc_html($price_lux) : 'Contact Us';
              ?></div>
              <div class="per">per person</div>
              <a href="#enquire" class="at-btn at-btn-primary" style="width:100%">
                Select Luxury <span class="at-btn-icon">&#10132;</span>
              </a>
            </div>
          </div>
        </section>

        <section id="includes" style="margin-bottom: 60px;">
          <h2 class="section-title">What's Included in Your Journey</h2>
          <div class="at-tour-included">
            <div class="at-included-grid">
              <?php
              $included_items = [
                  $flight_info   ? [ '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block; vertical-align:middle; margin-right:8px;"><path d="M22 2L11 13"></path><path d="M22 2l-7 20-4-9-9-4 20-7z"></path></svg>', $flight_info ] : null,
                  [ '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block; vertical-align:middle; margin-right:8px;"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>', 'Hand-picked hotel accommodation' ],
                  $meals         ? [ '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block; vertical-align:middle; margin-right:8px;"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg>', $meals ] : [ '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block; vertical-align:middle; margin-right:8px;"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg>', 'Breakfast daily' ],
                  [ '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block; vertical-align:middle; margin-right:8px;"><rect x="1" y="3" width="22" height="13" rx="2" ry="2"></rect><path d="M7 21l0-5"></path><path d="M17 21l0-5"></path><circle cx="6" cy="21" r="2"></circle><circle cx="18" cy="21" r="2"></circle></svg>', 'All transfers & private transport' ],
                  [ '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block; vertical-align:middle; margin-right:8px;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>', 'Expert local English-speaking guides' ],
                  $atol          ? [ '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block; vertical-align:middle; margin-right:8px;"><polyline points="20 6 9 17 4 12"></polyline></svg>', 'ATOL & TTA financial protection' ] : null,
              ];
              foreach ( array_filter( $included_items ) as $item ) : ?>
                <div class="at-included-item">
                  <span class="icon" aria-hidden="true"><?php echo $item[0]; ?></span>
                  <span><?php echo esc_html( $item[1] ); ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          
          <div class="not-included">
            <h3>Not Included in Your Package</h3>
            <ul>
              <li>International flights and airfare</li>
              <li>Indian Visa fees</li>
              <li>Travel insurance (highly recommended)</li>
              <li>Personal expenses and tips</li>
            </ul>
          </div>
        </section>

        <!-- Visa Info Section -->
        <?php 
          $visa_html = get_post_meta(get_the_ID(), '_at_visa_html', true);
          if ($visa_html) :
        ?>
        <section id="visa" style="margin-bottom: 60px; background-color: #F9F6F1; padding: 3rem 2rem;">
          <h2 class="section-title">Indian Visa Information</h2>
          <div class="visa-boxes">
            <?php echo $visa_html; ?>
          </div>
        </section>
        <?php endif; ?>

        <!-- FAQs Section -->
        <?php 
          $faqs_html = get_post_meta(get_the_ID(), '_at_faqs_html', true);
          if ($faqs_html) :
        ?>
        <section id="faqs" style="margin-bottom: 60px; background-color: #F9F6F1; padding: 3rem 2rem;">
          <h2 class="section-title">Frequently Asked Questions</h2>
          <div class="faqs-container">
            <?php echo $faqs_html; ?>
          </div>
        </section>
        <?php endif; ?>

        <!-- Testimonial Section -->
        <?php 
          $testimonial_text = get_post_meta(get_the_ID(), '_at_testimonial_text', true);
          if ($testimonial_text) :
        ?>
        <section class="testimonial-section" style="margin-bottom: 60px;">
          <div class="testimonial">
            <p class="testimonial-text">"<?php echo esc_html($testimonial_text); ?>"</p>
            <p class="testimonial-attr">— <?php echo esc_html(get_post_meta(get_the_ID(), '_at_testimonial_author', true) ?: 'Ashfield Travel Guest'); ?></p>
          </div>
        </section>
        <?php endif; ?>

        <!-- TTA Protection Section -->
        <section style="margin-bottom: 60px;">
          <div class="tta-section">
            <h3 class="tta-title">Your Peace of Mind: Travel Trust Association Protection</h3>
            <p style="color: #6B7280; margin-bottom: 1.5rem;">Ashfield Travel is a proud member of the Travel Trust Association, providing you with absolute peace of mind.</p>
            <div class="tta-benefits">
              <div class="tta-benefit"><strong>100% Financial Protection</strong><span>Your money is fully protected.</span></div>
              <div class="tta-benefit"><strong>Trust Account Supervision</strong><span>Funds held in a dedicated Trust Account.</span></div>
              <div class="tta-benefit"><strong>Price Promise</strong><span>Transparent pricing with no hidden charges.</span></div>
            </div>
          </div>
        </section>

      </main>

      <!-- ── BOOKING SIDEBAR ───────────────────────────── -->
      <aside class="at-tour-sidebar">
        <div class="at-sidebar-enquire">
          <h4>Make an Enquiry</h4>
          
          <div class="at-enquire-method">
            <div class="at-enquire-icon">
              <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            </div>
            <div class="at-enquire-details">
              <div class="at-enquire-label">Call Our Experts</div>
              <div class="at-enquire-value"><a href="tel:+447587671758">07587 671758</a></div>
            </div>
          </div>

          <div class="at-enquire-method">
            <div class="at-enquire-icon">
              <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            </div>
            <div class="at-enquire-details">
              <div class="at-enquire-label">Email Us</div>
              <div class="at-enquire-value"><a href="mailto:info@ashfieldtravel.co.uk">info@ashfieldtravel.co.uk</a></div>
            </div>
          </div>

          <div style="margin-top: 25px;">
            <a href="#enquire" class="at-btn at-btn-primary" style="width: 100%;">
              Inquire Now <span class="at-btn-icon">&#10132;</span>
            </a>
          </div>

          <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--at-border); text-align: center;">
             <div style="display:inline-block; padding: 4px 12px; border: 1px solid var(--at-forest-green); color: var(--at-forest-green); border-radius: 4px; font-weight: 700; font-size: 14px; margin-bottom: 5px;">ATOL &bull; TTA PROTECTED</div>
             <p style="font-size: 11px; color: var(--at-text-light); margin-top: 5px;">100% Financial Protection</p>
          </div>
        </div>
      </aside>

    </div>
  </div>
</div>

<section id="enquire" class="at-section at-section--navy" style="text-align: center; padding: 100px 0;">
  <div class="grid-container">
    <h2 class="at-section-title" style="color: var(--at-white); margin-bottom: 20px;">Book Your Kerala Escape</h2>
    <p style="color: rgba(255,255,255,0.7); font-size: 20px; max-width: 700px; margin: 0 auto 40px;">Contact our expert team to customize this itinerary or secure your dates.</p>
    <a href="mailto:info@ashfieldtravel.co.uk" class="at-btn-primary" style="padding: 20px 60px; font-size: 18px;">Send Enquiry</a>
  </div>
</section>

<?php get_footer(); ?>
</div> <!-- .at-tour-page -->
