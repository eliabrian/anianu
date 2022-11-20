import './bootstrap';
import './carousel';
import 'flowbite';

let searchButton = document.getElementById('search-button');
let searchInput = document.getElementById('search-input');

searchButton.addEventListener('click', () => {
    if (searchInput.classList.contains('hidden')) {
        searchInput.classList.remove('hidden')
    } else {
        searchInput.classList.add('hidden')
    }
})

let animeDesc = document.getElementById('anime-desc')
let showMoreButton = document.getElementById('show-more-desc')

showMoreButton.addEventListener('click', () => {
    if (animeDesc.classList.contains('line-clamp-5')) {
        animeDesc.classList.remove('line-clamp-5')
        showMoreButton.innerHTML = 'Show less'
    } else {
        animeDesc.classList.add('line-clamp-5')
        showMoreButton.innerHTML = 'Show more'
    }
})

const carousel = new Carousel(items, options);

