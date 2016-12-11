<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function select($table,$columns=[])
    {
        if ($columns != null){
            $columns = implode(",",$columns);
        }else{
            $columns = '*';
        }

        $statement = $this->pdo->prepare("select {$columns} from {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);

            return true;

        } catch (\Exception $e) {

            return false;

        }
    }
}
