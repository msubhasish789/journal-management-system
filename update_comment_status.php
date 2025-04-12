<?php 
    session_start();
    include('connection.php');

    $commentID =  $_POST['commentId'];
    $status = $_POST['status'];
    $manuscriptId = $_POST['manuscriptId'];

    echo $commentID ."+".$status."+".$manuscriptId;

    $qry = "UPDATE `manuscript_review` SET `status`=2 WHERE `Comment_ID`=$commentID;";
    if(mysqli_query($conn, $qry)!=null){
        header("Location: ./view_manuscript.php?manuscriptId=$manuscriptId");
       // echo "Comment Done";
    }else{
        echo "Authorization Error";
    }

?>