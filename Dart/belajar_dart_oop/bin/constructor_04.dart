class Person{
  String name = 'Guest';
  String? address;
  final String country = 'Indonesia';

  Person(String firstName, String lastName){
    name = firstName;
    address = lastName;
  }
}

void main(){
  var person = Person('fathie_insanie', 'Cirebon');
  print(person.name);
  print(person.address);
}