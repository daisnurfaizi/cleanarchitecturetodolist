<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Config/Database.php";

use Entity\Todolist;
use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;

function testShowTodolist(): void
{
    $connection = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist(
        "Belajar PHP",
        "Belajar Python",
        "Belajar Pearl",
        "Belajar C",
        "Belajar C++",
        "Belajar C#",
        "Belajar Java",
        "Belajar Javascript",
        "Belajar Go",
        "Belajar Ruby",
    );

    $todolistService->showTodolist();
}

function testAddTodolist(): void
{
    $connection = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);

    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist(
        "Belajar PHP",
        "Belajar Python",
        "Belajar Pearl",
        "Belajar C",
        "Belajar C++",
        "Belajar C#",
        "Belajar Java",
        "Belajar Javascript",
        "Belajar Go",
        "Belajar Ruby",
    );


    // $todolistService->showTodolist();
}

function testRemoveTodolist(): void
{
    $connection = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);

    $todolistService = new TodolistServiceImpl($todolistRepository);

    echo $todolistService->removeTodolist(5) . PHP_EOL;
    echo $todolistService->removeTodolist(4) . PHP_EOL;
    echo $todolistService->removeTodolist(3) . PHP_EOL;
    echo $todolistService->removeTodolist(2) . PHP_EOL;
    echo $todolistService->removeTodolist(1) . PHP_EOL;
}

testShowTodolist();
// testAddTodolist();
