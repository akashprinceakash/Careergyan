<?php
require __DIR__ . '/includes/bootstrap.php';
$page_title = 'Contact Career Gyan | Study Abroad Consultants';
$page_desc = 'Book a free counselling session or visit Career Gyan offices in Bangalore, Hyderabad, Pune, Bahrain and Germany.';
$active = 'contact';
$needs_recaptcha = true;
require __DIR__ . '/includes/header.php';
page_hero('Contact us', 'Book a free counselling session or walk in to your nearest office.', 'photos/campus-lawn.jpg', ['Contact' => '']);

$top_countries = ['uk', 'usa', 'canada', 'germany', 'ireland', 'australia', 'france', 'new-zealand'];
$top_courses = ['Engineering', 'Management', 'Medicine', 'Science', 'Arts'];
$year = (int) date('Y');
?>
<section class="section cform-sec">
  <div class="container">
    <div class="cform" data-reveal>
      <!-- Left: photo panel with contact options -->
      <aside class="cform__aside">
        <img class="cform__bg" src="assets/img/photos/fair/fair-6.jpg" alt="" loading="lazy" data-depth="10">
        <div class="cform__aside-in">
          <span class="eyebrow">Free counselling</span>
          <h2>Let’s plan your <em>move abroad</em></h2>
          <p>Tell us where you want to go. A counsellor from your nearest office calls you within one working day.</p>
          <div class="cform__quick">
            <a href="tel:<?= CG_PHONE_RAW ?>"><span><?= icon('phone', 'ico ico--sm') ?></span><div><b>Call us</b><?= CG_PHONE ?></div></a>
            <a href="https://wa.me/<?= CG_WHATSAPP ?>" target="_blank" rel="noopener"><span><?= icon('whatsapp', 'ico ico--sm') ?></span><div><b>WhatsApp</b>Chat with a counsellor</div></a>
            <a href="mailto:<?= CG_EMAIL ?>"><span><?= icon('mail', 'ico ico--sm') ?></span><div><b>Email</b><?= CG_EMAIL ?></div></a>
          </div>
          <ol class="cform__next">
            <li><b>1</b>We call you within one working day</li>
            <li><b>2</b>Free 45-minute profile evaluation</li>
            <li><b>3</b>Your personalised university shortlist</li>
          </ol>
          <p class="cform__hours"><?= icon('clock', 'ico ico--xs') ?>Mon–Sat, 10:00–19:00 IST</p>
        </div>
      </aside>

      <!-- Right: two-step form → existing thank-you.php (contact_form table + CRM) -->
      <form class="cform__main" action="thank-you.php" method="post" id="cform" novalidate>
        <div class="cform__progress" aria-hidden="true">
          <div class="cform__steps"><span class="is-on">1. About you</span><span>2. Your plans</span></div>
          <div class="cform__bar"><span></span></div>
        </div>

        <fieldset class="cstep is-active" data-step="1">
          <legend><span class="cstep__k">Step 1 of 2</span>Tell us about you</legend>
          <div class="cgrid2">
            <label class="field ff"><span class="ff__ico"><?= icon('users', 'ico ico--sm') ?></span><input name="fname" autocomplete="name" placeholder=" " required><span class="ff__label">Full name</span></label>
            <label class="field ff"><span class="ff__ico"><?= icon('phone', 'ico ico--sm') ?></span><input name="phone" type="tel" inputmode="tel" autocomplete="tel" pattern="[0-9+\s-]{8,15}" placeholder=" " required><span class="ff__label">Phone number</span></label>
            <label class="field ff"><span class="ff__ico"><?= icon('mail', 'ico ico--sm') ?></span><input name="email" type="email" autocomplete="email" placeholder=" " required><span class="ff__label">Email address</span></label>
            <label class="field ff"><span class="ff__ico"><?= icon('pin', 'ico ico--sm') ?></span><input name="city" autocomplete="address-level2" placeholder=" " required><span class="ff__label">Your city</span></label>
          </div>
          <button class="btn btn--primary btn--lg cstep__next" type="button" data-next>Continue <?= icon('arrow', 'ico ico--sm') ?></button>
        </fieldset>

        <fieldset class="cstep" data-step="2">
          <legend><span class="cstep__k">Step 2 of 2</span>Where do you want to study?</legend>

          <div class="cpick" data-sync="destnation">
            <span class="cpick__lbl">Destination</span>
            <div class="cpick__chips">
              <?php foreach ($top_countries as $k): $c = cg_country($k); ?>
                <button type="button" class="chip" data-value="<?= e($c['name']) ?>"><?= flag_img($c, 20) ?><?= e($c['short']) ?></button>
              <?php endforeach; ?>
            </div>
            <label class="field"><span class="sr-only">Destination</span>
              <select name="destnation" required><option value="">Or choose another country</option>
                <?php foreach (cg_country_titles() as $t): ?><option><?= e($t) ?></option><?php endforeach; ?>
              </select></label>
          </div>

          <div class="cpick" data-sync="course">
            <span class="cpick__lbl">Course</span>
            <div class="cpick__chips">
              <?php foreach ($top_courses as $t): ?><button type="button" class="chip" data-value="<?= e($t) ?>"><?= e($t) ?></button><?php endforeach; ?>
            </div>
            <label class="field"><span class="sr-only">Course</span>
              <select name="course" required><option value="">Or choose another course</option>
                <?php foreach (cg_course_titles() as $t): ?><option><?= e($t) ?></option><?php endforeach; ?>
              </select></label>
          </div>

          <div class="cgrid2">
            <label class="field"><span>Intake month</span>
              <select name="month" required><option value="">Select month</option>
                <?php foreach (['January','February','March','April','May','June','July','August','September','October','November','December'] as $m): ?><option><?= $m ?></option><?php endforeach; ?>
              </select></label>
            <div class="field"><span>Intake year</span>
              <div class="pills" role="radiogroup" aria-label="Intake year">
                <?php for ($i = 0; $i < 3; $i++): ?><label><input type="radio" name="preferred_year" value="<?= $year + $i ?>" required<?= $i === 1 ? ' checked' : '' ?>><span><?= $year + $i ?></span></label><?php endfor; ?>
              </div>
            </div>
          </div>

          <label class="field"><span>Anything we should know? <em>(optional)</em></span><textarea name="msg" rows="3" placeholder="Grades, budget, test scores…"></textarea></label>
          <div class="g-recaptcha" data-sitekey="<?= e(CG_RECAPTCHA_SITEKEY) ?>"></div>
          <p class="lead__err" role="alert" hidden></p>
          <div class="cstep__actions">
            <button class="btn btn--outline btn--lg" type="button" data-back><?= icon('chev-l', 'ico ico--sm') ?>Back</button>
            <button class="btn btn--accent btn--lg" type="submit">Request my call back <?= icon('arrow', 'ico ico--sm') ?></button>
          </div>
        </fieldset>
        <div class="cform__trust">
          <figure>
            <?= icon('quote', 'ico cform__q') ?>
            <blockquote>My SOP went through four drafts with my counsellor. The visa interview prep turned out to be the easiest part.</blockquote>
            <figcaption><b>Ananya Sharma</b> · MSc Data Science, University of Leeds</figcaption>
          </figure>
          <ul>
            <li><b>6,320+</b><span>students placed</span></li>
            <li><b>95%</b><span>visa success</span></li>
            <li><b>Free</b><span>first session</span></li>
          </ul>
        </div>
        <p class="lead__fine"><?= icon('shield', 'ico ico--xs') ?>Your details stay private. See our <a href="privacy-policy.php">privacy policy</a>.</p>
      </form>
    </div>
  </div>
