<?php
require __DIR__ . '/includes/bootstrap.php';
$page_title = 'Career Gyan | Study Abroad Consultants in India';
$active = 'home';
$needs_recaptcha = true;
$countries = cg_countries();
require __DIR__ . '/includes/header.php';
?>

<!-- ============ HERO: banner slideshow + departures board ============ -->
<?php
// Departures board rows: next intake + application status per destination (edit as intakes open/close)
$board = [
    'uk' => ['Jan 27', 'closing'], 'usa' => ['Aug 27', 'open'], 'germany' => ['Apr 27', 'closing'], 'canada' => ['Sep 27', 'open'],
    'ireland' => ['Sep 27', 'open'], 'australia' => ['Feb 27', 'closing'], 'france' => ['Sep 27', 'open'], 'italy' => ['Sep 27', 'soon'],
    'netherlands' => ['Sep 27', 'open'], 'new-zealand' => ['Feb 27', 'closing'], 'sweden' => ['Aug 27', 'soon'], 'poland' => ['Oct 27', 'soon'],
];
$status_label = ['open' => 'Open', 'closing' => 'Closing soon', 'soon' => 'Opens soon'];
$board_rows = [];
foreach ($board as $k => [$intake, $st]) {
    $bc = cg_country($k);
    if ($bc) $board_rows[] = ['name' => $bc['short'] === 'UK' || $bc['short'] === 'USA' ? $bc['short'] : $bc['name'], 'file' => $bc['file'], 'intake' => $intake, 'status' => $st, 'label' => $status_label[$st]];
}
?>
<section class="hero" data-parallax-layers>
  <div class="hero__media" data-parallax-layer="1"><div class="hero__slides">
    <img class="slide is-active" src="assets/img/photos/hero-students.jpg" alt="" fetchpriority="high">
    <img class="slide" src="assets/img/photos/country/uk.jpg" alt="" loading="lazy">
    <img class="slide" src="assets/img/photos/graduates.jpg" alt="" loading="lazy">
  </div></div>
  <div class="container hero__grid">
    <div class="hero__copy" data-parallax-layer="3">
      <span class="eyebrow" data-hero-item>ICEF accredited · EAIE &amp; NAFSA member</span>
      <h1 class="hero__title" data-hero-item>Your study abroad journey, <em>guided</em> end to end.</h1>
      <p class="hero__lead" data-hero-item>Expert guidance from admission to visa, and everything in between. Join 6,320+ students who chose the right course, country and university with Career Gyan.</p>
      <div class="hero__actions" data-hero-item>
        <a class="btn btn--accent btn--lg" href="contact.php">Book a free consultation <?= icon('arrow', 'ico ico--sm') ?></a>
        <a class="btn btn--glass btn--lg" href="all-countries.php">Explore destinations</a>
      </div>
      <form class="qfind" action="search_university.php" method="post" data-hero-item aria-label="Find universities">
        <select name="country" aria-label="Country"><option value="">Any country</option><?php foreach (cg_country_titles() as $t): ?><option><?= e($t) ?></option><?php endforeach; ?></select>
        <select name="course_name" aria-label="Course"><option value="">Any course</option><?php foreach (cg_course_titles() as $t): ?><option><?= e($t) ?></option><?php endforeach; ?></select>
        <button class="btn btn--primary" type="submit" name="submit"><?= icon('search', 'ico ico--sm') ?>Search</button>
      </form>
    </div>

    <div class="hero__board" data-parallax-layer="4">
    <aside class="board" aria-label="Upcoming intakes" data-hero-item>
      <div class="board__top">
        <span class="board__title"><?= icon('plane') ?>Departures</span>
        <span class="board__clock" data-clock>--:--</span>
      </div>
      <div class="board__head" aria-hidden="true"><span>Destination</span><span>Intake</span><span>Status</span></div>
      <ol class="board__rows" data-board='<?= e(json_encode($board_rows, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>'>
        <?php foreach (array_slice($board_rows, 0, 6) as $r): ?>
          <li><a class="brow" href="<?= e($r['file']) ?>" aria-label="<?= e($r['name'] . ', intake ' . $r['intake'] . ', ' . $r['label']) ?>">
            <span class="flaps" aria-hidden="true"><?php $n = strtoupper($r['name']); for ($i = 0; $i < 11; $i++): ?><span class="flap"><?= isset($n[$i]) && $n[$i] !== ' ' ? e($n[$i]) : '&nbsp;' ?></span><?php endfor; ?></span>
            <span class="brow__intake"><?= e($r['intake']) ?></span>
            <span class="status status--<?= e($r['status']) ?>"><?= e($r['label']) ?></span>
          </a></li>
        <?php endforeach; ?>
      </ol>
      <p class="board__foot">Typical application windows, updated by our admissions desk.</p>
    </aside>
    </div>
  </div>
  <div class="hero__dots" role="tablist" aria-label="Banner slides">
    <button class="is-active" role="tab" aria-selected="true" aria-label="Slide 1"></button>
    <button role="tab" aria-selected="false" aria-label="Slide 2"></button>
    <button role="tab" aria-selected="false" aria-label="Slide 3"></button>
  </div>
