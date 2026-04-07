let form = document.getElementById('edit_form');
let submit = document.getElementById('sbmt_btn');

let id = document.getElementById('id');
let titleInput = document.getElementById('title');
let authorInput = document.getElementById('author');
let publisherIdInput = document.getElementById('publisher_id');
let yearInput = document.getElementById('year');
let isbnInput = document.getElementById('isbn');
let formatInput = document.getElementsByName('format_ids[]');
let descriptionInput = document.getElementById('description');
let coverFilenameInput = document.getElementById('cover_filename');

let idError = document.getElementById('id_error');
let titleError = document.getElementById('title_error');
let authorError = document.getElementById('author_error');
let publisherIdError = document.getElementById('publisher_error');
let yearError = document.getElementById('year_error');
let isbnError = document.getElementById('isbn_error');
let formatError = document.getElementsByName('format_ids[]_error');
let descriptionError = document.getElementById('description_error');
let coverFilenameError = document.getElementById('cover_error');

//creating and showing errors
let errors = {};

function addError(fieldName, message) {
    errors[fieldName] = message;
}

function showFieldErrors() {
    idError.innerHTML = errors.id || '';
    titleError.innerHTML = errors.title || '';
    authorError.innerHTML = errors.author || '';
    publisherIdError.innerHTML = errors.publisher_id || '';
    yearError.innerHTML = errors.year || '';
    isbnError.innerHTML = errors.isbn || '';
    formatError.innerHTML = errors.format || '';
    descriptionError.innerHTML = errors.description || '';
    coverFilenameError.innerHTML = errors.cover_filename || '';

    console.log(errors);
}

//required functions
function isRequired(value) {
    return String(value).trim() !== '';
}

function isMinLength(value, min) {
    return String(value).trim().length >= min;
}

function isMaxLength(value, max) {
    return String(value).trim().length <= max;
}

//submit
submit.addEventListener('click', onFormSubmit);

function onFormSubmit(e) {
    e.preventDefault();

    errors={};

    let titleMin = titleInput.dataset.minlength || 3;
    let titleMax = titleInput.dataset.maxlength || 255;

    let authorMax = authorInput.dataset.maxlength || 255;
    let descMin = 10;

    //id
    if(!isRequired(id.value)){
        addError('id', 'Id is required');
    };

    //title
    if(!isRequired(titleInput.value)){
        addError('title', 'Title is required');
    } else if(!isMinLength(titleInput.value, titleMin)){
        addError('title', 'Title must be atleast ' + titleMin + ' charachters');
    } else if(!isMaxLength(titleInput.value, titleMax)){
        addError('title', 'Title must not exceed' + titleMax + 'charachters');
    };

    //author
    if(!isRequired(authorInput.value)){
        addError('author', 'Author is required');
    }else if(!isMaxLength(authorInput.value, authorMax)){
        addError('author', 'Author must not exceed' + authorMax + 'charachters');
    };

    //publisherId
    if(!isRequired(publisherIdInput.value)){
        addError('publisher_id', 'Publisher is required');
    };

    //year
    if(!isRequired(yearInput.value)){
        addError('year', 'Year is required');
    };

    //formats
    let formatCheck = false;
    for(let i = 0; i < formatInput.length; i++){
        if(formatInput[i].checked){
            formatCheck = true;
            break;
        };
    };
    if(!formatCheck){
        addError('format_ids', 'Format is required');
    };

    //description
    if(!isRequired(descriptionInput.value)){
        addError('description', 'Description is required');
    } else if(!isMinLength(descriptionInput.value, descMin)){
        addError('description', 'Description must be atleast ' + descMin + ' charachters');
    }

    //Cover File
    if(coverFilenameInput.files.length === 0){
        addError('cover_filename', 'Cover is required')
    }

    //show errors
    showFieldErrors();

    if(Object.keys(errors).length === 0){    
        form.submit();
    }
}