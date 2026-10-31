<?php
/** Reusable view partials. All output is escaped at the point of use. */

function icon($name, $class = 'ico')
{
    static $p = [
        'arrow' => '<path d="M5 12h14M13 6l6 6-6 6"/>',
        'check' => '<path d="M5 12.5l4.5 4.5L19 7.5"/>',
        'chevron' => '<path d="M6 9l6 6 6-6"/>',
        'compass' => '<circle cx="12" cy="12" r="9"/><path d="M15.5 8.5l-2 5-5 2 2-5z"/>',
        'list' => '<path d="M9 6h11M9 12h11M9 18h11"/><circle cx="4.5" cy="6" r="1"/><circle cx="4.5" cy="12" r="1"/><circle cx="4.5" cy="18" r="1"/>',
        'pen' => '<path d="M4 20h4L19 9l-4-4L4 16z"/><path d="M13.5 6.5l4 4"/>',
        'passport' => '<rect x="5" y="3" width="14" height="18" rx="2"/><circle cx="12" cy="10" r="3"/><path d="M9 16h6"/>',
        'bank' => '<path d="M3 10l9-6 9 6"/><path d="M5 10v8M9.5 10v8M14.5 10v8M19 10v8M3 20h18"/>',
        'home' => '<path d="M4 11l8-7 8 7v9H4z"/><path d="M10 20v-5h4v5"/>',
        'phone' => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/>',
        'mail' => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>',
        'pin' => '<path d="M12 21s-7-6.5-7-12a7 7 0 0 1 14 0c0 5.5-7 12-7 12z"/><circle cx="12" cy="9" r="2.5"/>',
        'clock' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'calendar' => '<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4"/>',
        'globe' => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"/>',
        'users' => '<circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0"/><circle cx="17" cy="9" r="2.5"/><path d="M16 14.5a5 5 0 0 1 5.5 5"/>',
        'award' => '<circle cx="12" cy="9" r="6"/><path d="M8.5 14l-1.5 7 5-3 5 3-1.5-7"/>',
        'cap' => '<path d="M2 9l10-5 10 5-10 5z"/><path d="M6 11v5c3 2.5 9 2.5 12 0v-5M22 9v6"/>',
        'file' => '<path d="M6 3h8l5 5v13H6z"/><path d="M14 3v5h5M9 13h6M9 17h6"/>',
        'download' => '<path d="M12 4v11M7 10l5 5 5-5M5 20h14"/>',
        'search' => '<circle cx="11" cy="11" r="7"/><path d="M20 20l-4-4"/>',
        'quote' => '<path d="M7 7h4v4c0 3-1.5 5-4 6M15 7h4v4c0 3-1.5 5-4 6"/>',
        'shield' => '<path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/><path d="M8.5 12l2.5 2.5 4.5-4.5"/>',
        'plane' => '<path d="M21 15.5l-8-4.5V5.5a1.5 1.5 0 0 0-3 0V11l-8 4.5v2l8-2V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-3.5l8 2z"/>',
        'menu' => '<path d="M4 7h16M4 12h16M4 17h16"/>',
        'close' => '<path d="M6 6l12 12M18 6L6 18"/>',
        'chev-l' => '<path d="M15 6l-6 6 6 6"/>',
        'chev-r' => '<path d="M9 6l6 6-6 6"/>',
        'pause' => '<path d="M9 6v12M15 6v12"/>',
        'play' => '<path d="M8 5l11 7-11 7z"/>',
        'book' => '<path d="M4 5a2 2 0 0 1 2-2h13v16H6a2 2 0 0 0-2 2z"/><path d="M4 21V5M8 7h7"/>',
        'whatsapp' => '<path d="M4 20l1.3-4A8.5 8.5 0 1 1 8 18.8z"/><path d="M9 8.5c0 3.5 3 6.5 6.5 6.5l1-1.5-2-1-1 1c-1.2-.5-2.5-1.8-3-3l1-1-1-2z"/>',
        'facebook' => '<path d="M14 8h3V4h-3a4 4 0 0 0-4 4v2H7v4h3v7h4v-7h3l1-4h-4V8z"/>',
        'instagram' => '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".6"/>',
        'youtube' => '<rect x="2.5" y="5.5" width="19" height="13" rx="4"/><path d="M10 9.5v5l4.5-2.5z"/>',
        'linkedin' => '<rect x="3" y="3" width="18" height="18" rx="3"/><path d="M8 10.5V17M8 7.5v.01M12 17v-6.5M12 13.5a2.5 2.5 0 0 1 5 0V17"/>',
    ];
    return '<svg class="' . e($class) . '" viewBox="0 0 24 24" aria-hidden="true" focusable="false">' . ($p[$name] ?? '') . '</svg>';
}

