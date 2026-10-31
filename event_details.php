<?php
require __DIR__ . '/includes/bootstrap.php';
$ev = cg_event((string) ($_GET['slug'] ?? ''));
if (!$ev) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    return;
}
$t = strtotime($ev['event_datetime']);
$page_title = ($ev['meta_title'] ?? '') ?: $ev['event_title'] . ' | Career Gyan Events';
$page_desc = ($ev['meta_description'] ?? '') ?: cg_excerpt($ev['event_description'] ?? '', 155);
$og_image = cg_img('events', $ev['front_image']);
$active = 'events';
$needs_recaptcha = true;
require __DIR__ . '/includes/header.php';
page_hero($ev['event_title'], $t ? date('l, j F Y · g:i A', $t) . ' · ' . $ev['event_location'] : $ev['event_location'], 'photos/fair/fair-7.jpg', ['Events' => 'events.php', $ev['event_title'] => '']);
?>

<section class="section">
  <div class="container layout">
    <div>
      <img src="<?= e(cg_img('events', $ev['front_image'])) ?>" alt="<?= e($ev['event_title']) ?>" style="width:100%;border-radius:var(--r-lg);margin-bottom:32px" data-reveal>
      <div class="facts" data-stagger>
        <div class="fact"><span class="fact__ico"><?= icon('calendar') ?></span><div><span>Date</span><b><?= $t ? date('D, j M Y', $t) : 'To be announced' ?></b></div></div>
        <div class="fact"><span class="fact__ico"><?= icon('clock') ?></span><div><span>Time</span><b><?= $t ? date('g:i A', $t) : '—' ?></b></div></div>
        <div class="fact"><span class="fact__ico"><?= icon('pin') ?></span><div><span>Venue</span><b><?php if (!empty($ev['event_location_link'])): ?><a href="<?= e($ev['event_location_link']) ?>" target="_blank" rel="noopener"><?= e($ev['event_location']) ?></a><?php else: ?><?= e($ev['event_location']) ?><?php endif; ?></b></div></div>
      </div>
      <div class="prose" data-reveal><?= $ev['event_description'] ?? '' /* admin-authored HTML */ ?></div>
    </div>

    <aside class="sticky">
      <!-- Registration → existing process_form.php (registrations table) -->
      <form class="lead" action="process_form.php" method="post" data-lead novalidate>
        <div class="lead__head"><h3>Register for free</h3><p>Seats are limited. We’ll confirm by phone and email.</p></div>
        <input type="hidden" name="event_id" value="<?= e($ev['id']) ?>">
        <div class="lead__grid">
          <label class="field field--full"><span>Full name</span><input name="fname" autocomplete="name" required></label>
          <label class="field field--full"><span>Email</span><input name="email" type="email" autocomplete="email" required></label>
          <label class="field field--full"><span>Phone</span><input name="phone" type="tel" autocomplete="tel" required></label>
          <label class="field field--full"><span>Preferred country</span><select name="country" required><option value="">Select</option><?php foreach (cg_country_titles() as $c): ?><option><?= e($c) ?></option><?php endforeach; ?></select></label>
          <label class="field"><span>Degree</span><select name="degree" required><option value="">Select</option><option>Bachelors</option><option>Masters</option><option>PhD</option></select></label>
          <label class="field"><span>Course</span><select name="course" required><option value="">Select</option><?php foreach (cg_course_titles() as $c): ?><option><?= e($c) ?></option><?php endforeach; ?></select></label>
        </div>
        <div class="g-recaptcha" data-sitekey="<?= e(CG_RECAPTCHA_SITEKEY) ?>"></div>
        <p class="lead__err" role="alert" hidden></p>
        <button class="btn btn--primary btn--block btn--lg" type="submit">Reserve my seat</button>
      </form>
    </aside>
  </div>
</section>

<section class="section section--tint">
  <div class="container">
    <?php section_head('More events', 'You might also like', '', false, '<a class="btn btn--outline" href="events.php">All events ' . icon('arrow', 'ico ico--sm') . '</a>'); ?>
    <div class="egrid"><?php foreach (array_slice(array_filter(cg_events(4), function ($x) use ($ev) { return $x['slug'] !== $ev['slug']; }), 0, 3) as $o) event_card($o); ?></div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
