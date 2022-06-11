import 'data/mydata_01.dart';

void main(){
  var dataString = MyData<String>('fathi insani');
  var dataInt = MyData(1000);
  var dataBool = MyData(true);


  print(dataString.data);
  print(dataInt.data);
  print(dataBool.data);
}