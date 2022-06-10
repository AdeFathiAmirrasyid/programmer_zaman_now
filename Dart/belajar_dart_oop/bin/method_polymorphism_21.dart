class Employee {
  String name;
  Employee(this.name);
}

class Manager extends Employee {
  Manager(String name) : super(name);
}

class VicePresident extends Manager {
  VicePresident(String name) : super(name);
}

void sayHello(Employee employee){
  print('Hello ${employee.name}');
}
void main(){
  sayHello(Employee('Insani'));
  sayHello(Manager('Insani'));
  sayHello(VicePresident('Insani'));
  // Employee employee = Employee('Insani');
  // print(employee);
  //
  //
  // employee = Manager('Insanie');
  // print(employee);
  //
  // employee = VicePresident('Insanie');
  // print(employee);
}