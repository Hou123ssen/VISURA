<div id="modal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
    <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl shadow-purple-200 p-8 relative">

        <button onclick="closeModal()" class="absolute top-5 right-5 w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-600 transition-all text-sm">✕</button>

        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-violet-600 to-purple-500 flex items-center justify-center mb-5 shadow-lg shadow-purple-200">
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
            </svg>
        </div>

        <h3 id="modalTitle" class="font-display font-bold text-2xl text-gray-900 mb-1">Upload Photo</h3>
        <p id="modalSubtitle" class="text-gray-400 text-sm mb-7">Share your work with the world</p>

        {{-- Upload Form --}}
action="{{ route('visura.store') }}"
            @csrf
            <input type="hidden" name="_method" value="POST" id="methodOverride">

            {{-- Drop Zone --}}
            <div
                id="dropZone"
                onclick="document.getElementById('fileInput').click()"
                class="border-2 border-dashed border-purple-200 hover:border-violet-500 bg-purple-50/50 hover:bg-purple-50 rounded-2xl p-8 text-center mb-5 cursor-pointer transition-all">
                <input type="file" name="image" id="fileInput" accept="image/*" class="hidden" onchange="previewImage(this)"/>
                <div id="dropContent">
                    <svg class="w-10 h-10 text-purple-300 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-sm font-medium text-violet-600 mb-1">Click to select image</p>
                    <p class="text-xs text-gray-400">JPG, PNG, WEBP</p>
                </div>
                <img id="previewImg" class="max-h-40 mx-auto hidden rounded-xl border border-purple-100" alt="preview"/>
                <img id="currentImg" class="max-h-40 mx-auto hidden rounded-xl border border-purple-100" alt="current"/>
            </div>

            {{-- Photographer Name --}}
            <input
                type="text"
                name="photographer_name"
                id="photographerName"
                placeholder="Photographer Name"
                required
                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-300 focus:outline-none focus:border-violet-500 focus:ring-2 focus:ring-purple-100 transition-all mb-3"/>

            {{-- Category --}}
            <select
                name="type"
                id="photoCategory"
                required
                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-500 focus:outline-none focus:border-violet-500 focus:ring-2 focus:ring-purple-100 transition-all mb-6 appearance-none">
                <option value="" disabled selected>Select Category</option>
                <option>Nature</option>
                <option>Portrait</option>
                <option>Landscape</option>
                <option>Pets</option>
                <option>Urban</option>
                <option>Abstract</option>
                <option>Architecture</option>
                <option>Street</option>
            </select>

            {{-- Submit --}}
            <button
                type="submit"
                id="submitBtn"
                class="w-full bg-gradient-to-r from-violet-600 to-purple-500 text-white py-3.5 rounded-xl font-semibold tracking-wide text-sm shadow-lg shadow-purple-200 hover:shadow-xl hover:shadow-purple-300 hover:-translate-y-0.5 transition-all duration-300">
                Publish to Gallery →
            </button>
        </form>

    </div>
</div>

