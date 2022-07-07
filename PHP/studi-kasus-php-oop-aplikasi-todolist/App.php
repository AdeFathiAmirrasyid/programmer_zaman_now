<?php

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

require_once __DIR__ . "/Entity/Todolist.php";
require_once __DIR__ . "/Helper/InputHelper.php";
require_once __DIR__ . "/Repository/TodolistRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/View/TodolistView.php";

echo "Aplikasi TodoList" . PHP_EOL;

$todolistRepository = new  TodolistRepositoryImpl();
$todolistService = new TodolistServiceImpl($todolistRepository);
$todolisView = new TodolistView($todolistService);

$todolisView->showTodolist();
