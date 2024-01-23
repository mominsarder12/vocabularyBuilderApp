<?php
session_start();
$_SESSION['id'] = 0;
$$statusCode = 7;
session_destroy();
header("location: index.php?status=$statusCode");