</section>

<!-- ============ STATS ============ -->
<div class="container">
  <ul class="stats" data-stagger>
    <li><span class="stats__ico"><?= icon('users') ?></span><div><b data-count="6320" data-suffix="+">6,320+</b><span>Students placed</span></div></li>
    <li><span class="stats__ico"><?= icon('cap') ?></span><div><b data-count="2500" data-suffix="+">2,500+</b><span>Partner universities</span></div></li>
    <li><span class="stats__ico"><?= icon('shield') ?></span><div><b data-count="95" data-suffix="%">95%</b><span>Visa success rate</span></div></li>
    <li><span class="stats__ico"><?= icon('award') ?></span><div><b data-count="10" data-suffix="+">10+</b><span>Years of experience</span></div></li>
  </ul>
</div>

<!-- ============ ABOUT / WHY ============ -->
<section class="section">
  <div class="container split">
    <div class="collage" data-reveal>
      <img class="collage__a" src="assets/img/photos/fair/fair-6.jpg" alt="Students meeting university delegates at a Career Gyan education fair" loading="lazy">
      <img class="collage__b" src="assets/img/photos/fair/fair-3.jpg" alt="A counsellor guiding a student through university options" loading="lazy">
      <div class="collage__badge"><b>10+</b><span>years guiding<br>Indian students</span></div>
    </div>
    <div class="split__text">
      <?php section_head('Why Career Gyan', 'Guidance that stays with you from first call to first class', '', false); ?>
      <p data-reveal>Choosing a course, a country and a university is one of the biggest decisions of your life. Our counsellors help you decide with clarity, then handle every step after: applications, visas, loans and housing.</p>
      <ul class="features" data-stagger>
        <li><span class="features__ico"><?= icon('users') ?></span><div><h3>One dedicated counsellor</h3><p>The same expert from your first session to your visa.</p></div></li>
        <li><span class="features__ico"><?= icon('globe') ?></span><div><h3>19 countries, 2,500+ universities</h3><p>Unbiased advice across every major destination.</p></div></li>
        <li><span class="features__ico"><?= icon('shield') ?></span><div><h3>Transparent process</h3><p>Every step and fee explained in writing upfront.</p></div></li>
        <li><span class="features__ico"><?= icon('bank') ?></span><div><h3>Loans &amp; housing sorted</h3><p>Lending and accommodation partners built in.</p></div></li>
      </ul>
      <a class="btn btn--outline" href="about-us.php" data-reveal>More about us <?= icon('arrow', 'ico ico--sm') ?></a>
    </div>
  </div>
</section>

<!-- ============ DESTINATIONS ============ -->
<section class="section section--tint">
  <div class="container">
    <?php section_head('Study destinations', 'Explore top countries for Indian students', 'Compare tuition, work rights and intakes, then talk to a counsellor who knows each country.'); ?>
    <div class="tabs" role="tablist" aria-label="Filter destinations" data-filter="#homeDest" data-reveal>
      <button role="tab" aria-selected="true" class="is-on" data-f="all">All</button>
      <button role="tab" aria-selected="false" data-f="popular">Most popular</button>
      <button role="tab" aria-selected="false" data-f="europe">Europe</button>
      <button role="tab" aria-selected="false" data-f="low-cost">Low tuition</button>
    </div>
    <div class="cgrid" id="homeDest" data-stagger>
      <?php $i = 0; foreach ($countries as $c): if ($i++ >= 9) break; country_card($c, $i === 1); endforeach; ?>
    </div>
    <div class="center-row" data-reveal><a class="btn btn--outline" href="all-countries.php">View all 19 destinations <?= icon('arrow', 'ico ico--sm') ?></a></div>
  </div>
</section>

<!-- ============ SERVICES ============ -->
<section class="section">
  <div class="container">
    <?php section_head('Our services', 'Everything you need, under one roof', 'From the first conversation to your first week abroad, one team handles it all.'); ?>
    <div class="sgrid" data-stagger>
      <?php foreach ($CG_SERVICES as $s) service_card($s); ?>
    </div>
    <div class="center-row" data-reveal><a class="btn btn--outline" href="other-services.php">Explore all services <?= icon('arrow', 'ico ico--sm') ?></a></div>
  </div>
</section>

