<?php
require __DIR__ . '/includes/bootstrap.php';
$page_title = 'Free Study Abroad E-Books | Career Gyan';
$page_desc = 'Download Career Gyan’s free monthly study abroad e-book: intake deadlines, scholarships, visa updates and country guides.';
$active = 'ebook';
require __DIR__ . '/includes/header.php';
page_hero('Free study abroad e-books', 'A monthly guide to intakes, scholarships and visa changes, free to download.', 'photos/library-study.jpg', ['E-Books' => '']);
$books = cg_ebooks();
?>

<section class="section">
  <div class="container">
    <?php if ($books): ?>
      <div class="grid-4" data-stagger>
        <?php foreach ($books as $i => $bk): ?>
          <article class="xcard">
            <div class="xcard__img"><img src="<?= e(cg_img('e_books', $bk['front_image'])) ?>" alt="" loading="lazy"><?php if ($i === 0): ?><span>LATEST</span><?php endif; ?></div>
            <div class="xcard__body">
              <time class="meta"><?= icon('calendar', 'ico ico--xs') ?><?= e(cg_date($bk['published_at'], 'F Y')) ?></time>
              <h3><?= e($bk['event_title']) ?></h3>
              <button class="btn btn--soft btn--block" type="button" data-modal-open="#ebookModal" data-id="<?= e($bk['id']) ?>" data-title="<?= e($bk['event_title']) ?>"><?= icon('download', 'ico ico--sm') ?>Download free</button>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="empty"><?= icon('book') ?><p>The next e-book is on its way.</p></div>
    <?php endif; ?>
  </div>
</section>

<section class="section section--tint">
  <div class="container">
    <?php section_head('Inside every issue', 'What you’ll find in the monthly guide'); ?>
    <div class="grid-4" data-stagger>
      <article class="vcard"><span class="scard__ico"><?= icon('calendar') ?></span><h3>Intake deadlines</h3><p>Application windows for the next two intakes.</p></article>
      <article class="vcard"><span class="scard__ico"><?= icon('award') ?></span><h3>Scholarships</h3><p>New funding open to Indian students.</p></article>
      <article class="vcard"><span class="scard__ico"><?= icon('passport') ?></span><h3>Visa updates</h3><p>Rule changes explained in plain language.</p></article>
      <article class="vcard"><span class="scard__ico"><?= icon('globe') ?></span><h3>Country spotlight</h3><p>A deep dive into one destination each month.</p></article>
    </div>
  </div>
</section>

<!-- Download form → existing send_email.php -->
<div class="modal" id="ebookModal" role="dialog" aria-modal="true" aria-labelledby="ebookModalTitle">
  <form class="modal__box" action="send_email.php" method="post" data-lead novalidate>
    <button class="iconbtn modal__close" type="button" data-modal-close aria-label="Close"><?= icon('close', 'ico ico--sm') ?></button>
    <h3 id="ebookModalTitle">Get your free e-book</h3>
    <p class="meta" data-modal-title style="margin:-6px 0 4px"></p>
    <input type="hidden" name="ebook_id" value="">
    <label class="field"><span>Full name</span><input name="fullname" autocomplete="name" required></label>
    <label class="field"><span>Email</span><input name="email" type="email" autocomplete="email" required></label>
    <label class="field"><span>Phone</span><input name="phone" type="tel" autocomplete="tel" required></label>
    <p class="lead__err" role="alert" hidden></p>
    <button class="btn btn--primary btn--block" type="submit"><?= icon('download', 'ico ico--sm') ?>Send me the e-book</button>
  </form>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
