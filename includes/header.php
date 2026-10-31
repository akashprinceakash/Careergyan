<?php
/**
 * Site header. Pages set before including:
 *   $page_title, $page_desc (optional), $active (nav key), $og_image (optional)
 */
$page_title = $page_title ?? 'Career Gyan | Study Abroad Consultants in India';
$page_desc = $page_desc ?? 'Career Gyan is an ICEF-accredited study abroad consultancy helping Indian students with university admissions, visas, education loans and accommodation across 19 countries.';
$active = $active ?? '';
$nav_countries = cg_countries();
function nav_on($key, $active) { return $key === $active ? ' class="is-active" aria-current="page"' : ''; }
?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="<?= e(cg_base()) ?>">
  <title><?= e($page_title) ?></title>
  <meta name="description" content="<?= e($page_desc) ?>">
  <meta property="og:title" content="<?= e($page_title) ?>">
  <meta property="og:description" content="<?= e($page_desc) ?>">
  <meta property="og:image" content="<?= e($og_image ?? 'assets/img/photos/hero-students.jpg') ?>">
  <link rel="icon" href="assets/img/brand/logo.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/site.css">
  <script>
    (function (d) {
      d.classList.add('js');
      if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
      d.classList.add('motion-ready');
      // Never leave content hidden if the Motion CDN fails to load
      setTimeout(function () { if (!window.Motion) d.classList.remove('motion-ready'); }, 2500);
    })(document.documentElement);
  </script>
  <script src="https://cdn.jsdelivr.net/npm/motion@11.11.13/dist/motion.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js" defer></script>
  <script src="assets/js/site.js" defer></script>
</head>
<body>
<a class="skip" href="#main">Skip to content</a>

<div class="topbar">
  <div class="container topbar__in">
    <div class="topbar__l">
      <a href="tel:<?= CG_PHONE_RAW ?>"><?= icon('phone', 'ico ico--xs') ?><?= CG_PHONE ?></a>
      <a href="mailto:<?= CG_EMAIL ?>"><?= icon('mail', 'ico ico--xs') ?><?= CG_EMAIL ?></a>
    </div>
    <div class="topbar__r">
      <a href="contact.php#offices"><?= icon('pin', 'ico ico--xs') ?>Bangalore · Hyderabad · Pune · Bahrain · Germany</a>
      <span class="topbar__social">
        <a href="https://www.facebook.com/Careergyanblr" target="_blank" rel="noopener" aria-label="Facebook"><?= icon('facebook', 'ico ico--xs') ?></a>
        <a href="https://www.instagram.com/careergyanabroad" target="_blank" rel="noopener" aria-label="Instagram"><?= icon('instagram', 'ico ico--xs') ?></a>
        <a href="https://www.youtube.com/@careergyanblr" target="_blank" rel="noopener" aria-label="YouTube"><?= icon('youtube', 'ico ico--xs') ?></a>
        <a href="https://www.linkedin.com/company/career-gyan-pvt-ltd" target="_blank" rel="noopener" aria-label="LinkedIn"><?= icon('linkedin', 'ico ico--xs') ?></a>
      </span>
    </div>
  </div>
</div>

<header class="header" id="header">
  <div class="container header__in">
    <a class="header__logo" href="index.php"><img src="assets/img/brand/logo.png" alt="Career Gyan" width="170" height="44"></a>

    <nav class="nav" id="nav" aria-label="Main">
      <a href="about-us.php"<?= nav_on('about', $active) ?>>About</a>

      <div class="nav__item nav__item--mega">
        <button class="nav__btn<?= $active === 'countries' ? ' is-active' : '' ?>" aria-expanded="false">Destinations <?= icon('chevron', 'ico ico--xs') ?></button>
        <div class="mega">
          <div class="mega__grid">
            <?php foreach ($nav_countries as $nc): ?>
              <a href="<?= e($nc['file']) ?>"><?= flag_img($nc, 22) ?><?= e($nc['name']) ?></a>
            <?php endforeach; ?>
          </div>
          <a class="mega__promo" href="all-countries.php">
            <img src="assets/img/photos/country/uk.jpg" alt="" loading="lazy">
            <span><b>Compare all 19 destinations</b>Fees, work rights and intakes side by side <?= icon('arrow', 'ico ico--xs') ?></span>
          </a>
        </div>
      </div>

      <a href="courses.php"<?= nav_on('courses', $active) ?>>Courses</a>
      <a href="other-services.php"<?= nav_on('services', $active) ?>>Services</a>
      <a href="events.php"<?= nav_on('events', $active) ?>>Events</a>

      <div class="nav__item">
        <button class="nav__btn<?= in_array($active, ['blogs', 'ebook', 'gallery', 'eligibility'], true) ? ' is-active' : '' ?>" aria-expanded="false">Resources <?= icon('chevron', 'ico ico--xs') ?></button>
        <div class="drop">
          <a href="blogs.php"><?= icon('file', 'ico ico--sm') ?><span><b>Blogs</b>Guides and country updates</span></a>
          <a href="ebook.php"><?= icon('book', 'ico ico--sm') ?><span><b>E-Books</b>Free monthly study abroad guide</span></a>
          <a href="check_eligibility.php"><?= icon('shield', 'ico ico--sm') ?><span><b>Germany eligibility</b>Opportunity Card points check</span></a>
          <a href="gallery.php"><?= icon('users', 'ico ico--sm') ?><span><b>Gallery</b>Fairs, meetups and student moments</span></a>
          <a href="https://qckloans.com/loans/" target="_blank" rel="noopener"><?= icon('bank', 'ico ico--sm') ?><span><b>Student loan</b>Apply with our lending partner</span></a>
        </div>
      </div>

      <a href="contact.php"<?= nav_on('contact', $active) ?>>Contact</a>
      <a class="btn btn--primary nav__cta" href="contact.php">Free counselling</a>
    </nav>

    <div class="header__actions">
      <a class="btn btn--primary" href="contact.php">Free counselling</a>
      <button class="burger" id="burger" aria-label="Open menu" aria-expanded="false" aria-controls="nav"><?= icon('menu', 'ico') ?></button>
    </div>
  </div>
</header>

<main id="main">
