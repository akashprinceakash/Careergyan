<?php
require __DIR__ . '/includes/bootstrap.php';
$page_title = 'Germany Opportunity Card (Chancenkarte) Eligibility Check | Career Gyan';
$page_desc = 'Check your Germany Opportunity Card points in two minutes and get expert help with your Chancenkarte application.';
$active = 'eligibility';
$needs_recaptcha = true;
require __DIR__ . '/includes/header.php';
page_hero('Germany Opportunity Card eligibility', 'Answer a few quick questions to estimate your Chancenkarte points. You need 6 points to qualify.', 'photos/country/germany.jpg', ['Resources' => '', 'Eligibility check' => '']);

// [field, label, options [value => [label, points]]] — field names match eligibility_form_process.php
$q = [
    ['qualification', 'Your highest qualification', ['Degree (fully recognised in Germany)' => ['Degree, fully recognised in Germany', 6], 'Degree (partially recognised)' => ['Degree, partially recognised', 4], 'Degree or 2-yr vocational (not yet recognised)' => ['Degree or 2-year diploma, not yet recognised', 0]]],
    ['experience', 'Relevant work experience', ['5+ years in last 7' => ['5+ years in the last 7', 3], '2+ years in last 5' => ['2+ years in the last 5', 2], 'Less than 2 years' => ['Less than 2 years', 0]]],
    ['language', 'German language level', ['B2 or higher' => ['B2 or higher', 3], 'B1' => ['B1', 2], 'A2' => ['A2', 1], 'A1 / none' => ['A1 or none', 0]]],
    ['age', 'Your age', ['Under 35' => ['Under 35', 2], '35 to 40' => ['35 to 40', 1], 'Over 40' => ['Over 40', 0]]],
    ['previous_stay', 'Previous stay in Germany (6+ months)', ['Yes' => ['Yes', 1], 'No' => ['No', 0]]],
    ['english', 'English level C1 or higher', ['Yes' => ['Yes', 1], 'No' => ['No', 0]]],
    ['passport', 'Do you hold a valid passport?', ['Yes' => ['Yes', 0], 'No' => ['Not yet', 0]]],
];
?>

<section class="section">
  <div class="container layout">
    <!-- Points calculator → existing eligibility_form_process.php (eligibility_form table) -->
    <form class="calc" id="elig" action="eligibility_form_process.php" method="post" data-lead novalidate>
      <input type="hidden" name="source_url" value="check_eligibility.php">
      <input type="hidden" name="financial_status" value="To be discussed">
      <?php foreach ($q as $n => [$field, $label, $opts]): ?>
        <fieldset class="calc__row" data-reveal style="margin:0">
          <legend class="sr-only"><?= e($label) ?></legend>
          <span><?= $n + 1 ?>. <?= e($label) ?></span>
          <div class="opts">
            <?php foreach ($opts as $val => [$text, $pts]): ?>
              <label><input type="radio" name="<?= e($field) ?>" value="<?= e($val) ?>" data-pts="<?= (int) $pts ?>" required><span><?= e($text) ?></span></label>
            <?php endforeach; ?>
          </div>
        </fieldset>
      <?php endforeach; ?>

      <div class="calc__row" data-reveal>
        <span>Get your detailed report</span>
        <div class="lead__grid">
          <label class="field"><span>Full name</span><input name="name" autocomplete="name" required></label>
          <label class="field"><span>Phone</span><input name="phone" type="tel" autocomplete="tel" required></label>
          <label class="field field--full"><span>Email</span><input name="email" type="email" autocomplete="email" required></label>
        </div>
        <div class="g-recaptcha" data-sitekey="<?= e(CG_RECAPTCHA_SITEKEY) ?>"></div>
        <p class="lead__err" role="alert" hidden></p>
        <button class="btn btn--primary btn--lg" type="submit">Send my eligibility report <?= icon('arrow', 'ico ico--sm') ?></button>
      </div>
    </form>

    <aside class="sticky">
      <div class="card card--navy score" aria-live="polite">
        <h3>Your estimated points</h3>
        <div class="score__ring">
          <svg viewBox="0 0 120 120" aria-hidden="true"><circle class="bg" cx="60" cy="60" r="52"/><circle class="fg" id="scoreArc" cx="60" cy="60" r="52" stroke-dasharray="326.7" stroke-dashoffset="326.7"/></svg>
          <b><span id="scoreVal">0</span><small>of 6 needed</small></b>
        </div>
        <p class="score__msg" id="scoreMsg">Answer the questions to see your score</p>
        <p style="margin:0;font-size:15px">An estimate only. Final eligibility is decided by the German mission.</p>
      </div>
      <div class="card">
        <h3>Basic requirements</h3>
        <ul class="checklist">
          <li><?= icon('check') ?><span>Degree or 2-year vocational qualification</span></li>
          <li><?= icon('check') ?><span>German A1 or English B2</span></li>
          <li><?= icon('check') ?><span>Proof of funds, about €1,091 per month</span></li>
        </ul>
      </div>
    </aside>
  </div>
</section>

<script>
  (function () {
    var form = document.getElementById('elig'), val = document.getElementById('scoreVal'), arc = document.getElementById('scoreArc'), msg = document.getElementById('scoreMsg');
    var C = 326.7;
    function update() {
      var pts = 0, answered = 0, total = 6;
      ['qualification', 'experience', 'language', 'age', 'previous_stay', 'english'].forEach(function (n) {
        var r = form.querySelector('input[name="' + n + '"]:checked');
        if (r) { pts += +r.dataset.pts; answered++; }
      });
      val.textContent = pts;
      arc.style.strokeDashoffset = C - C * Math.min(pts, total) / total;
      arc.style.stroke = pts >= total ? '#3fd08a' : '#5f90da';
      msg.textContent = !answered ? 'Answer the questions to see your score'
        : pts >= total ? 'You are likely eligible'
        : answered < 6 ? 'Keep going…' : 'You may need ' + (total - pts) + ' more point' + (total - pts > 1 ? 's' : '') + '. We can help.';
    }
    form.addEventListener('change', update);
  })();
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
