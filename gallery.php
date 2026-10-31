<?php
require __DIR__ . '/includes/bootstrap.php';
$page_title = 'Gallery | Career Gyan Events and Students';
$page_desc = 'Photos from Career Gyan education fairs, workshops and student meetups.';
$active = 'gallery';
require __DIR__ . '/includes/header.php';
page_hero('Gallery', 'Moments from our education fairs, workshops and student meetups.', 'photos/fair/fair-2.jpg', ['Gallery' => '']);
$photos = [
    ['photos/fair/fair-6.jpg', 'Global Education Fair, Bangalore'],
    ['photos/fair/fair-2.jpg', 'One-on-one with university delegates'],
    ['photos/fair/fair-5.jpg', 'Course counselling session'],
    ['photos/fair/fair-7.jpg', 'Fair floor with partner universities'],
    ['photos/fair/fair-3.jpg', 'Admissions desk'],
    ['photos/fair/fair-1.jpg', 'Families meeting university teams'],
    ['photos/fair/fair-4.jpg', 'Profile evaluation in progress'],
    ['events/coffee-meetup.jpg', 'Study Abroad Coffee Meetup'],
    ['events/germany-workshop.jpg', 'Germany Chancenkarte Workshop'],
];
?>

<section class="section">
  <div class="container">
    <div class="masonry" data-stagger>
      <?php foreach ($photos as $p): ?>
        <figure><img src="assets/img/<?= e($p[0]) ?>" alt="<?= e($p[1]) ?>" loading="lazy"><figcaption><?= e($p[1]) ?></figcaption></figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php cta_band('Join us at the next event', 'Meet universities in person and get your profile evaluated on the spot.', 'photos/fair/fair-7.jpg'); ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
