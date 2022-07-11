<?php

namespace Repository {

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

    private PDO $connection;

    public function __construct(PDO $connection)
    {
      $this->connection = $connection;
    }

    function save(Todolist $todolist): void
    {
      $sql = "insert into todolist(todo) values (?)";
      $statement = $this->connection->prepare($sql);
      $statement->execute([$todolist->getTodo()]);
    }
    function remove(int $number): bool
    {

      $sql = "select id from todolist where id = ?";
      $statement = $this->connection->prepare($sql);
      $statement->execute([$number]);

      if ($statement->fetch()) {
        // Todolist ada
        $sql = "delete from todolist where id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$number]);
        return true;
      } else {
        // Todolist tidak ada
        return false;
      }
    }
    function findAll(): array
    {
      $sql = "select id, todo from todolist";
      $stetament = $this->connection->prepare($sql);
      $stetament->execute();

      $result = [];

      foreach ($stetament as $row) {

        $todolist = new Todolist();
        $todolist->setId($row['id']);
        $todolist->setTodo($row['todo']);
        $result[] = $todolist;
      }

      return $result;
    }
  }
}
