<?php
/**
 * Ashfield Travel — Front Page Template (self-contained)
 * All sections inline — no missing template-part dependencies.
 *
 * @package Ashfield_Travel
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>

<!-- ═══════ HERO ═══════ -->
<section class="at-hero">
  <div class="at-hero-bg" style="background-image:url('https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=1920&q=85');"></div>
  <div class="at-hero-overlay"></div>
  <div class="at-hero-content grid-container">
    <div class="at-hero-badge">&#10038; <?php esc_html_e( 'Curated for British-Indian Families', 'ashfield-travel' ); ?></div>
    <h1 class="at-hero-tagline"><?php esc_html_e( 'Journeys That Feel', 'ashfield-travel' ); ?><br><?php esc_html_e( 'Like Coming Home', 'ashfield-travel' ); ?></h1>
    <p class="at-hero-sub"><?php esc_html_e( 'Expertly crafted holidays to India, Dubai and beyond. Small groups, private tours, and tailor-made itineraries designed around your family.', 'ashfield-travel' ); ?></p>
    <div class="at-hero-buttons">
      <a href="<?php echo esc_url( home_url( '/tours/' ) ); ?>" class="at-btn-primary at-btn-hero"><?php esc_html_e( 'Explore Our Tours', 'ashfield-travel' ); ?> <span>&#10132;</span></a>
      <a href="<?php echo esc_url( home_url( '/brochure/' ) ); ?>" class="at-btn-secondary"><?php esc_html_e( 'Request a Brochure', 'ashfield-travel' ); ?></a>
    </div>
  </div>
</section>

<!-- ═══════ FILTER BAR ═══════ -->
<div class="at-filter-bar">
  <div class="grid-container">
    <span class="at-filter-label"><?php esc_html_e( 'Navigate to:', 'ashfield-travel' ); ?></span>
    <span class="at-filter-pill active"><?php esc_html_e( 'All Tours', 'ashfield-travel' ); ?></span>
    <span class="at-filter-pill"><?php esc_html_e( 'India Tours', 'ashfield-travel' ); ?></span>
    <span class="at-filter-pill"><?php esc_html_e( 'Dubai', 'ashfield-travel' ); ?></span>
    <span class="at-filter-pill"><?php esc_html_e( 'Group Tours', 'ashfield-travel' ); ?></span>
    <span class="at-filter-pill"><?php esc_html_e( 'Private Tours', 'ashfield-travel' ); ?></span>
    <span class="at-filter-pill"><?php esc_html_e( 'Family Packages', 'ashfield-travel' ); ?></span>
    <span class="at-filter-pill"><?php esc_html_e( 'Destination Guides', 'ashfield-travel' ); ?></span>
    <span class="at-filter-pill"><?php esc_html_e( 'Brochures', 'ashfield-travel' ); ?></span>
  </div>
</div>

<!-- ═══════ DESTINATIONS ═══════ -->
<section class="at-section">
  <div class="grid-container">
    <div class="at-section-header">
      <h2 class="at-section-title"><?php esc_html_e( 'Explore Our Destinations', 'ashfield-travel' ); ?></h2>
      <p class="at-section-subtitle"><?php esc_html_e( 'From the backwaters of Kerala to the glittering skyline of Dubai, discover handpicked destinations perfect for your family.', 'ashfield-travel' ); ?></p>
      <div class="at-section-divider"></div>
    </div>
    <div class="at-dest-grid">
      <div class="at-dest-card">
        <img src="https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=600&q=80" alt="Kerala">
        <div class="at-dest-card-overlay">
          <div class="at-dest-card-name">Kerala</div>
          <div class="at-dest-card-tours">6 tours from &pound;1,295pp</div>
        </div>
      </div>
      <div class="at-dest-card">
        <img src="https://images.unsplash.com/photo-1564507592333-c60657eea523?w=600&q=80" alt="Golden Triangle">
        <div class="at-dest-card-overlay">
          <div class="at-dest-card-name">Golden Triangle</div>
          <div class="at-dest-card-tours">4 tours from &pound;895pp</div>
        </div>
      </div>
      <div class="at-dest-card">
        <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=600&q=80" alt="Dubai">
        <div class="at-dest-card-overlay">
          <div class="at-dest-card-name">Dubai</div>
          <div class="at-dest-card-tours">3 tours from &pound;1,095pp</div>
        </div>
      </div>
      <div class="at-dest-card">
        <img src="https://images.unsplash.com/photo-1597074866923-dc0589150a37?w=600&q=80" alt="Kashmir">
        <div class="at-dest-card-overlay">
          <div class="at-dest-card-name">Kashmir</div>
          <div class="at-dest-card-tours">2 tours from &pound;1,495pp</div>
        </div>
      </div>
      <div class="at-dest-card">
        <img src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=600&q=80" alt="Rajasthan">
        <div class="at-dest-card-overlay">
          <div class="at-dest-card-name">Rajasthan</div>
          <div class="at-dest-card-tours">3 tours from &pound;1,195pp</div>
        </div>
      </div>
      <div class="at-dest-card">
        <img src="https://images.unsplash.com/photo-1589308078059-be1415eab4c3?w=600&q=80" alt="Turkey">
        <div class="at-dest-card-overlay">
          <div class="at-dest-card-name">Turkey</div>
          <div class="at-dest-card-tours">Register your interest</div>
        </div>
        <div class="at-coming-badge">Coming Soon</div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════ FEATURED TOURS ═══════ -->
<section class="at-section cream-bg">
  <div class="grid-container">
    <div class="at-section-header">
      <h2 class="at-section-title"><?php esc_html_e( 'Our Most Popular Tours', 'ashfield-travel' ); ?></h2>
      <p class="at-section-subtitle"><?php esc_html_e( 'Handpicked by our travel experts and loved by families just like yours.', 'ashfield-travel' ); ?></p>
      <div class="at-section-divider"></div>
    </div>
    <div class="at-tour-grid">

      <div class="at-tour-card">
        <div class="at-tour-card-img">
          <img src="https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=500&q=80" alt="Splendours of Kerala">
        </div>
        <div class="at-tour-card-body">
          <div class="at-tour-card-meta">
            <span class="at-tour-location">India</span>
            <span class="at-tour-favourite">&#9733; Customer Favourite</span>
          </div>
          <h3 class="at-tour-card-title">Splendours of Kerala</h3>
          <ul class="at-tour-highlights">
            <li>Cruise the enchanting backwaters by houseboat</li>
            <li>Explore the spice plantations of Munnar</li>
            <li>Relax on Kovalam's golden beaches</li>
          </ul>
          <div class="at-tour-save-banner">Save up to &pound;200 per person</div>
          <div class="at-tour-info-row">
            <div class="at-tour-info-item">
              <div class="label">Dates</div>
              <div class="value">Sep 2026–<br>Mar 2027</div>
            </div>
            <div class="at-tour-info-item">
              <div class="label">Duration</div>
              <div class="value">14 days</div>
            </div>
            <div class="at-tour-info-item">
              <div class="label">From</div>
              <div class="value price">&pound;1,295</div>
            </div>
          </div>
          <a href="#" class="at-btn-find-more">Find out more <span class="arrow-circle">&#10132;</span></a>
        </div>
      </div>

      <div class="at-tour-card">
        <div class="at-tour-card-img">
          <img src="https://images.unsplash.com/photo-1564507592333-c60657eea523?w=500&q=80" alt="Golden Triangle Classic">
        </div>
        <div class="at-tour-card-body">
          <div class="at-tour-card-meta">
            <span class="at-tour-location">India</span>
            <span class="at-tour-favourite">&#9733; Customer Favourite</span>
          </div>
          <h3 class="at-tour-card-title">Golden Triangle Classic</h3>
          <ul class="at-tour-highlights">
            <li>Marvel at the Taj Mahal at sunrise</li>
            <li>Explore the royal palaces of Jaipur</li>
            <li>Walk through Old Delhi's vibrant streets</li>
          </ul>
          <div class="at-tour-save-banner">Save up to &pound;150 per person</div>
          <div class="at-tour-info-row">
            <div class="at-tour-info-item">
              <div class="label">Dates</div>
              <div class="value">Oct 2026–<br>Mar 2027</div>
            </div>
            <div class="at-tour-info-item">
              <div class="label">Duration</div>
              <div class="value">5 days</div>
            </div>
            <div class="at-tour-info-item">
              <div class="label">From</div>
              <div class="value price">&pound;895</div>
            </div>
          </div>
          <a href="#" class="at-btn-find-more">Find out more <span class="arrow-circle">&#10132;</span></a>
        </div>
      </div>

      <div class="at-tour-card">
        <div class="at-tour-card-img">
          <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=500&q=80" alt="Dubai Family Discovery">
        </div>
        <div class="at-tour-card-body">
          <div class="at-tour-card-meta">
            <span class="at-tour-location">Dubai</span>
            <span class="at-tour-favourite">&#9733; New Tour</span>
          </div>
          <h3 class="at-tour-card-title">Dubai Family Discovery</h3>
          <ul class="at-tour-highlights">
            <li>Iconic Burj Khalifa &amp; Dubai Marina</li>
            <li>Desert safari with traditional BBQ dinner</li>
            <li>Abu Dhabi day trip &amp; Grand Mosque</li>
          </ul>
          <div class="at-tour-save-banner">Save up to &pound;100 per person</div>
          <div class="at-tour-info-row">
            <div class="at-tour-info-item">
              <div class="label">Dates</div>
              <div class="value">Year<br>round</div>
            </div>
            <div class="at-tour-info-item">
              <div class="label">Duration</div>
              <div class="value">7 days</div>
            </div>
            <div class="at-tour-info-item">
              <div class="label">From</div>
              <div class="value price">&pound;1,095</div>
            </div>
          </div>
          <a href="#" class="at-btn-find-more">Find out more <span class="arrow-circle">&#10132;</span></a>
        </div>
      </div>

      <div class="at-tour-card">
        <div class="at-tour-card-img">
          <img src="https://images.unsplash.com/photo-1597074866923-dc0589150a37?w=500&q=80" alt="Kashmir Paradise">
        </div>
        <div class="at-tour-card-body">
          <div class="at-tour-card-meta">
            <span class="at-tour-location">India</span>
          </div>
          <h3 class="at-tour-card-title">Kashmir Paradise</h3>
          <ul class="at-tour-highlights">
            <li>Stay on a traditional Dal Lake houseboat</li>
            <li>Explore Mughal gardens in Srinagar</li>
            <li>Journey through Pahalgam &amp; Gulmarg</li>
          </ul>
          <div class="at-tour-save-banner">Early Bird — Save &pound;250pp</div>
          <div class="at-tour-info-row">
            <div class="at-tour-info-item">
              <div class="label">Dates</div>
              <div class="value">Apr 2026–<br>Oct 2026</div>
            </div>
            <div class="at-tour-info-item">
              <div class="label">Duration</div>
              <div class="value">10 days</div>
            </div>
            <div class="at-tour-info-item">
              <div class="label">From</div>
              <div class="value price">&pound;1,495</div>
            </div>
          </div>
          <a href="#" class="at-btn-find-more">Find out more <span class="arrow-circle">&#10132;</span></a>
        </div>
      </div>

    </div><!-- .at-tour-grid -->
  </div>
</section>

<!-- ═══════ TOUR TYPES ═══════ -->
<section class="at-section">
  <div class="grid-container">
    <div class="at-section-header">
      <h2 class="at-section-title">Find Your Perfect Holiday</h2>
      <p class="at-section-subtitle">Whether you prefer travelling in a group or want a bespoke private itinerary, we have a style for you.</p>
      <div class="at-section-divider"></div>
    </div>
    <div class="at-types-grid">
      <div class="at-type-tile">
        <div class="at-type-icon">&#128101;</div>
        <div class="at-type-name">Group Tours</div>
        <div class="at-type-count">8 tours available</div>
      </div>
      <div class="at-type-tile">
        <div class="at-type-icon">&#128100;</div>
        <div class="at-type-name">Private Tours</div>
        <div class="at-type-count">12 tours available</div>
      </div>
      <div class="at-type-tile">
        <div class="at-type-icon">&#127968;</div>
        <div class="at-type-name">Family Packages</div>
        <div class="at-type-count">6 packages available</div>
      </div>
      <div class="at-type-tile">
        <div class="at-type-icon">&#10084;</div>
        <div class="at-type-name">Honeymoons</div>
        <div class="at-type-count">4 tours available</div>
      </div>
      <div class="at-type-tile">
        <div class="at-type-icon">&#9878;</div>
        <div class="at-type-name">Tailor-Made</div>
        <div class="at-type-count">Fully bespoke</div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════ WHY ASHFIELD ═══════ -->
<section class="at-section navy-bg">
  <div class="grid-container">
    <div class="at-section-header">
      <h2 class="at-section-title">Why Travel With Ashfield</h2>
      <p class="at-section-subtitle">We are more than a travel company. We are a team that understands your culture, your family, and your expectations.</p>
      <div class="at-section-divider"></div>
    </div>
    <div class="at-usp-grid">
      <div class="at-usp-card">
        <div class="at-usp-icon">&#127759;</div>
        <h3 class="at-usp-title">Built for British-Indian Families</h3>
        <p class="at-usp-desc">We understand the nuances of travelling as a British-Indian family. Dietary needs, cultural considerations, and multi-generational comfort are built into every itinerary.</p>
      </div>
      <div class="at-usp-card">
        <div class="at-usp-icon">&#128172;</div>
        <h3 class="at-usp-title">Translator Support</h3>
        <p class="at-usp-desc">Need help communicating with elderly parents or relatives who prefer Hindi, Gujarati, or Malayalam? Our guides and support team speak your language.</p>
      </div>
      <div class="at-usp-card">
        <div class="at-usp-icon">&#128274;</div>
        <h3 class="at-usp-title">Fully Protected</h3>
        <p class="at-usp-desc">ATOL protected and TTA members. Your money is safe, your holiday is guaranteed, and you have a UK-based team to call any time.</p>
      </div>
      <div class="at-usp-card">
        <div class="at-usp-icon">&#127869;</div>
        <h3 class="at-usp-title">Vegetarian &amp; Jain Friendly</h3>
        <p class="at-usp-desc">From pure veg restaurants to Jain dietary requirements, we ensure every meal on your holiday meets your family's needs without compromise.</p>
      </div>
      <div class="at-usp-card">
        <div class="at-usp-icon">&#128142;</div>
        <h3 class="at-usp-title">Handpicked Hotels</h3>
        <p class="at-usp-desc">Every hotel is personally vetted. We choose properties that combine comfort, character, and excellent service so your family can truly relax.</p>
      </div>
      <div class="at-usp-card">
        <div class="at-usp-icon">&#128101;</div>
        <h3 class="at-usp-title">Small Groups, Big Experiences</h3>
        <p class="at-usp-desc">Maximum 26 guests per tour means more personal attention, better experiences, and the flexibility to make each journey special.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════ TESTIMONIALS ═══════ -->
<section class="at-section cream-bg">
  <div class="grid-container">
    <div class="at-section-header">
      <h2 class="at-section-title">What Our Travellers Say</h2>
      <p class="at-section-subtitle">Real stories from families who trusted us with their holiday.</p>
      <div class="at-section-divider"></div>
    </div>
    <div class="at-testimonial-grid">
      <div class="at-testimonial-card">
        <div class="at-testimonial-quote-mark">&ldquo;</div>
        <div class="at-testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p class="at-testimonial-text">Ashfield understood exactly what our family needed. My parents were comfortable with the vegetarian food and translator support, while the kids loved the houseboat experience.</p>
        <div class="at-testimonial-author">
          <div class="at-testimonial-avatar">RP</div>
          <div>
            <div class="at-testimonial-name">Ravi &amp; Priya Patel</div>
            <div class="at-testimonial-trip">Kerala Backwaters &bull; Oct 2025</div>
          </div>
        </div>
      </div>
      <div class="at-testimonial-card">
        <div class="at-testimonial-quote-mark">&ldquo;</div>
        <div class="at-testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p class="at-testimonial-text">The Golden Triangle tour was perfectly paced. Sreekanth personally called us before the trip to understand our requirements. That level of care is rare in this industry.</p>
        <div class="at-testimonial-author">
          <div class="at-testimonial-avatar">AS</div>
          <div>
            <div class="at-testimonial-name">Anita Shah</div>
            <div class="at-testimonial-trip">Golden Triangle &bull; Dec 2025</div>
          </div>
        </div>
      </div>
      <div class="at-testimonial-card">
        <div class="at-testimonial-quote-mark">&ldquo;</div>
        <div class="at-testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p class="at-testimonial-text">We booked the Kerala-Dubai combo and it was the best holiday we have ever had. Everything was seamless, from the flights to the transfers. Absolutely will book again.</p>
        <div class="at-testimonial-author">
          <div class="at-testimonial-avatar">JN</div>
          <div>
            <div class="at-testimonial-name">Jay &amp; Nisha Mehta</div>
            <div class="at-testimonial-trip">Kerala + Dubai &bull; Feb 2026</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════ BLOG / INSPIRATION ═══════ -->
<section class="at-section">
  <div class="grid-container">
    <div class="at-section-header">
      <h2 class="at-section-title">Travel Inspiration</h2>
      <p class="at-section-subtitle">Tips, guides, and stories to help you plan your perfect family holiday.</p>
      <div class="at-section-divider"></div>
    </div>
    <div class="at-blog-grid">
      <div class="at-blog-card">
        <div class="at-blog-card-img">
          <img src="https://images.unsplash.com/photo-1593693411515-c20261bcad6e?w=500&q=80" alt="Kerala Guide">
        </div>
        <div class="at-blog-card-body">
          <div class="at-blog-tag">Destination Guide</div>
          <h3 class="at-blog-title">The Complete Guide to Kerala for First-Time Visitors</h3>
          <p class="at-blog-excerpt">Everything you need to know about visiting God's Own Country — from the best time to go to must-see experiences.</p>
          <a href="#" class="at-blog-link">Read more <span>&#10132;</span></a>
        </div>
      </div>
      <div class="at-blog-card">
        <div class="at-blog-card-img">
          <img src="https://images.unsplash.com/photo-1585135497273-1a86b09fe70e?w=500&q=80" alt="Vegetarian Travel India">
        </div>
        <div class="at-blog-card-body">
          <div class="at-blog-tag">Travel Tips</div>
          <h3 class="at-blog-title">Travelling Vegetarian in India: Your Complete Guide</h3>
          <p class="at-blog-excerpt">How to enjoy incredible Indian cuisine on your holiday — from street food to fine dining, all 100% vegetarian.</p>
          <a href="#" class="at-blog-link">Read more <span>&#10132;</span></a>
        </div>
      </div>
      <div class="at-blog-card">
        <div class="at-blog-card-img">
          <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=500&q=80" alt="Dubai with Kids">
        </div>
        <div class="at-blog-card-body">
          <div class="at-blog-tag">Family Travel</div>
          <h3 class="at-blog-title">Dubai with Kids: 10 Experiences Your Family Will Love</h3>
          <p class="at-blog-excerpt">From theme parks to desert safaris, discover why Dubai is the ultimate family holiday destination.</p>
          <a href="#" class="at-blog-link">Read more <span>&#10132;</span></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════ NEWSLETTER / BROCHURE ═══════ -->
<section class="at-newsletter">
  <div class="grid-container">
    <div class="at-newsletter-content">
      <h2 class="at-newsletter-title">Get Your Free Brochure</h2>
      <p class="at-newsletter-text">Discover our full range of holidays with stunning photography, detailed itineraries, and exclusive offers. Delivered free to your door.</p>
    </div>
    <form class="at-newsletter-form" action="#" method="post">
      <input type="email" class="at-newsletter-input" placeholder="Your email address" required>
      <button type="submit" class="at-btn-brochure">Send My Brochure</button>
    </form>
  </div>
</section>

<!-- ═══════ VIEW ALL TOURS CTA ═══════ -->
<div style="text-align:center;padding:56px 0;">
  <a href="<?php echo esc_url( home_url( '/tours/' ) ); ?>" class="at-btn-primary" style="display:inline-flex;font-size:16px;padding:18px 48px;">
    View All Tours <span style="margin-left:8px;">&#10132;</span>
  </a>
</div>

<!-- ═══════ STICKY BROCHURE BUTTON ═══════ -->
<a href="<?php echo esc_url( home_url( '/brochure/' ) ); ?>" class="at-sticky-brochure">
  Request a brochure <span class="arrow-circle">&#10132;</span>
</a>

<!-- ═══════ MOBILE CTA BAR ═══════ -->
<div class="at-mobile-cta">
  <div class="at-mobile-cta-inner">
    <a href="tel:+447587671758" class="at-btn-mobile at-btn-mobile--call">&#9742; Call Us</a>
    <a href="<?php echo esc_url( home_url( '/enquire/' ) ); ?>" class="at-btn-mobile at-btn-mobile--enquire">Enquire Now &#10132;</a>
  </div>
</div>

<?php get_footer(); ?>
