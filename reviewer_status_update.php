<?php
        
        include('connection.php');
    
        $status = $_GET['status'];
        $reviewerId =  $_GET['reviewer_id'];
    
         $sqlUpdate = "UPDATE `reviewer` SET `availability` = $status WHERE `Reviewer ID` = '$reviewerId'";
    
         if(mysqli_query($conn,$sqlUpdate)){
            echo "Reviewer Status Successfully Updated";
         }else{
            echo "Failed to udate status";
         }
?>
    