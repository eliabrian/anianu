import './bootstrap';

let searchButton = document.getElementById('search-button');
let searchInput = document.getElementById('search-input');

if (searchButton && searchInput) {
    searchButton.addEventListener('click', () => {
        if (searchInput.classList.contains('hidden')) {
            searchInput.classList.remove('hidden')
        } else {
            searchInput.classList.add('hidden')
        }
    })
}

let animeDesc = document.getElementById('anime-desc')
let showMoreButton = document.getElementById('show-more-desc')

if (animeDesc && showMoreButton) {
    showMoreButton.addEventListener('click', () => {
        if (animeDesc.classList.contains('line-clamp-5')) {
            animeDesc.classList.remove('line-clamp-5')
            showMoreButton.innerHTML = 'Show less'
        } else {
            animeDesc.classList.add('line-clamp-5')
            showMoreButton.innerHTML = 'Show more'
        }
    })
}

let selectServer = document.getElementById('server-select');

if (selectServer) {
    let animeFrame = document.getElementById('anime-frame');
    let selected = '';
    for (let i = 0; i < selectServer.length; i++ ) {
       selected = (selectServer.options[i].value)
    }

    selectServer.addEventListener('change', function () {
        animeFrame.src = this.value;
    })
}
