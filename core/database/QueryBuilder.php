<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $parameters = [])
    {

        $sql = ("SELECT * FROM $table");

        if(isset($parameters['order'])) {
            $sql .= " ORDER BY post_id ". $parameters['order'] . "";
        } else if(isset($parameters['where'])) {
            $data = $parameters['where'];
            $user = $parameters['username'];
            $sql .= " WHERE $data = '$user'";
        }

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectQuery($table, $parameters)
    {
        $sql = sprintf(
            'SELECT * from %s WHERE (%s) = (%s)',
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
