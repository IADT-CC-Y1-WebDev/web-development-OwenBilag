import Cat from "./Classes/Cat.js";
import Dog from "./Classes/Dog.js";

let cat = new Cat ("Tom", 2);
let dog = new Dog ("Rover", 2);

let animals = [cat, dog];

animals.forEach((animal) => {
    animal.sleep();
    animal.makeNoise();
    animal.roam(); 
    console.log('--------------');
 }
)

