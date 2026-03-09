<div
    class="photo-card group break-inside-avoid mb-5 rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-xl hover:shadow-purple-100 transition-all duration-500 border border-gray-100">

    {{-- Image --}}
    <div class="card-img relative overflow-hidden">
        <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->photographer_name }}" class="w-full block"/>

        {{-- Overlay --}}
        <div class="card-overlay absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent flex flex-col justify-end p-4">
            <span class="inline-block bg-violet-500/80 text-white text-xs font-semibold px-3 py-1 rounded-full mb-2 w-fit tracking-wide backdrop-blur-sm">
                {{ $photo->type }}
            </span>
        </div>

        {{-- Options Menu (Three Dots) --}}
        <div class="options-menu absolute top-3 right-3">
            <button type="button" onclick="toggleMenu({{ $photo->id }})" class="menu-btn w-8 h-8 rounded-full bg-white/90 border border-gray-200 text-gray-500 flex items-center justify-center hover:bg-white hover:text-gray-700 hover:border-gray-300 transition-all shadow-sm">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="5" r="1.5"/>
                    <circle cx="12" cy="12" r="1.5"/>
                    <circle cx="12" cy="19" r="1.5"/>
                </svg>
            </button>
            {{-- Dropdown Menu --}}
            <div id="menu-{{ $photo->id }}" class="menu-dropdown absolute right-0 top-full mt-2 w-40 bg-white rounded-xl shadow-lg shadow-gray-200 border border-gray-100 py-2 opacity-0 invisible scale-95 transform transition-all duration-200 z-20">
                <button type="button" onclick="openEditModal({{ $photo->id }}, '{{ $photo->image_path }}', '{{ $photo->photographer_name }}', '{{ $photo->type }}'); closeMenu({{ $photo->id }})" class="w-full px-4 py-2.5 text-left text-sm text-gray-700 hover:bg-violet-50 hover:text-violet-600 flex items-center gap-3 transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit
                </button>
                <form method="POST" action="{{ route('photos.destroy', $photo->id) }}" onsubmit="return confirm('Delete this photo?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-2.5 text-left text-sm text-red-600 hover:bg-red-50 flex items-center gap-3 transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Photographer Info --}}
    <div class="p-4 flex items-center gap-3">
        <div class="w-9 h-9 rounded-full bg-gradient-to-br from-violet-500 to-purple-400 flex items-center justify-center text-white text-xs font-bold shadow-md shadow-purple-100 flex-shrink-0">
            {{ strtoupper(substr($photo->photographer_name, 0, 1)) }}
        </div>
        <div class="min-w-0">
            <p class="text-sm font-semibold text-gray-800 truncate">{{ $photo->photographer_name }}</p>
            <p class="text-xs text-gray-400 tracking-wide">{{ $photo->type }}</p>
        </div>
    </div>

</div>

