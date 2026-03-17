<section id="gallery-section" class="py-16 px-6">
    <div class="max-w-7xl mx-auto">

        {{-- Search + Filter Form (Laravel) --}}
        <form method="GET" action="{{ route('visura.index') }}"
            class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-12">

            {{-- Search --}}
            <div class="relative w-full md:w-80">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 w-4 h-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z" />
                </svg>
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search photographer..."
                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-full text-sm text-gray-700 placeholder-gray-300 focus:outline-none focus:border-purple-400 focus:ring-2 focus:ring-purple-100 transition-all" />
            </div>

            {{-- Filter Tabs --}}
            <div class="flex flex-wrap gap-2">
                <button type="submit" name="category" value="all"
                    class="px-4 py-2 rounded-full text-xs font-semibold tracking-wide {{ ($category ?? 'all') === 'all' ? 'bg-violet-600 text-white shadow-md shadow-purple-200' : 'bg-gray-100 text-gray-500 hover:bg-purple-50 hover:text-violet-600' }} transition-all">All</button>
                <button type="submit" name="category" value="Nature"
                    class="px-4 py-2 rounded-full text-xs font-medium tracking-wide {{ ($category ?? '') === 'Nature' ? 'bg-violet-600 text-white shadow-md shadow-purple-200' : 'bg-gray-100 text-gray-500 hover:bg-purple-50 hover:text-violet-600' }} transition-all">Nature</button>
                <button type="submit" name="category" value="Portrait"
                    class="px-4 py-2 rounded-full text-xs font-medium tracking-wide {{ ($category ?? '') === 'Portrait' ? 'bg-violet-600 text-white shadow-md shadow-purple-200' : 'bg-gray-100 text-gray-500 hover:bg-purple-50 hover:text-violet-600' }} transition-all">Portrait</button>
                <button type="submit" name="category" value="Landscape"
                    class="px-4 py-2 rounded-full text-xs font-medium tracking-wide {{ ($category ?? '') === 'Landscape' ? 'bg-violet-600 text-white shadow-md shadow-purple-200' : 'bg-gray-100 text-gray-500 hover:bg-purple-50 hover:text-violet-600' }} transition-all">Landscape</button>
                <button type="submit" name="category" value="Pets"
                    class="px-4 py-2 rounded-full text-xs font-medium tracking-wide {{ ($category ?? '') === 'Pets' ? 'bg-violet-600 text-white shadow-md shadow-purple-200' : 'bg-gray-100 text-gray-500 hover:bg-purple-50 hover:text-violet-600' }} transition-all">Pets</button>
                <button type="submit" name="category" value="Urban"
                    class="px-4 py-2 rounded-full text-xs font-medium tracking-wide {{ ($category ?? '') === 'Urban' ? 'bg-violet-600 text-white shadow-md shadow-purple-200' : 'bg-gray-100 text-gray-500 hover:bg-purple-50 hover:text-violet-600' }} transition-all">Urban</button>
            </div>

        </form>

        {{-- Masonry Grid --}}
        <div class="min-h-[60vh] grid place-items-center py-20" id="galleryGrid">
            @forelse($photos as $photo)
                <x-photo-card :photo="$photo" />
            @empty
                <div class="text-center max-w-lg mx-auto px-3" id="emptyState">
                    <div class="w-24 h-24 mx-auto mb-8 rounded-3xl  flex items-center justify-center shadow-xl">
                        <svg class="w-12 h-12 text-violet-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">Get started by uploading your first photo to
                        showcase your work</p>

                </div>
            @endforelse
        </div>

    </div>
</section>
