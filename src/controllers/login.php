<?php

use Utility\Session;

$heading = "Login";
$errors = Session::get('errors');
require base_path('views/login.view.php');
