<script>
    function alartUser(val) {
        alert(val);
    }
</script>

<?php
session_start();
if ($_SESSION['reviewer id'] === null) {
    header("Location: ./login.php");
}

include('connection.php');


$manuscriptId = $_GET['manuscriptId'];
$reviewerID = $_GET['reviewerID'];

$qry = "DELETE FROM `review_request_temp` WHERE `Manuscript ID` = '$manuscriptId' AND `Reviewer ID` = '$reviewerID';";
$j = "";
if (mysqli_query($conn,  $qry)) {
    $j = "Requeset Success";
    // header("location: review_request_list.php");
} else {
    $j =  "Request failed";
}

echo '<script> alartUser("' . $j . '"); window.location= "review_request_list.php";</script>';
?>