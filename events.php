<?php
require __DIR__ . '/includes/bootstrap.php';
$page_title = 'Study Abroad Events & Education Fairs | Career Gyan';
$page_desc = 'Meet university delegates at Career Gyan education fairs, workshops and coffee meetups in Bangalore, Hyderabad, Pune and Bahrain.';
$active = 'events';
require __DIR__ . '/includes/header.php';
page_hero('Events & education fairs', 'Meet universities in person, get your profile evaluated and apply with fee waivers.', 'photos/fair/fair-6.jpg', ['Events' => '']);
$events = cg_events(12);
?>

<section class="section">
  <div class="container">
    <?php section_head('Upcoming', 'Register for a free event near you', '', false); ?>
    <?php if ($events): ?>
      <div class="egrid"><?php foreach ($events as $ev) event_card($ev); ?></div>
    <?php else: ?>
      <div class="empty"><?= icon('calendar') ?><p>New events are announced every month. Follow us on Instagram or book a one-to-one session meanwhile.</p></div>
    <?php endif; ?>
  </div>
</section>

<section class="section section--tint">
  <div class="container split">
    <div class="collage" data-reveal>
      <img class="collage__a" src="assets/img/photos/fair/fair-1.jpg" alt="Delegates and students at a Career Gyan education fair" loading="lazy">
      <img class="collage__b" src="assets/img/photos/fair/fair-4.jpg" alt="A student and parent speaking with a university representative" loading="lazy">
      <div class="collage__badge"><b>Free</b><span>entry for students<br>&amp; parents</span></div>
    </div>
    <div class="split__text">
      <?php section_head('Why attend', 'Get more done in one afternoon than in weeks of emails', '', false); ?>
      <ul class="features" data-stagger>
        <li><span class="features__ico"><?= icon('users') ?></span><div><h3>Meet delegates</h3><p>Ask admissions teams your questions directly.</p></div></li>
        <li><span class="features__ico"><?= icon('file') ?></span><div><h3>On-spot evaluation</h3><p>Know your chances before you apply.</p></div></li>
        <li><span class="features__ico"><?= icon('award') ?></span><div><h3>Fee waivers</h3><p>Application fee waivers for attendees.</p></div></li>
        <li><span class="features__ico"><?= icon('bank') ?></span><div><h3>Loan desk</h3><p>Talk to lenders and get pre-approval.</p></div></li>
      </ul>
      <a class="btn btn--outline" href="gallery.php" data-reveal>See event gallery <?= icon('arrow', 'ico ico--sm') ?></a>
    </div>
  </div>
</section>

<?php cta_band('Can’t make it to an event?', 'Book a one-to-one session at your nearest office or online.'); ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
