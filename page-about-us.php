<?php
/**
 * Template Name: About Us
 * Custom About Us page for Ashfield Travel
 */
get_header();
?>

<main id="primary" class="site-main">

  <!-- Hero -->
  <section class="at-page-hero" style="background: linear-gradient(135deg, #1B3A5C 0%, #2a5280 100%); padding: 90px 0 70px; text-align: center;">
    <div class="grid-container">
      <h1 style="font-family: var(--at-font-heading); font-size: 52px; color: #fff; margin: 0 0 16px;">About Ashfield Travel</h1>
      <p style="font-size: 20px; color: rgba(255,255,255,0.85); max-width: 640px; margin: 0 auto;">Curated holidays for British-Indian families — built on expertise, trust, and a deep love of India.</p>
    </div>
  </section>

  <!-- Our Story -->
  <section style="padding: 80px 0; background: #fff;">
    <div class="grid-container" style="max-width: 860px;">
      <h2 style="font-family: var(--at-font-heading); font-size: 36px; color: var(--at-navy); margin-bottom: 20px;">Our Story</h2>
      <p style="font-size: 18px; line-height: 1.8; color: #444; margin-bottom: 20px;">Ashfield Travel was founded with one simple idea: British-Indian families deserve holidays that truly reflect who they are. Standard package holidays rarely account for cultural preferences, family dynamics, or the desire to connect with ancestral roots.</p>
      <p style="font-size: 18px; line-height: 1.8; color: #444; margin-bottom: 20px;">We specialise in curated India and Dubai tours — from the backwaters of Kerala to the royal palaces of Rajasthan — designed specifically for families, couples, and groups from the UK's South Asian community.</p>
      <p style="font-size: 18px; line-height: 1.8; color: #444;">Every itinerary is crafted by people who know both the UK and India intimately, so you're never just a booking reference — you're a guest.</p>
    </div>
  </section>

  <!-- Why Choose Us -->
  <section style="padding: 80px 0; background: #f7f8f9;">
    <div class="grid-container">
      <h2 style="font-family: var(--at-font-heading); font-size: 36px; color: var(--at-navy); text-align: center; margin-bottom: 50px;">Why Choose Ashfield Travel</h2>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 32px;">
        <?php
        $pillars = [
          ['icon' => '🇮🇳', 'title' => 'India Specialists', 'desc' => 'We cover Kerala, Rajasthan, Kashmir, Goa, Golden Triangle, Sikkim, and Dubai — destinations we know inside out.'],
          ['icon' => '👨‍👩‍👧‍👦', 'title' => 'Family First', 'desc' => 'From multi-generational trips to honeymoons, every tour is thoughtfully designed around your group\'s needs.'],
          ['icon' => '🤝', 'title' => 'UK-Based Support', 'desc' => 'Our team is based in the UK, available before, during, and after your trip — in English and several South Asian languages.'],
          ['icon' => '✈️', 'title' => 'ATOL Protected', 'desc' => 'All our holidays are fully financially protected, giving you complete peace of mind when you book.'],
        ];
        foreach ($pillars as $p): ?>
          <div style="background: #fff; border-radius: 16px; padding: 36px 28px; box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
            <div style="font-size: 40px; margin-bottom: 16px;"><?php echo $p['icon']; ?></div>
            <h3 style="font-family: var(--at-font-heading); font-size: 22px; color: var(--at-navy); margin-bottom: 12px;"><?php echo $p['title']; ?></h3>
            <p style="color: #666; line-height: 1.7;"><?php echo $p['desc']; ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section style="padding: 80px 0; background: var(--at-navy); text-align: center;">
    <div class="grid-container">
      <h2 style="font-family: var(--at-font-heading); font-size: 38px; color: #fff; margin-bottom: 16px;">Ready to Start Planning?</h2>
      <p style="font-size: 18px; color: rgba(255,255,255,0.8); margin-bottom: 36px;">Tell us your dream holiday and we'll create an itinerary tailored just for you.</p>
      <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="at-btn at-btn-primary" style="font-size: 18px; padding: 16px 40px;">Get a Free Quote <span class="at-btn-icon">→</span></a>
    </div>
  </section>

</main>

<?php get_footer(); ?>
