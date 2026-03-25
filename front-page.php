<?php
/**
 * Template Name: Front Page
 * Description: Standalone front page template for Ashfield Travel.
 *              Does NOT use get_header() / get_footer() from GeneratePress.
 *
 * @package Ashfield_Travel
 */
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
/* ═══════════════════════════════════════ */
/* RESET & BASE                           */
/* ═══════════════════════════════════════ */
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
html { scroll-behavior: smooth; }
body { font-family: 'Inter', Arial, sans-serif; color: #2D2D2D; line-height: 1.7; background: #fff; }
a { text-decoration: none; color: inherit; }
img { max-width: 100%; height: auto; display: block; }
.container { max-width: 1280px; margin: 0 auto; padding: 0 32px; }

/* ═══════════════════════════════════════ */
/* COLOUR PALETTE - Premium Warm          */
/* ═══════════════════════════════════════ */
:root {
  --navy: #1B2D4F;
  --navy-light: #2A4170;
  --terracotta: #C4572A;
  --terracotta-dark: #A84520;
  --terracotta-light: #D4734E;
  --gold: #C9A84C;
  --gold-light: #E8D9A0;
  --cream: #FAF7F2;
  --cream-dark: #F0EBE1;
  --green: #2E7D52;
  --green-light: #E8F3ED;
  --text-dark: #1A1A1A;
  --text-body: #4A4A4A;
  --text-light: #7A7A7A;
  --border: #E8E3DA;
  --white: #FFFFFF;
  --shadow-sm: 0 1px 3px rgba(0,0,0,0.06);
  --shadow-md: 0 4px 16px rgba(0,0,0,0.08);
  --shadow-lg: 0 8px 32px rgba(0,0,0,0.12);
}

/* ═══════════════════════════════════════ */
/* 1. TOP BAR                             */
/* ═══════════════════════════════════════ */
.top-bar {
  background: var(--navy);
  color: rgba(255,255,255,0.85);
  font-size: 13px;
  padding: 8px 0;
  letter-spacing: 0.2px;
}
.top-bar .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.top-bar-left { display: flex; gap: 24px; align-items: center; }
.top-bar-left span { display: flex; align-items: center; gap: 6px; }
.top-bar-right { display: flex; gap: 20px; align-items: center; }
.top-bar a { color: var(--gold); font-weight: 500; }
.top-bar a:hover { color: var(--gold-light); }
.top-bar .separator { width: 1px; height: 14px; background: rgba(255,255,255,0.2); }

/* ═══════════════════════════════════════ */
/* 2. HEADER / NAVIGATION                 */
/* ═══════════════════════════════════════ */
.header {
  background: var(--white);
  border-bottom: 1px solid var(--border);
  position: sticky;
  top: 0;
  z-index: 100;
}
.header .container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 80px;
}
.logo { display: flex; align-items: center; gap: 12px; }
.logo-mark {
  width: 52px; height: 52px;
  background: var(--navy);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  position: relative;
}
.logo-mark .a-letter {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 28px;
  font-weight: 700;
  color: var(--white);
  font-style: italic;
}
.logo-mark .star {
  position: absolute; top: 4px; right: 6px;
  color: var(--terracotta);
  font-size: 12px;
}
.logo-text { display: flex; flex-direction: column; line-height: 1.15; }
.logo-text .brand {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 26px; font-weight: 700; color: var(--navy);
  letter-spacing: 0.5px;
}
.logo-text .sub {
  font-size: 10px; font-weight: 600; color: var(--terracotta);
  letter-spacing: 3px; text-transform: uppercase;
}

.nav { display: flex; align-items: center; gap: 0; }
.nav-item {
  padding: 28px 18px;
  font-size: 15px;
  font-weight: 500;
  color: var(--text-dark);
  position: relative;
  cursor: pointer;
  transition: color 0.2s;
  display: flex;
  align-items: center;
  gap: 5px;
}
.nav-item:hover { color: var(--terracotta); }
.nav-item .arrow { font-size: 8px; opacity: 0.5; transition: transform 0.2s; }
.nav-item:hover .arrow { transform: rotate(180deg); }

.header-right { display: flex; align-items: center; gap: 24px; }
.header-phone { display: flex; flex-direction: column; align-items: flex-end; }
.header-phone .number {
  font-size: 18px; font-weight: 700; color: var(--navy);
  letter-spacing: 0.5px;
}
.header-phone .hours { font-size: 11px; color: var(--text-light); }

.btn-enquire {
  background: var(--terracotta);
  color: var(--white);
  border: none;
  border-radius: 50px;
  padding: 13px 28px;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
  letter-spacing: 0.5px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.btn-enquire:hover { background: var(--terracotta-dark); transform: translateY(-1px); box-shadow: var(--shadow-md); }
.btn-enquire .icon { font-size: 16px; }

/* Mega Menu */
.nav-item .mega-menu {
  display: none;
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%);
  background: var(--white);
  border-radius: 0 0 8px 8px;
  box-shadow: var(--shadow-lg);
  padding: 32px 36px;
  min-width: 640px;
  z-index: 200;
  border-top: 3px solid var(--terracotta);
}
.nav-item:hover .mega-menu { display: flex; gap: 48px; }
.mega-col h4 {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 18px; font-weight: 700; color: var(--navy);
  margin-bottom: 16px;
  padding-bottom: 8px;
  border-bottom: 2px solid var(--gold-light);
}
.mega-col a {
  display: block; font-size: 14px; color: var(--text-body);
  padding: 6px 0; transition: all 0.2s;
}
.mega-col a:hover { color: var(--terracotta); padding-left: 4px; }
.mega-col a.coming { color: #bbb; font-style: italic; }
.mega-col a.coming::after { content: ' — Coming Soon'; font-size: 11px; }

/* ═══════════════════════════════════════ */
/* 3. HERO SECTION - Cinematic            */
/* ═══════════════════════════════════════ */
.hero {
  position: relative;
  height: 92vh;
  min-height: 600px;
  max-height: 800px;
  overflow: hidden;
}
.hero-bg {
  position: absolute; inset: 0;
  background: url('https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=1920&q=85') center/cover no-repeat;
}
.hero-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(
    to bottom,
    rgba(27,45,79,0.3) 0%,
    rgba(27,45,79,0.15) 40%,
    rgba(27,45,79,0.5) 80%,
    rgba(27,45,79,0.75) 100%
  );
}
.hero-content {
  position: relative; z-index: 2;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding-bottom: 80px;
  max-width: 800px;
}
.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: var(--terracotta);
  color: var(--white);
  padding: 8px 20px;
  border-radius: 50px;
  font-size: 13px;
  font-weight: 600;
  letter-spacing: 0.5px;
  margin-bottom: 24px;
  width: fit-content;
}
.hero-tagline {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 62px;
  font-weight: 700;
  color: var(--white);
  line-height: 1.08;
  margin-bottom: 20px;
  letter-spacing: -0.5px;
}
.hero-sub {
  font-size: 19px;
  color: rgba(255,255,255,0.9);
  font-weight: 300;
  margin-bottom: 36px;
  max-width: 560px;
  line-height: 1.7;
}
.hero-buttons { display: flex; gap: 16px; flex-wrap: wrap; }
.btn-hero-primary {
  background: var(--terracotta);
  color: var(--white);
  border: none;
  border-radius: 50px;
  padding: 16px 36px;
  font-size: 15px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
  display: flex;
  align-items: center;
  gap: 10px;
  letter-spacing: 0.3px;
}
.btn-hero-primary:hover { background: var(--terracotta-dark); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(196,87,42,0.4); }
.btn-hero-secondary {
  background: transparent;
  color: var(--white);
  border: 2px solid rgba(255,255,255,0.6);
  border-radius: 50px;
  padding: 14px 36px;
  font-size: 15px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s;
}
.btn-hero-secondary:hover { background: rgba(255,255,255,0.15); border-color: var(--white); }

