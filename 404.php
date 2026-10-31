<?php
require_once __DIR__ . '/includes/bootstrap.php';
$page_title = 'Page not found | Career Gyan';
require __DIR__ . '/includes/header.php';
?>
<section class="section">
  <div class="container" style="text-align:center;max-width:620px">
    <span class="eyebrow">Error 404</span>
    <h1 class="h2" style="margin-bottom:14px">We couldn’t find that page</h1>
    <p style="color:var(--muted);font-size:18px">It may have moved. Try one of these instead.</p>
    <div class="hero__actions" style="justify-content:center;margin-top:24px">
      <a class="btn btn--primary" href="index.php">Go to home</a>
      <a class="btn btn--outline" href="all-countries.php">Destinations</a>
      <a class="btn btn--outline" href="contact.php">Contact us</a>
    </div>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
