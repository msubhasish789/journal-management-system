<?php

    $host= "localhost" ;
    $admin = "root";
    $password= "";
    $db = "research_journal";
    $conn = mysqli_connect($host,$admin,$password);
    (mysqli_select_db($conn, $db));
?>