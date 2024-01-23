<?php
session_start();
require_once "function.php";
$user_id = $_SESSION['id'] ?? 0;
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
    <title>Vocabulary Builder - Home</title>
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
                            <option value="E">E#</option>
                            <option value="F">F#</option>
                            <option value="G">G#</option>
                            <option value="H">H#</option>
                            <option value="I">I#</option>
                            <option value="J">J#</option>
                            <option value="K">K#</option>
                            <option value="L">L#</option>
                            <option value="M">M#</option>
                            <option value="N">N#</option>
                            <option value="O">O#</option>
                            <option value="P">P#</option>
                            <option value="Q">Q#</option>
                            <option value="R">R#</option>
                            <option value="S">S#</option>
                            <option value="T">T#</option>
                            <option value="U">U#</option>
                            <option value="V">V#</option>
                            <option value="W">W#</option>
                            <option value="X">X#</option>
                            <option value="Y">Y#</option>
                            <option value="Z">Z#</option>
                        </select>

                    </div>
                </div>
                <div class="column column-50">
                    <form action="" method="POST">
                        <button class="float-right" name="submit" value="submit">Search</button>
                        <input type="text" name="search" class="float-right" style="width: 50%; margin-right:20px;" placeholder="Search Word">
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

                    if(isset($_POST['submit'])){
                        $serachedText = $_POST['search'];
                        $words = getWords($user_id, $serachedText);
                    }else{
                        $words = getWords($user_id);
                    }                    
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