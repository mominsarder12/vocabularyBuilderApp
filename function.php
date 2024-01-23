<?php
include_once "task.php";

function getStatus($statusCode) {
    $status = [
        '0' => '',
        '1' => 'Success To Save User',
        '2' => 'Duplicate Email Found',
        '3' => 'UserName and Password Empty',
        '4' => 'UserName dose\'nt exist',
        '5' => 'User Successfully Login',
        '6' => 'Username and Password Didn\'t match',
    ];
    return $status[$statusCode];
}
