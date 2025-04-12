<div class="container_com">
    <h1>Comments</h1><br>


    <?php
    $qry = "SELECT mr.Comment_ID, mr.Comment, mr.status, r.Name, r.`Reviewer ID` FROM `manuscript_review` as mr JOIN `reviewer` as r ON r.`Reviewer ID` = mr.`Reviewer ID` WHERE mr.`Manuscript ID` = $manuscriptId AND mr.status >0;";
    $data = mysqli_query($conn, $qry);
    if($data != null){
    while ($arr =  mysqli_fetch_array($data)) {

    ?>
        <form action="./update_comment_status.php" method="post">
            <div class="comment_section_list">
                <div class="cmt_rv_img">
                    <img src="http://www.gravatar.com/avatar/9017a5f22556ae0eb7fb0710711ec125?s=128" alt="Reviewer 1" class="avatar">

                </div>
                <div class="comment_text">
                    <div class="name">
                        <h3><?php echo $arr["Name"]; ?></h3>
                    </div>
                    <p><?php echo $arr["Comment"]; ?></p>

                </div>
                <input type="hidden" id="commentID" name="commentId" value="<?php echo $arr["Comment_ID"]?>">       
                <input type="hidden" id="manuscriptId" name="manuscriptId" value="<?php echo $manuscriptId?>">
                <div class="cmt_sts_btn">
                <?php 
                    if($arr["status"]==2){ ?>
                        verified
                   <?php }else{ ?>
                    <input type="submit" class="btn" id="<?php echo $arr["Reviewer ID"]; ?>" name="status" value=<?php if($arr["status"]==1)echo "Pending";elseif($arr["status"]==2)echo "verified";  else "False";?>>
                   <?php }
                
                ?>
                    
                    <!--     <a href="" class="btn">Request Reviewer</a> -->

                </div>
            </div>
        </form>
        <!--   Additional content goes here -->
    <?php } }else echo "no data found"?>
</div>