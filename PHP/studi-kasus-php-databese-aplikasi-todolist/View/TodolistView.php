<?php

namespace View {

  use Service\TodolistService;
  use Helper\InputHelper;

  class TodolistView
  {

    private TodolistService $todolistService;

    public function __construct(TodolistService $todolistService)
    {
      $this->todolistService = $todolistService;
    }

    function showTodolist(): void
    {
      while (true) {
        $this->todolistService->showTodoList();

        echo "MENU" . PHP_EOL;
        echo "1. Tambah Todo" . PHP_EOL;
        echo "2. Hapus Todo" . PHP_EOL;
        echo "x. Keluar" . PHP_EOL;


        $pilihan = InputHelper::input("Pilih");

        if ($pilihan == 1) {
          $this->addTodoList();
        } else if ($pilihan == 2) {
          $this->removeTodoList();
        } else if ($pilihan == "x") {
          break;
        } else {
          echo "Pilihan tidak dimengerti" . PHP_EOL;
        }
      }

      echo "Sampai Jumpa Lagi" . PHP_EOL;
    }

    function addTodolist(): void
    {
      echo "MENAMBAH TODO" . PHP_EOL;

      $todo = InputHelper::input("TODO (x untuk batal) ");

      if ($todo == "x") {
        echo "Batal menambah TODO" . PHP_EOL;
      } else {
        $this->todolistService->addTodolist($todo);
      }
    }

    function removeTodolist(): void
    {
      echo "MENGHAPUS TODO" . PHP_EOL;

      $pilihan = InputHelper::input("Nomor (x untuk batalkan)");

      if ($pilihan == "x") {
        echo "Batal menambah TODO" . PHP_EOL;
      } else {
        $this->todolistService->removeTodolist($pilihan);
      }
    }
  }
}