/* ═══════════════════════════════════════ */
/* 4. TRUST BAR                           */
/* ═══════════════════════════════════════ */
.trust-bar {
  background: var(--white);
  border-bottom: 1px solid var(--border);
  padding: 20px 0;
}
.trust-bar .container {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 48px;
  flex-wrap: wrap;
}
.trust-item {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 14px;
  font-weight: 500;
  color: var(--text-dark);
}
.trust-icon {
  width: 36px; height: 36px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
  flex-shrink: 0;
}
.trust-icon.gold { background: #FDF6E3; color: var(--gold); }
.trust-icon.green { background: var(--green-light); color: var(--green); }
.trust-icon.navy { background: #EDF0F7; color: var(--navy); }
.trust-stars { color: var(--gold); letter-spacing: 2px; }

/* ═══════════════════════════════════════ */
/* 5. FILTER / CATEGORY NAV               */
/* ═══════════════════════════════════════ */
.filter-bar {
  background: var(--cream);
  padding: 16px 0;
  border-bottom: 1px solid var(--border);
}
.filter-bar .container {
  display: flex;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
}
.filter-label {
  font-size: 14px;
  font-weight: 600;
  color: var(--text-dark);
  margin-right: 8px;
}
.filter-pill {
  padding: 8px 20px;
  border-radius: 50px;
  font-size: 13px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.2s;
  border: 1.5px solid var(--border);
  background: var(--white);
  color: var(--text-body);
}
.filter-pill:hover { border-color: var(--terracotta); color: var(--terracotta); }
.filter-pill.active {
  background: var(--terracotta);
  color: var(--white);
  border-color: var(--terracotta);
}

/* ═══════════════════════════════════════ */
/* SECTION COMMON                         */
/* ═══════════════════════════════════════ */
.section { padding: 80px 0; }
.section.cream-bg { background: var(--cream); }
.section.navy-bg { background: var(--navy); color: var(--white); }
.section-header { text-align: center; margin-bottom: 56px; }
.section-title {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 42px;
  font-weight: 700;
  color: var(--navy);
  margin-bottom: 16px;
  line-height: 1.15;
}
.navy-bg .section-title { color: var(--white); }
.section-subtitle {
  font-size: 17px;
  color: var(--text-light);
  max-width: 620px;
  margin: 0 auto;
  font-weight: 300;
  line-height: 1.7;
}
.navy-bg .section-subtitle { color: rgba(255,255,255,0.65); }
.section-divider {
  width: 60px;
  height: 3px;
  background: var(--terracotta);
  margin: 20px auto 0;
  border-radius: 2px;
}

/* ═══════════════════════════════════════ */
/* 6. DESTINATION GRID                    */
/* ═══════════════════════════════════════ */
.dest-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}
.dest-card {
  position: relative;
  border-radius: 12px;
  overflow: hidden;
  cursor: pointer;
  transition: all 0.4s;
  aspect-ratio: 4/3;
}
.dest-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }
.dest-card img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform 0.6s;
}
.dest-card:hover img { transform: scale(1.05); }
.dest-card-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.1) 50%, rgba(0,0,0,0) 100%);
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 28px;
}
.dest-card-name {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 28px;
  font-weight: 700;
  color: var(--white);
  margin-bottom: 4px;
}
.dest-card-tours {
  font-size: 13px;
  color: rgba(255,255,255,0.8);
  font-weight: 400;
}
.dest-card .coming-badge {
  position: absolute;
  top: 16px;
  right: 16px;
  background: var(--gold);
  color: var(--white);
  padding: 5px 14px;
  border-radius: 50px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 1px;
  text-transform: uppercase;
}

