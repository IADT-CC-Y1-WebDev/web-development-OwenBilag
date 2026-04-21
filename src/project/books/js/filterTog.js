let toggleFilter = document.getElementById('filterToggle');
let flt = document.getElementById('filterPart');

toggleFilter.addEventListener('click', (e) => {
    toggle();
})

function toggle(){
    flt.classList.toggle('hidden');
}