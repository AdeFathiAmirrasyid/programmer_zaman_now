void  main(){
  Map<String, String> map1 = {};
  var map2 = Map<String,String>();
  var map3 = <String,String>{};

  print(map1);


  var name = <String,String>{
    'first' : 'diah',
    'middle' : 'insani',
    'last' : 'fathie'
  };

  // name['first'] = 'diah';
  // name['middle'] = 'insani';
  // name['last'] = 'fathie';

  print(name);
  print(name['first']);

  name['middle'] = 'alisia';
  print(name);

  name.remove('last');
  print(name);
}