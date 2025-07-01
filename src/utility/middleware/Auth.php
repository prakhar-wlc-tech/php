<?php

class Auth
{
    public function resolve()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
    }
}