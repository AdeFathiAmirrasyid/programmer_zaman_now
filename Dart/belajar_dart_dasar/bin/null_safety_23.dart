void main() {
  int? age = null;
  age = 1;
  if (age != null) {
    double ageDouble = age.toDouble();
    print(ageDouble);
  }

  // konversi tidak nullable ke nullable
  String name = 'insani';
  String? nullableName = name;


  // konversi  nullable ke non nullable
  int? nullablePrice = null;
  if(nullablePrice != null){
    int price = nullablePrice;
  }

  String? guest;
  guest = 'insani';
  String guestName = guest ?? 'Guest';

  // ternary
  //   String guestName = guest != null ? guest : 'Guest';

  // if condition
  // if(guest != null){
  //   guestName = guest;
  // }else{
  //   guestName = 'Guest';
  // }
    print(guestName);


    int? nullableNumber;
    //nullableNumber = 10;
  // int nonNullableNumber = nullableNumber!; // ERROR

  int? dataInt;
  double? dataDouble = dataInt?.toDouble();
  print(dataDouble);

}
