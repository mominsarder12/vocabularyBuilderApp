<?php
require_once "config.php";

// include_once "task.php";
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connection, 'utf8');
if (!$connection) {
    throw new Exception("failed to connect database");
    die();
}

function getStatus($statusCode) {
    $status = [
        '0' => '',
        '1' => 'Success To Save User',
        '2' => 'Duplicate Email Found',
        '3' => 'UserName and Password Empty',
        '4' => 'UserName dose\'nt exist',
        '5' => 'User Successfully Login',
        '6' => 'Username and Password Didn\'t match',
        '7' => 'Log Out Successful',
        '8' => 'Your are not Login user login first',
        '9' => 'Successfully added The Word In your Dictionary',
    ];
    return $status[$statusCode];
}

