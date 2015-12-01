<?php

use Acme\Core\Token;

require './../app/init.php';

if (isPost() && isset($_POST['csrf_token']) && Token::check($_POST['csrf_token'])) {
    unset($_POST['csrf_token']);
    $data = $_POST;

    $data['created_at'] = getCreatedTime();

    if ($message->save($data)) {
        echo json_encode($data);
    }

} else {
    die('not access.');
}

