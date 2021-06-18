<?php
    $url = $_SERVER["REQUEST_URI"];
    $username_arr = explode("?username=", $url); // ["phantu1", "phantu2"]
    if(isset($username_arr[1])) {
        $username = $username_arr[1];
        if(isset($username)) {
            // DELETE user trong database;
            
            $connection = mysqli_connect("localhost", "root", "", "brse_training");
            $sql = "DELETE FROM user WHERE username = '$username'";
            $sql_query = mysqli_query($connection, $sql);

            header('Location: UserList.php');
        }
    } 
    else {
        header('Location: UserList.php');
    }
?>