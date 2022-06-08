void sayHello(String name, String Function(String) filter) {
  var filterdName = filter(name);
  print('Hi $filterdName');
}

String filterBadWord(String name) {
  if (name == 'gila') {
    return '****';
  } else {
    return name;
  }
}

void main() {
  sayHello('Insani', filterBadWord);
  sayHello('gila', filterBadWord);
}
