class Animal {

  constructor(_name, _age){
      this.name = _name;
      this.age = _age;
  }

  sleep(){
      console.log("Sleeping: zZzZzZzZzZzZ");
  }

  makeNoise(){
      console.log("Noises...");
  }

  roam(){
      console.log("Roaming: Roam roam roam");
  }
}

export default Animal;