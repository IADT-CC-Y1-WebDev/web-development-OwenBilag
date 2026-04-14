let deleteBookBtn = document.querySelector(".delete");

deleteBookBtn.addEventListener("click", function(evt){
    let btn = evt.target.closest(".deleteBtn");
    if (btn !== null) {
        if((confirm("Are you sure you wish to delete this book?"))) {
            console.log("Deleting book")
        } else {
            evt.preventDefault();
        }
    }
});
