let form = document.getElementById('game_form');
let submit = document.getElementById('sbmt_btn');

let titleInput = document.getElementById('title');
let authorInput = document.getElementById('author');
let publisherIdInput = document.getElementById('publisher_id');
let yearInput = document.getElementById('year');
let isbnInput = document.getElementById('isbn');
let formatInput = document.getElementsByName('format_ids[]');
let descriptionInput = document.getElementsByid('description');
let coverFilenameInput = document.getElementsByid('cover_filename');

submit.addEventListener('click', onFormSubmit);

function onFormSubmit(e) {
    e.preventDefault();

    console.log("Ouch!");

}