</section>

<script>
  // Two-step contact form: chips sync to the real selects, steps validate before moving on
  (function () {
    var form = document.getElementById('cform');
    if (!form) return;
    form.classList.add('is-stepped');
    var steps = form.querySelectorAll('.cstep'), labels = form.querySelectorAll('.cform__steps span');
    var bar = form.querySelector('.cform__bar span'), err = form.querySelector('.lead__err');
    function show(n) {
      steps.forEach(function (s, i) { s.classList.toggle('is-active', i === n); });
      labels.forEach(function (l, i) { l.classList.toggle('is-on', i <= n); });
      bar.style.width = n ? '100%' : '50%';
      var first = steps[n].querySelector('input:not([type=radio]), select');
      if (first && n) form.scrollIntoView({ block: 'nearest' });
    }
    function check(step) {
      var bad = null;
      step.querySelectorAll('[required]').forEach(function (f) {
        var ok = f.checkValidity(), wrap = f.closest('.field');
        if (wrap) wrap.classList.toggle('is-bad', !ok);
        if (!ok && !bad) bad = f;
      });
      return bad;
    }
    form.querySelector('[data-next]').addEventListener('click', function () {
      var bad = check(steps[0]);
      if (bad) { bad.focus(); return; }
      show(1);
    });
    form.querySelector('[data-back]').addEventListener('click', function () { show(0); });

    form.querySelectorAll('[data-sync]').forEach(function (box) {
      var sel = box.querySelector('select'), chips = box.querySelectorAll('.chip');
      function mark() { chips.forEach(function (c) { var on = c.dataset.value === sel.value; c.classList.toggle('is-on', on); c.setAttribute('aria-pressed', String(on)); }); }
      chips.forEach(function (c) {
        c.addEventListener('click', function () {
          if (![].some.call(sel.options, function (o) { return o.value === c.dataset.value; })) sel.add(new Option(c.dataset.value, c.dataset.value));
          sel.value = c.dataset.value; sel.closest('.field').classList.remove('is-bad'); mark();
        });
      });
      sel.addEventListener('change', mark);
      mark();
    });

    form.addEventListener('input', function (e) {
      var f = e.target.closest('.field');
      if (f && f.classList.contains('is-bad') && e.target.checkValidity()) f.classList.remove('is-bad');
    });
    form.addEventListener('submit', function (e) {
      var bad1 = check(steps[0]), bad2 = check(steps[1]);
      var cap = window.grecaptcha && window.grecaptcha.getResponse ? window.grecaptcha.getResponse() : 'skip';
      if (bad1 || bad2 || !cap) {
        e.preventDefault();
        if (bad1) { show(0); bad1.focus(); return; }
        err.textContent = bad2 ? 'Please choose your destination, course and intake.' : 'Please confirm you are not a robot.';
        err.hidden = false;
        if (bad2) bad2.focus();
      }
    });
  })();
