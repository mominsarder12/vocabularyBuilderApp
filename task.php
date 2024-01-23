<?php
session_start();
include_once "config.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connection, 'utf8');
if (!$connection) {
    throw new Exception("failed to connect database");
    die();
}

/**
 * User Registration functionality done
 */
$action = $_POST['action'] ?? "";
$statusCode = 0;
if ("register" == $action) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    if ($username && $password) {
        // Check if the email already exists
        $check_email_query = "SELECT * FROM users WHERE email = '{$username}'";

        $result = mysqli_query($connection, $check_email_query);

        if (mysqli_num_rows($result) > 0) {
            // Email already exists, set statusCode to 2
            $statusCode = 2;
        } else {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $register_query = "INSERT INTO users (email,password) VALUES ('{$username}','{$hash}')";
            mysqli_query($connection, $register_query);
            $statusCode = 1;
        }

        // Redirect to index.php with the appropriate status code
    } else if (!$username && !$password) {
        $statusCode = 3;
    }
    header("location: index.php?status=$statusCode");
}
/**
 * User Login Functionality
 */
elseif ("login" == $action) {
    $username = $_POST['email'];
    $password = $_POST['password'];
    if ($username && $password) {
        $query = "SELECT id, password FROM users WHERE email = '{$username}'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            $database_password = $data['password'];
            $database_id = $data['id'];
            if (password_verify($password, $database_password)) {
                $_user_id = $database_id;
                $_SESSION['id'] =   $_user_id;
                header("location: words.php");
                die();
            } else {
                $statusCode = 6;
            }
        } else {
            $statusCode = 4;
        }
    } else {
        $statusCode = 3;
    }
    header("location: index.php?status=$statusCode");
}
/**
 * new word register functionlaity
 */
else if ("addword" == $action) {
    $word = $_POST['word'] ?? '';
    $meaning = $_POST['meaning'] ?? '';
    $user_id = $_SESSION['id'];
    if ($word && $meaning && $user_id) {
        $query = "INSERT INTO words (user_id,word,definition) VALUES ('{$user_id}','{$word}','{$meaning}')";
        mysqli_query($connection, $query);
        $statusCode = 9;
        header("location: words.php?status=$statusCode");
    }
}
