class Person{
  String name = "Person";

  void sayHello(String name){
    print('Hi $name, my name is ${this.name}');
  }
}

class OtherPerson extends Person{
  String name = "Other Person";
}

void main(){
  var person = Person();
  person.sayHello('Insanie');

  var otherPerson = OtherPerson();
  otherPerson.sayHello('insanie');
}