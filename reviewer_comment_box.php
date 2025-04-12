<div class="container_com">
    <div>
        <div class="title">
            <h1>Reviewer's Comment Box</h1>
        </div>
        <form action="./post_comment.php" method="post">
            <div class="form">
                <input type="hidden" id="reviewerID" name="reviewerID" value="<?php echo $reviewerID ?>;">
                <input type="hidden" id="manuscriptId" name="manuscriptId" value="<?php echo  $manuscriptId ?>">
                <div class="input_field">
                    <label for="">Comment</label>
                    <textarea name="comment" id="comment" cols="" rows="4" placeholder="Comment here" required>
                    <?php
                    $qry5 = "SELECT `Comment`, `status`  FROM `manuscript_review` WHERE `Reviewer ID`= $reviewerID AND `Manuscript ID`=$manuscriptId;";
                    $raw5 = mysqli_query($conn, $qry5);
                    if (mysqli_num_rows($raw5) > 0) {
                        $data5 = mysqli_fetch_array($raw5);
                        if ($data5["status"] > 0 and !(is_null($data5["Comment"]))) {
                            echo $data5["Comment"];
                        } else {
                            echo "";
                        }
                    } else {
                        echo "";
                    }
                    ?>
                    </textarea>
                </div>

                <div class="input_field">
                    <input type="submit" value="Submit" class="btn">
                </div>
            </div>

        </form>
    </div>
</div>