/**
 * Template 01 heading style: set the closing word(s) in serif italic.
 * $html must already be escaped/trusted. Long titles (e.g. blog posts) are left plain.
 */
function cg_em($html)
{
    if (strpos($html, '<em>') !== false || str_word_count(strip_tags($html)) > 9) {
        return $html;
    }
    $words = preg_split('/\s+/', trim($html));
    if (count($words) < 3) {
        return $html;
    }
    $take = mb_strlen_safe(end($words)) >= 6 ? 1 : 2;
    $tail = array_splice($words, -$take);
    return implode(' ', $words) . ' <em>' . implode(' ', $tail) . '</em>';
}

function mb_strlen_safe($s)
{
    return function_exists('mb_strlen') ? mb_strlen($s) : strlen($s);
}

function section_head($eyebrow, $title, $sub = '', $center = true, $action = '')
{
    ?>
    <div class="shead<?= $center ? ' shead--center' : '' ?>" data-reveal>
      <div class="shead__text">
        <?php if ($eyebrow): ?><span class="eyebrow"><?= e($eyebrow) ?></span><?php endif; ?>
        <h2 class="h2"><?= cg_em($title) /* trusted markup from templates */ ?></h2>
        <?php if ($sub): ?><p class="shead__sub"><?= e($sub) ?></p><?php endif; ?>
      </div>
      <?= $action ?>
    </div>
    <?php
}

/**
 * Inner-page banner with layered parallax (layers 1-4 move at 70/55/40/10% as the
 * banner scrolls out, as in the parallax-scrolling component) and a fade into the page.
 */
function page_hero($title, $sub, $img, array $crumbs = [])
{
    ?>
    <section class="phero" data-parallax-layers>
      <div class="phero__media" data-parallax-layer="1"><img src="assets/img/<?= e($img) ?>" alt="" fetchpriority="high"></div>
      <div class="phero__glow" data-parallax-layer="2" aria-hidden="true"></div>
      <div class="container phero__inner" data-parallax-layer="3">
        <nav class="crumbs" aria-label="Breadcrumb" data-hero-item>
          <a href="index.php">Home</a>
          <?php foreach ($crumbs as $label => $href): ?>
            <?= icon('chev-r', 'ico ico--xs') ?>
            <?php if ($href): ?><a href="<?= e($href) ?>"><?= e($label) ?></a><?php else: ?><span aria-current="page"><?= e($label) ?></span><?php endif; ?>
          <?php endforeach; ?>
        </nav>
        <h1 class="phero__title" data-hero-item><?= cg_em(e($title)) ?></h1>
        <?php if ($sub): ?><p class="phero__sub" data-hero-item><?= e($sub) ?></p><?php endif; ?>
      </div>
      <div class="phero__fade" aria-hidden="true"></div>
    </section>
    <?php
}

function flag_img($c, $size = 28)
{
    return '<img class="flag" src="assets/img/countries/' . e($c['flag']) . '" alt="" width="' . $size . '" height="' . $size . '" loading="lazy">';
}

function country_card($c, $big = false)
{
    ?>
    <a class="ccard<?= $big ? ' ccard--big' : '' ?>" href="<?= e($c['file']) ?>" data-region="<?= e($c['region']) ?>">
      <img class="ccard__img" src="assets/img/<?= e($c['img']) ?>" alt="" loading="lazy">
      <span class="ccard__body">
        <span class="ccard__name"><?= flag_img($c, 26) ?><?= e($c['name']) ?></span>
        <span class="ccard__tag"><?= e($c['tagline']) ?></span>
        <span class="ccard__meta"><span><?= icon('cap', 'ico ico--xs') ?><?= e($c['tuition']) ?></span></span>
      </span>
      <span class="ccard__go"><?= icon('arrow', 'ico ico--sm') ?></span>
    </a>
    <?php
}