/* ═══════════════════════════════════════ */
/* 7. FEATURED TOUR CARDS                 */
/* ═══════════════════════════════════════ */
.tour-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
}
.tour-card {
  background: var(--white);
  border-radius: 12px;
  overflow: hidden;
  box-shadow: var(--shadow-sm);
  border: 1px solid var(--border);
  transition: all 0.3s;
}
.tour-card:hover { box-shadow: var(--shadow-lg); transform: translateY(-4px); }
.tour-card-img {
  position: relative;
  height: 200px;
  overflow: hidden;
}
.tour-card-img img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform 0.5s;
}
.tour-card:hover .tour-card-img img { transform: scale(1.06); }
.tour-card-badges {
  position: absolute;
  bottom: 12px;
  left: 12px;
  display: flex;
  gap: 6px;
}
.tour-badge {
  width: 32px; height: 32px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
  background: rgba(255,255,255,0.95);
  color: var(--terracotta);
  box-shadow: var(--shadow-sm);
}
.tour-card-body { padding: 20px; }
.tour-card-meta {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
  font-size: 12px;
}
.tour-location {
  display: flex;
  align-items: center;
  gap: 4px;
  color: var(--text-light);
  font-weight: 500;
}
.tour-favourite {
  display: flex;
  align-items: center;
  gap: 4px;
  color: var(--gold);
  font-weight: 600;
  font-size: 12px;
}
.tour-card-title {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 21px;
  font-weight: 700;
  color: var(--navy);
  margin-bottom: 12px;
  line-height: 1.25;
}
.tour-highlights {
  list-style: none;
  margin-bottom: 16px;
}
.tour-highlights li {
  font-size: 13px;
  color: var(--text-body);
  padding: 3px 0;
  padding-left: 16px;
  position: relative;
  line-height: 1.5;
}
.tour-highlights li::before {
  content: '•';
  position: absolute;
  left: 0;
  color: var(--terracotta);
  font-weight: 700;
}
.tour-save-banner {
  background: var(--green);
  color: var(--white);
  text-align: center;
  padding: 10px;
  font-size: 13px;
  font-weight: 600;
  letter-spacing: 0.3px;
  border-radius: 6px;
  margin-bottom: 16px;
}
.tour-info-row {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 8px;
  padding-bottom: 16px;
  border-bottom: 1px solid var(--border);
  margin-bottom: 16px;
}
.tour-info-item { text-align: center; }
.tour-info-item .icon { font-size: 18px; color: var(--terracotta); margin-bottom: 2px; }
.tour-info-item .label { font-size: 10px; color: var(--text-light); text-transform: uppercase; letter-spacing: 0.5px; }
.tour-info-item .value { font-size: 13px; font-weight: 600; color: var(--text-dark); }
.tour-price-row {
  display: flex;
  justify-content: flex-end;
  align-items: baseline;
  gap: 6px;
  margin-bottom: 16px;
}
.tour-price-label { font-size: 11px; color: var(--text-light); text-transform: uppercase; }
.tour-price {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 28px;
  font-weight: 700;
  color: var(--terracotta);
}
.tour-price-per { font-size: 11px; color: var(--text-light); }
.btn-find-more {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  background: var(--terracotta);
  color: var(--white);
  border: none;
  border-radius: 8px;
  padding: 14px 20px;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
}
.btn-find-more:hover { background: var(--terracotta-dark); }
.btn-find-more .arrow-circle {
  width: 28px; height: 28px;
  border-radius: 50%;
  background: rgba(255,255,255,0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
  transition: background 0.3s;
}
.btn-find-more:hover .arrow-circle { background: rgba(255,255,255,0.35); }

/* ═══════════════════════════════════════ */
/* 8. TOUR TYPES SECTION                  */
/* ═══════════════════════════════════════ */
.types-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 20px;
}
.type-tile {
  text-align: center;
  padding: 36px 20px;
  background: var(--white);
  border-radius: 12px;
  border: 1px solid var(--border);
  cursor: pointer;
  transition: all 0.3s;
}
.type-tile:hover {
  border-color: var(--terracotta);
  box-shadow: var(--shadow-md);
  transform: translateY(-4px);
}
.type-icon {
  width: 56px; height: 56px;
  margin: 0 auto 16px;
  background: var(--cream);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  color: var(--terracotta);
  transition: all 0.3s;
}
.type-tile:hover .type-icon { background: var(--terracotta); color: var(--white); }
.type-name { font-weight: 600; font-size: 15px; color: var(--navy); margin-bottom: 4px; }
.type-count { font-size: 12px; color: var(--text-light); }

/* ═══════════════════════════════════════ */
/* 9. WHY ASHFIELD USP                    */
/* ═══════════════════════════════════════ */
.usp-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 32px;
}
.usp-card {
  text-align: center;
  padding: 40px 32px;
}
.usp-icon {
  width: 64px; height: 64px;
  margin: 0 auto 20px;
  background: rgba(255,255,255,0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 28px;
  border: 1.5px solid rgba(255,255,255,0.2);
}
.usp-title {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 22px;
  font-weight: 700;
  margin-bottom: 10px;
  color: var(--white);
}
.usp-desc {
  font-size: 14px;
  color: rgba(255,255,255,0.7);
  line-height: 1.7;
  font-weight: 300;
}

/* ═══════════════════════════════════════ */
/* 10. TESTIMONIALS                       */
/* ═══════════════════════════════════════ */
.testimonial-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 28px;
}
.testimonial-card {
  background: var(--white);
  border-radius: 12px;
  padding: 36px;
  border: 1px solid var(--border);
  position: relative;
}
.testimonial-stars {
  color: var(--gold);
  font-size: 16px;
  letter-spacing: 3px;
  margin-bottom: 16px;
}
.testimonial-text {
  font-size: 15px;
  color: var(--text-body);
  font-style: italic;
  line-height: 1.8;
  margin-bottom: 20px;
}
.testimonial-author {
  display: flex;
  align-items: center;
  gap: 12px;
}
.testimonial-avatar {
  width: 44px; height: 44px;
  border-radius: 50%;
  background: var(--cream);
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  color: var(--terracotta);
  font-size: 16px;
}
.testimonial-name { font-weight: 600; font-size: 14px; color: var(--text-dark); }
.testimonial-trip { font-size: 12px; color: var(--text-light); }
.testimonial-quote-mark {
  position: absolute;
  top: 20px;
  right: 28px;
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 64px;
  color: var(--cream-dark);
  line-height: 1;
}

/* ═══════════════════════════════════════ */
/* 11. BLOG / INSPIRATION                 */
/* ═══════════════════════════════════════ */
.blog-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 28px;
}
.blog-card {
  border-radius: 12px;
  overflow: hidden;
  background: var(--white);
  border: 1px solid var(--border);
  transition: all 0.3s;
}
.blog-card:hover { box-shadow: var(--shadow-md); transform: translateY(-4px); }
.blog-card-img {
  height: 220px;
  overflow: hidden;
}
.blog-card-img img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform 0.5s;
}
.blog-card:hover .blog-card-img img { transform: scale(1.05); }
.blog-card-body { padding: 24px; }
.blog-tag {
  font-size: 11px;
  font-weight: 700;
  color: var(--terracotta);
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 8px;
}
.blog-title {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 22px;
  font-weight: 700;
  color: var(--navy);
  margin-bottom: 10px;
  line-height: 1.3;
}
.blog-excerpt {
  font-size: 14px;
  color: var(--text-light);
  line-height: 1.7;
  margin-bottom: 16px;
}
.blog-link {
  font-size: 14px;
  font-weight: 600;
  color: var(--terracotta);
  display: flex;
  align-items: center;
  gap: 6px;
  transition: gap 0.3s;
}
.blog-card:hover .blog-link { gap: 10px; }

