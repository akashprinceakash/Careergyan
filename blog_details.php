<?php
require_once __DIR__ . '/includes/bootstrap.php';
$b = cg_blog((string) ($_GET['slug'] ?? ''));
if (!$b) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    return;
}
$page_title = ($b['meta_title'] ?? '') ?: $b['title'] . ' | Career Gyan';
$page_desc = ($b['meta_description'] ?? '') ?: cg_excerpt($b['excerpt'] ?? '', 155);
$og_image = cg_img('blog', ($b['og_image'] ?? '') ?: $b['front_image']);
$active = 'blogs';
$needs_recaptcha = true;
require __DIR__ . '/includes/header.php';
page_hero($b['title'], cg_date($b['date'] ?? '', 'j F Y'), 'photos/library-study.jpg', ['Blogs' => 'blogs.php', 'Article' => '']);
$more = array_values(array_filter(cg_blogs(4), function ($x) use ($b) { return $x['slug'] !== $b['slug']; }));
?>

<section class="section">
  <div class="container layout">
    <article>
      <img src="<?= e(cg_img('blog', $b['front_image'])) ?>" alt="<?= e($b['title']) ?>" style="width:100%;border-radius:var(--r-lg);margin-bottom:32px" data-reveal>
      <div class="prose" data-reveal><?= $b['description'] ?? '' /* admin-authored HTML */ ?></div>
      <div class="card card--tint" style="margin-top:40px;display:flex;justify-content:space-between;align-items:center;gap:16px;flex-wrap:wrap" data-reveal>
        <div><h3 style="margin:0 0 4px">Planning to study abroad?</h3><p style="margin:0;color:var(--muted)">Get a free profile evaluation from a senior counsellor.</p></div>
        <a class="btn btn--primary" href="contact.php">Book free counselling</a>
      </div>
    </article>
    <aside class="sticky">
      <div class="card">
        <h3>Latest articles</h3>
        <ul class="offices-mini">
          <?php foreach (array_slice($more, 0, 3) as $m): ?>
            <li><a href="<?= e(cg_blog_url($m['slug'])) ?>" style="display:flex;gap:12px;align-items:center">
              <img src="<?= e(cg_img('blog', $m['front_image'])) ?>" alt="" style="width:72px;height:56px;object-fit:cover;border-radius:8px;flex:none" loading="lazy">
              <b style="font-size:15px;line-height:1.35"><?= e($m['title']) ?></b></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="card card--navy">
        <h3>Explore destinations</h3>
        <div class="chips"><?php $n = 0; foreach (cg_countries() as $c): if ($n++ >= 10) break; ?><a href="<?= e($c['file']) ?>"><?= e($c['short']) ?></a><?php endforeach; ?></div>
      </div>
    </aside>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
