import 'data/customer_37.dart';

void main(){
  var customer = Customer('Insanie', CustomerLevel.vip);
  print(customer.name);
  print(customer.level);
  
  print(CustomerLevel.values);
}