void  main(){

  var name = 'Fathie_Insanie';
  print(name);
  print(name);
  print(name);
  print(name);

  var firstname = 'diah';
  final lastname = 'insani';

  firstname = 'Natalia';
  // lastname = 'Isarie'; ERROR

  print(firstname);
  print(lastname);

  final array1 = [1,2,3];
  const array2 = [1,2,3];

  // kata kunci final tidak boleh mendeklarasikan ulang tapi bisa mengubah isi arraynya
  // array1 = [0,0,0];
  array1[0] = 10;


  // array2 = [0,0,0];
  // kata kunci const tidak boleh mendeklarasikan ulang dan tidak bisa mengubah isi arraynya
  // array2[0] = 10;

  print(array1);
  print(array2);


  late var value = getValue();
  print('variable sudah dibuat');
  print(value);
}


String getValue(){
  print('getValue() dipanggil');
  return 'Fathie_Insanie';
}