<!-- ============ PROCESS ============ -->
<section class="section section--navy">
  <div class="container">
    <?php section_head('How it works', 'Your study abroad journey in five steps', 'A clear, proven process that has taken over 6,000 students abroad.'); ?>
    <ol class="steps" data-stagger>
      <?php foreach ($CG_STEPS as $i => $s): ?>
        <li class="step">
          <span class="step__n"><?= $i + 1 ?></span>
          <h3><?= e($s['title']) ?></h3>
          <p><?= e($s['text']) ?></p>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<!-- ============ COURSES ============ -->
<section class="section">
  <div class="container">
    <?php section_head('Popular courses', 'Find the right program for your career', '', true); ?>
    <div class="kgrid" data-stagger>
      <?php foreach ($CG_COURSES as $k): ?>
        <a class="kcard" href="course.php?course_name=<?= urlencode($k['title']) ?>">
          <span class="kcard__img"><img src="assets/img/<?= e($k['img']) ?>" alt="" loading="lazy"></span>
          <span class="kcard__body"><b><?= e($k['title']) ?></b><small>Top picks: <?= e($k['note']) ?></small></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="banner-band" data-parallax-root>
  <div class="banner-band__media"><img src="assets/img/photos/graduates.jpg" alt="" loading="lazy" data-parallax></div>
  <div class="container">
    <span class="eyebrow" style="color:var(--gold)" data-reveal>Bright future awaits you</span>
    <h2 data-reveal>From your first question to your <em>first day on campus</em></h2>
    <div class="pillars" data-stagger>
      <div class="pillar"><?= icon('compass') ?><div><h3>Clarity before commitment</h3><p>Honest advice on where your profile is strongest.</p></div></div>
      <div class="pillar"><?= icon('shield') ?><div><h3>Applications done right</h3><p>Documents reviewed and filed before every deadline.</p></div></div>
      <div class="pillar"><?= icon('plane') ?><div><h3>Ready to fly</h3><p>Visa, loan, housing and forex sorted before you board.</p></div></div>
    </div>
  </div>
</section>

<!-- ============ STUDENT STORIES (two-row marquee) ============ -->
<section class="section section--tint stories">
  <div class="container">
    <?php section_head('Student stories', 'Hear it from students who made it', 'Real journeys from counselling to campus. Hover a row to pause it.'); ?>
  </div>
  <?php testimonial_marquee($CG_STORIES); ?>
</section>

<!-- ============ EVENTS ============ -->
<section class="section">
  <div class="container">
    <?php section_head('Upcoming events', 'Meet universities at our fairs and workshops', '', false, '<a class="btn btn--outline" href="events.php" data-reveal>All events ' . icon('arrow', 'ico ico--sm') . '</a>'); ?>
    <div class="egrid">
      <?php foreach (cg_events(3) as $ev) event_card($ev); ?>
    </div>
  </div>
</section>

<!-- ============ PARTNERS ============ -->
<section class="logos" aria-label="Our partners">
  <div class="container logos__in">
    <p>Trusted partners for tests, loans and housing</p>
    <div class="logos__track"><div class="logos__row">
      <?php foreach (['Avanse.png', 'Fintiba.svg', 'Expatrio.svg', 'Coracle.svg', 'ielts.png', 'ets.png', 'qckloans.png', 'universities_living.png', 'roombae.png', 'summit.png'] as $l): ?>
        <img src="assets/img/partners/<?= $l ?>" alt="<?= e(ucfirst(strtok($l, '.'))) ?>" loading="lazy">
      <?php endforeach; ?>
    </div></div>
  </div>
</section>

<!-- ============ BLOGS ============ -->
<section class="section section--tint">
  <div class="container">
    <?php section_head('Insights', 'Latest study abroad guides', '', false, '<a class="btn btn--outline" href="blogs.php" data-reveal>All articles ' . icon('arrow', 'ico ico--sm') . '</a>'); ?>
    <div class="bgrid">
      <?php foreach (cg_blogs(3) as $b) blog_card($b); ?>
    </div>
  </div>
</section>

<!-- ============ CONTACT ============ -->
<section class="section">
  <div class="container split split--form">
    <div class="split__text">
      <?php section_head('Get in touch', 'Talk to a counsellor today', '', false); ?>
      <p data-reveal>Walk in to any of our offices or book a call. Counselling is always free.</p>
      <ul class="offices-mini" data-stagger>
        <?php foreach (array_slice($CG_OFFICES, 0, 5) as $o): ?>
          <li><span class="offices-mini__ico"><?= icon('pin', 'ico ico--sm') ?></span><div><b><?= e($o['city']) ?></b><span><?= e($o['addr']) ?></span></div></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div data-reveal><?php lead_form(); ?></div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
