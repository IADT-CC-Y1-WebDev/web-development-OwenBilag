console.log("hello world");

let user = {
    firstName: "John",
    ladtName: "Jones",
    age: 25,
    hobbies: ["Gym", "Movies"],
    friends: [
        {
        firstName: "Amanda",
        ladtName: "Hugnkis",
        age: 23            
        }
    ]

};

let donuts = ["Chocolate", "Custard", "Jam"];

donuts.forEach((donut, i) => {
    console.log(`Option ${i+1}: ${donut}`)
});