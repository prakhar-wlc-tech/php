<?php

$auth = new Authenticator();
$auth->logout();

header('Location: /login');
exit();