<?php

namespace Acme\Core;

class DB
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function query($sql, $parameters)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);

        return $stmt;
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}
