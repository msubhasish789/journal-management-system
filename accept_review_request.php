<?php 
        session_start();
        if($_SESSION['reviewer id']=== null){
            header("Location: ./login.php");
        }

        include('connection.php');


        $manuscriptId = $_GET['manuscriptId'];
        $reviewerID = $_GET['reviewerID'];

        $qry = "INSERT INTO `manuscript_review` (`Manuscript ID`, `Reviewer ID`) VALUES ('$manuscriptId', '$reviewerID');";
        if(mysqli_query($conn,  $qry))   {
            header("Location: reject_review_request.php?manuscriptId=$manuscriptId&reviewerID=$reviewerID");
        }else{
            echo "FAILED";
        }
?>