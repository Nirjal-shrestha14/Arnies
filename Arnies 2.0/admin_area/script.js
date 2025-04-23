document.addEventListener("DOMContentLoaded", function() {
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const dropdownMenu = this.nextElementSibling;
            const allDropdowns = document.querySelectorAll('.dropdown-menu');
            
            // Close all dropdowns except the clicked one
            allDropdowns.forEach(menu => {
                if (menu !== dropdownMenu) {
                    menu.style.display = 'none';
                }
            });
            
            // Toggle the clicked dropdown
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });
    });

    // Close dropdowns if clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.matches('.dropdown-toggle')) {
            const allDropdowns = document.querySelectorAll('.dropdown-menu');
            allDropdowns.forEach(menu => {
                menu.style.display = 'none';
            });
        }
    });
});

document.querySelectorAll('.sidebar ul li a').forEach(link => {
    link.addEventListener('click', (e) => {
        const dropdown = link.nextElementSibling;
        if (dropdown && dropdown.classList.contains('dropdown')) {
            e.preventDefault();
            dropdown.classList.toggle('active');
        }
    });
});
