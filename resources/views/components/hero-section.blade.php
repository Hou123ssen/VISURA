<section class="pt-32 pb-20 px-6 bg-gradient-to-b from-purple-50/60 to-white">
    <div class="max-w-7xl mx-auto">
        <div class="max-w-3xl">

            <span class="inline-flex items-center gap-2 bg-purple-100 text-purple-600 text-xs font-semibold px-4 py-2 rounded-full tracking-widest uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-purple-500 animate-pulse"></span>
                Photography Gallery Platform
            </span>

            <h1 class="font-display font-extrabold text-5xl md:text-6xl lg:text-7xl leading-tight mb-6 text-gray-900">
                Where <span class="gradient-text">Moments</span><br/>
                Live Forever
            </h1>

            <p class="text-gray-400 text-base leading-relaxed max-w-lg mb-10">
                A curated platform for photographers to upload, showcase, and manage their finest work. Every photo tells a story worth sharing.
            </p>

            <div class="flex items-center gap-4 flex-wrap">
                <button
                    onclick="openModal()"
                    class="bg-gradient-to-r from-violet-600 to-purple-500 text-white px-8 py-3.5 rounded-full font-semibold tracking-wide shadow-lg shadow-purple-200 hover:shadow-xl hover:shadow-purple-300 hover:-translate-y-0.5 transition-all duration-300 text-sm">
                    Start Uploading →
                </button>
                <button
                    onclick="document.getElementById('gallery-section').scrollIntoView({behavior:'smooth'})"
                    class="px-8 py-3.5 rounded-full text-sm font-medium text-violet-600 border border-purple-200 hover:border-purple-400 hover:bg-purple-50 transition-all duration-300">
                    View Gallery
                </button>
            </div>

            {{-- Stats --}}
            <div class="flex items-center gap-10 mt-14 pt-10 border-t border-purple-100">
                <div>
                    <div class="font-display font-bold text-3xl gradient-text" id="heroTotal">{{ $photos->count() }}</div>
                    <div class="text-xs text-gray-400 tracking-widest uppercase mt-1">Photos</div>
                </div>
                <div class="w-px h-10 bg-purple-100"></div>
                <div>
                    <div class="font-display font-bold text-3xl gradient-text" id="heroPhotogs">{{ $photos->pluck('photographer_name')->unique()->count() }}</div>
                    <div class="text-xs text-gray-400 tracking-widest uppercase mt-1">Photographers</div>
                </div>
                <div class="w-px h-10 bg-purple-100"></div>
                <div>
                    <div class="font-display font-bold text-3xl gradient-text">6</div>
                    <div class="text-xs text-gray-400 tracking-widest uppercase mt-1">Categories</div>
                </div>
            </div>

        </div>
    </div>
</section>

