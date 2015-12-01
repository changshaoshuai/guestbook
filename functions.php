<?php

function getCreatedTime()
{
    return date('Y-m-d H:i:s');
}

function eascape($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function isPost()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}
