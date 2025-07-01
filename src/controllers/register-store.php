<?php
use lib\Database;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address.";
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Password must be at least 7 characters long.";
}

if (!empty($errors)) {
    require base_path('views/register.view.php');
    exit();
}

$db = App::resolve(Database::class);

// Check if user already exists
$user = $db->query("SELECT * FROM users WHERE email = ?", [$email])->fetch();

if ($user) {
    $errors['email'] = "User already exists.";
    require base_path('views/register.view.php');
    exit();
}

// password_hash() is a built-in PHP function that hashes a password using a strong one-way hashing algorithm.
// PASSWORD_DEFAULT is a constant that tells PHP to use the default hashing algorithm (currently bcrypt).
// It automatically handles the generation of a secure salt and the hashing process.
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//  Insert user
$db->query("INSERT INTO users (email, password) VALUES (?, ?)", [
    $email,
    $hashedPassword
]);


$_SESSION['user'] = ['email' => $email];

header("Location: /");
exit();
