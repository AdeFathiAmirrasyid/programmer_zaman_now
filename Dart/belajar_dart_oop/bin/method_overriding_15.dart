class Manager {
  String? name;
  void sayHello(String name) {
    print('Hello $name, my name is Manager ${this.name}');
  }
}

class VicePresident extends Manager {
  void sayHello(String name) {
    print('Hello $name, my name is VicePresident ${this.name}');
  }
}

class CLevel extends Manager {
  void sayHello(String name) {
    print('Hello $name, my name is CLevel ${this.name}');
  }
}

void main() {
  var manager = Manager();
  manager.name = 'Natalia';
  manager.sayHello('Sharly');

  var vp = VicePresident();
  vp.name = 'fathie_insanie';
  vp.sayHello('Alisia');
}
