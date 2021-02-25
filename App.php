<?php
require_once __DIR__ . "/Entity/Todolist.php";
require_once __DIR__ . "/Repository/TodolistRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/view/TodolistView.php";
require_once __DIR__ . "/helper/inputHelper.php";

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

$todolistrepository = new TodolistRepositoryImpl();
$todolistservice = new TodolistServiceImpl($todolistrepository);
$todolistview = new TodolistView($todolistservice);
$todolistview->showTodolist();
