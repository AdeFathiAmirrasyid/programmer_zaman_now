import 'data/pair_02.dart';

void main(){
  var pair1 = Pair("Insani", 24);
  var pair2 = Pair<String, int>("Insani", 24);

  print(pair1.first);
  print(pair1.second);

  print(pair2.first);
  print(pair2.second);
}