/* ═══════════════════════════════════════ */
/* 12. NEWSLETTER / BROCHURE              */
/* ═══════════════════════════════════════ */
.newsletter {
  background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
  padding: 72px 0;
  position: relative;
  overflow: hidden;
}
.newsletter::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -10%;
  width: 500px;
  height: 500px;
  border-radius: 50%;
  background: rgba(201,168,76,0.06);
}
.newsletter .container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 60px;
  position: relative;
  z-index: 1;
}
.newsletter-content { flex: 1; }
.newsletter-title {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 36px;
  font-weight: 700;
  color: var(--white);
  margin-bottom: 12px;
}
.newsletter-text {
  font-size: 16px;
  color: rgba(255,255,255,0.7);
  font-weight: 300;
  line-height: 1.7;
}
.newsletter-form {
  display: flex;
  gap: 12px;
  flex: 1;
  max-width: 500px;
}
.newsletter-input {
  flex: 1;
  padding: 16px 24px;
  border: 1.5px solid rgba(255,255,255,0.2);
  border-radius: 50px;
  background: rgba(255,255,255,0.08);
  color: var(--white);
  font-size: 15px;
  font-family: 'Inter', sans-serif;
  transition: border-color 0.3s;
}
.newsletter-input::placeholder { color: rgba(255,255,255,0.4); }
.newsletter-input:focus { outline: none; border-color: var(--gold); }
.btn-brochure {
  background: var(--terracotta);
  color: var(--white);
  border: none;
  border-radius: 50px;
  padding: 16px 32px;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
  white-space: nowrap;
}
.btn-brochure:hover { background: var(--terracotta-dark); }

/* ═══════════════════════════════════════ */
/* 13. FOOTER                             */
/* ═══════════════════════════════════════ */
.footer {
  background: #111B2E;
  color: rgba(255,255,255,0.7);
  padding: 64px 0 0;
}
.footer-grid {
  display: grid;
  grid-template-columns: 1.5fr 1fr 1fr 1fr;
  gap: 48px;
  padding-bottom: 48px;
  border-bottom: 1px solid rgba(255,255,255,0.08);
}
.footer-brand .brand-name {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 24px;
  font-weight: 700;
  color: var(--white);
  margin-bottom: 12px;
}
.footer-brand .brand-desc {
  font-size: 14px;
  line-height: 1.7;
  margin-bottom: 20px;
  color: rgba(255,255,255,0.5);
}
.footer-social { display: flex; gap: 12px; }
.footer-social a {
  width: 38px; height: 38px;
  border-radius: 50%;
  border: 1px solid rgba(255,255,255,0.15);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
  color: rgba(255,255,255,0.6);
  transition: all 0.3s;
}
.footer-social a:hover { border-color: var(--terracotta); color: var(--terracotta); background: rgba(196,87,42,0.1); }
.footer-col h4 {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 18px;
  font-weight: 700;
  color: var(--white);
  margin-bottom: 20px;
}
.footer-col a {
  display: block;
  font-size: 14px;
  color: rgba(255,255,255,0.5);
  padding: 5px 0;
  transition: all 0.2s;
}
.footer-col a:hover { color: var(--terracotta); padding-left: 3px; }
.footer-bottom {
  padding: 24px 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 13px;
  color: rgba(255,255,255,0.35);
}
.footer-badges { display: flex; gap: 16px; align-items: center; }
.footer-badge {
  padding: 4px 12px;
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 4px;
  font-size: 11px;
  font-weight: 600;
  color: rgba(255,255,255,0.4);
  letter-spacing: 0.5px;
}

/* ═══════════════════════════════════════ */
/* 14. STICKY BROCHURE BUTTON             */
/* ═══════════════════════════════════════ */
.sticky-brochure {
  position: fixed;
  bottom: 24px;
  right: 24px;
  z-index: 999;
  background: var(--terracotta);
  color: var(--white);
  border: none;
  border-radius: 50px;
  padding: 16px 28px;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 10px;
  box-shadow: 0 4px 20px rgba(196,87,42,0.4);
  transition: all 0.3s;
}
.sticky-brochure:hover { background: var(--terracotta-dark); transform: translateY(-2px); box-shadow: 0 6px 28px rgba(196,87,42,0.5); }
.sticky-brochure .arrow-circle {
  width: 28px; height: 28px;
  border-radius: 50%;
  background: rgba(255,255,255,0.2);
  display: flex;
  align-items: center;
  justify-content: center;
}

/* ═══════════════════════════════════════ */
/* 15. MOBILE CTA BAR                     */
/* ═══════════════════════════════════════ */
.mobile-cta {
  display: none;
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 998;
  background: var(--white);
  border-top: 1px solid var(--border);
  padding: 12px 16px;
  box-shadow: 0 -4px 16px rgba(0,0,0,0.08);
}
.mobile-cta-inner {
  display: flex;
  gap: 10px;
}
.mobile-cta .btn-mobile {
  flex: 1;
  padding: 14px;
  border-radius: 50px;
  border: none;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
}
.btn-mobile.call { background: var(--navy); color: var(--white); }
.btn-mobile.enquire { background: var(--terracotta); color: var(--white); }

