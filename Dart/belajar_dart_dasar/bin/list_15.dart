void main(){
  List<int> listInt = [];
  var listString = <String>[];

  print(listInt);
  print(listString);


  var names = <String>[
    'diah insani',
    'fathi insani',
    'starla',
    'natalia isarie'
  ];
  // names.add('diah insani');
  // names.add('fathi insani');
  // names.add('starla');
  // names.add('natalia isarie');

  print(names);
  print(names.length);

  print(names[0]);
  names[0] = 'diah sayang';
  print(names[0]);
  
  names.removeAt(2);
  print(names);
  print(names[2]);

}