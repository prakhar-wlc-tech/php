<?php
$heading = "About";
echo $_SESSION['name'] ?? 'No session variable set'; // Display session variable if set, otherwise show a default message

require base_path('views/about.view.php');