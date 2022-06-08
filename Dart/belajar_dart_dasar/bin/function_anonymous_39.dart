void sayHello(String name, String Function(String) filter){
  print('Hello ${filter(name)}');
}

void main() {

  sayHello('diah insani', (name){
    return name.toUpperCase();
  });

  sayHello('DIAH INSANI', (name) => name.toLowerCase());

  var upperFunction = (String name) {
    return name.toUpperCase();
  };

  var lowerFunction = (String name) => name.toLowerCase();

  var result1 = upperFunction('insani');
  print(result1);

  var result2 = lowerFunction('FATHIE_INSANI');
  print(result2);
}
