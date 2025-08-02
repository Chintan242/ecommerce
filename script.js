let searchForm = document.querySelector('.search-form');
let cartDropdown = document.querySelector('.cart-dropdown');
let loginForm = document.querySelector('.login-form');

document.querySelector('#search').onclick = () => {
    searchForm.classList.toggle('search-form-active');
    cartDropdown.style.display = 'none'; // Hide cart
    loginForm.style.display = 'none';    // Hide login
};

document.querySelector('#cart').onclick = () => {
    cartDropdown.style.display = (cartDropdown.style.display === 'none' || cartDropdown.style.display === '') ? 'block' : 'none';
    searchForm.classList.remove('search-form-active'); // Hide search
    loginForm.style.display = 'none';                 // Hide login
};

document.querySelector('#user-btn').onclick = () => {
    loginForm.style.display = (loginForm.style.display === 'none' || loginForm.style.display === '') ? 'block' : 'none';
    searchForm.classList.remove('search-form-active'); // Hide search
    cartDropdown.style.display = 'none';               // Hide cart
};


// Grab the menu button and the navbar
const menuBtn = document.querySelector('#menu-btn');
const navbar = document.querySelector('.navbar');

// Toggle the menu on smaller screens
menuBtn.addEventListener('click', () => {
    navbar.classList.toggle('active');
});

// Optional: Close the menu when clicking outside
document.addEventListener('click', (e) => {
    if (!menuBtn.contains(e.target) && !navbar.contains(e.target)) {
        navbar.classList.remove('active');
    }
});