/* ═══════════════════════════════════════ */
/* RESPONSIVE                             */
/* ═══════════════════════════════════════ */
@media (max-width: 1024px) {
  .tour-grid { grid-template-columns: repeat(2, 1fr); }
  .types-grid { grid-template-columns: repeat(3, 1fr); }
  .footer-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .top-bar { display: none; }
  .nav { display: none; }
  .header .container { height: 64px; }
  .hero { height: 70vh; min-height: 500px; }
  .hero-tagline { font-size: 38px; }
  .hero-sub { font-size: 16px; }
  .hero-content { padding-bottom: 48px; }
  .section { padding: 56px 0; }
  .section-title { font-size: 32px; }
  .dest-grid { grid-template-columns: 1fr 1fr; }
  .tour-grid { grid-template-columns: 1fr; max-width: 400px; margin: 0 auto; }
  .usp-grid { grid-template-columns: 1fr; }
  .testimonial-grid { grid-template-columns: 1fr; }
  .blog-grid { grid-template-columns: 1fr; }
  .types-grid { grid-template-columns: repeat(2, 1fr); }
  .newsletter .container { flex-direction: column; gap: 32px; text-align: center; }
  .newsletter-form { flex-direction: column; max-width: 100%; }
  .footer-grid { grid-template-columns: 1fr; gap: 32px; }
  .trust-bar .container { gap: 20px; justify-content: center; }
  .sticky-brochure { display: none; }
  .mobile-cta { display: block; }
  .filter-bar { overflow-x: auto; }
  .header-phone { display: none; }
  .container { padding: 0 20px; }
}
@media (max-width: 480px) {
  .dest-grid { grid-template-columns: 1fr; }
  .hero-tagline { font-size: 32px; }
  .hero-buttons { flex-direction: column; }
  .types-grid { grid-template-columns: 1fr 1fr; }
}
</style>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ════════════ TOP BAR ════════════ -->
<div class="top-bar">
  <div class="container">
    <div class="top-bar-left">
      <span>&#9742; <a href="tel:+447587671758">+44 7587 671758</a> &nbsp;|&nbsp; Mon-Fri 9am-6pm, Sat 10am-4pm</span>
    </div>
    <div class="top-bar-right">
      <span>&#9993; info@ashfieldtravel.co.uk</span>
      <span class="separator"></span>
      <span>TTA Member &bull; ATOL Protected</span>
    </div>
  </div>
</div>

<!-- ════════════ HEADER ════════════ -->
<header class="header">
  <div class="container">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="logo">
      <div class="logo-mark">
        <span class="a-letter">A</span>
        <span class="star">&#10038;</span>
      </div>
      <div class="logo-text">
        <span class="brand">ASHFIELD</span>
        <span class="sub">TRAVEL</span>
      </div>
    </a>

    <nav class="nav">
      <div class="nav-item">
        Destinations <span class="arrow">&#9660;</span>
        <div class="mega-menu">
          <div class="mega-col">
            <h4>India</h4>
            <a href="#">Kerala</a>
            <a href="#">Golden Triangle</a>
            <a href="#">Kashmir</a>
            <a href="#">Rajasthan</a>
            <a href="#">Goa</a>
          </div>
          <div class="mega-col">
            <h4>Middle East</h4>
            <a href="#">Dubai</a>
          </div>
          <div class="mega-col">
            <h4>Coming Soon</h4>
            <a href="#" class="coming">Turkey</a>
            <a href="#" class="coming">Albania</a>
          </div>
        </div>
      </div>
      <div class="nav-item">
        Tour Types <span class="arrow">&#9660;</span>
        <div class="mega-menu" style="min-width: 400px;">
          <div class="mega-col">
            <h4>How You Travel</h4>
            <a href="#">Group Tours</a>
            <a href="#">Private Tours</a>
            <a href="#">Tailor-Made Holidays</a>
            <a href="#">Family Packages</a>
            <a href="#">Honeymoon Escapes</a>
          </div>
        </div>
      </div>
      <div class="nav-item">About Us <span class="arrow">&#9660;</span></div>
      <div class="nav-item">Offers</div>
      <div class="nav-item">Brochures</div>
      <div class="nav-item">Contact Us</div>
    </nav>

    <div class="header-right">
      <div class="header-phone">
        <span class="number">+44 7587 671758</span>
        <span class="hours">Mon-Fri 9am-6pm</span>
      </div>
      <button class="btn-enquire">
        Request a brochure <span class="icon">&#10132;</span>
      </button>
    </div>
  </div>
</header>

<!-- ════════════ HERO ════════════ -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-overlay"></div>
  <div class="hero-content container">
    <div class="hero-badge">&#10038; Curated for British-Indian Families</div>
    <h1 class="hero-tagline">Journeys That Feel<br>Like Coming Home</h1>
    <p class="hero-sub">Expertly crafted holidays to India, Dubai and beyond. Small groups, private tours, and tailor-made itineraries designed around your family.</p>
    <div class="hero-buttons">
      <a href="<?php echo esc_url( home_url('/tours/') ); ?>"><button class="btn-hero-primary">Explore Our Tours <span>&#10132;</span></button></a>
      <button class="btn-hero-secondary">Request a Brochure</button>
    </div>
  </div>
</section>

<!-- ════════════ TRUST BAR ════════════ -->
<div class="trust-bar">
  <div class="container">
    <div class="trust-item">
      <div class="trust-icon gold">&#9733;</div>
      <span><span class="trust-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>&nbsp; 4.9/5 Customer Rating</span>
    </div>
    <div class="trust-item">
      <div class="trust-icon green">&#10003;</div>
      <span>ATOL Protected</span>
    </div>
    <div class="trust-item">
      <div class="trust-icon navy">&#9878;</div>
      <span>TTA Member</span>
    </div>
    <div class="trust-item">
      <div class="trust-icon gold">&#9742;</div>
      <span>UK-Based Experts</span>
    </div>
    <div class="trust-item">
      <div class="trust-icon green">&#10084;</div>
      <span>Translator Support Available</span>
    </div>
  </div>
</div>

<!-- ════════════ FILTER BAR ════════════ -->
<div class="filter-bar">
  <div class="container">
    <span class="filter-label">Navigate to:</span>
    <span class="filter-pill active">All Tours</span>
    <span class="filter-pill">India Tours</span>
    <span class="filter-pill">Dubai</span>
    <span class="filter-pill">Group Tours</span>
    <span class="filter-pill">Private Tours</span>
    <span class="filter-pill">Family Packages</span>
    <span class="filter-pill">Destination Guides</span>
    <span class="filter-pill">Brochures</span>
  </div>
</div>

