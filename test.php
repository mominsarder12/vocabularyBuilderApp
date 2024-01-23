<?php 
function get_words($user_id){
    // global $connection;
    $query = "SELECT * FROM words WHERE user_id = '{$user_id}'";
    echo $query;
}  
get_words(2);
?>