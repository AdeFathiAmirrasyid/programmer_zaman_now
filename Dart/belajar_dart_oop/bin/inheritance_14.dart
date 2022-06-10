class Manager{
  String? name;
  void sayHello(String name){
    print('Hello $name, my name is ${this.name}');
  }
}


class VicePresident extends Manager{

}

void main(){
  var manager = Manager();
  manager.name = 'Natalia';
  manager.sayHello('Sharly');

  var vp = VicePresident();
  vp.name = 'fathie_insanie';
  vp.sayHello('Alisia');


}