<!-- ════════════ DESTINATIONS ════════════ -->
<section class="section">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Explore Our Destinations</h2>
      <p class="section-subtitle">From the backwaters of Kerala to the glittering skyline of Dubai, discover handpicked destinations perfect for your family.</p>
      <div class="section-divider"></div>
    </div>
    <div class="dest-grid">
      <div class="dest-card">
        <img src="https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=600&q=80" alt="Kerala">
        <div class="dest-card-overlay">
          <div class="dest-card-name">Kerala</div>
          <div class="dest-card-tours">6 tours from &#163;1,295pp</div>
        </div>
      </div>
      <div class="dest-card">
        <img src="https://images.unsplash.com/photo-1564507592333-c60657eea523?w=600&q=80" alt="Golden Triangle">
        <div class="dest-card-overlay">
          <div class="dest-card-name">Golden Triangle</div>
          <div class="dest-card-tours">4 tours from &#163;895pp</div>
        </div>
      </div>
      <div class="dest-card">
        <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=600&q=80" alt="Dubai">
        <div class="dest-card-overlay">
          <div class="dest-card-name">Dubai</div>
          <div class="dest-card-tours">3 tours from &#163;1,095pp</div>
        </div>
      </div>
      <div class="dest-card">
        <img src="https://images.unsplash.com/photo-1597074866923-dc0589150a37?w=600&q=80" alt="Kashmir">
        <div class="dest-card-overlay">
          <div class="dest-card-name">Kashmir</div>
          <div class="dest-card-tours">2 tours from &#163;1,495pp</div>
        </div>
      </div>
      <div class="dest-card">
        <img src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=600&q=80" alt="Rajasthan">
        <div class="dest-card-overlay">
          <div class="dest-card-name">Rajasthan</div>
          <div class="dest-card-tours">3 tours from &#163;1,195pp</div>
        </div>
      </div>
      <div class="dest-card">
        <img src="https://images.unsplash.com/photo-1589308078059-be1415eab4c3?w=600&q=80" alt="Turkey">
        <div class="dest-card-overlay">
          <div class="dest-card-name">Turkey</div>
          <div class="dest-card-tours">Register your interest</div>
        </div>
        <div class="coming-badge">Coming Soon</div>
      </div>
    </div>
  </div>
</section>

<!-- ════════════ FEATURED TOURS (Distant Journeys Style) ════════════ -->
<section class="section cream-bg">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Our Most Popular Tours</h2>
      <p class="section-subtitle">Handpicked by our travel experts and loved by families just like yours.</p>
      <div class="section-divider"></div>
    </div>
    <div class="tour-grid">

      <!-- TOUR CARD 1 -->
      <div class="tour-card">
        <div class="tour-card-img">
          <img src="https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=500&q=80" alt="Splendours of Kerala">
          <div class="tour-card-badges">
            <div class="tour-badge" title="Group Tour">&#128101;</div>
            <div class="tour-badge" title="Family Friendly">&#127968;</div>
          </div>
        </div>
        <div class="tour-card-body">
          <div class="tour-card-meta">
            <span class="tour-location">&#128205; India</span>
            <span class="tour-favourite">&#9733; Customer Favourite</span>
          </div>
          <h3 class="tour-card-title">Splendours of Kerala</h3>
          <ul class="tour-highlights">
            <li>Cruise the enchanting backwaters by houseboat</li>
            <li>Explore the spice plantations of Munnar</li>
            <li>Relax on Kovalam's golden beaches</li>
          </ul>
          <div class="tour-save-banner">Save up to &#163;200 per person</div>
          <div class="tour-info-row">
            <div class="tour-info-item">
              <div class="icon">&#128197;</div>
              <div class="label">Dates</div>
              <div class="value">Sep 2026 -<br>Mar 2027</div>
            </div>
            <div class="tour-info-item">
              <div class="icon">&#9201;</div>
              <div class="label">Duration</div>
              <div class="value">14 days</div>
            </div>
            <div class="tour-info-item">
              <div class="icon">&#163;</div>
              <div class="label">Prices from</div>
              <div class="value" style="color: var(--terracotta); font-size: 18px; font-weight: 700;">&#163;1,295</div>
            </div>
          </div>
          <button class="btn-find-more">
            Find out more
            <span class="arrow-circle">&#10132;</span>
          </button>
        </div>
      </div>

      <!-- TOUR CARD 2 -->
      <div class="tour-card">
        <div class="tour-card-img">
          <img src="https://images.unsplash.com/photo-1564507592333-c60657eea523?w=500&q=80" alt="Golden Triangle Classic">
          <div class="tour-card-badges">
            <div class="tour-badge" title="Group Tour">&#128101;</div>
            <div class="tour-badge" title="Heritage">&#127963;</div>
          </div>
        </div>
        <div class="tour-card-body">
          <div class="tour-card-meta">
            <span class="tour-location">&#128205; India</span>
            <span class="tour-favourite">&#9733; Customer Favourite</span>
          </div>
          <h3 class="tour-card-title">Golden Triangle Classic</h3>
          <ul class="tour-highlights">
            <li>Marvel at the Taj Mahal at sunrise</li>
            <li>Explore the royal palaces of Jaipur</li>
            <li>Walk through Old Delhi's vibrant streets</li>
          </ul>
          <div class="tour-save-banner">Save up to &#163;150 per person</div>
          <div class="tour-info-row">
            <div class="tour-info-item">
              <div class="icon">&#128197;</div>
              <div class="label">Dates</div>
              <div class="value">Oct 2026 -<br>Mar 2027</div>
            </div>
            <div class="tour-info-item">
              <div class="icon">&#9201;</div>
              <div class="label">Duration</div>
              <div class="value">5 days</div>
            </div>
            <div class="tour-info-item">
              <div class="icon">&#163;</div>
              <div class="label">Prices from</div>
              <div class="value" style="color: var(--terracotta); font-size: 18px; font-weight: 700;">&#163;895</div>
            </div>
          </div>
          <button class="btn-find-more">
            Find out more
            <span class="arrow-circle">&#10132;</span>
          </button>
        </div>
      </div>

      <!-- TOUR CARD 3 -->
      <div class="tour-card">
        <div class="tour-card-img">
          <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=500&q=80" alt="Dubai Discovery">
          <div class="tour-card-badges">
            <div class="tour-badge" title="Family Friendly">&#127968;</div>
            <div class="tour-badge" title="Luxury">&#10024;</div>
          </div>
        </div>
        <div class="tour-card-body">
          <div class="tour-card-meta">
            <span class="tour-location">&#128205; Dubai</span>
            <span class="tour-favourite">&#9733; New Tour</span>
          </div>
          <h3 class="tour-card-title">Dubai Family Discovery</h3>
          <ul class="tour-highlights">
            <li>Iconic Burj Khalifa &amp; Dubai Marina</li>
            <li>Desert safari with traditional BBQ dinner</li>
            <li>Abu Dhabi day trip &amp; Grand Mosque</li>
          </ul>
          <div class="tour-save-banner">Save up to &#163;100 per person</div>
          <div class="tour-info-row">
            <div class="tour-info-item">
              <div class="icon">&#128197;</div>
              <div class="label">Dates</div>
              <div class="value">Year<br>round</div>
            </div>
            <div class="tour-info-item">
              <div class="icon">&#9201;</div>
              <div class="label">Duration</div>
              <div class="value">7 days</div>
            </div>
            <div class="tour-info-item">
              <div class="icon">&#163;</div>
              <div class="label">Prices from</div>
              <div class="value" style="color: var(--terracotta); font-size: 18px; font-weight: 700;">&#163;1,095</div>
            </div>
          </div>
          <button class="btn-find-more">
            Find out more
            <span class="arrow-circle">&#10132;</span>
          </button>
        </div>
      </div>

      <!-- TOUR CARD 4 -->
      <div class="tour-card">
        <div class="tour-card-img">
          <img src="https://images.unsplash.com/photo-1597074866923-dc0589150a37?w=500&q=80" alt="Kashmir">
          <div class="tour-card-badges">
            <div class="tour-badge" title="Private Tour">&#128100;</div>
            <div class="tour-badge" title="Scenic">&#127956;</div>
          </div>
        </div>
        <div class="tour-card-body">
          <div class="tour-card-meta">
            <span class="tour-location">&#128205; India</span>
          </div>
          <h3 class="tour-card-title">Kashmir Paradise</h3>
          <ul class="tour-highlights">
            <li>Stay on a traditional Dal Lake houseboat</li>
            <li>Explore Mughal gardens in Srinagar</li>
            <li>Journey through Pahalgam &amp; Gulmarg</li>
          </ul>
          <div class="tour-save-banner">Early Bird — Save &#163;250pp</div>
          <div class="tour-info-row">
            <div class="tour-info-item">
              <div class="icon">&#128197;</div>
              <div class="label">Dates</div>
              <div class="value">Apr 2026 -<br>Oct 2026</div>
            </div>
            <div class="tour-info-item">
              <div class="icon">&#9201;</div>
              <div class="label">Duration</div>
              <div class="value">10 days</div>
            </div>
            <div class="tour-info-item">
              <div class="icon">&#163;</div>
              <div class="label">Prices from</div>
              <div class="value" style="color: var(--terracotta); font-size: 18px; font-weight: 700;">&#163;1,495</div>
            </div>
          </div>
          <button class="btn-find-more">
            Find out more
            <span class="arrow-circle">&#10132;</span>
          </button>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════ TOUR TYPES ════════════ -->
