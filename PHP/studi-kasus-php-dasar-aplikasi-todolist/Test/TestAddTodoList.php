<?php
require_once "../Model/TodoList.php";
require_once "../BusinessLogic/AddTodoList.php";

addTodoList("Fathie");
addTodoList("Insanie");
addTodoList("Diah");

var_dump($todolist);
