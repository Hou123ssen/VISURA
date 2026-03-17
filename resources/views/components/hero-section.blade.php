{{-- ══ HERO ══ --}}
<section class="relative min-h-screen flex items-center pt-20 overflow-hidden">

    {{-- Diffuse ambient bg --}}
    <div class="absolute inset-0 pointer-events-none"
        style="background:radial-gradient(ellipse 65% 55% at 15% 50%,rgba(139,92,246,0.07) 0%,transparent 100%);"></div>
    <div class="absolute inset-0 pointer-events-none"
        style="background:radial-gradient(ellipse 50% 60% at 85% 55%,rgba(59,130,246,0.05) 0%,transparent 100%);"></div>

    <div class="max-w-7xl mx-auto px-6 w-full">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- ══ LEFT: Text ══ --}}
            <div>

                {{-- Eyebrow --}}
                <div
                    class="pill inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs text-violet-300 tracking-widest uppercase mb-8 fade-up d1">
                    <span class="w-1.5 h-1.5 rounded-full bg-violet-400 animate-pulse"></span>
                    Professional Photography
                </div>

                {{-- Name / Title --}}
                <h1 class="font-display font-extrabold leading-none mb-4 fade-up d2"
                    style="font-size:clamp(2.6rem,6.5vw,5rem);">
                    <span class="text-white block tracking-tight">VISURA</span>
                    <span class="grad-text block tracking-tight">STUDIO</span>
                </h1>

                {{-- Tagline --}}
                <p class="font-display font-semibold text-xl mb-6 fade-up d2"
                    style="color:rgba(255,255,255,0.35);letter-spacing:.04em;">
                    Capturing Light. Framing Stories.
                </p>

                <p class="text-[#A1A1AA] text-sm leading-relaxed max-w-md mb-10 fade-up d3">
                    A personal portfolio showcasing fine art photography — from sweeping landscapes to intimate
                    portraits. Every frame is a world waiting to be discovered.
                </p>

                {{-- CTA Buttons --}}
                <div class="flex items-center gap-4 flex-wrap fade-up d4">
                    <button onclick="openModal()"
                        class="btn-primary px-8 py-3.5 rounded-full font-semibold tracking-wide text-sm">
                        Upload Photo
                    </button>
                    <button onclick="document.getElementById('gallery-section').scrollIntoView({behavior:'smooth'})"
                        class="btn-ghost px-8 py-3.5 rounded-full text-sm font-medium tracking-wide">
                        View Gallery
                    </button>
                </div>

                {{-- Stats --}}
                <div class="flex items-center gap-10 mt-14 pt-10 fade-up d4"
                    style="border-top:1px solid rgba(255,255,255,0.06);">
                    <div>
                        {{ $photos?->count() ?? 0 }}
                        <div class="text-xs text-[#A1A1AA] tracking-widest uppercase mt-1">Photos</div>
                    </div>
                    <div class="w-px h-10" style="background:rgba(255,255,255,0.08);"></div>
                    <div> 
                        {{ $categories?->count() ?? 0 }}
                        <div class="text-xs text-[#A1A1AA] tracking-widest uppercase mt-1">Photographers</div>
                    </div>
                    <div class="w-px h-10" style="background:rgba(255,255,255,0.08);"></div>
                    <div>
                        {{ count($categories ?? []) }}
                        <div class="text-xs text-[#A1A1AA] tracking-widest uppercase mt-1">Categories</div>
                    </div>
                </div>

            </div>

            {{-- ══ RIGHT: Floating Cards with REAL images ══ --}}
            <div class="relative h-[560px] hidden lg:block" id="heroCards">

                {{-- ── Card A — top right ── --}}
                <div class="hero-card absolute top-0 right-6 w-48 h-64 rounded-2xl overflow-hidden"
                    style="transform:rotate(3deg);animation:heroFloat 6s ease-in-out infinite;">
                    <img src="https://picsum.photos/seed/portrait1/384/512" alt="Portrait photography"
                        class="hero-img w-full h-full object-cover" loading="eager"
                        onload="this.classList.add('loaded')"
                        onerror="this.parentElement.style.background='linear-gradient(145deg,#1a103a,#2d1b69)'" />
                    {{-- overlay --}}
                    <div class="absolute inset-0 pointer-events-none"
                        style="background:linear-gradient(to top,rgba(10,8,25,0.92) 0%,rgba(10,8,25,0.15) 50%,transparent 100%);">
                    </div>
                    {{-- label --}}
                    <div class="absolute bottom-0 left-0 right-0 p-3">
                        <div class="text-xs mb-0.5" style="color:#A1A1AA;">Portrait</div>
                        <div class="text-sm font-display font-bold text-white">Series I</div>
                    </div>
                    {{-- top badge --}}
                    <div class="absolute top-3 left-3 flex items-center gap-1.5 px-2.5 py-1 rounded-full"
                        style="background:rgba(10,8,25,0.65);border:1px solid rgba(139,92,246,0.25);backdrop-filter:blur(8px);">
                        <span class="w-1.5 h-1.5 rounded-full"
                            style="background:#a78bfa;box-shadow:0 0 5px #a78bfa;"></span>
                        <span class="text-xs font-medium" style="color:rgba(255,255,255,0.7);">Featured</span>
                    </div>
                </div>

                {{-- ── Card B — left center (tallest) ── --}}
                <div class="hero-card absolute top-20 left-0 w-52 h-72 rounded-2xl overflow-hidden"
                    style="transform:rotate(-2deg);animation:heroFloat 7s ease-in-out infinite;animation-delay:1.8s;">
                    <img src="https://picsum.photos/seed/landscape2/416/576" alt="Landscape photography"
                        class="hero-img w-full h-full object-cover" loading="eager"
                        onload="this.classList.add('loaded')"
                        onerror="this.parentElement.style.background='linear-gradient(145deg,#0f1f3a,#1a3a6b)'" />
                    <div class="absolute inset-0 pointer-events-none"
                        style="background:linear-gradient(to top,rgba(10,8,25,0.92) 0%,rgba(10,8,25,0.1) 55%,transparent 100%);">
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-3">
                        <div class="text-xs mb-0.5" style="color:#A1A1AA;">Landscape</div>
                        <div class="text-sm font-display font-bold text-white">Series II</div>
                    </div>
                    <div class="absolute top-3 left-3 flex items-center gap-1.5 px-2.5 py-1 rounded-full"
                        style="background:rgba(10,8,25,0.65);border:1px solid rgba(59,130,246,0.25);backdrop-filter:blur(8px);">
                        <span class="w-1.5 h-1.5 rounded-full"
                            style="background:#60a5fa;box-shadow:0 0 5px #60a5fa;"></span>
                        <span class="text-xs font-medium" style="color:rgba(255,255,255,0.7);">New</span>
                    </div>
                </div>

                {{-- ── Card C — bottom right ── --}}
                <div class="hero-card absolute bottom-4 right-0 w-44 h-56 rounded-2xl overflow-hidden"
                    style="transform:rotate(1.5deg);animation:heroFloat 5.5s ease-in-out infinite;animation-delay:0.9s;">
                    <img src="https://picsum.photos/seed/nature3/352/448" alt="Nature photography"
                        class="hero-img w-full h-full object-cover" loading="eager"
                        onload="this.classList.add('loaded')"
                        onerror="this.parentElement.style.background='linear-gradient(145deg,#1f0f28,#3a1055)'" />
                    <div class="absolute inset-0 pointer-events-none"
                        style="background:linear-gradient(to top,rgba(10,8,25,0.92) 0%,rgba(10,8,25,0.12) 55%,transparent 100%);">
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-3">
                        <div class="text-xs mb-0.5" style="color:#A1A1AA;">Nature</div>
                        <div class="text-sm font-display font-bold text-white">Series III</div>
                    </div>
                    <div class="absolute top-3 left-3 flex items-center gap-1.5 px-2.5 py-1 rounded-full"
                        style="background:rgba(10,8,25,0.65);border:1px solid rgba(236,72,153,0.25);backdrop-filter:blur(8px);">
                        <span class="w-1.5 h-1.5 rounded-full"
                            style="background:#f472b6;box-shadow:0 0 5px #f472b6;"></span>
                        <span class="text-xs font-medium" style="color:rgba(255,255,255,0.7);">Popular</span>
                    </div>
                </div>

                {{-- ── Card D — center (small accent card) ── --}}
                <div class="hero-card absolute w-36 h-44 rounded-2xl overflow-hidden"
                    style="top:38%;left:30%;transform:rotate(-1deg);animation:heroFloat 8s ease-in-out infinite;animation-delay:3s;z-index:5;">
                    <img src="https://picsum.photos/seed/street4/288/352" alt="Street photography"
                        class="hero-img w-full h-full object-cover" loading="eager"
                        onload="this.classList.add('loaded')"
                        onerror="this.parentElement.style.background='linear-gradient(145deg,#12202a,#1a3040)'" />
                    <div class="absolute inset-0 pointer-events-none"
                        style="background:linear-gradient(to top,rgba(10,8,25,0.92) 0%,rgba(10,8,25,0.1) 60%,transparent 100%);">
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-3">
                        <div class="text-xs mb-0.5" style="color:#A1A1AA;">Street</div>
                        <div class="text-sm font-display font-bold text-white">Series IV</div>
                    </div>
                </div>

              
            </div>

        </div>
    </div>
</section>

{{-- ── Hero card styles ── --}}
<style>
    @keyframes heroFloat {

        0%,
        100% {
            transform: translateY(0) rotate(var(--rot, 0deg));
        }

        50% {
            transform: translateY(-16px) rotate(var(--rot, 0deg));
        }
    }

    .hero-card {
        background: #1E1E1E;
        border: 1px solid rgba(255, 255, 255, 0.07);
        box-shadow:
            0 16px 48px rgba(0, 0, 0, 0.6),
            0 2px 8px rgba(0, 0, 0, 0.4);
        transition: box-shadow .4s ease;
    }

    .hero-card:hover {
        box-shadow:
            0 24px 64px rgba(0, 0, 0, 0.7),
            0 0 0 1px rgba(139, 92, 246, 0.25),
            0 0 40px rgba(139, 92, 246, 0.1);
    }

    /* Image fade-in on load */
    .hero-img {
        opacity: 0;
        transition: opacity .6s ease;
    }

    .hero-img.loaded {
        opacity: 1;
    }
</style>
