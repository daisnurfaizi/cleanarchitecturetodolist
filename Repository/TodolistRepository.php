<?php

namespace Repository {

    use Config\Database;
    use Entity\Todolist;
    use PDO;

    interface TodolistRepository
    {
        function save(Todolist $todolist): void;
        function remove(int $number): bool;
        function findAll(): array;
    }

    class TodolistRepositoryImpl implements TodolistRepository
    {
        public array $todolist = array();
        private PDO $coneksi;
        public function __construct($koneksi)
        {
            $this->coneksi = $koneksi;
        }
        function save(Todolist $todolist): void
        {
            // $number = sizeof($this->todolist) + 1;
            // $this->todolist[$number] = $todolist;
            $query = "INSERT into todolist(todo) values (?)";
            $statement = $this->coneksi->prepare($query);
            $statement->execute([$todolist->getTodo()]);
        }
        function remove(int $number): bool
        {
            // if ($number > sizeof($this->todolist)) {
            //     return false;
            // }
            // for ($i = $number; $i < sizeof($this->todolist); $i++) {
            //     $this->todolist[$i] = $this->todolist[$i + 1];
            // }
            // unset($this->todolist[sizeof($this->todolist)]);
            // return true;
            $queryfind = "SELECT id from todolist where id=:id";
            $statement = $this->coneksi->prepare($queryfind);
            $statement->bindParam('id', $number);
            $statement->execute();
            if ($statement->fetch()) {
                $query = "DELETE from todolist where id=:id";
                $statement = $this->coneksi->prepare($query);
                $statement->bindParam('id', $number);
                $statement->execute();
                return true;
            } else {
                return false;
            }
        }

        function findAll(): array
        {
            // return $this->todolist;
            $query = "SELECT id,todo from todolist";
            $statement = $this->coneksi->prepare($query);
            $statement->execute();
            $result = [];
            foreach ($statement as $row) {
                // $todolist = new Todolist();
                // $todolist->setId($row['id']);
                // $todolist->setTodo($row['todo']);
                // $result[] = new Todolist();
                $todolist = new Todolist();
                $todolist->setId($row['id']);
                $todolist->setTodo($row['todo']);
                $result[] = $todolist;
                // var_dump($todolist);
            }

            return $result;
        }
    }
}
