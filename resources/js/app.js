import './bootstrap';

// Modal functions
function openModal() { 
    document.getElementById('modal').classList.replace('hidden','flex'); 
}

function closeModal() { 
    document.getElementById('modal').classList.replace('flex','hidden'); 
    resetModal();
}

function resetModal() {
    // Reset form to upload mode
    document.getElementById('modalTitle').textContent = 'Upload Photo';
    document.getElementById('modalSubtitle').textContent = 'Share your work with the world';
    document.getElementById('uploadForm').action = '/visura';
    document.getElementById('methodOverride').value = 'POST';
    document.getElementById('submitBtn').textContent = 'Publish to Gallery →';
    document.getElementById('photographerName').value = '';
    document.getElementById('photoCategory').value = '';
    document.getElementById('previewImg').classList.add('hidden');
    document.getElementById('currentImg').classList.add('hidden');
    document.getElementById('dropContent').classList.remove('hidden');
}

// Edit modal function
function openEditModal(id, imagePath, name, category) {
    const modal = document.getElementById('modal');
    const form = document.getElementById('uploadForm');
    
    // Change to edit mode
    document.getElementById('modalTitle').textContent = 'Edit Photo';
    document.getElementById('modalSubtitle').textContent = 'Update photo details';
    
    // Set form action to update route
    form.action = '/visura/' + id;
    
    // Set method override for PUT
    document.getElementById('methodOverride').value = 'PUT';
    
    // Fill form with existing data
    document.getElementById('photographerName').value = name;
    document.getElementById('photoCategory').value = category;
    
    // Show current image (with option to change)
    const currentImg = document.getElementById('currentImg');
    const previewImg = document.getElementById('previewImg');
    const dropContent = document.getElementById('dropContent');
    const dropZone = document.getElementById('dropZone');
    
    if (imagePath) {
        currentImg.src = '/storage/' + imagePath;
        currentImg.classList.remove('hidden');
        dropContent.classList.add('hidden');
    }
    
    // Show file input for changing image
    dropZone.classList.remove('hidden');
    previewImg.classList.add('hidden');
    
    // Change button text
    document.getElementById('submitBtn').textContent = 'Save Changes';
    
    // Open modal
    modal.classList.replace('hidden', 'flex');
}

document.getElementById('modal')?.addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});

// Image Preview
function previewImage(input) {
    if (!input.files[0]) return;
    const preview = document.getElementById('previewImg');
    const dropContent = document.getElementById('dropContent');
    if (preview && dropContent) {
        preview.src = URL.createObjectURL(input.files[0]);
        preview.classList.remove('hidden');
        dropContent.classList.add('hidden');
    }
}

// Toggle dropdown menu
function toggleMenu(id) {
    const menu = document.getElementById('menu-' + id);
    const allMenus = document.querySelectorAll('.menu-dropdown');
    
    // Close all other menus first
    allMenus.forEach(m => {
        if (m !== menu) {
            m.classList.add('opacity-0', 'invisible', 'scale-95');
            m.classList.remove('opacity-100', 'visible', 'scale-100');
        }
    });
    
    // Toggle current menu
    if (menu.classList.contains('opacity-0')) {
        menu.classList.remove('opacity-0', 'invisible', 'scale-95');
        menu.classList.add('opacity-100', 'visible', 'scale-100');
    } else {
        menu.classList.add('opacity-0', 'invisible', 'scale-95');
        menu.classList.remove('opacity-100', 'visible', 'scale-100');
    }
}

// Close specific menu
function closeMenu(id) {
    const menu = document.getElementById('menu-' + id);
    menu.classList.add('opacity-0', 'invisible', 'scale-95');
    menu.classList.remove('opacity-100', 'visible', 'scale-100');
}

// Make functions available globally
window.openModal = openModal;
window.closeModal = closeModal;
window.openEditModal = openEditModal;
window.previewImage = previewImage;
window.toggleMenu = toggleMenu;
window.closeMenu = closeMenu;

// Close all menus when clicking outside
document.addEventListener('click', function(e) {
    const menus = document.querySelectorAll('.menu-dropdown');
    const buttons = document.querySelectorAll('.menu-btn');
    
    menus.forEach((menu, index) => {
        if (!menu.contains(e.target) && !buttons[index]?.contains(e.target)) {
            menu.classList.add('opacity-0', 'invisible', 'scale-95');
            menu.classList.remove('opacity-100', 'visible', 'scale-100');
        }
    });
});
