void main() {
  Set<int> numbers = {};
  var strings = <String>{};
  var doubles = <String>{};

  print(numbers);

  var names = <String>{
    'insani',
    'insani',
    'isarie',
    'isarie',
    'starla',
    'fathie'
  };
  // names.add('insani');
  // names.add('insani');
  // names.add('isarie');
  // names.add('isarie');
  // names.add('starla');
  // names.add('fathie');

  print(names);
  print(names.length);

  names.remove('isarie');
  print(names);
  print(names.length);
}
