
    <?php
        $query = "SELECT `Availability` FROM `reviewer` WHERE `Reviewer ID`= '$reviewer_id'"; // Adjust the query based on your actual database structure
        
        if($raw=mysqli_query($conn,$query)){
                $data = mysqli_fetch_array($raw);
                $cr_status = $data['Availability'];
        }
        else{
            echo "Error Occured";
        }
    ?>
    
    <header>
        <a href="./index.html" class="logo"><span id="logo"><img src="./images/icons8-home-50.png"></span></a>
         <nav class="navbar">
      <!--   <input type="checkbox" id="toggleCheckbox" onchange="updateStatus(this.checked)">  -->
            <a href="review_request_list.php"  id="Request">Request</a>
            <a href="submitted_review_list.php" id="Submitted">Submitted</a>
            <a href="pending_review.php" id="Review">Reviews</a>
            
            <a href="login.php"  ><img src="./images/account-8.svg"  class="account"></a>

            <label class="switch" > 
                <input type="checkbox" onchange="updateStatus(this.checked, '<?php echo $_SESSION['reviewer id']?>')" <?php echo ($cr_status == 1) ? 'checked' : ''; ?> >
                <span class="slider round"></span>
            </label>
         </nav> 
     <hr class="rounded">
    </header>
