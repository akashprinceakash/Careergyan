<?php
require __DIR__ . '/includes/bootstrap.php';
$page_title = 'Courses to Study Abroad | Career Gyan';
$page_desc = 'Explore engineering, management, medicine, science and arts programmes abroad and find universities that match your profile.';
$active = 'courses';
require __DIR__ . '/includes/header.php';
page_hero('Find the right course', 'Explore popular fields and search universities that teach them.', 'photos/library-study.jpg', ['Courses' => '']);
?>

<section class="section">
  <div class="container">
    <?php section_head('Popular fields', 'Start with what you want to study'); ?>
    <div class="kgrid" data-stagger>
      <?php foreach ($CG_COURSES as $k): ?>
        <a class="kcard" href="course.php?course_name=<?= urlencode($k['title']) ?>">
          <span class="kcard__img"><img src="assets/img/<?= e($k['img']) ?>" alt="" loading="lazy"></span>
          <span class="kcard__body"><b><?= e($k['title']) ?></b><small>Top picks: <?= e($k['note']) ?></small></span>
        </a>
      <?php endforeach; ?>
    </div>
    <div class="center-row" data-reveal>
      <div class="chips" style="justify-content:center">
        <?php foreach (cg_course_titles() as $t): ?><a href="course.php?course_name=<?= urlencode($t) ?>"><?= e($t) ?></a><?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section class="section section--tint">
  <div class="container split">
    <div class="split__text">
      <?php section_head('University search', 'Search 2,500+ partner universities', '', false); ?>
      <p data-reveal>Filter by country and course to see partner universities. Then book a session and we’ll tell you where your profile is strongest.</p>
      <ul class="checklist" data-stagger>
        <li><?= icon('check') ?><span>Bachelor’s and master’s programmes</span></li>
        <li><?= icon('check') ?><span>Application fee waivers at many partners</span></li>
        <li><?= icon('check') ?><span>Scholarship guidance included</span></li>
      </ul>
    </div>
    <form class="finder" action="search_university.php" method="get" data-reveal>
      <h2 class="finder__title"><?= icon('search', 'ico ico--sm') ?>Find your university</h2>
      <label class="field"><span>Country</span><select name="country"><option value="">Any country</option><?php foreach (cg_country_titles() as $c): ?><option><?= e($c) ?></option><?php endforeach; ?></select></label>
      <label class="field"><span>Course</span><select name="course_name"><option value="">Any course</option><?php foreach (cg_course_titles() as $c): ?><option><?= e($c) ?></option><?php endforeach; ?></select></label>
      <button class="btn btn--primary btn--block" type="submit">Search universities <?= icon('arrow', 'ico ico--sm') ?></button>
    </form>
  </div>
</section>

<?php cta_band(); ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
