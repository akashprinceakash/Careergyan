<?php
require __DIR__ . '/includes/bootstrap.php';
$page_title = 'Study Abroad Destinations for Indian Students | Career Gyan';
$page_desc = 'Compare 19 study abroad destinations: tuition, living costs, post-study work rights and intakes for Indian students.';
$active = 'countries';
require __DIR__ . '/includes/header.php';
page_hero('Study abroad destinations', 'Compare tuition, living costs, work rights and intakes across 19 countries.', 'photos/country/netherlands.jpg', ['Destinations' => '']);
$countries = cg_countries();
?>

<section class="section">
  <div class="container">
    <div class="tabs" role="tablist" aria-label="Filter destinations" data-filter="#allDest" data-reveal>
      <button role="tab" aria-selected="true" class="is-on" data-f="all">All countries</button>
      <button role="tab" aria-selected="false" data-f="popular">Most popular</button>
      <button role="tab" aria-selected="false" data-f="europe">Europe</button>
      <button role="tab" aria-selected="false" data-f="low-cost">Low tuition</button>
    </div>
    <div class="cgrid" id="allDest" data-stagger>
      <?php foreach ($countries as $c) country_card($c); ?>
      <a class="ccard ccard--cta" href="contact.php">
        <span class="ccard__body">
          <span class="ccard__ico"><?= icon('compass') ?></span>
          <span class="ccard__name">Can’t decide?</span>
          <span class="ccard__tag">Get a free country recommendation from a counsellor.</span>
          <span class="link">Talk to us <?= icon('arrow', 'ico ico--xs') ?></span>
        </span>
      </a>
    </div>
  </div>
</section>

<section class="section section--tint">
  <div class="container">
    <?php section_head('Compare at a glance', 'Costs and work rights side by side', 'Indicative figures for Indian students. Your counsellor will confirm exact fees for your shortlist.'); ?>
    <div class="tbl-wrap" data-reveal>
      <table class="tbl">
        <thead><tr><th>Country</th><th>Tuition / year</th><th>Living costs</th><th>Post-study work</th><th>Intakes</th></tr></thead>
        <tbody>
          <?php foreach ($countries as $c): ?>
            <tr>
              <td><a class="name" href="<?= e($c['file']) ?>"><?= flag_img($c, 24) ?><?= e($c['name']) ?></a></td>
              <td><?= e($c['tuition']) ?></td><td><?= e($c['living']) ?></td><td><?= e($c['psw']) ?></td><td><?= e($c['intakes']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?php cta_band('Not sure which country fits you?', 'Get a free, unbiased recommendation based on your profile and budget.'); ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
