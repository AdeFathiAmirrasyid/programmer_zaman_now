class Manager {
  String? name;
  Manager(this.name);
}

class VicePresident extends Manager {
  VicePresident(String name) : super(name) {
    print('Create New VicePresident');
  }
}

void main(){
  var manager = Manager('Insanie');
  print(manager.name);

  var vp = VicePresident('Fathie Insanie');
  print(vp.name);
}
