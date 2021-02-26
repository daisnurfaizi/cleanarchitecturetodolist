<?php
require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../view/TodolistView.php";
require_once __DIR__ . "/../helper/inputHelper.php";

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;
use Config\Database;

function testViewShowTodolist(): void
{
    $$koneksi = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($koneksi);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("Belajar php dasar");
    $todolistService->addTodolist("Belajar Php OOP");
    $todolistService->addTodolist("Belajar Php Database");
    $todolistview->showTodolist();
    $todolistview->addTodolist();
    $todolistview->showTodolist();
}
function testViewInputTodolist(): void
{

    $$koneksi = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($koneksi);
    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService->addTodolist("Belajar php dasar");
    $todolistService->addTodolist("Belajar Php OOP");
    $todolistService->addTodolist("Belajar Php Database");
    $todolistview->showTodolist();
    $todolistview->addTodolist();
    $todolistview->showTodolist();
}
function testViewRemoveTodolist(): void
{
    $$koneksi = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($koneksi);
    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService->addTodolist("Belajar php dasar");
    $todolistService->addTodolist("Belajar Php OOP");
    $todolistService->addTodolist("Belajar Php Database");
    $todolistview->showTodolist();
    $todolistview->addTodolist();
    $todolistview->showTodolist();
}
testViewShowTodolist();
