void main(){
  var nilai = 'E';

  switch (nilai){
    case 'A' :
      print('Anda Lulus dengan baik');
      break;
    case 'B' :
    case 'C' :
      print('Anda LULUS');
      break;
    case 'D' :
      print('Anda Tidak LULUS');
      break;
    default :
      print('Munkin Anda salah Jurusan');
  }
}