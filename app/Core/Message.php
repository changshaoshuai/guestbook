<?php

namespace Acme\Core;

use PDO;

class Message
{
    protected $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function save(array $data)
    {
        $sql = "insert into messages (name, message, img, created_at) values (:name, :message, :img, :created_at)";

        $this->db->query($sql, $data);

        return (bool) $this->db->lastInsertId();
    }

    public function getMessages($count = 5)
    {
        $sql = "select * from messages order by id desc limit :count";

        $stmt = $this->db->query($sql, ['count' => $count]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
