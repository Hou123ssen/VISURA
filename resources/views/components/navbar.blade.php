<nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-purple-100">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        {{-- Logo --}}
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-violet-600 to-purple-500 flex items-center justify-center shadow-lg shadow-purple-200">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
                    <path d="M4 5a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm10 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zm10 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"/>
                </svg>
            </div>
            <span class="font-display font-bold text-xl tracking-wider text-gray-900">VISURA</span>
        </div>

        {{-- Nav Links --}}
        <div class="hidden md:flex items-center gap-8">
            <a href="#" class="text-sm text-violet-600 font-medium tracking-wide">Gallery</a>
            <a href="#" class="text-sm text-gray-400 hover:text-gray-700 transition-colors tracking-wide">Explore</a>
            <a href="#" class="text-sm text-gray-400 hover:text-gray-700 transition-colors tracking-wide">Photographers</a>
        </div>

        {{-- Upload Button --}}
        <button
            onclick="openModal()"
            class="bg-gradient-to-r from-violet-600 to-purple-500 text-white px-5 py-2.5 rounded-full text-sm font-semibold tracking-wide shadow-lg shadow-purple-200 hover:shadow-purple-300 hover:-translate-y-0.5 transition-all duration-300 flex items-center gap-2">
            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Upload Photo
        </button>
    </div>
</nav>

