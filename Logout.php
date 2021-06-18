<?php
    session_start();
    session_destroy();
    header('Location: LoginUser.php');
?>