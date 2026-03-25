let cardsContainer = document.getElementById("cards");

cardsContainer.addEventListener('click', handleClicks);

function handleClicks(event) {
    const card = event.target.closest('.card');

    if (!card){
        return;
    };

    const action = event.target.dataset.action;
    if(action === "select"){
        toggleCardHighlight(card);
    }else if(action === "log"){
        logCardTitle(card);
    };
}

function toggleCardHighlight(card) {
    card.classList.toggle('selected');
}

function logCardTitle(card) {
    console.log('Card Title: ', card.dataset.title);
};