<section class="section">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Find Your Perfect Holiday</h2>
      <p class="section-subtitle">Whether you prefer travelling in a group or want a bespoke private itinerary, we have a style for you.</p>
      <div class="section-divider"></div>
    </div>
    <div class="types-grid">
      <div class="type-tile">
        <div class="type-icon">&#128101;</div>
        <div class="type-name">Group Tours</div>
        <div class="type-count">8 tours available</div>
      </div>
      <div class="type-tile">
        <div class="type-icon">&#128100;</div>
        <div class="type-name">Private Tours</div>
        <div class="type-count">12 tours available</div>
      </div>
      <div class="type-tile">
        <div class="type-icon">&#127968;</div>
        <div class="type-name">Family Packages</div>
        <div class="type-count">6 packages available</div>
      </div>
      <div class="type-tile">
        <div class="type-icon">&#10084;</div>
        <div class="type-name">Honeymoons</div>
        <div class="type-count">4 tours available</div>
      </div>
      <div class="type-tile">
        <div class="type-icon">&#9878;</div>
        <div class="type-name">Tailor-Made</div>
        <div class="type-count">Fully bespoke</div>
      </div>
    </div>
  </div>
</section>

<!-- ════════════ WHY ASHFIELD ════════════ -->
<section class="section navy-bg">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Why Travel With Ashfield</h2>
      <p class="section-subtitle">We are more than a travel company. We are a team that understands your culture, your family, and your expectations.</p>
      <div class="section-divider"></div>
    </div>
    <div class="usp-grid">
      <div class="usp-card">
        <div class="usp-icon">&#127759;</div>
        <h3 class="usp-title">Built for British-Indian Families</h3>
        <p class="usp-desc">We understand the nuances of travelling as a British-Indian family. Dietary needs, cultural considerations, and multi-generational comfort are built into every itinerary.</p>
      </div>
      <div class="usp-card">
        <div class="usp-icon">&#128172;</div>
        <h3 class="usp-title">Translator Support</h3>
        <p class="usp-desc">Need help communicating with elderly parents or relatives who prefer Hindi, Gujarati, or Malayalam? Our guides and support team speak your language.</p>
      </div>
      <div class="usp-card">
        <div class="usp-icon">&#128274;</div>
        <h3 class="usp-title">Fully Protected</h3>
        <p class="usp-desc">ATOL protected and TTA members. Your money is safe, your holiday is guaranteed, and you have a UK-based team to call any time.</p>
      </div>
      <div class="usp-card">
        <div class="usp-icon">&#127869;</div>
        <h3 class="usp-title">Vegetarian &amp; Jain Friendly</h3>
        <p class="usp-desc">From pure veg restaurants to Jain dietary requirements, we ensure every meal on your holiday meets your family's needs without compromise.</p>
      </div>
      <div class="usp-card">
        <div class="usp-icon">&#128142;</div>
        <h3 class="usp-title">Handpicked Hotels</h3>
        <p class="usp-desc">Every hotel is personally vetted. We choose properties that combine comfort, character, and excellent service so your family can truly relax.</p>
      </div>
      <div class="usp-card">
        <div class="usp-icon">&#9993;</div>
        <h3 class="usp-title">Small Groups, Big Experiences</h3>
        <p class="usp-desc">Maximum 26 guests per tour means more personal attention, better experiences, and the flexibility to make each journey special.</p>
      </div>
    </div>
  </div>
</section>

