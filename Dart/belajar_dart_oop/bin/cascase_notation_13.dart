class User{
  String? username;
  String? name;
  String? email;


}


User? createUser(){
  return null;
}

void main(){
  // var user = User();
  // user.username = 'fathie_insani';
  // user.name = 'fathie';
  // user.email  = 'diahinsani@gmail.com';


  var user = User()
      ..username = 'fathie insanie'
      ..name = 'fathie'
      ..email = 'diahinsani@gmail.com';

  print(user.username);

  User? user2 = createUser()
    ?..username = 'fathie insanie'
    ..name = 'fathie'
    ..email = 'diahinsani@gmail.com';
}