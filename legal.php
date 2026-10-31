<?php
/**
 * Shared layout for privacy-policy.php, terms-and-conditions.php and refund-policy.php.
 * Each sets $legal_key. Text is a starting draft: have it reviewed before publishing.
 */
require_once __DIR__ . '/includes/bootstrap.php';
$docs = [
    'privacy' => ['Privacy policy', 'How Career Gyan collects, uses and protects your personal information.', [
        ['Information we collect', 'When you fill in a form, call or message us, we collect your name, phone number, email, city, academic background and study preferences.'],
        ['How we use it', 'We use your information to provide counselling, process applications, arrange loans and housing, and tell you about relevant events. We do not sell your data.'],
        ['Sharing with partners', 'With your consent, we share the details needed for your application with universities, lenders, accommodation providers and visa service partners.'],
        ['Cookies', 'Our website uses essential cookies and analytics to understand how pages are used. You can disable cookies in your browser settings.'],
        ['Your rights', 'You can ask us to access, correct or delete your information at any time by emailing ' . CG_EMAIL . '.'],
    ]],
    'terms' => ['Terms & conditions', 'The terms that apply when you use our website and services.', [
        ['Our services', 'Career Gyan provides counselling and application support. Admission and visa decisions are made solely by universities and government authorities.'],
        ['Accuracy of information', 'You agree to provide accurate and complete documents. Incorrect information may lead to rejection of applications or visas.'],
        ['Fees', 'Any service fees will be shared with you in writing before work begins. Third-party fees such as application, visa and test fees are payable separately.'],
        ['Website content', 'Content on this website is for general guidance and may change. Always confirm requirements with your counsellor.'],
        ['Governing law', 'These terms are governed by the laws of India, with jurisdiction in Bangalore.'],
    ]],
    'refund' => ['Refund policy', 'When and how service fees paid to Career Gyan are refunded.', [
        ['Eligibility', 'Refund eligibility depends on the service package and the stage of your application, as set out in your service agreement.'],
        ['Third-party fees', 'Fees paid to universities, embassies, testing bodies or other third parties are governed by their own refund rules.'],
        ['How to request', 'Email ' . CG_EMAIL . ' with your name, registered phone number and payment details. We respond within 7 working days.'],
        ['Processing', 'Approved refunds are processed to the original payment method within 14 working days.'],
    ]],
];
[$title, $sub, $sections] = $docs[$legal_key ?? 'privacy'];
$page_title = $title . ' | Career Gyan';
$page_desc = $sub;
require __DIR__ . '/includes/header.php';
page_hero($title, $sub, 'photos/library-study.jpg', [$title => '']);
?>

<section class="section">
  <div class="container layout">
    <div class="prose" data-reveal>
      <p class="meta">Last updated: <?= date('j F Y') ?></p>
      <?php foreach ($sections as $i => [$h, $p]): ?><h2><?= $i + 1 ?>. <?= e($h) ?></h2><p><?= e($p) ?></p><?php endforeach; ?>
    </div>
    <aside class="sticky">
      <div class="card card--tint">
        <h3>Questions?</h3>
        <p style="color:var(--muted)">Write to us and we’ll get back within two working days.</p>
        <a class="btn btn--primary btn--block" href="mailto:<?= CG_EMAIL ?>"><?= icon('mail', 'ico ico--sm') ?>Email us</a>
      </div>
      <div class="card">
        <h3>Policies</h3>
        <div style="display:grid;gap:10px">
          <a class="link" href="privacy-policy.php">Privacy policy</a>
          <a class="link" href="terms-and-conditions.php">Terms &amp; conditions</a>
          <a class="link" href="refund-policy.php">Refund policy</a>
        </div>
      </div>
    </aside>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