function blog_card($b)
{
    $url = cg_blog_url($b['slug']);
    ?>
    <article class="bcard" data-reveal>
      <a class="bcard__img" href="<?= e($url) ?>" tabindex="-1" aria-hidden="true"><img src="<?= e(cg_img('blog', $b['front_image'])) ?>" alt="" loading="lazy"></a>
      <div class="bcard__body">
        <?php if (!empty($b['date'])): ?><time class="meta" datetime="<?= e($b['date']) ?>"><?= icon('calendar', 'ico ico--xs') ?><?= e(cg_date($b['date'])) ?></time><?php endif; ?>
        <h3><a href="<?= e($url) ?>"><?= e($b['title']) ?></a></h3>
        <p><?= e(cg_excerpt($b['excerpt'] ?? '', 120)) ?></p>
        <a class="link" href="<?= e($url) ?>">Read article <?= icon('arrow', 'ico ico--xs') ?></a>
      </div>
    </article>
    <?php
}

function event_card($ev)
{
    $t = strtotime($ev['event_datetime']);
    $url = cg_event_url($ev['slug']);
    ?>
    <article class="ecard" data-reveal>
      <a class="ecard__img" href="<?= e($url) ?>" tabindex="-1" aria-hidden="true">
        <img src="<?= e(cg_img('events', $ev['front_image'])) ?>" alt="" loading="lazy">
        <?php if ($t): ?><span class="ecard__date"><b><?= date('j', $t) ?></b><?= date('M', $t) ?></span><?php endif; ?>
      </a>
      <div class="ecard__body">
        <h3><a href="<?= e($url) ?>"><?= e($ev['event_title']) ?></a></h3>
        <ul class="ecard__meta">
          <?php if ($t): ?><li><?= icon('clock', 'ico ico--xs') ?><?= date('D, j M Y · g:i A', $t) ?></li><?php endif; ?>
          <li><?= icon('pin', 'ico ico--xs') ?><?= e($ev['event_location']) ?></li>
        </ul>
        <a class="btn btn--soft btn--sm" href="<?= e($url) ?>">Register free</a>
      </div>
    </article>
    <?php
}

/** Lead form posting to the existing thank-you.php handler (contact_form + CRM). */
function lead_form($title = 'Book a free counselling session', $sub = 'A counsellor from your nearest office will call you within one working day.')
{
    $countries = cg_country_titles();
    $courses = cg_course_titles();
    $y = (int) date('Y');
    ?>
    <form class="lead" action="thank-you.php" method="post" data-lead novalidate>
      <div class="lead__head">
        <h3><?= e($title) ?></h3>
        <?php if ($sub): ?><p><?= e($sub) ?></p><?php endif; ?>
      </div>
      <div class="lead__grid">
        <label class="field"><span>Full name</span><input name="fname" autocomplete="name" required></label>
        <label class="field"><span>Phone</span><input name="phone" type="tel" inputmode="tel" autocomplete="tel" pattern="[0-9+\s-]{8,15}" required></label>
        <label class="field"><span>Email</span><input name="email" type="email" autocomplete="email" required></label>
        <label class="field"><span>City</span><input name="city" autocomplete="address-level2" required></label>
        <label class="field"><span>Destination</span>
          <select name="destnation" required><option value="">Select country</option>
            <?php foreach ($countries as $c): ?><option><?= e($c) ?></option><?php endforeach; ?>
          </select></label>
        <label class="field"><span>Course</span>
          <select name="course" required><option value="">Select course</option>
            <?php foreach ($courses as $c): ?><option><?= e($c) ?></option><?php endforeach; ?>
          </select></label>
        <div class="field field--pair">
          <label class="field"><span>Intake</span>
            <select name="month" required><option value="">Month</option>
              <?php foreach (['January','February','March','April','May','June','July','August','September','October','November','December'] as $m): ?><option><?= $m ?></option><?php endforeach; ?>
            </select></label>
          <label class="field"><span>Year</span>
            <select name="preferred_year" required><option value="">Year</option>
              <?php for ($i = 0; $i < 3; $i++): ?><option><?= $y + $i ?></option><?php endfor; ?>
            </select></label>
        </div>
        <label class="field field--full"><span>Message <em>(optional)</em></span><textarea name="msg" rows="3"></textarea></label>
      </div>
      <div class="g-recaptcha" data-sitekey="<?= e(CG_RECAPTCHA_SITEKEY) ?>"></div>
      <p class="lead__err" role="alert" hidden></p>
      <button class="btn btn--primary btn--block btn--lg" type="submit">Request a call back <?= icon('arrow', 'ico ico--sm') ?></button>
      <p class="lead__fine"><?= icon('shield', 'ico ico--xs') ?>Your details stay private. See our <a href="privacy-policy.php">privacy policy</a>.</p>
    </form>
    <?php
}

