void main(){
  var names = <String>['insani','diah','isarie'];
  // for(var i = 0; i < names.length; i++){
  //   print(names[i]);
  // }

  for(var value in names){
    print(value);
  }

  var nameSet = <String>{
    'insani',
    'fathie',
    'diah'
  };

  for(var value in nameSet){
    print(value);
  }
}