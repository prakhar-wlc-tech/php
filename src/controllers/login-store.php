<?php

use lib\Database;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address.";
}

if (!Validator::string($password)) {
    $errors['password'] = "Password must be a valid password.";
}

if (!empty($errors)) {
    require base_path('views/login.view.php');
    exit();
}

$db = App::resolve(Database::class);

// Check if user exists or not
$user = $db->query("SELECT * FROM users WHERE email = ?", [$email])->fetch();

if (! $user) {
    $errors['body'] = "User does not exists. please register first.";
    require base_path('views/login.view.php');
    exit();
}
if (!password_verify($password, $user['password'])) {
    $errors['password'] = "Invalid email or password.";
    require base_path('views/login.view.php');
    exit();
}

$_SESSION['user'] = ['email' => $email];

header("Location: /");
exit();
