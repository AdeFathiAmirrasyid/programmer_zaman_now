<?php

require_once __DIR__ .  "/../Model/TodoList.php";
require_once __DIR__ .  "/../Helper/Input.php";
require_once __DIR__ .  "/../BusinessLogic/AddTodoList.php";

function viewAddTodoList()
{
  echo "MENAMBAH TODO" . PHP_EOL;

  $todo = input("TODO (x untuk batal) ");

  if ($todo == "x") {
    echo "Batal menambah TODO" . PHP_EOL;
  } else {
    addTodoList($todo);
  }
}
