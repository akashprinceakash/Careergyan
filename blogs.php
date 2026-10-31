<?php
require __DIR__ . '/includes/bootstrap.php';
$page_title = 'Study Abroad Blogs & Guides | Career Gyan';
$page_desc = 'Guides on universities, visas, scholarships, education loans and student life abroad from Career Gyan counsellors.';
$active = 'blogs';
require __DIR__ . '/includes/header.php';
page_hero('Study abroad insights', 'Practical guides on universities, visas, costs and student life, written by our counsellors.', 'photos/study.jpg', ['Blogs' => '']);

$per = 9;
$page = max(1, (int) ($_GET['page'] ?? 1));
$total = cg_blog_count();
$pages = max(1, (int) ceil($total / $per));
$page = min($page, $pages);
$posts = cg_blogs($per, ($page - 1) * $per);
?>

<section class="section">
  <div class="container">
    <?php if ($posts): ?>
      <div class="bgrid"><?php foreach ($posts as $b) blog_card($b); ?></div>
      <?php if ($pages > 1): ?>
        <nav class="pager" aria-label="Blog pages">
          <?php for ($p = 1; $p <= $pages; $p++): ?>
            <?php if ($p === $page): ?><span aria-current="page"><?= $p ?></span><?php else: ?><a href="blogs.php?page=<?= $p ?>"><?= $p ?></a><?php endif; ?>
          <?php endfor; ?>
        </nav>
      <?php endif; ?>
    <?php else: ?>
      <div class="empty"><?= icon('file') ?><p>New articles are on the way.</p></div>
    <?php endif; ?>
  </div>
</section>

<?php cta_band('Have a question we haven’t answered?', 'Ask a counsellor directly. Counselling is always free.'); ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
