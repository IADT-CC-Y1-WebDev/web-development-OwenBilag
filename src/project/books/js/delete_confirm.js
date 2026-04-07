let deleteBook = document.getElementById("deleteBtn");

deleteBook.addEventListener('click', function(evt){
    if((confirm("Are you sure you wish to delete this book?"))) {
        console.log("Deleting story")
    } else {
        evt.preventDefault();
    }
});