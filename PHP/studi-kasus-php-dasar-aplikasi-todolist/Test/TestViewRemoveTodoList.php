<?php
require_once "../Model/TodoList.php";
require_once "../View/ViewRemoveTodoList.php";
require_once "../BusinessLogic/AddTodoList.php";
require_once "../BusinessLogic/ShowTodoList.php";

addTodoList("Fathie");
addTodoList("Insanie");
addTodoList("Diah");
addTodoList("Fathi");
addTodoList("Insani");
addTodoList("Diah Cantik");

showTodoList();
viewRemoveTodoList();
showTodoList();
