/**
 * Ashfield Travel — Front-end JavaScript
 * Handles: filter pills, sticky header, mobile menu, scroll animations
 */

(function () {
  'use strict';

  /* ────────────────────────────────────
     Filter Pills (homepage category nav)
     ──────────────────────────────────── */
  function initFilterPills() {
    var pills = document.querySelectorAll('.at-filter-pill');
    if (!pills.length) return;

    pills.forEach(function (pill) {
      pill.addEventListener('click', function () {
        pills.forEach(function (p) { p.classList.remove('active'); });
        this.classList.add('active');
      });
    });
  }

  /* ────────────────────────────────────
     Sticky header — add shadow on scroll
     ──────────────────────────────────── */
  function initStickyHeader() {
    var header = document.querySelector('.site-header');
    if (!header) return;

    window.addEventListener('scroll', function () {
      if (window.scrollY > 60) {
        header.style.boxShadow = '0 2px 20px rgba(0,0,0,0.10)';
      } else {
        header.style.boxShadow = 'none';
      }
    }, { passive: true });
  }

  /* ────────────────────────────────────
     Sticky brochure button — hide near footer
     ──────────────────────────────────── */
  function initStickyBrochure() {
    var btn    = document.querySelector('.at-sticky-brochure');
    var footer = document.querySelector('.site-footer');
    if (!btn || !footer) return;

    window.addEventListener('scroll', function () {
      var footerTop  = footer.getBoundingClientRect().top;
      var windowH    = window.innerHeight;
      if (footerTop < windowH) {
        btn.style.opacity = '0';
        btn.style.pointerEvents = 'none';
      } else {
        btn.style.opacity = '1';
        btn.style.pointerEvents = 'auto';
      }
    }, { passive: true });
  }

  /* ────────────────────────────────────
     Fade-in on scroll (IntersectionObserver)
     ──────────────────────────────────── */
  function initScrollReveal() {
    if (!('IntersectionObserver' in window)) return;

    var targets = document.querySelectorAll(
      '.at-dest-card, .at-tour-card, .at-type-tile, .at-usp-card, .at-testimonial-card, .at-blog-card'
    );

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.style.opacity  = '1';
          entry.target.style.transform = 'translateY(0)';
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });

    targets.forEach(function (el, i) {
      el.style.opacity    = '0';
      el.style.transform  = 'translateY(20px)';
      el.style.transition = 'opacity 0.5s ease ' + (i % 4 * 0.08) + 's, transform 0.5s ease ' + (i % 4 * 0.08) + 's';
      observer.observe(el);
    });
  }

  /* ────────────────────────────────────
     Mobile menu toggle (GP generates
     its own but this backs it up)
     ──────────────────────────────────── */
  function initMobileMenu() {
    var toggle = document.querySelector('.menu-toggle');
    if (!toggle) return;
    toggle.addEventListener('click', function () {
      document.body.classList.toggle('mobile-menu-open');
    });
  }

  /* ────────────────────────────────────
     Boot
     ──────────────────────────────────── */
  document.addEventListener('DOMContentLoaded', function () {
    initFilterPills();
    initStickyHeader();
    initStickyBrochure();
    initScrollReveal();
    initMobileMenu();
  });

})();
