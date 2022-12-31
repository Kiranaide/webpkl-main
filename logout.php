<?php
    session_start();
    $_SESSION['username'] = '';
    unset($_SESSION['username']);
    unset($_SESSION['cart']);
    session_unset();
    session_destroy();
    header("Location: index.php");
?>