</script>

<section class="mapstrip">
  <iframe class="mapstrip__map" title="Career Gyan Bangalore head office on Google Maps" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps?q=Brigade+Gardens+Church+Street+Bangalore&amp;output=embed"></iframe>
  <div class="container mapstrip__in">
    <div class="mapstrip__card" data-reveal>
      <span class="eyebrow">Head office</span>
      <h3>Bangalore CBD</h3>
      <p><?= icon('pin', 'ico ico--xs') ?>#19, G-2, Brigade Gardens, Church Street, Bangalore 560001</p>
      <a class="btn btn--primary btn--sm" href="https://www.google.com/maps/search/Career+Gyan+Brigade+Gardens+Church+Street+Bangalore" target="_blank" rel="noopener">Get directions <?= icon('arrow', 'ico ico--xs') ?></a>
    </div>
  </div>
</section>

<section class="section section--tint" id="offices">
  <div class="container">
    <?php section_head('Our offices', 'Visit us in India, Bahrain or Germany'); ?>
    <div class="grid-3" data-stagger>
      <?php foreach ($CG_OFFICES as $o): ?>
        <article class="card office">
          <span class="eyebrow" style="justify-self:start;margin:0"><?= e($o['tag']) ?></span>
          <h3 style="margin:4px 0"><?= e($o['city']) ?></h3>
          <span class="meta"><?= icon('pin', 'ico ico--xs') ?><?= e($o['addr']) ?></span>
          <?php if ($o['phone']): ?><a class="meta" href="tel:<?= e(str_replace(' ', '', $o['phone'])) ?>"><?= icon('phone', 'ico ico--xs') ?><?= e($o['phone']) ?></a><?php endif; ?>
          <a class="meta" href="mailto:<?= e($o['email']) ?>"><?= icon('mail', 'ico ico--xs') ?><?= e($o['email']) ?></a>
          <div class="office__links"><a class="link" href="https://www.google.com/maps/search/<?= rawurlencode('Career Gyan ' . $o['addr']) ?>" target="_blank" rel="noopener">Get directions <?= icon('arrow', 'ico ico--xs') ?></a></div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
