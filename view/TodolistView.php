<?php

namespace View {

    use Service\TodolistService;
    use Helper\InputHelper;

    class TodolistView
    {
        private TodolistService $todolistservice;
        public function __construct(TodolistService $todolistService)
        {
            $this->todolistservice = $todolistService;
        }
        function showTodolist(): void
        {
            while (true) {
                $this->todolistservice->showTodolist();
                echo "menu" . PHP_EOL;
                echo "1. tambah todo" . PHP_EOL;
                echo "2. hapus todo" . PHP_EOL;
                echo "x. keluar" . PHP_EOL;

                $pilihan = InputHelper::input("Pilih");
                if ($pilihan == "1") {
                    $this->addTodolist();
                } elseif ($pilihan == "2") {
                    $this->removeTodolist();
                } else if ($pilihan == "x") {
                    break;
                } else {
                    echo "Pilihan tidak dimengerti " . PHP_EOL;
                }
                echo "Good bye " . PHP_EOL;
            }
        }
        function addTodolist(): void
        {
            echo "menambah todo" . PHP_EOL;
            $todo = InputHelper::input("todo (x untuk batal)");
            if ($todo == "x") {
                echo "batal tambah todolist" . PHP_EOL;
            } else {
                $this->todolistservice->addTodolist($todo);
            }
        }
        function removeTodolist(): void
        {
            echo "megmapus todo list" . PHP_EOL;
            $todo = InputHelper::input("Nomor (x untuk menghapus)");
            if ($todo == "x") {
                echo "batal tambah todolist" . PHP_EOL;
            } else {
                $this->todolistservice->removeTodolist($todo);
            }
        }
    }
}
