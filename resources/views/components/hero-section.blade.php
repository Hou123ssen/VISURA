

@props(['categories' => []])

{{-- ── Styles ──────────────────────────────────────────────────────── --}}
<style>
  /* ── Reset & Variables ── */
  .cat-carousel-section {
    --accent:       #7c3aed;
    --accent-light: #ede9fe;
    --accent-mid:   #a78bfa;
    --card-w:       280px;
    --card-h:       360px;
    font-family: 'DM Sans', sans-serif;
  }

  /* ── Perspective Stage ── */
  .cat-stage-wrap   { perspective: 1100px; perspective-origin: 50% 45%; }
  .cat-track        { transform-style: preserve-3d; display: flex; align-items: center;
                      justify-content: center; min-height: calc(var(--card-h) + 80px);
                      position: relative; }

  /* ── Individual Slide ── */
  .cat-slide {
    position: absolute;
    width:  var(--card-w);
    flex-shrink: 0;
    transform-style: preserve-3d;
    will-change: transform, opacity, filter;
    cursor: pointer;
  }

  /* ── Card Shell ── */
  .cat-card {
    width: 100%;
    border-radius: 20px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 8px 32px rgba(124,58,237,.10);
    border: 1px solid rgba(124,58,237,.08);
    transform-style: preserve-3d;
    transition: box-shadow .4s ease;
    position: relative;
  }
  .cat-slide[data-state="active"] .cat-card {
    box-shadow: 0 24px 64px rgba(124,58,237,.22), 0 4px 16px rgba(124,58,237,.12);
  }

  /* ── Image area ── */
  .cat-img-wrap {
    width: 100%;
    height: 220px;
    overflow: hidden;
    position: relative;
    background: var(--accent-light);
  }
  .cat-img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .6s cubic-bezier(.25,.46,.45,.94);
  }
  .cat-slide[data-state="active"] .cat-card:hover .cat-img { transform: scale(1.07); }

  /* gradient overlay */
  .cat-img-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(60,10,100,.55) 0%, transparent 60%);
    opacity: 0;
    transition: opacity .35s;
  }
  .cat-slide[data-state="active"] .cat-card:hover .cat-img-overlay { opacity: 1; }

  /* skeleton loader */
  .cat-skeleton {
    position: absolute; inset: 0;
    background: linear-gradient(90deg, #f3f0ff 25%, #e9e4ff 50%, #f3f0ff 75%);
    background-size: 200% 100%;
    animation: catShimmer 1.4s infinite;
  }
  @keyframes catShimmer {
    0%   { background-position: 200% 0; }
    100% { background-position: -200% 0; }
  }
  .cat-img.loaded + .cat-skeleton,
  .cat-skeleton.done { display: none; }

  /* ── Footer ── */
  .cat-card-footer {
    padding: 16px 18px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .cat-title {
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: .95rem;
    color: #1a1a2e;
    letter-spacing: .01em;
  }
  .cat-pill {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: var(--accent-light);
    color: var(--accent);
    font-size: .68rem;
    font-weight: 600;
    padding: 5px 11px;
    border-radius: 99px;
    letter-spacing: .06em;
    text-transform: uppercase;
  }
  .cat-pill svg { width: 10px; height: 10px; }

  /* ── Section header ── */
  .cat-header { text-align: center; margin-bottom: 56px; }
  .cat-eyebrow {
    display: inline-flex; align-items: center; gap: 8px;
    background: var(--accent-light); color: var(--accent);
    font-size: .7rem; font-weight: 600;
    padding: 7px 16px; border-radius: 99px;
    letter-spacing: .15em; text-transform: uppercase;
    margin-bottom: 18px;
  }
  .cat-eyebrow-dot {
    width: 7px; height: 7px; border-radius: 50%;
    background: var(--accent); animation: pulse 2s infinite;
  }
  @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(.8)} }

  .cat-main-title {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: clamp(2rem, 5vw, 3.2rem);
    color: #111;
    line-height: 1.1;
    margin-bottom: 14px;
  }
  .cat-main-title span {
    background: linear-gradient(135deg, #7c3aed, #a855f7, #ec4899);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  .cat-subtitle {
    color: #9ca3af; font-size: .9rem; max-width: 400px; margin: 0 auto;
    line-height: 1.7;
  }

  /* ── Nav buttons ── */
  .cat-nav {
    position: absolute; top: 50%; z-index: 20;
    transform: translateY(-50%);
    width: 46px; height: 46px; border-radius: 50%;
    background: #fff;
    border: 1.5px solid rgba(124,58,237,.18);
    display: flex; align-items: center; justify-content: center;
    color: #6b7280; cursor: pointer;
    box-shadow: 0 4px 20px rgba(124,58,237,.10);
    transition: all .25s;
  }
  .cat-nav:hover { background: var(--accent); color: #fff; border-color: var(--accent);
                   box-shadow: 0 6px 24px rgba(124,58,237,.35); transform: translateY(-50%) scale(1.08); }
  .cat-nav:disabled { opacity: .3; pointer-events: none; }
  .cat-nav-prev { left: 0; }
  .cat-nav-next { right: 0; }

  /* ── Dots ── */
  .cat-dots { display: flex; justify-content: center; gap: 8px; margin-top: 36px; }
  .cat-dot {
    width: 8px; height: 8px; border-radius: 99px;
    background: #ddd6fe; border: none; cursor: pointer;
    transition: all .3s cubic-bezier(.34,1.56,.64,1);
  }
  .cat-dot.active { width: 26px; background: var(--accent); }

  /* ── Autoplay button ── */
  .cat-autoplay-btn {
    display: flex; align-items: center; gap: 6px;
    margin: 16px auto 0; background: none; border: none;
    color: #9ca3af; font-size: .72rem; font-weight: 500;
    letter-spacing: .12em; text-transform: uppercase; cursor: pointer;
    transition: color .25s;
  }
  .cat-autoplay-btn:hover { color: var(--accent); }

  /* ── Progress bar ── */
  .cat-progress-bar {
    height: 2px; background: var(--accent-light);
    border-radius: 2px; overflow: hidden;
    margin: 20px auto 0; max-width: 200px; display: none;
  }
  .cat-progress-bar.visible { display: block; }
  .cat-progress-fill {
    height: 100%; background: var(--accent);
    border-radius: 2px; width: 0%;
    transition: width linear;
  }

  /* ── Responsive ── */
  @media (max-width: 640px) {
    .cat-carousel-section { --card-w: 230px; --card-h: 300px; }
    .cat-img-wrap { height: 180px; }
    .cat-nav { width: 38px; height: 38px; }
  }
</style>

{{-- ── Markup ──────────────────────────────────────────────────────── --}}
<section class="cat-carousel-section py-24 px-6 overflow-hidden">
  <div class="max-w-6xl mx-auto">

    {{-- Header --}}
    <div class="cat-header" id="catHeader">
      <div class="cat-eyebrow">
        <span class="cat-eyebrow-dot"></span>
        Discover
      </div>
      <h2 class="cat-main-title">
        Browse <span>Categories</span>
      </h2>
      <p class="cat-subtitle">
        Explore photography across every genre — from sweeping landscapes to intimate portraits.
      </p>
    </div>

    {{-- Stage --}}
    <div style="position:relative; padding: 0 52px;" id="catStageOuter">

      {{-- Prev --}}
      <button class="cat-nav cat-nav-prev" id="catPrev" aria-label="Previous">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6"/>
        </svg>
      </button>

      {{-- Track --}}
      <div class="cat-stage-wrap">
        <div class="cat-track" id="catTrack">

          @php
            // Unsplash Source — free, no API key, query by keyword
            $unsplashBase = 'https://source.unsplash.com/560x440/?';
            // Fallback seeds so each category always gets a unique consistent image
            $seeds = ['photo', 'camera', 'light', 'color', 'art', 'visual', 'nature', 'city'];
          @endphp

@foreach($categories as $i => $category)
          @php
            $label = $category;
            $imgUrl = 'https://placehold.co/560x440/ede9fe/7c3aed?text=' . urlencode($label) . '&font=roboto';
          @endphp
          <div class="cat-slide"
               data-index="{{ $i }}"
               data-label="{{ $label }}"
               role="group"
               aria-roledescription="slide"
               aria-label="{{ $label }}">

            <div class="cat-card">

              {{-- Image --}}
              <div class="cat-img-wrap">
                <div class="cat-skeleton" id="skel-{{ $i }}"></div>
                <img
                  class="cat-img"
                  data-src="{{ $imgUrl }}"
                  alt="{{ $label }} photography"
                  width="560" height="440"
                  loading="lazy"
                  onload="this.classList.add('loaded'); document.getElementById('skel-{{ $i }}').style.display='none';"
                  onerror="this.src='https://placehold.co/560x440/ede9fe/7c3aed?text={{ urlencode($label) }}'; document.getElementById('skel-{{ $i }}').style.display='none';"
                />
                <div class="cat-img-overlay"></div>
              </div>

              {{-- Footer --}}
              <div class="cat-card-footer">
                <span class="cat-title">{{ $label }}</span>
                <span class="cat-pill">
                  <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                  </svg>
                  Explore
                </span>
              </div>

            </div>
          </div>
          @endforeach

        </div>
      </div>

      {{-- Next --}}
      <button class="cat-nav cat-nav-next" id="catNext" aria-label="Next">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 18l6-6-6-6"/>
        </svg>
      </button>
    </div>

    {{-- Dots --}}
    <div class="cat-dots" id="catDots">
      @foreach($categories as $i => $cat)
        <button class="cat-dot {{ $i===0?'active':'' }}" data-goto="{{ $i }}" aria-label="Slide {{ $i+1 }}"></button>
      @endforeach
    </div>

    {{-- Progress + Autoplay --}}
    <div class="cat-progress-bar" id="catProgress">
      <div class="cat-progress-fill" id="catProgressFill"></div>
    </div>

    <button class="cat-autoplay-btn" id="catAutoplayBtn">
      <svg id="catAutoplayIcon" width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
      <span id="catAutoplayLabel">Autoplay</span>
    </button>

  </div>
</section>


{{-- ── JavaScript ──────────────────────────────────────────────────── --}}
<script type="module">
import { animate, stagger, inView } from 'https://cdn.jsdelivr.net/npm/motion@10.18.0/dist/motion.js';

// ─── Lazy load images ───────────────────────────────────────────────
document.querySelectorAll('.cat-img[data-src]').forEach(img => {
  img.src = img.dataset.src;
});

// ─── Config ─────────────────────────────────────────────────────────
const CFG = {
  autoplayDelay:    3800,
  transitionDur:    0.58,
  // [far-left2, far-left, center, far-right, far-right2]
  positions: [
    { tx: -530, tz: -210, ry: 30,  s: 0.70, o: 0.25 },
    { tx: -265, tz: -95,  ry: 15,  s: 0.85, o: 0.60 },
    { tx:    0, tz:   0,  ry:  0,  s: 1.00, o: 1.00 },
    { tx:  265, tz: -95,  ry: -15, s: 0.85, o: 0.60 },
    { tx:  530, tz: -210, ry: -30, s: 0.70, o: 0.25 },
  ],
  hidden: { tx: 0, tz: -500, ry: 0, s: 0.4, o: 0 },
};

const EASING = [0.34, 1.56, 0.64, 1]; // spring

// ─── State ──────────────────────────────────────────────────────────
const slides      = [...document.querySelectorAll('.cat-slide')];
const dots        = [...document.querySelectorAll('.cat-dot')];
const btnPrev     = document.getElementById('catPrev');
const btnNext     = document.getElementById('catNext');
const progressBar = document.getElementById('catProgress');
const progressFil = document.getElementById('catProgressFill');
const total       = slides.length;
let   current     = 0;
let   autoTimer   = null;
let   isAuto      = false;
let   progAnim    = null;

// ─── Position mapping ────────────────────────────────────────────────
function stateOf(i) {
  const d = ((i - current) % total + total) % total;
  const n = d > total / 2 ? d - total : d;
  // map n to position index [−2,−1,0,1,2]
  if (n ===  0) return 2;   // center
  if (n === -1) return 1;   // left
  if (n ===  1) return 3;   // right
  if (n === -2) return 0;   // far left
  if (n ===  2) return 4;   // far right
  return -1;                // hidden
}

// ─── Animate one slide ───────────────────────────────────────────────
function animSlide(slide, posIdx) {
  const p   = posIdx === -1 ? CFG.hidden : CFG.positions[posIdx];
  const dur = CFG.transitionDur;

  slide.dataset.state = posIdx === 2 ? 'active'
                      : posIdx === -1 ? 'hidden'
                      : Math.abs(posIdx - 2) === 1 ? 'side' : 'far';

  // z-index via style (not animatable via Motion)
  slide.style.zIndex = posIdx === -1 ? '0'
                     : posIdx === 2 ? '10'
                     : Math.abs(posIdx - 2) === 1 ? '6' : '3';

  animate(slide, {
    x:       `${p.tx}px`,
    z:       `${p.tz}px`,
    rotateY: `${p.ry}deg`,
    scale:    p.s,
    opacity:  p.o,
  }, {
    duration: dur,
    easing:   EASING,
  });

  // subtle card tilt reset on active
  const card = slide.querySelector('.cat-card');
  if (card) {
    animate(card, { rotateX: posIdx === 2 ? '0deg' : '2deg' },
      { duration: dur * 0.8, easing: 'ease-out' });
  }
}

// ─── Render all slides ───────────────────────────────────────────────
function render(instant = false) {
  slides.forEach((s, i) => animSlide(s, stateOf(i)));
  dots.forEach((d, i) => d.classList.toggle('active', i === current));
}

// ─── Navigate ───────────────────────────────────────────────────────
function goTo(idx) {
  current = ((idx % total) + total) % total;
  render();
}
function next() { goTo(current + 1); }
function prev() { goTo(current - 1); }

// ─── Autoplay ────────────────────────────────────────────────────────
function startAuto() {
  isAuto = true;
  progressBar.classList.add('visible');
  updateAutoBtn();
  animateProgress();
  autoTimer = setInterval(() => { next(); animateProgress(); }, CFG.autoplayDelay);
}
function stopAuto() {
  isAuto = false;
  clearInterval(autoTimer);
  progressBar.classList.remove('visible');
  updateAutoBtn();
  if (progAnim) progAnim.stop?.();
}
function resetAuto() { if (isAuto) { stopAuto(); startAuto(); } }

function animateProgress() {
  if (progAnim) progAnim.stop?.();
  progressFil.style.width = '0%';
  progAnim = animate(progressFil, { width: '100%' }, { duration: CFG.autoplayDelay / 1000, easing: 'linear' });
}

function updateAutoBtn() {
  document.getElementById('catAutoplayIcon').innerHTML = isAuto
    ? '<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>'
    : '<path d="M8 5v14l11-7z"/>';
  document.getElementById('catAutoplayLabel').textContent = isAuto ? 'Pause' : 'Autoplay';
}

// ─── Events ─────────────────────────────────────────────────────────
btnNext.addEventListener('click', () => { next(); resetAuto(); });
btnPrev.addEventListener('click', () => { prev(); resetAuto(); });

dots.forEach(d => d.addEventListener('click', () => {
  goTo(parseInt(d.dataset.goto)); resetAuto();
}));

document.getElementById('catAutoplayBtn').addEventListener('click', () => {
  isAuto ? stopAuto() : startAuto();
});

// Keyboard
document.addEventListener('keydown', e => {
  if (e.key === 'ArrowRight') { next(); resetAuto(); }
  if (e.key === 'ArrowLeft')  { prev(); resetAuto(); }
});

// Touch / Swipe
let tx0 = 0;
const track = document.getElementById('catTrack');
track.addEventListener('touchstart', e => { tx0 = e.touches[0].clientX; }, { passive: true });
track.addEventListener('touchend',   e => {
  const dx = tx0 - e.changedTouches[0].clientX;
  if (Math.abs(dx) > 45) { dx > 0 ? next() : prev(); resetAuto(); }
});

// Hover tilt on active card
slides.forEach(slide => {
  const card = slide.querySelector('.cat-card');
  if (!card) return;
  card.addEventListener('mousemove', e => {
    if (slide.dataset.state !== 'active') return;
    const r    = card.getBoundingClientRect();
    const relX = (e.clientX - r.left) / r.width  - 0.5;
    const relY = (e.clientY - r.top)  / r.height - 0.5;
    animate(card, {
      rotateX: `${-relY * 8}deg`,
      rotateY: `${relX  * 8}deg`,
    }, { duration: 0.2, easing: 'ease-out' });
  });
  card.addEventListener('mouseleave', () => {
    if (slide.dataset.state !== 'active') return;
    animate(card, { rotateX: '0deg', rotateY: '0deg' },
      { duration: 0.5, easing: [0.34, 1.56, 0.64, 1] });
  });
});

// ─── Entrance animations ─────────────────────────────────────────────
inView('#catHeader', ({ target }) => {
  animate(target.children,
    { opacity: [0, 1], y: [24, 0] },
    { duration: 0.65, delay: stagger(0.12), easing: 'ease-out' });
});

inView('#catStageOuter', ({ target }) => {
  animate(target, { opacity: [0, 1] }, { duration: 0.5, easing: 'ease-out' });
  // stagger slide entrance
  setTimeout(() => {
    slides.forEach((s, i) => {
      const pos = stateOf(i);
      if (pos !== -1) {
        animate(s, { opacity: [0, CFG.positions[pos]?.o ?? 0] },
          { duration: 0.6, delay: Math.abs(pos - 2) * 0.09, easing: 'ease-out' });
      }
    });
  }, 100);
});

// ─── Init ────────────────────────────────────────────────────────────
// Set initial positions without animation
slides.forEach((s, i) => {
  const pos = stateOf(i);
  const p   = pos === -1 ? CFG.hidden : CFG.positions[pos];
  s.style.transform = `translateX(${p.tx}px) translateZ(${p.tz}px) rotateY(${p.ry}deg) scale(${p.s})`;
  s.style.opacity   = `${p.o}`;
  s.style.zIndex    = pos === 2 ? '10' : pos === -1 ? '0' : Math.abs(pos - 2) === 1 ? '6' : '3';
  s.dataset.state   = pos === 2 ? 'active' : pos === -1 ? 'hidden' : Math.abs(pos - 2) === 1 ? 'side' : 'far';
});

dots[0]?.classList.add('active');
</script>