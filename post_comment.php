<script>
     function alartUser(val){
        alert(val);
    }
 
           
</script>

<?php 
    session_start();
    include('connection.php');

    $comment =  $_POST['comment'];
    $manuscriptId = $_POST['manuscriptId'];
    $reviewerID = $_POST['reviewerID'];

   // echo   $comment."---".$manuscriptId."---".$reviewerID ;

    $qry = "UPDATE `manuscript_review` SET `Comment` = '$comment', `status`=1 WHERE `Manuscript ID`='$manuscriptId' AND `Reviewer ID` = '$reviewerID';";
    $data = mysqli_query($conn, $qry);
    
    $j = "";
    if(mysqli_affected_rows($conn)> 0){
        $j = "Comment Done"; 
    }else{
        $j =  "Authorization Error";
    }

    echo '<script> alartUser("' .$j. '"); window.location= "view_manuscript.php?manuscriptId='.$manuscriptId.'";</script>';

?>