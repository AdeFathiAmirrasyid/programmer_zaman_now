void sayHello({required String firstName, String lastName = 'Default'}) {
  print('Hello $firstName $lastName');
}

void main() {
  sayHello(firstName: 'alisia');
  sayHello(firstName: 'diah');
  sayHello(lastName: 'insani', firstName: 'Natalia');
  sayHello(lastName: 'insani', firstName: 'diah');
}
