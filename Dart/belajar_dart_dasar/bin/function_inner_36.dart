
void contoh(){
  // sayHello(); // ERROR
}

void  main(){
  void sayHello(){
    print('Hello Inner Function');
  }

  sayHello();
  sayHello();
}