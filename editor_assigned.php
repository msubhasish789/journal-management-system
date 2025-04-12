<?php
session_start();
if ($_SESSION['editor id'] === null) {
    header("Location: ./login.php");
}

$editorID =  $_SESSION['editor id'];
include('connection.php');
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href="./css/rh_style.css">
    <link rel ="stylesheet" href="./css/style.css">
</head>

<body>

    <?php   include('editor_header.php'); ?>

    <section class="home pending_manu">
        <h2>Assigned Manuscripts</h2>
        <div>
            <?php
         $sql = "SELECT ms.`Manuscript id`, ms.`Manu Name` AS `ManuscriptName`, ms.`Description`, ms.`Submission date`, ms.`FileContent`, ms.`Status` 
         FROM `Manuscript Submission` ms 
         JOIN `review_request_temp` ON `review_request_temp`.`Manuscript id` = ms.`Manuscript id`
         WHERE  ms.`Status` != -1";
 

            $data = mysqli_query($conn, $sql);
            if(mysqli_num_rows($data)==0)
            echo "<h2><br> No Pending List</h2>"; 


            while ($arr =  mysqli_fetch_array($data)) {
               
            ?>
                <div class="manuscript_list">
                    <div class="image">
                        <img src="http://www.gravatar.com/avatar/9017a5f22556ae0eb7fb0710711ec125?s=128" alt="Avatar" class="avatar">
                    </div>
                    <div class="content">
                        <div class="heading">
                            <h3><?php echo $arr["ManuscriptName"]; ?></h3>
                        </div>
                        <div class="body">
                            <p><?php echo $arr["Description"]; ?></p>
                        </div>
                        <div class="autor topic">
                            <span class="">Author Name: <?php

                            $x=$arr["Manuscript id"];
                            $sql2="SELECT a.`Name` from `author` a join `Manuscript Submission` ms on ms.`Author id`=a.`Author id`
                            where ms.`Manuscript id`=$x";
                            $data2 = mysqli_query($conn, $sql2);
                            $arr2 =  mysqli_fetch_array($data2);
                            
                            echo  $arr2["Name"] ?></span><span class="topic"> Topic: </span>
                        </div>
                        <div class="time_status">
                            <span class="status">Status : <?php echo  $arr["Status"];  ?></span><span span="time"> Time Stamp: <?php echo  $arr["Submission date"] ?> </span>
                        </div>

                    </div>
                    <div>
                        <a href="view_manuscript.php?manuscriptId=<?php echo $arr["Manuscript id"]; ?>" class="btn" id="<?php $arr["Manuscript id"]; ?>">View</a>
                    </div>
                </div>

            <?php } ?>

        </div>

    </section>

    <script   src= "./script/scriot.js"></script>

</body>



</html>