/** Full-width call-to-action band with parallax photo. */
function cta_band($title = 'Ready to plan your study abroad journey?', $sub = 'Book a free session with a senior counsellor. No fees, no obligation.', $img = 'photos/graduates.jpg')
{
    ?>
    <section class="cta" data-parallax-root>
      <div class="cta__media"><img src="assets/img/<?= e($img) ?>" alt="" loading="lazy" data-parallax></div>
      <div class="container cta__inner" data-reveal>
        <div>
          <h2><?= cg_em(e($title)) ?></h2>
          <p><?= e($sub) ?></p>
        </div>
        <div class="cta__actions">
          <a class="btn btn--accent btn--lg" href="contact.php">Book free counselling</a>
          <a class="btn btn--outline-light btn--lg" href="https://wa.me/<?= CG_WHATSAPP ?>" target="_blank" rel="noopener"><?= icon('whatsapp', 'ico ico--sm') ?>WhatsApp us</a>
        </div>
      </div>
    </section>
    <?php
}

/**
 * Two-row testimonials marquee (ported from grid-testimonials-marquee.tsx).
 * Row 1 scrolls left, row 2 right; hover pauses a row; reduced motion turns rows into scrollers.
 */
function tq_card($s, $hidden = false)
{
    $quote = e($s['quote']);
    foreach ($s['highlights'] ?? [] as $h) {
        $quote = str_replace(e($h), '<b>' . e($h) . '</b>', $quote);
    }
    $initials = implode('', array_map(function ($w) { return strtoupper($w[0]); }, array_slice(explode(' ', $s['name']), 0, 2)));
    ?>
    <figure class="tq"<?= $hidden ? ' aria-hidden="true"' : '' ?>>
      <figcaption class="tq__who">
        <span class="tq__avatar" aria-hidden="true"><?= e($initials) ?></span>
        <span class="tq__id"><b><?= e($s['name']) ?></b><small><?= e($s['course']) ?> · <?= e($s['uni']) ?></small></span>
      </figcaption>
      <blockquote>&ldquo;<?= $quote ?>&rdquo;</blockquote>
    </figure>
    <?php
}

function testimonial_marquee(array $stories, $duration = 70)
{
    $half = (int) ceil(count($stories) / 2);
    $rows = [array_slice($stories, 0, $half), array_slice($stories, $half)];
    ?>
    <div class="tmarquee" role="region" aria-label="Student testimonials" style="--tq-duration: <?= (int) $duration ?>s">
      <?php foreach ($rows as $r => $items): $set = array_merge($items, $items); ?>
        <div class="tmarquee__row" tabindex="0" aria-label="Testimonials row <?= $r + 1 ?>">
          <div class="tmarquee__track tmarquee__track--<?= $r === 0 ? 'left' : 'right' ?>">
            <div class="tmarquee__set"><?php foreach ($set as $k => $s) tq_card($s, $k >= count($items)); ?></div>
            <div class="tmarquee__set" aria-hidden="true"><?php foreach ($set as $s) tq_card($s, true); ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php
}

/** Service card with photo thumbnail (home + city pages). */
function service_card($s)
{
    ?>
    <a class="scard scard--thumb" href="other-services.php">
      <span class="scard__thumb"><img src="assets/img/<?= e($s['img']) ?>" alt="" loading="lazy"></span>
      <span class="scard__ico"><?= icon($s['icon']) ?></span>
      <span class="scard__body">
        <h3><?= e($s['title']) ?></h3>
        <p><?= e($s['text']) ?></p>
        <span class="link">Learn more <?= icon('arrow', 'ico ico--xs') ?></span>
      </span>
    </a>
    <?php
}
