<?php

namespace Service {

    use Entity\Todolist;
    use Repository\TodolistRepository;

    interface TodolistService
    {

        function showTodolist();

        function addTodolist(
            string $todo,
            string $todo2,
            string $todo3,
            string $todo4,
            string $todo5,
            string $todo6,
            string $todo7,
            string $todo8,
            string $todo9
        ): void;

        function removeTodolist(int $number): void;
        function updateTodolist(
            string $todo,
            string $todo2,
            string $todo3,
            string $todo4,
            string $todo5,
            string $todo6,
            string $todo7,
            string $todo8,
            string $todo9,
            int $number
        );
    }

    class TodolistServiceImpl implements TodolistService
    {

        private TodolistRepository $todolistRepository;

        public function __construct(TodolistRepository $todolistRepository)
        {
            $this->todolistRepository = $todolistRepository;
        }

        function showTodolist()
        {
            return $todolist = $this->todolistRepository->findAll();
        }

        function addTodolist(
            string $todo,
            string $todo2,
            string $todo3,
            string $todo4,
            string $todo5,
            string $todo6,
            string $todo7,
            string $todo8,
            string $todo9
        ): void {
            $todolist = new Todolist(
                $todo,
                $todo2,
                $todo3,
                $todo4,
                $todo5,
                $todo6,
                $todo7,
                $todo8,
                $todo9
            );
            $this->todolistRepository->save($todolist);
            echo "SUKSES MENAMBAH TODOLIST" . PHP_EOL;
        }

        function removeTodolist(int $number): void
        {
            if ($this->todolistRepository->remove($number)) {
                echo "SUKSES MENGHAPUS TODOLIST" . PHP_EOL;
            } else {
                echo "GAGAL MENGHAPUS TODOLIST" . PHP_EOL;
            }
        }

        function updateTodolist(
            string $todo,
            string $todo2,
            string $todo3,
            string $todo4,
            string $todo5,
            string $todo6,
            string $todo7,
            string $todo8,
            string $todo9,
            int $id_todolist
        ) {
            $todolist = new Todolist(
                $todo,
                $todo2,
                $todo3,
                $todo4,
                $todo5,
                $todo6,
                $todo7,
                $todo8,
                $todo9,
            );
            $id_todolist = $id_todolist;
            // if ($this->todolistRepository->updateData($todolist, $id_todolist)) {
            //     echo "SUKSES UPDATE TODOLIST" . PHP_EOL;
            // } else {
            //     echo "Gagal UPDATE TODOLIST" . PHP_EOL;
            // }
            return $this->todolistRepository->updateData($todolist, $id_todolist);
        }
    }
}
