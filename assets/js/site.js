/* =========================================================
   Career Gyan — Template 03 interactions
   Animation uses Motion (motion.dev, the vanilla-JS build of
   Framer Motion) loaded from the CDN in header.php.
   ========================================================= */
(function () {
  'use strict';

  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var root = document.documentElement;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var M = window.Motion;
  var EASE = [0.22, 1, 0.36, 1];
  // inView passes an IntersectionObserverEntry in Motion v11 and the element in v12
  var el$ = function (x) { return x && x.target ? x.target : x; };

  /* ---------- Motion: entrances, reveals, parallax ---------- */
  if (M && !reduce) {
    root.classList.add('motion-ready');

    M.animate('[data-hero-item]', { opacity: [0, 1], y: [28, 0] }, { duration: 0.8, delay: M.stagger(0.1, { startDelay: 0.1 }), ease: EASE });

    M.inView('[data-reveal]', function (x) {
      var el = el$(x);
      M.animate(el, { opacity: [0, 1], y: [32, 0] }, { duration: 0.75, ease: EASE });
    }, { margin: '0px 0px -12% 0px' });

    M.inView('[data-stagger]', function (x) {
      var el = el$(x);
      M.animate(Array.prototype.slice.call(el.children), { opacity: [0, 1], y: [36, 0] }, { duration: 0.7, delay: M.stagger(0.08), ease: EASE });
    }, { margin: '0px 0px -10% 0px' });

  } else {
    root.classList.remove('motion-ready');
  }


  /* ---------- Parallax scrolling: GSAP ScrollTrigger + Lenis ----------
     Ported from the parallax-scrolling React component to vanilla JS. */
  var G = window.gsap, ST = window.ScrollTrigger, lenis = null;
  if (G && ST && !reduce) {
    G.registerPlugin(ST);

    // Smooth scrolling drives ScrollTrigger
    if (window.Lenis) {
      lenis = new window.Lenis({ lerp: 0.1, smoothWheel: true });
      lenis.on('scroll', ST.update);
      G.ticker.add(function (time) { lenis.raf(time * 1000); });
      G.ticker.lagSmoothing(0);
      window.cgLenis = lenis;
      // In-page anchors scroll through Lenis so they stay smooth
      $$('a[href^="#"]').forEach(function (a) {
        a.addEventListener('click', function (e) {
          var id = a.getAttribute('href');
          if (id.length < 2) return;
          var t = document.querySelector(id);
          if (!t) return;
          e.preventDefault();
          lenis.scrollTo(t, { offset: -90 });
        });
      });
    }

    // Layered headers: layers 1-4 drift at different speeds as the header scrolls away
    var LAYERS = { 1: 70, 2: 55, 3: 40, 4: 10 };
    $$('[data-parallax-layers]').forEach(function (wrap) {
      var tl = G.timeline({ scrollTrigger: { trigger: wrap, start: '0% 0%', end: '100% 0%', scrub: 0 } });
      Object.keys(LAYERS).forEach(function (n, idx) {
        var els = $$('[data-parallax-layer="' + n + '"]', wrap);
        if (els.length) tl.to(els, { yPercent: LAYERS[n], ease: 'none' }, idx === 0 ? 0 : '<');
      });
    });

    // Photo bands further down the page: image drifts through its frame
    $$('[data-parallax-root]').forEach(function (sec) {
      var img = $('[data-parallax]', sec);
      if (!img) return;
      G.fromTo(img, { yPercent: -8 }, { yPercent: 8, ease: 'none', scrollTrigger: { trigger: sec, start: 'top bottom', end: 'bottom top', scrub: 0 } });
    });

    // Images marked data-depth drift gently (collages, feature photos)
    $$('[data-depth]').forEach(function (el) {
      var d = parseFloat(el.dataset.depth) || 10;
      G.fromTo(el, { yPercent: -d / 2 }, { yPercent: d / 2, ease: 'none', scrollTrigger: { trigger: el, start: 'top bottom', end: 'bottom top', scrub: 0 } });
    });


    // Manifesto: wrap each word, then light words up as the paragraph scrolls through
    $$('[data-manifesto]').forEach(function (p) {
      Array.prototype.slice.call(p.childNodes).forEach(function (node) {
        if (node.nodeType !== 3 || !node.textContent.trim()) return;
        var frag = document.createDocumentFragment();
        node.textContent.split(/(\s+)/).forEach(function (part) {
          if (!part) return;
          if (/^\s+$/.test(part)) { frag.appendChild(document.createTextNode(part)); return; }
          var w = document.createElement('span');
          w.className = 'w';
          w.textContent = part;
          frag.appendChild(w);
        });
        p.replaceChild(frag, node);
      });
      var words = $$('.w', p);
      ST.create({
        trigger: p, start: 'top 82%', end: 'bottom 48%', scrub: true,
        onUpdate: function (self) {
          var n = Math.round(self.progress * words.length);
          words.forEach(function (w, k) { w.classList.toggle('is-on', k < n); });
        }
      });
    });

    var mm = G.matchMedia();
    mm.add('(min-width: 861px)', function () {
      // Stacking service cards: each card recedes as the next one slides over it
      var cards = $$('.stack-card');
      cards.forEach(function (card, k) {
        var next = cards[k + 1];
        if (!next) return;
        G.to(card, {
          scale: 0.92, opacity: 0.55, ease: 'none',
          scrollTrigger: { trigger: next, start: 'top bottom', end: 'top 30%', scrub: true }
        });
      });

      // Horizontal journey: pin the section and slide the track sideways
      $$('[data-hscroll]').forEach(function (sec) {
        var track = $('[data-hscroll-track]', sec), bar = $('[data-hscroll-bar]', sec);
        var dist = function () { return Math.max(0, track.scrollWidth - window.innerWidth); };
        if (dist() < 40) return;
        sec.classList.add('is-pinned');
        G.to(track, {
          x: function () { return -dist(); }, ease: 'none',
          scrollTrigger: {
            trigger: sec, start: 'top top', end: function () { return '+=' + dist(); },
            pin: $('.hjourney__pin', sec), scrub: 0.6, invalidateOnRefresh: true,
            onUpdate: function (self) { if (bar) bar.style.width = (self.progress * 100) + '%'; }
          }
        });
        return function () { sec.classList.remove('is-pinned'); };
      });
    });

    window.addEventListener('load', function () { ST.refresh(); });
  }

  /* ---------- Counters ---------- */
  function runCount(el) {
    var to = +el.dataset.count, suf = el.dataset.suffix || '';
    var fmt = function (v) { return Math.round(v).toLocaleString('en-IN') + suf; };
    if (!M || reduce) { el.textContent = fmt(to); return; }
    M.animate(0, to, { duration: 1.6, ease: EASE, onUpdate: function (v) { el.textContent = fmt(v); } });
  }
  if (M && !reduce) {
    M.inView('[data-count]', function (x) { runCount(el$(x)); });
  }


  /* ---------- Home hero: banner slideshow ---------- */
  (function () {
    var slides = $$('.hero__slides .slide'), dots = $$('.hero__dots button');
    if (slides.length < 2) return;
    var i = 0, timer;
    function show(n) {
      i = (n + slides.length) % slides.length;
      slides.forEach(function (s, k) { s.classList.toggle('is-active', k === i); });
      dots.forEach(function (d, k) { d.classList.toggle('is-active', k === i); d.setAttribute('aria-selected', String(k === i)); });
    }
    function play() { clearInterval(timer); if (!reduce) timer = setInterval(function () { if (!document.hidden) show(i + 1); }, 6000); }
    dots.forEach(function (d, k) { d.addEventListener('click', function () { show(k); play(); }); });
    play();
  })();

  /* ---------- Home hero: departures board ---------- */
  (function () {
    var clock = $('[data-clock]');
    if (clock) {
      var tick = function () {
        var d = new Date(), p = function (n) { return (n < 10 ? '0' : '') + n; };
        clock.textContent = p(d.getHours()) + ':' + p(d.getMinutes()) + ' IST';
      };
      tick(); setInterval(tick, 30000);
    }
    var list = $('[data-board]');
    if (!list) return;
    var rows;
    try { rows = JSON.parse(list.dataset.board); } catch (e) { return; }
    var lis = $$('li', list), LEN = 11, CHARS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if (rows.length <= lis.length || reduce) return;
    var shown = rows.slice(0, lis.length), pool = rows.slice(lis.length), slot = 0;
    function flipTo(li, r) {
      var target = r.name.toUpperCase();
      $$('.flap', li).forEach(function (f, k) {
        var want = target[k] && target[k] !== ' ' ? target[k] : ' ', n = 0, steps = 3 + Math.floor(Math.random() * 5);
        (function step() {
          if (n++ >= steps) { f.textContent = want; return; }
          f.textContent = CHARS[Math.floor(Math.random() * CHARS.length)];
          f.classList.remove('is-flip'); void f.offsetWidth; f.classList.add('is-flip');
          setTimeout(step, 70);
        })();
      });
      var a = $('a', li);
      a.href = r.file;
      a.setAttribute('aria-label', r.name + ', intake ' + r.intake + ', ' + r.label);
      $('.brow__intake', li).textContent = r.intake;
      var st = $('.status', li); st.className = 'status status--' + r.status; st.textContent = r.label;
    }
    setInterval(function () {
      if (document.hidden) return;
      var next = pool.shift();
      pool.push(shown[slot]); shown[slot] = next;
      flipTo(lis[slot], next);
      slot = (slot + 1) % lis.length;
    }, 3200);
  })();

  /* ---------- Header ---------- */
  var header = $('#header');
  var onScroll = function () { header.classList.toggle('is-stuck', window.scrollY > 10); };
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  var nav = $('#nav'), burger = $('#burger');
  var scrim = document.createElement('div');
  scrim.className = 'scrim';
  document.body.appendChild(scrim);
  function setNav(open) {
    nav.classList.toggle('is-open', open);
    scrim.classList.toggle('is-on', open);
    burger.setAttribute('aria-expanded', String(open));
    burger.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    document.body.style.overflow = open ? 'hidden' : '';
    if (window.cgLenis) open ? window.cgLenis.stop() : window.cgLenis.start();
  }
  if (burger) burger.addEventListener('click', function () { setNav(!nav.classList.contains('is-open')); });
  scrim.addEventListener('click', function () { setNav(false); });

  // Dropdowns: hover on desktop, click/keyboard everywhere
  $$('.nav__btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = btn.parentNode, open = !item.classList.contains('is-open');
      $$('.nav__item.is-open').forEach(function (o) { if (o !== item) { o.classList.remove('is-open'); $('.nav__btn', o).setAttribute('aria-expanded', 'false'); } });
      item.classList.toggle('is-open', open);
      btn.setAttribute('aria-expanded', String(open));
    });
  });
  document.addEventListener('click', function (e) {
    if (!e.target.closest('.nav__item')) $$('.nav__item.is-open').forEach(function (o) { o.classList.remove('is-open'); $('.nav__btn', o).setAttribute('aria-expanded', 'false'); });
  });
  document.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') return;
    setNav(false);
    $$('.nav__item.is-open').forEach(function (o) { o.classList.remove('is-open'); });
    $$('.modal.is-open').forEach(closeModal);
  });

  /* ---------- Filter tabs (destinations) ---------- */
  $$('[data-filter]').forEach(function (tabs) {
    var grid = $(tabs.dataset.filter);
    if (!grid) return;
    var big = $('.ccard--big', grid);
    $$('button', tabs).forEach(function (b) {
      b.addEventListener('click', function () {
        $$('button', tabs).forEach(function (x) { x.classList.remove('is-on'); x.setAttribute('aria-selected', 'false'); });
        b.classList.add('is-on'); b.setAttribute('aria-selected', 'true');
        var f = b.dataset.f, shown = [];
        $$('[data-region]', grid).forEach(function (c) {
          var ok = f === 'all' || (' ' + c.dataset.region + ' ').indexOf(' ' + f + ' ') > -1;
          c.classList.toggle('is-hidden', !ok);
          if (ok) shown.push(c);
        });
        if (big) big.classList.toggle('ccard--big', f === 'all');
        if (M && !reduce) M.animate(shown, { opacity: [0, 1], scale: [0.96, 1] }, { duration: 0.45, delay: M.stagger(0.04), ease: EASE });
      });
    });
  });

  /* ---------- Testimonial carousel ---------- */
  $$('[data-carousel]').forEach(function (car) {
    var slides = $$('.tcard', car), dots = $('.carousel__dots', car), toggle = $('[data-toggle]', car);
    if (!slides.length) return;
    var i = 0, timer = null, paused = reduce, hovering = false;
    dots.innerHTML = slides.map(function (_, n) {
      return '<button role="tab" aria-label="Show testimonial ' + (n + 1) + '" aria-selected="false"></button>';
    }).join('');
    var dotBtns = $$('button', dots);
    function go(n) {
      i = (n + slides.length) % slides.length;
      slides.forEach(function (s, k) { s.classList.toggle('is-active', k === i); s.setAttribute('aria-hidden', String(k !== i)); });
      dotBtns.forEach(function (d, k) { d.setAttribute('aria-selected', String(k === i)); });
      if (M && !reduce) M.animate($('.tcard__body', slides[i]), { opacity: [0, 1], x: [24, 0] }, { duration: 0.6, ease: EASE });
    }
    function schedule() {
      clearInterval(timer);
      if (!paused && !hovering) timer = setInterval(function () { go(i + 1); }, 6500);
    }
    function setPaused(p) {
      paused = p;
      toggle.setAttribute('aria-label', p ? 'Resume auto-rotation' : 'Pause auto-rotation');
      toggle.innerHTML = p
        ? '<svg class="ico ico--sm" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5l11 7-11 7z"/></svg>'
        : '<svg class="ico ico--sm" viewBox="0 0 24 24" aria-hidden="true"><path d="M9 6v12M15 6v12"/></svg>';
      schedule();
    }
    $('[data-prev]', car).addEventListener('click', function () { go(i - 1); schedule(); });
    $('[data-next]', car).addEventListener('click', function () { go(i + 1); schedule(); });
    dotBtns.forEach(function (d, k) { d.addEventListener('click', function () { go(k); schedule(); }); });
    toggle.addEventListener('click', function () { setPaused(!paused); });
    car.addEventListener('mouseenter', function () { hovering = true; schedule(); });
    car.addEventListener('mouseleave', function () { hovering = false; schedule(); });
    car.addEventListener('focusin', function () { hovering = true; schedule(); });
    car.addEventListener('focusout', function () { hovering = false; schedule(); });
    car.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowLeft') { go(i - 1); schedule(); }
      if (e.key === 'ArrowRight') { go(i + 1); schedule(); }
    });
    go(0);
    setPaused(reduce);
  });

  /* ---------- Forms ---------- */
  $$('[data-lead]').forEach(function (form) {
    var err = $('.lead__err', form);
    form.addEventListener('submit', function (e) {
      var bad = [];
      $$('[required]', form).forEach(function (f) {
        var ok = f.checkValidity();
        f.closest('.field').classList.toggle('is-bad', !ok);
        if (!ok) bad.push(f);
      });
      var cap = $('.g-recaptcha', form) && window.grecaptcha && window.grecaptcha.getResponse ? window.grecaptcha.getResponse() : 'skip';
      if (bad.length || !cap) {
        e.preventDefault();
        err.textContent = bad.length ? 'Please complete the highlighted fields.' : 'Please confirm you are not a robot.';
        err.hidden = false;
        if (bad[0]) bad[0].focus();
      }
    });
    form.addEventListener('input', function (e) {
      var f = e.target.closest('.field');
      if (f && f.classList.contains('is-bad') && e.target.checkValidity()) f.classList.remove('is-bad');
    });
  });

  /* ---------- Modal (e-book download) ---------- */
  function openModal(m, trigger) {
    m.classList.add('is-open');
    m._trigger = trigger;
    if (window.cgLenis) window.cgLenis.stop();
    var first = $('input:not([type=hidden])', m);
    if (first) setTimeout(function () { first.focus(); }, 50);
  }
  function closeModal(m) {
    m.classList.remove('is-open');
    if (window.cgLenis) window.cgLenis.start();
    if (m._trigger) m._trigger.focus();
  }
  $$('[data-modal-open]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var m = $(btn.dataset.modalOpen);
      if (!m) return;
      if (btn.dataset.id) { var h = $('[name="ebook_id"]', m); if (h) h.value = btn.dataset.id; }
      if (btn.dataset.title) { var t = $('[data-modal-title]', m); if (t) t.textContent = btn.dataset.title; }
      openModal(m, btn);
    });
  });
  $$('.modal').forEach(function (m) {
    m.addEventListener('click', function (e) { if (e.target === m || e.target.closest('[data-modal-close]')) closeModal(m); });
  });

  /* ---------- Partner marquee: duplicate for a seamless loop ---------- */
  $$('.logos__row').forEach(function (row) { row.innerHTML += row.innerHTML.replace(/alt="[^"]*"/g, 'alt="" aria-hidden="true"'); });
})();
