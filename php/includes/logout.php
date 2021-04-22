<?php

    @session_start();

    unset( $_SESSION['usernames']);

    session_destroy();
    header("Location: ../login-page.php");

    exit;
?>
