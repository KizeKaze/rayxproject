<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $stmt = $this->pdo->prepare("SELECT * from $table");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $parameters)
    {
        // insert into %s (name, user_email) values (:name, :email)
       $sql = sprintf(
            'insert into %s (%s) values (%s)',
           $table,
                  // using array_keys to grab the named key and using them as the column name for the table, implode seperates each column
                  implode(', ', array_keys($parameters)),
                  ':' . implode(', :', array_keys($parameters))
                // grabs each array key and adds :
        );

       try {
           $stmt = $this->pdo->prepare($sql);

           $stmt->execute($parameters);
       } catch (Exception $e) {
           die('Whoops, something went wrong');
       }

    }
}
