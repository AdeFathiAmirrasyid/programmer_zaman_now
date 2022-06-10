class Person{
  String name = 'guest';
  String? address;
  final String country = 'Indonesia';


  void sayHello(String paramName){
    print('Hello $paramName, My Name is $name');
  }

  void hello(){
    print('hello, my name is $name');
  }

  void getName(){
    print('hello, my name is $name');
  }
}

extension sayGoodByeOnPerson on Person{
  void sayGoodBye(String paramName){
    print('Good Bye $paramName, from $name');
  }
}

void main(){

  var person1 = Person();
  person1.name = 'diah insani';
  person1.address = 'cirebon';
  // person1.country = 'swiss'; tidak bisa mengubah final field


  print(person1.name);
  print(person1.address);
  print(person1.country);

  person1.sayHello('alisia');
  person1.hello();
  person1.sayGoodBye('fathie');

  Person person2 = Person();
  print(person2);

}