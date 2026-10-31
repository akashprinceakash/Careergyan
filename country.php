<?php
/**
 * "Study in <country>" page. Each study-in-*.php file sets $slug and includes this,
 * so the live site's URLs stay unchanged.
 */
require_once __DIR__ . '/includes/bootstrap.php';
$slug = $slug ?? ($_GET['c'] ?? '');
$c = cg_country($slug);
if (!$c) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    return;
}
$page_title = 'Study in ' . $c['name'] . ' for Indian Students | Career Gyan';
$page_desc = $c['intro'];
$og_image = 'assets/img/' . $c['img'];
$active = 'countries';
$needs_recaptcha = true;
require __DIR__ . '/includes/header.php';

page_hero('Study in ' . $c['name'], $c['tagline'], $c['img'], ['Destinations' => 'all-countries.php', $c['name'] => '']);

$faqs = [
    ['Can Indian students work while studying in ' . $c['name'] . '?', 'Yes. Most student visas allow part-time work during term and full-time work in scheduled breaks. Your counsellor will explain the exact limits for your visa.'],
    ['What are the English requirements?', 'Typical requirements are ' . $c['test'] . '. Some universities accept Medium of Instruction letters or waive tests for strong academic profiles.'],
    ['When should I start my application?', 'Start 9–12 months before your intake. Main intakes for ' . $c['name'] . ' are ' . $c['intakes'] . '.'],
    ['Can I stay and work after graduating?', 'Graduates can usually stay for ' . $c['psw'] . ' to look for work or gain experience, subject to visa rules at the time.'],
];
?>

<section class="section">
  <div class="container layout">
    <div>
      <div class="facts" data-stagger>
        <div class="fact"><span class="fact__ico"><?= icon('cap') ?></span><div><span>Tuition per year</span><b><?= e($c['tuition']) ?></b></div></div>
        <div class="fact"><span class="fact__ico"><?= icon('home') ?></span><div><span>Living costs</span><b><?= e($c['living']) ?></b></div></div>
        <div class="fact"><span class="fact__ico"><?= icon('passport') ?></span><div><span>Post-study work</span><b><?= e($c['psw']) ?></b></div></div>
        <div class="fact"><span class="fact__ico"><?= icon('calendar') ?></span><div><span>Main intakes</span><b><?= e($c['intakes']) ?></b></div></div>
        <div class="fact"><span class="fact__ico"><?= icon('file') ?></span><div><span>English tests</span><b><?= e($c['test']) ?></b></div></div>
        <div class="fact"><span class="fact__ico"><?= icon('award') ?></span><div><span>Partner universities</span><b>Ask your counsellor</b></div></div>
      </div>

      <div class="block" data-reveal>
        <h2>Why study in <?= e($c['name']) ?>?</h2>
        <div class="prose"><p><?= e($c['intro']) ?></p></div>
        <ul class="checklist">
          <li><?= icon('check') ?><span>Globally recognised degrees valued by employers in India and abroad</span></li>
          <li><?= icon('check') ?><span><?= e($c['psw']) ?> of post-study work rights</span></li>
          <li><?= icon('check') ?><span>Scholarships and education loans available for Indian students</span></li>
          <li><?= icon('check') ?><span>Large Indian student community and support networks</span></li>
        </ul>
      </div>

      <div class="block" data-reveal>
        <h2>Top universities in <?= e($c['name']) ?></h2>
        <ul class="uni-list">
          <?php foreach ($c['unis'] as $u): ?><li><?= icon('cap', 'ico ico--sm') ?><?= e($u) ?></li><?php endforeach; ?>
        </ul>
      </div>

      <div class="block" data-reveal>
        <h2>Popular courses</h2>
        <div class="chips">
          <?php foreach ($c['courses'] as $k): ?><a href="search_university.php?country=<?= urlencode($c['name']) ?>&amp;course_name=<?= urlencode($k) ?>"><?= e($k) ?></a><?php endforeach; ?>
        </div>
      </div>

      <div class="block" data-reveal>
        <h2>How we help you get there</h2>
        <ol class="steps steps--light" data-stagger>
          <?php foreach ($CG_STEPS as $i => $s): ?>
            <li class="step"><span class="step__n"><?= $i + 1 ?></span><h3><?= e($s['title']) ?></h3><p><?= e($s['text']) ?></p></li>
          <?php endforeach; ?>
        </ol>
      </div>

      <div class="block" data-reveal>
        <h2>Frequently asked questions</h2>
        <div class="faq">
          <?php foreach ($faqs as $i => $f): ?>
            <details<?= $i === 0 ? ' open' : '' ?>><summary><?= e($f[0]) ?><?= icon('chevron', 'ico ico--sm') ?></summary><p><?= e($f[1]) ?></p></details>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <aside class="sticky">
      <?php lead_form('Plan your ' . $c['name'] . ' application', 'Free profile evaluation for ' . $c['name'] . ' within 48 hours.'); ?>
      <div class="card card--navy">
        <h3>Other destinations</h3>
        <div class="chips">
          <?php $n = 0; foreach (cg_countries() as $k => $o): if ($k === $slug || $n++ >= 8) continue; ?>
            <a href="<?= e($o['file']) ?>"><?= e($o['short']) ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    </aside>
  </div>
</section>

<?php cta_band('Ready to study in ' . $c['name'] . '?', 'Talk to a counsellor who has placed hundreds of students there.', $c['img']); ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
