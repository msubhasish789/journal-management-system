<?php
    session_start();

    // Check if the user is already logged in, redirect to the appropriate page
    if (isset($_SESSION['editor id'])) {
        header("Location: Pending list.php");
        exit();
    } elseif (isset($_SESSION['author id'])) {
        header("Location: author.php");
        exit();
    } elseif (isset($_SESSION['reviewer id'])) {
        header("Location: review_request_list.php");
        exit();
    }

    // Check if the user has logged out
    if (isset($_SESSION['logged_out']) && $_SESSION['logged_out'] == true) {
        session_destroy(); // Destroy all sessions
        unset($_SESSION['logged_out']);
    }
?>