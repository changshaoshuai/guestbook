<?php

require './../app/init.php';

$messages = $message->getMessages();

foreach ($messages as $key => $message) {
    foreach ($message as $item => $value) {
        $messages[$key][$item] = eascape($value);
    }
}

echo json_encode($messages);
