// console.log("Hello world!");

// let myButton = document.getElementById("myBtn");

// function addParagraph(){
//     const p = document.createElement('p');
//     p.innerHTML = 'This is a <strong>paragraph</strong>';
//     document.body.appendChild(p);    
// }

// myButton.addEventListener('click', addParagraph);

let input = document.getElementById('title');

const myBtn = document.getElementById('myBtn');

function addParagraph() {
  const p = document.createElement('p');
  p.innerHTML = input.value;
  document.body.appendChild(p);
};

myBtn.addEventListener('click', addParagraph);

input.addEventListener('keyup', function(e){
    if(e.key === 'Enter'){
        addParagraph();
    }
});
