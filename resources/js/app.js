import './bootstrap';


let searchButton = document.getElementById('search-button');
let searchInput = document.getElementById('search-input');

searchButton.addEventListener('click', () => {
    if (searchInput.classList.contains('hidden')) {
        searchInput.classList.remove('hidden')
    } else {
        searchInput.classList.add('hidden')
    }
})