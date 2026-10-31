<?php
require __DIR__ . '/includes/bootstrap.php';
$page_title = 'Study Abroad Services | Career Gyan';
$page_desc = 'Counselling, university shortlisting, SOP and application support, visas, education loans, accommodation and test preparation.';
$active = 'services';
require __DIR__ . '/includes/header.php';
page_hero('Everything you need to study abroad', 'Six services, one team, one counsellor who stays with you until you land.', 'photos/advisor.jpg', ['Services' => '']);
?>

<!-- Intro statement -->
<section class="section">
  <div class="container split">
    <div class="split__text">
      <?php section_head('What we do', 'One team for every step between here and there', '', false); ?>
      <p data-reveal>Most students juggle a consultant, a bank, a test centre and a housing website. With Career Gyan, admissions, money, visas and housing are handled together, so nothing falls between the cracks.</p>
      <div class="chipstats" data-stagger>
        <div><b data-count="6320" data-suffix="+">6,320+</b><span>students placed</span></div>
        <div><b data-count="95" data-suffix="%">95%</b><span>visa success</span></div>
        <div><b data-count="2500" data-suffix="+">2,500+</b><span>universities</span></div>
      </div>
    </div>
    <div class="photostack" data-reveal>
      <img class="photostack__a" src="assets/img/photos/fair/fair-2.jpg" alt="A counsellor walking a student through university options" loading="lazy" data-depth="10">
      <img class="photostack__b" src="assets/img/photos/housing.jpg" alt="A furnished student room" loading="lazy" data-depth="24">
      <div class="photostack__tag" data-depth="36"><?= icon('shield', 'ico ico--sm') ?><span><b>One counsellor</b>from first call to visa</span></div>
    </div>
  </div>
</section>

<!-- Stacking service cards -->
<section class="section section--tint stack-sec">
  <div class="container">
    <?php section_head('Our services', 'Six services, scroll through each one'); ?>
    <div class="stack">
      <?php foreach ($CG_SERVICES as $i => $s): ?>
        <article class="stack-card" style="--i: <?= $i ?>">
          <div class="stack-card__body">
            <span class="stack-card__n"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?> / <?= str_pad((string) count($CG_SERVICES), 2, '0', STR_PAD_LEFT) ?></span>
            <span class="scard__ico"><?= icon($s['icon']) ?></span>
            <h3><?= e($s['title']) ?></h3>
            <p><?= e($s['text']) ?></p>
            <ul class="checklist">
              <?php foreach ($s['points'] as $pt): ?><li><?= icon('check') ?><span><?= e($pt) ?></span></li><?php endforeach; ?>
            </ul>
            <a class="link" href="contact.php">Get started <?= icon('arrow', 'ico ico--xs') ?></a>
          </div>
          <div class="stack-card__media"><img src="assets/img/<?= e($s['img']) ?>" alt="" loading="lazy"></div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Test prep bento -->
<section class="section">
  <div class="container">
    <?php section_head('Test preparation', 'Coaching for the scores your universities ask for'); ?>
    <div class="tbento" data-stagger>
      <article class="tbento__big">
        <img src="assets/img/photos/library-study.jpg" alt="" loading="lazy" data-depth="12">
        <div><span class="eyebrow">Most popular</span><h3>IELTS coaching</h3><p>Strategies for all four modules, weekly mock tests and one-to-one speaking practice.</p><a class="btn btn--accent" href="contact.php">Book a demo class</a></div>
      </article>
      <article class="tbento__tile"><span class="tbento__k">TOEFL</span><p>iBT practice with full-length mock tests.</p></article>
      <article class="tbento__tile tbento__tile--navy"><span class="tbento__k">GRE / GMAT</span><p>Quant and verbal prep for top programmes.</p></article>
      <article class="tbento__tile tbento__tile--accent"><span class="tbento__k">German A1–B2</span><p>Language coaching for Germany and the Opportunity Card.</p></article>
      <article class="tbento__tile"><span class="tbento__k">PTE</span><p>Computer-based practice with instant scoring.</p></article>
    </div>
  </div>
</section>

<!-- Partners -->
<section class="logos" aria-label="Our partners">
  <div class="container logos__in">
    <p>Loan, housing and testing partners we work with</p>
    <div class="logos__track"><div class="logos__row">
      <?php foreach (['Avanse.png', 'Fintiba.svg', 'Expatrio.svg', 'Coracle.svg', 'ielts.png', 'ets.png', 'qckloans.png', 'universities_living.png', 'roombae.png', 'summit.png'] as $l): ?>
        <img src="assets/img/partners/<?= $l ?>" alt="<?= e(ucfirst(strtok($l, '.'))) ?>" loading="lazy">
      <?php endforeach; ?>
    </div></div>
  </div>
</section>

<!-- FAQ -->
<section class="section">
  <div class="container faqsplit">
    <div class="faqsplit__intro">
      <?php section_head('Questions', 'Good to know before you start', '', false); ?>
      <p data-reveal>Can’t find your answer? Our counsellors reply within one working day.</p>
      <a class="btn btn--primary" href="contact.php" data-reveal>Ask a counsellor</a>
    </div>
    <div class="faq" data-stagger>
      <details open><summary>Is counselling really free?<?= icon('chevron', 'ico ico--sm') ?></summary><p>Yes. Your first counselling session and profile evaluation are always free, with no obligation to continue.</p></details>
      <details><summary>Can I use just one service, like visas or loans?<?= icon('chevron', 'ico ico--sm') ?></summary><p>Yes. You can choose individual services, though most students find it easier when one team handles everything.</p></details>
      <details><summary>How early should I start?<?= icon('chevron', 'ico ico--sm') ?></summary><p>Ideally 9–12 months before your intake. That leaves time for tests, applications, loans and visas without rushing.</p></details>
      <details><summary>Do you help after I arrive?<?= icon('chevron', 'ico ico--sm') ?></summary><p>Yes. We connect you with students already there and help with accommodation, banking and settling-in questions.</p></details>
    </div>
  </div>
</section>

<?php cta_band(); ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
