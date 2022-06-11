import 'data/mydata_01.dart';

void main(){
  MyData<Object> data = new MyData<String>("Insani");
  print(data.data);

  data.data = 100;
}