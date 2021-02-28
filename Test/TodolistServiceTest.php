<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Config/Database.php";

use Entity\Todolist;
use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;

function testShowTodolist()
{
    $connection = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    // $todolistService->addTodolist(
    //     "Belajar PHP",
    //     "Belajar Python",
    //     "Belajar Pearl",
    //     "Belajar C",
    //     "Belajar C++",
    //     "Belajar C#",
    //     "Belajar Java",
    //     "Belajar Javascript",
    //     "Belajar Go",
    //     "Belajar Ruby",
    // );

    return $todolistService->showTodolist();
}

function testAddTodolist()
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

function testupdateTodolist()
{
    $connection = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    return $todolistService->updateTodolist(
        "Belajar Design Patern update",
        "Belajar Golang update",
        "Belajar Php update",
        "Belajar Flutter update",
        "Belajar Java update",
        "Belajar Dart updpate ",
        "Belajar Python",
        "Belajar Ruby",
        "Belajar C",
        1
    );
}
// update todolist
// testupdateTodolist();
//------------------
// testRemoveTodolist();
// $showtodolist = array(testShowTodolist());
// select all todolist
if (!empty((array)testShowTodolist())) {
    foreach ((array)testShowTodolist() as $number => $value) {
        echo $value['id'] . " " . $value['todo'] . $value['todo2'] . $value['todo3'] . $value['todo4'] . $value['todo5'] . $value['todo6'] . $value['todo7'] . $value['todo8'] . $value['todo9'] . "<br>";
    }
} else {
    echo "data tidak ada";
}
// ------------------
// add todolist
// testAddTodolist();
// -------------------