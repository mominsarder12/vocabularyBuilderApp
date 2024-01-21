<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tasks projects</title>
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
                    <p>this is sample project for my learning php and mysql database</p>
                    <div class="text-center">
                        <a id="login" href="#">Log In</a> | <a id="register" href="#">Register Account</a>
                    </div>
                </div>
                <div class="form-wrapper">
                    <form action="task.php" name="register-form">
                        <h4 class="form-title text-center">Register Form</h4>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                        
                        <input type="submit" value="submit">
                        <input id="form-action" type="hidden" name="action" value="register">
                    </form>
                </div>
            </div>
        </div>


    </div> <!-- end the container of this site -->

    <script src="assets/main.js"></script>
</body>

</html>