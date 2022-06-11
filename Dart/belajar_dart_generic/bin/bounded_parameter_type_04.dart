import 'data/number_data_04.dart';

void main(){
  // var dataString = NumberData<String>("insani"); Error
  var dataInt = NumberData<int>(10);

  print(dataInt.data);
}