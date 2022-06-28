<?php

require_once __DIR__ . "/../Helper/Input.php";
require_once __DIR__ . "/../BusinessLogic/RemoveTodoList.php";


function viewRemoveTodoList()
{
  echo "MENGHAPUS TODO" . PHP_EOL;

  $pilihan = input("Nomor (x untuk batalkan)");

  if ($pilihan == "x") {
    echo "Batal menambah TODO" . PHP_EOL;
  } else {
    $success = removeTodoList($pilihan);

    if ($success) {
      echo "Sukses memghapus todo nomor $pilihan" . PHP_EOL;
    } else {
      echo "Gagal memghapus todo nomor $pilihan" . PHP_EOL;
    }
  }
}
