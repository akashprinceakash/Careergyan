<?php
/**
 * University search results (all_university table).
 * Accepts the live site's POST fields (country, course_name, submit) and GET links.
 * Uses prepared statements, replacing the old string-built query.
 */
require_once __DIR__ . '/includes/bootstrap.php';
$country = trim((string) ($_POST['country'] ?? $_GET['country'] ?? ''));
$course = trim((string) ($_POST['course_name'] ?? $_GET['course_name'] ?? ''));
$rows = cg_universities($country, $course);

$label = trim(($course ?: 'All courses') . ($country ? ' in ' . $country : ''));
$page_title = 'Universities: ' . $label . ' | Career Gyan';
$active = 'courses';
$needs_recaptcha = true;
require __DIR__ . '/includes/header.php';
page_hero('University search', $label, 'photos/campus-lawn.jpg', ['Courses' => 'courses.php', 'Search' => '']);
?>

<section class="section">
  <div class="container layout">
    <div>
      <form class="card card--tint searchbar" action="search_university.php" method="get" data-reveal>
        <label class="field"><span>Country</span><select name="country"><option value="">Any country</option>
          <?php foreach (cg_country_titles() as $c): ?><option<?= strcasecmp($c, $country) === 0 ? ' selected' : '' ?>><?= e($c) ?></option><?php endforeach; ?></select></label>
        <label class="field"><span>Course</span><select name="course_name"><option value="">Any course</option>
          <?php foreach (cg_course_titles() as $c): ?><option<?= strcasecmp($c, $course) === 0 ? ' selected' : '' ?>><?= e($c) ?></option><?php endforeach; ?></select></label>
        <button class="btn btn--primary" type="submit"><?= icon('search', 'ico ico--sm') ?>Search</button>
      </form>

      <p class="meta" style="margin-bottom:16px" data-reveal><?= icon('cap', 'ico ico--xs') ?><?= count($rows) ?> universities found</p>

      <?php if ($rows): ?>
        <div class="tbl-wrap" data-reveal>
          <table class="tbl">
            <thead><tr><th>University</th><th>Country</th><th>Course</th><th>Level</th><th></th></tr></thead>
            <tbody>
              <?php foreach ($rows as $r): ?>
                <tr>
                  <td class="name"><?= e($r['university_name']) ?></td>
                  <td><?= e($r['country']) ?></td>
                  <td><?= e($r['course']) ?></td>
                  <td><?= e($r['course_type'] ?? '') ?></td>
                  <td><?php if (!empty($r['website'])): ?><a class="link" href="<?= e($r['website']) ?>" target="_blank" rel="noopener">Website <?= icon('arrow', 'ico ico--xs') ?></a><?php else: ?><a class="link" href="contact.php">Enquire <?= icon('arrow', 'ico ico--xs') ?></a><?php endif; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <div class="empty" data-reveal><?= icon('search') ?><p>No universities match this search yet. Try another country or course, or ask a counsellor. We work with 2,500+ universities that are not all listed here.</p><a class="btn btn--primary" href="contact.php">Ask a counsellor</a></div>
      <?php endif; ?>
    </div>
    <aside class="sticky"><?php lead_form('Get a personalised shortlist', 'We’ll tell you where your profile is strongest.'); ?></aside>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
