<?php

use lib\Database;
use Utility\Session;

class Authenticator
{
    public function attempt($email, $password)
    {
        $db = App::resolve(Database::class);

        $user = $db->query("SELECT * FROM users WHERE email = ?", [$email])->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login(["email" => $email]);
                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = ['email' => $user['email']];

        session_regenerate_id(true);
    }

    public function logout()
    {
       Session::destroy();
    }

}