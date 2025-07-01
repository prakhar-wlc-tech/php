<?php

class Guest
{
    public function resolve()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /');
            exit;
        }
    }
}