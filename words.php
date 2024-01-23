<?php
session_start();
require_once "function.php";
$user_id = $_SESSION['id'] ?? 0;
echo $user_id;
if (!$user_id) {
    $statusCode = 8;
    header("location: index.php?status=$statusCode");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lkhdfldh</title>
    <link rel="stylesheet" href="assets/vendors/normalize.css">
    <link rel="stylesheet" href="assets/vendors/milligram.min.css">
    <link rel="stylesheet" href="assets/style.css">

</head>

<body class="voc">
    <div class="sidebar">
        <h4>Menu</h4>
        <ul class="menu">
            <li><a href="words.php" class="menu-item" data-target="words">All Words</a></li>
            <li><a href="#" class="menu-item" data-target="wordform">Add New Word</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="container" id="main">

        <h1 class="maintitle">
            <i class="fas fa-language"></i> <br />My Vocabularies
        </h1>
        <div class="wordsc helement" id="words">
            <div class="row">
                <div class="column column-50">
                    <div class="alphabets">
                        <select id="alphabets">
                            <option value="all">All Words</option>
                            <option value="A">A#</option>
                            <option value="B">B#</option>
                            <option value="C">C#</option>
                            <option value="D">D#</option>
                            <option value="N">N#</option>
                            <option value="M">M#</option>
                        </select>

                    </div>
                </div>

                <div class="column column-50">
                    <form action="" method="POST">
                        <button class="float-right" name="submit" value="submit">Search</button>
                        <input type="text" name="search" class="float-right" style="width: 50%; margin-right:20px;" placeholder="Search">
                    </form>
                </div>
            </div>

            <hr>

            <table class="words helement">
                <thead>
                    <tr>
                        <th width="20%">Word</th>
                        <th>Definition</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    // if(isset($_POST['submit'])){
                    //     $serachedText = $_POST['search'];
                    //     $words = getWords($_user_id, $serachedText);
                    // }else{
                    // }
                    function getWords($user_id) {
                        global $connection;
                        $query = "SELECT * FROM words WHERE user_id = '{$user_id}'";

                        $result = mysqli_query($connection, $query);
                        $result_data = [];
                        while ($_data = mysqli_fetch_assoc($result)) {
                            array_push($result_data, $_data);
                        }
                        return $result_data;
                    }
                    $words = getWords($user_id);
                    $length = count($words);
                    if ($length > 0) {
                        for ($i = 0; $i < $length; $i++) {

                    ?>
                            <tr>
                                <td><?php
                                    echo $words[$i]['word'];
                                    ?></td>
                                <td><?php
                                    echo $words[$i]['definition'];
                                    ?></td>
                            </tr>

                    <?php
                        }
                    }
                    // }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="formc helement" id="wordform" style="display: none;">
            <form action="task.php" method="post">
                <h4>Add New Word</h4>
                <fieldset>
                    <label for="word">Word</label>
                    <input type="text" name="word" placeholder="Word" id="word">
                    <label for="Meaning">Meaning</label>
                    <textarea name="meaning" placeholder="Meaning" id="Meaning" style="height:100px" rows="10"></textarea>
                    <input type="hidden" name="action" value="addword">
                    <input class="button-primary" type="submit" value="Add Word">
                </fieldset>
            </form>
        </div>
    </div>




</body>
<script src="assets/vendors/jquery.min.js"></script>
<script src="assets/main.js"></script>

</html>