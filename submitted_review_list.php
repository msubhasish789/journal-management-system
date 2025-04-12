<?php 
        session_start();
        if($_SESSION['reviewer id']=== null){
            header("Location: ./login.php");
        }

        include('connection.php');
        $reviewer_id = $_SESSION['reviewer id'];
             
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

        <?php   include('reviewer_header.php'); ?>


        <section class="home pending_manu">
            <h2>Submitted Reviews</h2>
            <div>
                <?php
                        
                        $sql = "SELECT ms.`Manuscript id`, a.`Name` AS `AuthorName`, ms.`Manu Name` AS `ManuscriptName`,ms.`Description`, ms.`Submission date`, ms.`FileContent`, ms.`Status`, mr.`Comment`, `mr`.`status` as CommentStatus
                         FROM `Manuscript Submission` ms JOIN `author` a ON ms.`Author id` = a.`Author id` 
                         JOIN `manuscript_review` mr ON mr.`Manuscript ID` = ms.`Manuscript ID` 
                         WHERE ms.`Manuscript id` in 
                         (SELECT `Manuscript ID` FROM `manuscript_review` WHERE `Reviewer ID`= $reviewer_id AND `status` >=1);";

                        $data= mysqli_query($conn, $sql);
                        if($data!= null){
                            while($arr=  mysqli_fetch_array($data))
                            {
                ?>

                <div class="manuscript_list">
                    <div class="image">
                        <img src="http://www.gravatar.com/avatar/9017a5f22556ae0eb7fb0710711ec125?s=128" alt="Avatar" class="avatar">
                    </div>
                    <div class="content">
                        <div class="heading">
                            <h3><?php echo $arr["ManuscriptName"];?></h3>
                        </div>
                        <div class="body">
                            <p><?php echo $arr["Description"];?></p>
                        </div>
                        <div class="autor topic">
                            <span class="">Author Name: <?php echo  $arr["AuthorName"]?></span><span class="topic">  Topic: </span>
                        </div>
                        <div class="time_status">
                            <span class="status">Status : <?php echo  $arr["Status"];  ?></span><span span="time"> Time Stamp: <?php echo  $arr["Submission date"] ?> </span>
                        </div>
                        
                    </div>
                    <div>
                        <a href="view_manuscript.php?manuscriptId=<?php echo $arr["Manuscript id"]; ?>" class="btn" id="<?php  $arr["Manuscript id"]; ?>">View</a>
                    </div>
                </div>
                <div class="comment">
                     <div   class="cmnt_sts">Comment: <h3> <?php echo  $arr["Comment"];  ?></h3></div>
                     <div>Status:  <?php if($arr["CommentStatus"]==1)echo "Pending";elseif($arr["CommentStatus"]==2)echo "verified";  else "False";?></div>
                </div>

                <?php }
                }else echo "No data Available" ?>

            </div>

        </section>

        <script   src= "./script/scriot.js"></script>
</body>
</html>