document.addEventListener("DOMContentLoaded", function() {
    const mainOptions = document.querySelectorAll('.main-option');
    
    mainOptions.forEach(option => {
        option.addEventListener('click', function() {
            const subOptions = option.nextElementSibling;
            if (subOptions.classList.contains('sub-options')) {
                subOptions.style.display = (subOptions.style.display === 'block') ? 'none' : 'block';
            }
        });
    });
});