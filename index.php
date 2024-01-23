<?php
session_start();
$user_id = $_SESSION['id'] ?? 0;
if ($user_id) {
    header("location: words.php");
    die();
}
include_once "config.php";
include_once "function.php";
$statusCode = $_GET['status'] ?? '';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocabulary Builder - Register or Login</title>
    <link rel="stylesheet" href="assets/vendors/normalize.css">
    <link rel="stylesheet" href="assets/vendors/milligram.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column column-40 column-offset-25">
                <div class="header">
                    <h1>Vocabulary Builder</h1>
                    <p>This is sample project for my learning php and mysql database</p>
                    <div class="text-center">
                        <a id="login" class="selected-form" href="#">Log In</a> | <a id="register" href="#">Register Account</a>
                        <?php
                        if ($statusCode) {
                        ?>
                            <blockquote>
                                <?php echo getStatus($statusCode); ?>
                            </blockquote>
                        <?php
                        }  ?>
                    </div>
                </div>
                <div class="form-wrapper">
                    <form action="task.php" id="form" method="POST">
                        <h4 class="form-title text-center">Login Form</h4>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>

                        <input type="submit" value="submit">
                        <input id="form-action" type="hidden" name="action" value="login">
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end the container of this site -->

    <script src="assets/main.js"></script>
</body>

</html>