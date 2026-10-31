<?php
require __DIR__ . '/includes/bootstrap.php';
$page_title = 'About Us | Career Gyan Study Abroad Consultants';
$page_desc = 'Career Gyan has guided 6,320+ Indian students to universities in 19 countries. Our story, values and the way we work.';
$active = 'about';
require __DIR__ . '/includes/header.php';
page_hero('About Career Gyan', 'Honest advice and end-to-end support for Indian students going abroad.', 'photos/fair/fair-7.jpg', ['About us' => '']);
$journey = [
    ['Month 1', 'First conversation', 'A free session on your grades, budget and goals.', 'photos/fair/fair-3.jpg'],
    ['Month 1–2', 'Your shortlist', 'Countries and 6–10 universities matched to your profile.', 'photos/library-study.jpg'],
    ['Month 2–4', 'Applications', 'SOPs, LORs and forms prepared and submitted on time.', 'photos/study.jpg'],
    ['Month 4–6', 'Offers & funding', 'Offer letters compared, loans and blocked accounts arranged.', 'photos/advisor.jpg'],
    ['Month 6–8', 'Visa', 'Your file reviewed, appointment booked, interview practised.', 'banners/london.jpg'],
    ['Departure', 'Fly & settle in', 'Housing, forex and a briefing with students already there.', 'banners/plane.jpg'],
];
?>

<!-- Manifesto: words fill in as you scroll -->
<section class="section manifesto-sec">
  <div class="container">
    <span class="eyebrow" data-reveal>Who we are</span>
    <p class="manifesto" data-manifesto>
      For over a decade we have helped
      <span class="pic"><img src="assets/img/photos/fair/fair-6.jpg" alt="" loading="lazy"></span>
      6,320+ Indian students turn a vague plan to study abroad into an admit, a visa and a
      <span class="pic"><img src="assets/img/photos/graduates.jpg" alt="" loading="lazy"></span>
      first day on campus, with honest advice and one counsellor who stays with them
      <span class="pic"><img src="assets/img/banners/plane.jpg" alt="" loading="lazy"></span>
      all the way.
    </p>
  </div>
</section>

<!-- Numbers -->
<div class="container">
  <ul class="stats stats--flat" data-stagger>
    <li><span class="stats__ico"><?= icon('users') ?></span><div><b data-count="6320" data-suffix="+">6,320+</b><span>Students placed</span></div></li>
    <li><span class="stats__ico"><?= icon('cap') ?></span><div><b data-count="2500" data-suffix="+">2,500+</b><span>Partner universities</span></div></li>
    <li><span class="stats__ico"><?= icon('globe') ?></span><div><b data-count="19">19</b><span>Countries</span></div></li>
    <li><span class="stats__ico"><?= icon('pin') ?></span><div><b data-count="5">5</b><span>Cities with offices</span></div></li>
  </ul>
</div>

<!-- Story + collage -->
<section class="section">
  <div class="container split">
    <div class="photostack" data-reveal>
      <img class="photostack__a" src="assets/img/photos/fair/fair-2.jpg" alt="A Career Gyan counsellor reviewing brochures with a student" loading="lazy" data-depth="10">
      <img class="photostack__b" src="assets/img/photos/fair/fair-5.jpg" alt="Students discussing options at a Career Gyan event" loading="lazy" data-depth="24">
      <div class="photostack__tag" data-depth="36"><?= icon('award', 'ico ico--sm') ?><span><b>ICEF accredited</b>NAFSA &amp; EAIE member</span></div>
    </div>
    <div class="split__text">
      <?php section_head('Our story', 'Built in Bangalore, now helping students across India and the Gulf', '', false); ?>
      <p data-reveal>Career Gyan started with a simple idea: students and parents deserve straight answers about studying abroad. Today our counsellors work from Bangalore, Hyderabad, Pune, Bahrain and Germany.</p>
      <p data-reveal>We partner with 2,500+ universities, lenders and housing providers, so every part of your move is handled by one team that knows you.</p>
      <div class="accrow" data-reveal>
        <?php foreach (['ICEF_blue.png' => 'ICEF accredited', 'NAFSA.png' => 'NAFSA member', 'EAIE.png' => 'EAIE member'] as $img => $alt): ?>
          <img src="assets/img/accreditation/<?= $img ?>" alt="<?= e($alt) ?>" loading="lazy">
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- Horizontal journey (pinned on desktop) -->
<section class="hjourney" data-hscroll>
  <div class="hjourney__pin">
    <div class="container hjourney__head">
      <div>
        <span class="eyebrow">A year with us</span>
        <h2 class="h2"><?= cg_em('What working with Career Gyan looks like') ?></h2>
      </div>
      <div class="hjourney__bar" aria-hidden="true"><span data-hscroll-bar></span></div>
    </div>
    <ol class="hjourney__track" data-hscroll-track>
      <?php foreach ($journey as $i => [$when, $title, $text, $img]): ?>
        <li class="jcard">
          <img src="assets/img/<?= e($img) ?>" alt="" loading="lazy">
          <div class="jcard__body">
            <span class="jcard__when"><?= e($when) ?></span>
            <h3><span><?= $i + 1 ?></span><?= e($title) ?></h3>
            <p><?= e($text) ?></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<!-- Values bento -->
<section class="section">
  <div class="container">
    <?php section_head('Our values', 'What every student can expect from us'); ?>
    <div class="vbento" data-stagger>
      <article class="vbento__photo"><img src="assets/img/photos/fair/fair-1.jpg" alt="" loading="lazy" data-depth="12"><div><h3>Students first</h3><p>We recommend what is right for you, even when it is not the most expensive option.</p></div></article>
      <article class="vbento__tile"><span class="scard__ico"><?= icon('shield') ?></span><h3>Honesty</h3><p>Realistic admit chances, written fees and no surprises.</p></article>
      <article class="vbento__tile vbento__tile--navy"><span class="scard__ico"><?= icon('users') ?></span><h3>One team</h3><p>Admissions, visas, loans and housing handled together.</p></article>
      <article class="vbento__tile vbento__tile--accent"><span class="scard__ico"><?= icon('award') ?></span><h3>Expertise</h3><p>ICEF-trained counsellors who visit partner universities.</p></article>
      <article class="vbento__tile"><span class="scard__ico"><?= icon('clock') ?></span><h3>Responsiveness</h3><p>Replies within one working day, every time.</p></article>
    </div>
  </div>
</section>

<!-- Offices strip -->
<section class="section section--tint">
  <div class="container">
    <?php section_head('Our offices', 'Five cities, one way of working'); ?>
    <div class="citystrip" data-stagger>
      <?php foreach ($CG_OFFICES as $o): ?>
        <a class="citycard" href="<?= e($o['page']) ?>">
          <span class="citycard__tag"><?= e($o['tag']) ?></span>
          <b><?= e($o['city']) ?></b>
          <span class="citycard__addr"><?= e($o['addr']) ?></span>
          <span class="link">Visit us <?= icon('arrow', 'ico ico--xs') ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php cta_band(); ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
