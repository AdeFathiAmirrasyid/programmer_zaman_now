

import 'data/mydata_01.dart';

void printData(MyData data){
  print(data.data);
}

void main(){
  printData(MyData("insani"));
  printData(MyData(100));
  printData(MyData(true));

}