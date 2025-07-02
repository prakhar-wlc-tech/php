<?php

require base_path('utility/forms/LoginForm.php');
require base_path('utility/Authenticator.php');
use Utility\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }
    $form->addError('body', 'Invalid credentials. Please try again.');

}

//problem persist if we refressh the page, we post the data again and again. if we switch to another page, and then come back, it says document expired.
// $errors = $form->getErrors();
// require base_path('views/login.view.php');
// exit();

// so using PRG(POST/REDIRECT/GET) pattern to handle this issue. however, we still have one issue to handle, that is, if authentication fails and we switch to another page and then come back, it will show the errors again
// $_SESSION['errors'] = $form->getErrors();
// redirect('/login');

//so using PRG with session flashing to handle this issue.

// $_SESSION['_flash']['errors'] = $form->getErrors();
Session::flash('errors', $form->getErrors());
Session::flash('old', [
    'email' => $email,
]);
redirect('/login');