<?php

use Acme\Core\DB;
use Acme\Core\Message;

session_start();

require __DIR__ . '/../vendor/autoload.php';

$pdo = new PDO('sqlite:' . __DIR__ . '/../db.sqlite');

$message = new Message(new DB($pdo));
