import 'data/mydata_01.dart';

void check(dynamic data) {
  if (data is MyData<String>) {
    print('Mydata<Stirng>');
  } else if (data is MyData<num>) {
    print('Mydata<num>');
  } else if (data is MyData<bool>) {
    print('Mydata<bool>');
  } else {
    print('Other');
  }
}

void main() {
  check(MyData("insani"));
  check(MyData(100));
  check(MyData(true));
  check("insaai");
  check(100);
  check(true);
}
