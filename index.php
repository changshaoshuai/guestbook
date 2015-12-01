<?php

use Acme\Core\Token;
require 'app/init.php';

$token = Token::generate();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>

    <script id="messageTemplate" type="text/template">
        <li class="message">
            <div class="info">
                <a href="#">{{ name }}</a>
                <span>{{ time }}</span>
            </div>
            <a href="#" class="avatar">
                <img src="public/img/{{ img }}.png" width="35">
            </a>
            <p>{{ message }}</p>
        </li>
    </script>

    <ul class="message-box">
    </ul>

    <div class="message-write">
        <form action="/api/saveMessage.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
            <input type="text" id="name" name="name" placeholder="leave your name please.">
            <textarea name="message" id="message" placeholder="input your message."></textarea>
            <div>
                <input type="hidden" name="img" id="img" value="12">
                <img src="public/img/12.png" width="35">
                <button type="submit">Send</button>
            </div>
        </form>
    </div>

    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/moment.js/2.10.6/moment.min.js"></script>
    <script src="http://cdn.bootcss.com/moment.js/2.10.6/locale/zh-cn.js"></script>
    <script src="public/js/app.js"></script>
</body>
</html>
