<?php
require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Config/Database.php";

use Config\Database;
use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;

function testShowTodolist(): void
{
    $koneksi = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($koneksi);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    // $todolistService->addTodolist("Belajar python");
    // $todolistService->addTodolist("belajar php oop");
    // $todolistService->addTodolist("belajar php database");
    $todolistService->showTodolist();
}

function testAddTodolist(): void
{
    $koneksi = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($koneksi);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("belajar php dasar");
    $todolistService->addTodolist("belajar php oop");
    $todolistService->addTodolist("belajar php database");
    $todolistService->showTodolist();
}
function testRemoveTodolist(): void
{
    $koneksi = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($koneksi);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    echo $todolistService->removeTodolist(5) . PHP_EOL;
    echo $todolistService->removeTodolist(1) . PHP_EOL;
    echo $todolistService->removeTodolist(2) . PHP_EOL;
    echo $todolistService->removeTodolist(3) . PHP_EOL;
    echo $todolistService->removeTodolist(4) . PHP_EOL;
}

// testRemoveTodolist();
// testAddTodolist();
testShowTodolist();
