<?php
require_once "config.php";
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
function getWords($user_id, $searched = null) {
    global $connection;
    if ($searched) {
        $query = "SELECT * FROM words WHERE user_id = '{$user_id}' AND word LIKE '%{$searched}%' ORDER BY word";
    } else {
        $query = "SELECT * FROM words WHERE user_id = '{$user_id}' ORDER BY word";
    }
    $result = mysqli_query($connection, $query);
    $result_data = [];
    while ($_data = mysqli_fetch_assoc($result)) {
        array_push($result_data, $_data);
    }
    return $result_data;
}
