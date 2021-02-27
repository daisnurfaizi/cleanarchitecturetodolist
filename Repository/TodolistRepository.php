<?php

namespace Repository {

    use Entity\Todolist;

    interface TodolistRepository
    {

        function save(Todolist $todolist): void;

        function remove(int $number): bool;

        function findAll(): array;
    }

    class TodolistRepositoryImpl implements TodolistRepository
    {

        public array $todolist = array();

        private \PDO $connection;

        public function __construct(\PDO $connection)
        {
            $this->connection = $connection;
        }

        function save(Todolist $todolist): void
        {
            // $number = sizeof($this->todolist) + 1;
            // $this->todolist[$number] = $todolist;

            $sql = "INSERT INTO todolist(
                todo,
                todo2,
                todo3,
                todo4,
                todo5,
                todo6,
                todo7,
                todo8,
                todo9
                ) VALUES (?,?,?,?,?,?,?,?,?)";
            $input = $todolist->getTodo();
            $input2 = $todolist->getTodo2();
            $input3 = $todolist->getTodo3();
            $input4 = $todolist->getTodo4();
            $input5 = $todolist->getTodo5();
            $input6 = $todolist->getTodo6();
            $inpu7 = $todolist->getTodo7();
            $input8 = $todolist->getTodo8();
            $input9 = $todolist->getTodo9();
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(1, $input);
            $statement->bindParam(2, $input2);
            $statement->bindParam(3, $input3);
            $statement->bindParam(4, $input4);
            $statement->bindParam(5, $input5);
            $statement->bindParam(6, $input6);
            $statement->bindParam(7, $inpu7);
            $statement->bindParam(8, $input8);
            $statement->bindParam(9, $input9);
            $statement->execute();
        }

        function remove(int $number): bool
        {
            //            if ($number > sizeof($this->todolist)) {
            //                return false;
            //            }
            //
            //            for ($i = $number; $i < sizeof($this->todolist); $i++) {
            //                $this->todolist[$i] = $this->todolist[$i + 1];
            //            }
            //
            //            unset($this->todolist[sizeof($this->todolist)]);
            //
            //            return true;

            $sql = "SELECT id FROM todolist WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$number]);

            if ($statement->fetch()) {
                // todolist ada
                $sql = "DELETE FROM todolist WHERE id = ?";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$number]);
                return true;
            } else {
                // todolist tidak ada
                return false;
            }
        }

        function findAll(): array
        {
            // return $this->todolist;
            $sql = "SELECT id, todo FROM todolist";
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            $result = [];

            foreach ($statement as $row) {
                $todolist = new Todolist();
                $todolist->setId($row['id']);
                $todolist->setTodo($row['todo']);

                $result[] = $todolist;
            }

            return $result;
        }
    }
}
