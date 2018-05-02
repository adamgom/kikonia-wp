
console.log('test12345');

function Person(name) {
  this.name = name;
  this.spelling = function() {
    console.log('My name is ' + this.name);
  };
}

module.exports = Person;

// class Person {
//   constructor() {
   
//   }
  
//   testign() {
//     console.log('class works');
//   }

// }