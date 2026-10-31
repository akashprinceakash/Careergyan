<?php
/** City office landing pages (abroad-education-consultants-in-*.php set $city_key). */
require_once __DIR__ . '/includes/bootstrap.php';
$cities = [
    'bangalore' => ['Bangalore', 0, 'photos/fair/fair-6.jpg'],
    'hyderabad' => ['Hyderabad', 2, 'photos/fair/fair-7.jpg'],
    'pune' => ['Pune', 3, 'photos/fair/fair-2.jpg'],
    'bahrain' => ['Bahrain', 4, 'events/bahrain.jpg'],
];
[$city, $oi, $img] = $cities[$city_key ?? 'bangalore'];
$o = $CG_OFFICES[$oi];
$page_title = 'Study Abroad Consultants in ' . $city . ' | Career Gyan';
$page_desc = 'Visit Career Gyan in ' . $city . ' for free study abroad counselling, university admissions, visas and education loans.';
$active = 'contact';
$needs_recaptcha = true;
require __DIR__ . '/includes/header.php';
page_hero('Study abroad consultants in ' . $city, 'Free counselling, admissions, visas and loans at our ' . $city . ' office.', $img, ['Contact' => 'contact.php', $city => '']);
?>

<section class="section">
  <div class="container split split--form">
    <div class="split__text">
      <?php section_head('Our ' . $city . ' office', 'Walk in for a free counselling session', '', false); ?>
      <div class="card office" data-reveal style="margin-bottom:24px">
        <span class="meta"><?= icon('pin', 'ico ico--xs') ?><?= e($o['addr']) ?></span>
        <?php if ($o['phone']): ?><a class="meta" href="tel:<?= e(str_replace(' ', '', $o['phone'])) ?>"><?= icon('phone', 'ico ico--xs') ?><?= e($o['phone']) ?></a><?php endif; ?>
        <a class="meta" href="mailto:<?= e($o['email']) ?>"><?= icon('mail', 'ico ico--xs') ?><?= e($o['email']) ?></a>
        <span class="meta"><?= icon('clock', 'ico ico--xs') ?>Mon–Sat, 10:00–19:00</span>
      </div>
      <iframe class="map" title="Career Gyan <?= e($city) ?> office on Google Maps" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps?q=<?= rawurlencode($o['addr']) ?>&amp;output=embed" data-reveal></iframe>
    </div>
    <div data-reveal><?php lead_form('Book a session in ' . $city); ?></div>
  </div>
</section>

<section class="section section--tint">
  <div class="container">
    <?php section_head('Services in ' . $city, 'Everything you need, from one office'); ?>
    <div class="sgrid" data-stagger>
      <?php foreach ($CG_SERVICES as $s) service_card($s); ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
