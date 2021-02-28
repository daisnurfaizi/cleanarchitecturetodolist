<?php

namespace Entity {

    class Todolist
    {

        private int $id;
        private string $todo;
        private string $todo2;
        private string $todo3;
        private string $todo4;
        private string $todo5;
        private string $todo6;
        private string $todo7;
        private string $todo8;
        private string $todo9;



        public function __construct(
            string $todo = "",
            string $todo2 = "",
            string $todo3 = "",
            string $todo4 = "",
            string $todo5 = "",
            string $todo6 = "",
            string $todo7 = "",
            string $todo8 = "",
            string $todo9 = ""
        ) {
            $this->todo = $todo;
            $this->todo2 = $todo2;
            $this->todo3 = $todo3;
            $this->todo4 = $todo4;
            $this->todo5 = $todo5;
            $this->todo6 = $todo6;
            $this->todo7 = $todo7;
            $this->todo8 = $todo8;
            $this->todo9 = $todo9;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getTodo(): string
        {
            return $this->todo;
        }

        public function setTodo(string $todo): void
        {
            $this->todo = $todo;
        }


        /**
         * Get the value of todo9
         */
        public function getTodo9()
        {
            return $this->todo9;
        }

        /**
         * Set the value of todo9
         *
         * @return  self
         */
        public function setTodo9($todo9)
        {
            $this->todo9 = $todo9;
        }

        /**
         * Get the value of todo8
         */
        public function getTodo8()
        {
            return $this->todo8;
        }

        /**
         * Set the value of todo8
         *
         * @return  self
         */
        public function setTodo8($todo8)
        {
            $this->todo8 = $todo8;
        }

        /**
         * Get the value of todo7
         */
        public function getTodo7()
        {
            return $this->todo7;
        }

        /**
         * Set the value of todo7
         *
         * @return  self
         */
        public function setTodo7($todo7)
        {
            $this->todo7 = $todo7;
        }

        /**
         * Get the value of todo6
         */
        public function getTodo6()
        {
            return $this->todo6;
        }

        /**
         * Set the value of todo6
         *
         * @return  self
         */
        public function setTodo6($todo6)
        {
            $this->todo6 = $todo6;
        }

        /**
         * Get the value of todo5
         */
        public function getTodo5()
        {
            return $this->todo5;
        }

        /**
         * Set the value of todo5
         *
         * @return  self
         */
        public function setTodo5($todo5)
        {
            $this->todo5 = $todo5;
        }

        /**
         * Get the value of todo4
         */
        public function getTodo4()
        {
            return $this->todo4;
        }

        /**
         * Set the value of todo4
         *
         * @return  self
         */
        public function setTodo4($todo4)
        {
            $this->todo4 = $todo4;
        }

        /**
         * Get the value of todo3
         */
        public function getTodo3()
        {
            return $this->todo3;
        }

        /**
         * Set the value of todo3
         *
         * @return  self
         */
        public function setTodo3($todo3)
        {
            $this->todo3 = $todo3;
        }

        /**
         * Get the value of todo2
         */
        public function getTodo2()
        {
            return $this->todo2;
        }

        /**
         * Set the value of todo2
         *
         * @return  self
         */
        public function setTodo2($todo2)
        {
            $this->todo2 = $todo2;
        }
    }
}