<!-- ════════════ TESTIMONIALS ════════════ -->
<section class="section cream-bg">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">What Our Travellers Say</h2>
      <p class="section-subtitle">Real stories from families who trusted us with their holiday.</p>
      <div class="section-divider"></div>
    </div>
    <div class="testimonial-grid">
      <div class="testimonial-card">
        <div class="testimonial-quote-mark">&ldquo;</div>
        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p class="testimonial-text">Ashfield understood exactly what our family needed. My parents were comfortable with the vegetarian food and translator support, while the kids loved the houseboat experience.</p>
        <div class="testimonial-author">
          <div class="testimonial-avatar">RP</div>
          <div>
            <div class="testimonial-name">Ravi &amp; Priya Patel</div>
            <div class="testimonial-trip">Kerala Backwaters &bull; Oct 2025</div>
          </div>
        </div>
      </div>
      <div class="testimonial-card">
        <div class="testimonial-quote-mark">&ldquo;</div>
        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p class="testimonial-text">The Golden Triangle tour was perfectly paced. Sreekanth personally called us before the trip to understand our requirements. That level of care is rare in this industry.</p>
        <div class="testimonial-author">
          <div class="testimonial-avatar">AS</div>
          <div>
            <div class="testimonial-name">Anita Shah</div>
            <div class="testimonial-trip">Golden Triangle &bull; Dec 2025</div>
          </div>
        </div>
      </div>
      <div class="testimonial-card">
        <div class="testimonial-quote-mark">&ldquo;</div>
        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p class="testimonial-text">We booked the Kerala-Dubai combo and it was the best holiday we have ever had. Everything was seamless, from the flights to the transfers. Absolutely will book again.</p>
        <div class="testimonial-author">
          <div class="testimonial-avatar">JN</div>
          <div>
            <div class="testimonial-name">Jay &amp; Nisha Mehta</div>
            <div class="testimonial-trip">Kerala + Dubai &bull; Feb 2026</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ════════════ BLOG / INSPIRATION ════════════ -->
<section class="section">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Travel Inspiration</h2>
      <p class="section-subtitle">Tips, guides, and stories to help you plan your perfect family holiday.</p>
      <div class="section-divider"></div>
    </div>
    <div class="blog-grid">
      <div class="blog-card">
        <div class="blog-card-img">
          <img src="https://images.unsplash.com/photo-1593693411515-c20261bcad6e?w=500&q=80" alt="Kerala Guide">
        </div>
        <div class="blog-card-body">
          <div class="blog-tag">Destination Guide</div>
          <h3 class="blog-title">The Complete Guide to Kerala for First-Time Visitors</h3>
          <p class="blog-excerpt">Everything you need to know about visiting God's Own Country — from the best time to go to must-see experiences.</p>
          <a href="#" class="blog-link">Read more <span>&#10132;</span></a>
        </div>
      </div>
      <div class="blog-card">
        <div class="blog-card-img">
          <img src="https://images.unsplash.com/photo-1585135497273-1a86b09fe70e?w=500&q=80" alt="Family Travel">
        </div>
        <div class="blog-card-body">
          <div class="blog-tag">Family Travel</div>
          <h3 class="blog-title">Travelling to India with Elderly Parents: A Practical Guide</h3>
          <p class="blog-excerpt">How to plan a comfortable, enjoyable Indian holiday that works for every generation in your family.</p>
          <a href="#" class="blog-link">Read more <span>&#10132;</span></a>
        </div>
      </div>
      <div class="blog-card">
        <div class="blog-card-img">
          <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=500&q=80" alt="Dubai">
        </div>
        <div class="blog-card-body">
          <div class="blog-tag">New Destination</div>
          <h3 class="blog-title">Why Dubai Is the Perfect Stopover Before India</h3>
          <p class="blog-excerpt">Combine the glamour of Dubai with the soul of India for the ultimate family holiday experience.</p>
          <a href="#" class="blog-link">Read more <span>&#10132;</span></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ════════════ NEWSLETTER / BROCHURE ════════════ -->
<section class="newsletter">
  <div class="container">
    <div class="newsletter-content">
      <h2 class="newsletter-title">Get Our Free Brochure</h2>
      <p class="newsletter-text">Receive our latest brochure packed with tour details, pricing, and exclusive early-bird offers delivered to your inbox.</p>
    </div>
    <form class="newsletter-form" onsubmit="return false;">
      <input type="email" class="newsletter-input" placeholder="Enter your email address">
      <button class="btn-brochure">Send Brochure</button>
    </form>
  </div>
</section>

<!-- ════════════ FOOTER ════════════ -->
<footer class="footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <div class="brand-name">Ashfield Travel</div>
        <p class="brand-desc">Curated holidays designed for British-Indian families. Based in the UK, with expert ground teams across India and Dubai.</p>
        <div class="footer-social">
          <a href="#" title="Facebook">f</a>
          <a href="#" title="Instagram">&#9679;</a>
          <a href="#" title="WhatsApp">W</a>
          <a href="#" title="YouTube">&#9654;</a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Destinations</h4>
        <a href="#">Kerala</a>
        <a href="#">Golden Triangle</a>
        <a href="#">Kashmir</a>
        <a href="#">Rajasthan</a>
        <a href="#">Dubai</a>
        <a href="#">Goa</a>
      </div>
      <div class="footer-col">
        <h4>Tour Types</h4>
        <a href="#">Group Tours</a>
        <a href="#">Private Tours</a>
        <a href="#">Tailor-Made</a>
        <a href="#">Family Packages</a>
        <a href="#">Honeymoons</a>
      </div>
      <div class="footer-col">
        <h4>Company</h4>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
        <a href="#">Brochures</a>
        <a href="#">Blog</a>
        <a href="#">Terms &amp; Conditions</a>
        <a href="#">Privacy Policy</a>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <?php echo date('Y'); ?> Ashfield Travel Ltd. All rights reserved.</span>
      <div class="footer-badges">
        <span class="footer-badge">ATOL Protected</span>
        <span class="footer-badge">TTA Member</span>
      </div>
    </div>
  </div>
</footer>

<!-- ════════════ STICKY BROCHURE BUTTON ════════════ -->
<button class="sticky-brochure">
  Request a brochure
  <span class="arrow-circle">&#10132;</span>
</button>

<!-- ════════════ MOBILE CTA BAR ════════════ -->
<div class="mobile-cta">
  <div class="mobile-cta-inner">
    <a href="tel:+447587671758"><button class="btn-mobile call">&#9742; Call Us</button></a>
    <button class="btn-mobile enquire">Enquire Now &#10132;</button>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
