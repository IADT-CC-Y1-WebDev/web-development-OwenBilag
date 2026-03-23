let aplyBtn = document.getElementById('apply_filters');
let clrBtn = document.getElementById('clear_filters');

let cards = document.querySelector('filters');

let form = document.getElementById('filters');

aplyBtn.addEventListener('click', (event) => {
    event.preventDefault();
    applyFilters();
});

clrBtn.addEventListener('click', (event) => {
    event.preventDefault();
    clearFilters();
});

function applyFilters() {
    let filters = getFilters();
    let matches = [];

    for(let i = 0; i != cards.length; i++){
        let card = cards[i];
        matches[i] = cardMatches(card, filters);
    }
    console.log(matches);
};

function cardMatches(crd, fltrs){
    console.log(crd.dataset.title, fltrs.titleFilter);
    return crd.dataset.title.title.toLowerCase().includes(fltrs.titleFilter);
}

function getFilters() {
    const titleEl = form.elements['title_filter'];
    const genreEl = form.elements['genre_filter'];
    const platformEl = form.elements['platform_filter'];
    const sortEl = form.elements['sort_by'];

    let titleFilter = (titleEl.value || '').trim().toLowerCase();
    let genreFilter = genreEl.value || '';
    let platformFilter = platformEl.value || '';
    let sortBy = sortEl.value || 'title_asc';  

    return{
        "titleFilter" : titleFilter,
        "genreFilter" : genreFilter,
        "platformFilter" : platformFilter,
        "sortBy" : sortBy
    };
};

function clearFilters() {
    console.log("Clearing filters");
}