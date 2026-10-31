</main>

<footer class="footer">
  <div class="container">
    <div class="footer__top">
      <div class="footer__brand">
        <img src="assets/img/brand/logo-white.svg" alt="Career Gyan" width="170" height="44" loading="lazy">
        <p>ICEF-accredited study abroad consultants helping Indian students reach 2,500+ universities in 19 countries for over a decade.</p>
        <div class="footer__badges">
          <img src="assets/img/accreditation/ICEF_blue.png" alt="ICEF accredited agency" loading="lazy">
          <img src="assets/img/accreditation/NAFSA.png" alt="NAFSA member" loading="lazy">
          <img src="assets/img/accreditation/EAIE.png" alt="EAIE member" loading="lazy">
        </div>
      </div>
      <nav class="footer__col" aria-label="Destinations">
        <h4>Study in</h4>
        <?php foreach (array_slice(cg_countries(), 0, 7) as $fc): ?><a href="<?= e($fc['file']) ?>"><?= e($fc['name']) ?></a><?php endforeach; ?>
        <a href="all-countries.php">All destinations</a>
      </nav>
      <nav class="footer__col" aria-label="Company">
        <h4>Company</h4>
        <a href="about-us.php">About us</a><a href="other-services.php">Services</a><a href="courses.php">Courses</a><a href="events.php">Events</a><a href="gallery.php">Gallery</a><a href="contact.php">Contact</a>
      </nav>
      <nav class="footer__col" aria-label="Resources">
        <h4>Resources</h4>
        <a href="blogs.php">Blogs</a><a href="ebook.php">E-Books</a><a href="check_eligibility.php">Germany eligibility</a><a href="https://qckloans.com/loans/" target="_blank" rel="noopener">Student loan</a>
        <a href="privacy-policy.php">Privacy policy</a><a href="terms-and-conditions.php">Terms &amp; conditions</a><a href="refund-policy.php">Refund policy</a>
      </nav>
      <div class="footer__col footer__contact">
        <h4>Get in touch</h4>
        <a href="tel:<?= CG_PHONE_RAW ?>"><?= icon('phone', 'ico ico--sm') ?><?= CG_PHONE ?></a>
        <a href="mailto:<?= CG_EMAIL ?>"><?= icon('mail', 'ico ico--sm') ?><?= CG_EMAIL ?></a>
        <span><?= icon('pin', 'ico ico--sm') ?>#19, G-2, Brigade Gardens, Church Street, Bangalore 560001</span>
        <div class="footer__social">
          <a href="https://www.facebook.com/Careergyanblr" target="_blank" rel="noopener" aria-label="Facebook"><?= icon('facebook', 'ico ico--sm') ?></a>
          <a href="https://www.instagram.com/careergyanabroad" target="_blank" rel="noopener" aria-label="Instagram"><?= icon('instagram', 'ico ico--sm') ?></a>
          <a href="https://www.youtube.com/@careergyanblr" target="_blank" rel="noopener" aria-label="YouTube"><?= icon('youtube', 'ico ico--sm') ?></a>
          <a href="https://www.linkedin.com/company/career-gyan-pvt-ltd" target="_blank" rel="noopener" aria-label="LinkedIn"><?= icon('linkedin', 'ico ico--sm') ?></a>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      <p>© <?= date('Y') ?> Career Gyan Pvt. Ltd. All rights reserved.</p>
      <p>Offices in Bangalore, Hyderabad, Pune, Bahrain and Germany</p>
    </div>
  </div>
</footer>

<a class="fab" href="https://wa.me/<?= CG_WHATSAPP ?>" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp"><?= icon('whatsapp', 'ico') ?></a>
<?php if (!empty($needs_recaptcha)): ?><script src="https://www.google.com/recaptcha/api.js" async defer></script><?php endif; ?>
</body>
</html>
