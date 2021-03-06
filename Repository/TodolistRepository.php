<?php

namespace Repository {

    use Entity\Todolist;
    use PDO;
    use PDOException;

    interface TodolistRepository
    {

        function save(Todolist $todolist): void;

        function remove(int $number): bool;

        function findAll(): array;

        function updateData(Todolist $todolist, int $id_todolist);
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

        function updateData(Todolist $todolist, int $id_todolist)
        {

            $sql = "SELECT id FROM todolist WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$id_todolist]);

            $sqlupdate = "UPDATE todolist SET 
            todo = :todo, 
            todo2 = :todo2, 
            todo3 = :todo3, 
            todo4 = :todo4, 
            todo5 = :todo5, 
            todo6 = :todo6, 
            todo7 = :todo7, 
            todo8 = :todo8, 
            todo9 = :todo9
            
            WHERE id =:id ";
            $updatetodo = $todolist->getTodo();
            $updatetodo2 = $todolist->getTodo2();
            $updatetodo3 = $todolist->getTodo3();
            $updatetodo4 = $todolist->getTodo4();
            $updatetodo5 = $todolist->getTodo5();
            $updatetodo6 = $todolist->getTodo6();
            $updatetodo7 = $todolist->getTodo7();
            $updatetodo8 = $todolist->getTodo8();
            $updatetodo9 = $todolist->getTodo9();
            $sqlselect = "SELECT * FROM todolist WHERE id = ?";
            $statement = $this->connection->prepare($sqlselect);
            $statement->execute([$id_todolist]);
            if ($statement->fetch()) {
                $transaction = $this->connection;
                $transaction->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                try {
                    $transaction->beginTransaction();
                    $data = $this->connection->prepare($sqlupdate);
                    $data->bindParam('todo', $updatetodo);
                    $data->bindParam('todo2', $updatetodo2);
                    $data->bindParam('todo3', $updatetodo3);
                    $data->bindParam('todo4', $updatetodo4);
                    $data->bindParam('todo5', $updatetodo5);
                    $data->bindParam('todo6', $updatetodo6);
                    $data->bindParam('todo7', $updatetodo7);
                    $data->bindParam('todo8', $updatetodo8);
                    $data->bindParam('todo9', $updatetodo9);
                    $data->bindParam('id', $id_todolist);
                    $data->execute();
                    $transaction->commit();
                    return $data->rowCount();
                } catch (PDOException $e) {
                    $transaction->rollBack();
                }
            }
        }

        function findAll(): array
        {
            $sql = "SELECT * FROM todolist";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
