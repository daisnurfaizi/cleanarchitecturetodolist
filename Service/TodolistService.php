<?php

namespace Service {

    use Entity\Todolist;
    use Repository\TodolistRepository;

    interface TodolistService
    {
        function showTodolist(): void;
        function addTodolist(string $todo): void;
        function removeTodolist(int $number): void;
    }
    class TodolistServiceImpl implements TodolistService
    {
        private TodolistRepository $todolistRepository;
        public function __construct(TodolistRepository $todolistRepository)
        {
            $this->todolistRepository = $todolistRepository;
        }
        function showTodolist(): void
        {
            echo "TODO LIST";
            $todolist = $this->todolistRepository->findAll();
            foreach ($todolist as $number => $value) {
                echo "$number" . $value->getTodo();
            }
        }
        function addTodolist(string $todo): void
        {
            $todolist = new Todolist($todo);
            $this->todolistRepository->save($todolist);
            echo 'sukses menambah todolist' . PHP_EOL;
        }
        function removeTodolist(int $number): void
        {
            if ($this->todolistRepository->remove($number)) {
                echo "sukses menghapus todolist" . PHP_EOL;
            } else {
                echo "gagal menghapus todolist" . PHP_EOL;
            }
        }
    }
}
