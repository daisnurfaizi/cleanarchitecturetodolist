<?php
require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Config/Database.php";

use Config\Database;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;

function testShowTodolist(): void
{
    $koneksi = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($koneksi);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    // $todolistService->addTodolist("Belajar python");
    // $todolistService->addTodolist("belajar php oop");
    // $todolistService->addTodolist("belajar php database");
    var_dump($todolistService->showTodolist());
}

function testAddTodolist(): void
{
    $koneksi = Database::getConnection();
    var_dump($koneksi);

    $todolistRepository = new TodolistRepositoryImpl($koneksi);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("belajar php dasar");
    $todolistService->addTodolist("belajar php oop");
    $todolistService->addTodolist("belajar php database");
    // $todolistService->showTodolist();
}
function testRemoveTodolist(): void
{
    $koneksi = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($koneksi);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    echo $todolistService->removeTodolist(28) . PHP_EOL;
    echo $todolistService->removeTodolist(29) . PHP_EOL;
    echo $todolistService->removeTodolist(30) . PHP_EOL;
    echo $todolistService->removeTodolist(3) . PHP_EOL;
    echo $todolistService->removeTodolist(4) . PHP_EOL;
}

// testRemoveTodolist();
// testAddTodolist();
testShowTodolist();
